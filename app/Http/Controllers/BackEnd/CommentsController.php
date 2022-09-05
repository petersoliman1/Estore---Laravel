<?php

namespace App\Http\Controllers\BackEnd;

use App\Category;
use App\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests\commentRequest;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class CommentsController extends Controller
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
            // But this all Show but this for show language.
            $comments = Comment::all();

            return view('BackEnd.comments.comments', ['comments' => $comments]);

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
            /** Users ID Forgin_Key */
            // $users = User::all();

            /** Products ID Forgin_Key */
            $products = Product::select('id', 'name_' . app()->getlocale() . ' as name' )->get();

        return view('BackEnd.comments.create')->with(['products' => $products , /*'users' => $users*/]);

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
    public function store(commentRequest $request)
    {
        try {
            $data = Comment::create([
                /** 'columnName' => بيشاور على الريكوست اللي اسمه العنوان -> name input */
                'comment' => $request->comment,
                'status' => $request->status,
                'product_id' => $request->product_id,
                'user_id' => $request->user_id,
            ]);

            /** Package Toastr */
            toastr()->success(trans('messages.Success'));

            return redirect()->route('comments.index')->with('Success', trans('messages.Success'));

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
        //
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
            /** Products ID Forgin_Key */
            $products = Product::select('id', 'name_' . app()->getlocale() . ' as name' )->get();

            /** Users ID Forgin_Key */
            // $users = User::all();

            /** Edie Comment */
            $comment = Comment::findOrFail($id);
        return view('BackEnd.comments.edit' , ['comment' => $comment , 'products' => $products , /*'users' => $users*/]);

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
            $comment = Comment::findOrFail($id);

            $comment->update([
                'comment' => $request->comment,
                'status' => $request->status,
                'product_id' => $request->product_id,
                'user_id' => $request->user_id,
            ]);

            /** Package Toastr */
            toastr()->info(trans('messages.Update'));
            // return redirect()->back();   // The modification takes place in the same form.
            return redirect()->route('comments.index')->with('Info', trans('messages.Update'));

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
            $comment = Comment::findOrFail($id);
            $comment->delete();

            /** Package Toastr */
            toastr()->error(trans('messages.Delete'));

            return redirect()->route('comments.index')->with('Danger', trans('messages.Delete'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
