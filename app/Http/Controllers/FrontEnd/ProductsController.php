<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::select('products')
                            ->select(
                                'id',
                                'name_' . app()->getlocale() . ' as name' ,
                                'description_' . app()->getlocale() . ' as description' ,
                                'image',
                                'sub_image',
                                'old_price',
                                'current_price',
                                'status',
                                'amount',
                                'category_id', )
                            ->where('status','=',1)->get();
                            // Note: ->where('status','=',1) = So that making the status is hidden, it hides the product from the frontend, and when I Visible the product from the backend, the product appears.

         /** Categoreis ID Forgin_Key */
        $category = Category::select('id' . ' as id' , 'title_' . app()->getlocale() . ' as title' )->get();

        return view('FrontEnd.products.products', ['products' => $products , 'category' => $category]);
    }

    public function show($id)
    {
        try {
            // get the product
            $products = Product::findOrFail($id);

            $commentProduct = $products->comments;

            // show the view and pass the product to it
            return view('FrontEnd.products.show' , ['products' => $products, 'commentProduct' => $commentProduct]);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function create()
    {
        try {
            /** Users ID Forgin_Key */
            // $users = User::all();

            /** Products ID Forgin_Key */
            $products = Product::select('id', 'name_' . app()->getlocale() . ' as name' )->get();

        return view('FrontEnd.products.show')->with(['products' => $products , /*'users' => $users*/]);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function filterpro($id){
        Product::select('products')->where('category_id','=',$id)->where('status','=' ,1)->get();
    }
}
