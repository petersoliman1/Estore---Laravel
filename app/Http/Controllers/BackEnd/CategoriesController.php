<?php

namespace App\Http\Controllers\BackEnd;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\categoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\BackEnd\toastr;
use Illuminate\Support\Facades\File;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            // Connect Database.

            /** The Second method is through the Database
             *
             * The second method is through the Model
            */
            // $modelCategories = Category::all();    // This for all Categories Show.

            // But this all Show but this for show language.
            $modelCategories = Category::select(
                                        'id' . ' as id' ,
                                        'title_' . app()->getlocale() . ' as title' ,
                                        'description_' . app()->getlocale() . ' as description' ,
                                        'image' . ' as image',
                                        'status' . ' as status',
                                        )->get();

            return view('BackEnd.categories.categories', ['modelCategories' => $modelCategories]);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return view('BackEnd.categories.create');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(categoryRequest $request)
    {
        try {
            /** Add Photos */
            if ($request->hasFile('image')) {
                $image = $request->image;
                // Take Image Extension.
                $imageExtension = $image->extension();
                // Image Nameing.
                $imageName = time() . "." . $imageExtension;
                // Upload the image in the project files.
                $image->move(public_path('images/categories'), $imageName);
            }

            $category = Category::create([
                /** 'columnName' => بيشاور على الريكوست اللي اسمه العنوان -> name input */
                'title_en' => $request->title_en,
                'title_ar' => $request->title_ar,
                'description_en' => $request->description_en,
                'description_ar' => $request->description_ar,
                'status' => $request->status,
                'image' => $imageName,
            ]);

            /** Package Toastr */
            toastr()->success(trans('messages.Success'));

            return redirect()->route('categories.index')->with('Success', trans('messages.Success'));

            /* The dd method dumps the collection's items and ends execution of the script: */
            // dd($request->all());

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            // get the category
            $category = Category::findOrFail($id);

            // show the view and pass the category to it
            return view('BackEnd.categories.show' , ['category' => $category]);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $category = Category::findOrFail($id);
            return view('BackEnd.categories.edit' , ['category' => $category]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $category = Category::findOrFail($id);

            /** Add Photos */
            if ($request->hasFile('image')) {
                /** Delete Old Iamge */
                File::delete('images/categories/' . $category->image);
                $image = $request->image;
                // Take Image Extension.
                $imageExtension = $image->extension();
                // Image Nameing.
                $imageName = time() . "." . $imageExtension;
                // Upload the image in the project files.
                $image->move(public_path('images/categories'), $imageName);


                /** Update Form With Image */
                $category->update([
                    'title_en' => $request->title_en,
                    'title_ar' => $request->title_ar,
                    'description_en' => $request->description_en,
                    'description_ar' => $request->description_ar,
                    'status' => $request->status,
                    'image' => $imageName,
                ]);
            }

            /** Update form if the image has not changed */
            $category->update([
                'title_en' => $request->title_en,
                'title_ar' => $request->title_ar,
                'description_en' => $request->description_en,
                'description_ar' => $request->description_ar,
                'status' => $request->status,
            ]);

            /** Package Toastr */
            toastr()->info(trans('messages.Update'));
            // return redirect()->back();   // The modification takes place in the same form.
            return redirect()->route('categories.index')->with('Info', trans('messages.Update'));

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);
            // Delete Image in my project.
            File::delete('images/categories/' . $category->image);
            $category->delete();

            /** Package Toastr */
            toastr()->error(trans('messages.Delete'));
            return redirect()->route('categories.index')->with('Danger', trans('messages.Delete'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
