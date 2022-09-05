<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::select(
            'id' . ' as id' ,
            'title_' . app()->getlocale() . ' as title' ,
            'description_' . app()->getlocale() . ' as description' ,
            'image' . ' as image',
            'status' . ' as status',
            )->get();

        return view('FrontEnd.home', ['categories' => $categories]);
    }

    public function show($id)
    {
        // get the Category
        $category = Category::findOrFail($id);

        $categoryProducts = $category->products;

        // show the view and pass the product to it
        return view('FrontEnd.categories.show' , ['category' => $category, 'categoryProducts' => $categoryProducts]);
    }
}
