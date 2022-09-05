<?php

namespace App\Http\Controllers\BackEnd;

use App\Category;
use App\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests\userRequest;
use App\Product;
use App\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{

    /** Route Dashboard */
    public function index() {

        try {
            // Connect Database.

            /** The first method is through the Database
             * I will use the first method
            */
            $users = DB::table('users')->get();

            /** Categories */
            $categories = Category::all();

            /** Products */
            $products = Product::all();

            /** Comments */
            $comments = Comment::all();

            return view('BackEnd.Dashboard', ['DBUsers' => $users, 'categories' => $categories , 'products' => $products , 'comments' => $comments]);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }


    public function create()
    {
        try {
            return view('BackEnd.users.create');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }



    public function store(userRequest $request)
    {
        /**
         * try and catch
         *
         * The try statement allows you to define a block of code to be tested for errors while it is being executed.
         *
         * The catch statement allows you to define a block of code to be executed, if an error occurs in the try block.
         */
        try {
            // Validate the request...

            /* New Object = Model */
            $user = new User;
            /* $user = إشاور على اسم العمود  = $request -> واشاور على اسم الخاص (Name) بإدخال*/
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = $request->role;

            /** Add Photos */
            if ($request->hasFile('avatar')) {
                $image = $request->avatar;
                // Take Image Extension.
                $imageExtension = $image->extension();
                // Image Nameing.
                $imageName = time() . "." . $imageExtension;
                // Upload the image in the project files.
                $image->move(public_path('images/users'), $imageName);
            }

            $user->avatar = $imageName;

            $user->save();

            /** Package Toastr */
            toastr()->success(trans('messages.Success'));

            return redirect()->route('dashboard')->with('Success', trans('messages.Success'));

            /* The dd method dumps the collection's items and ends execution of the script: */
            // dd($request->all());

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        try {
            // get the User
            $user = User::findOrFail($id);

            // show the view and pass the User to it
            return view('BackEnd.users.show' , ['user' => $user]);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function edit($id) {
        try {
            $user = User::findOrFail($id);
            return view('BackEnd.users.edit' , ['user' => $user]);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function update(Request $request , $id) {
        try {
            $user = User::findOrFail($id);

                /** Add New Photos */
                if ($request->hasFile('avatar')) {
                    /** Delete Old Iamge */
                    File::delete('images/users/' . $user->avatar);
                    /** Now I Will Make Create New Iamge */
                    $image = $request->avatar;
                    // Take Image Extension.
                    $imageExtension = $image->extension();
                    // Image Nameing.
                    $imageName = time() . "." . $imageExtension;
                    // Upload the image in the project files.
                    $image->move(public_path('images/users'), $imageName);

                    /** Update Form With Image */
                    $user->update([
                        'username' => $request->username,
                        'email' => $request->email,
                        'role' => $request->role,
                        'avatar' => $imageName
                    ]);
                }

                /** Update form if the image has not changed */
                $user->update([
                    'username' => $request->username,
                    'email' => $request->email,
                    'role' => $request->role,
                ]);

                /** Package Toastr */
                toastr()->info(trans('messages.Update'));

                // return redirect()->back();   // The modification takes place in the same form.
                return redirect()->route('dashboard')->with('Info', trans('messages.Update'));

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function delete($id) {
        try {
            $user = User::findOrFail($id);
            File::delete('images/users/' . $user->avatar);
            $user->delete();

            /** Package Toastr */
            toastr()->error(trans('messages.Delete'));

            return redirect()->route('dashboard')->with('Danger', trans('messages.Delete'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
