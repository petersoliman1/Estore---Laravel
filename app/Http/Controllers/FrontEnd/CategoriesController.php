<?php

namespace App\Http\Controllers\FrontEnd;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {

        // Connect Database.

        /** The Second method is through the Database
         *
         * The second method is through the Model
        */
        // $modelCategories = Category::all();    // This for all Categories Show.

        // But this all Show but this for show language.
        $categories = Category::select(
                                    'id' . ' as id' ,
                                    'title_' . app()->getlocale() . ' as title' ,
                                    'description_' . app()->getlocale() . ' as description' ,
                                    'image' . ' as image',
                                    'status' . ' as status',
                                    )->get();

        return view('FrontEnd.categories.categories', ['categories' => $categories]);

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
