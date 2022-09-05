<?php

namespace App\Http\Controllers\BackEnd;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\productRequest;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use PhpParser\Node\Expr\New_;

class ProductsController extends Controller
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
                            ->get();

            return view('BackEnd.products.products', ['products' => $products]);

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
            /** Categoreis ID Forgin_Key */
            $modelCategories = Category::select('id' . ' as id' , 'title_' . app()->getlocale() . ' as title' )->get();
            return view('BackEnd.products.create')->with('modelCategories', $modelCategories);

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
    public function store(productRequest $request)
    {
        try {
            // Add Image.
            if ($request->hasFile('image')) {
                $image = $request->image;
                // Take Image Extension.
                $imageExtension = $image->extension();
                // Image Nameing.
                $imageName = time() . "-" . rand(0, 1000) . "." . $imageExtension;
                // Upload the image in the project files.
                $image->move(public_path('images/products'), $imageName);
            }

            /** Add Sub_Image */
            if ($request->hasFile('sub_image')) {
                $image = $request->sub_image;
                // Take Image Extension.
                $imageExtension = $image->extension();
                // Image Nameing.
                $imageName1 = time() . "-" . rand(0, 1000) . "." . $imageExtension;
                // Upload the image in the project files.
                $image->move(public_path('images/products/MultiImages'), $imageName1);
            }

            $data = Product::create([
                /** 'columnName' => بيشاور على الريكوست اللي اسمه العنوان -> name input */
                'name_en' => $request->name_en,
                'name_ar' => $request->name_ar,
                'description_en' => $request->description_en,
                'description_ar' => $request->description_ar,
                'image' => $imageName,
                // 'sub_image' => '',
                'sub_image' => $imageName1,
                'old_price' => $request->old_price,
                'current_price' => $request->current_price,
                'status' => $request->status,
                'amount' => $request->amount,
                'category_id' => $request->category_id,
            ]);

            /** Package Toastr */
            toastr()->success(trans('messages.Success'));

            return redirect()->route('products.index')->with('Success', trans('messages.Success'));

            /* The dd method dumps the collection's items and ends execution of the script: */
            // dd($request->all());

            // The modification takes place in the same form.
            // return redirect()->back();


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
            // get the product
            $product = Product::findOrFail($id);
            // show the view and pass the product to it
            return view('BackEnd.products.show' , ['product' => $product]);

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
            /** Categoreis ID Forgin_Key */
            $category = Category::select('id' . ' as id' , 'title_' . app()->getlocale() . ' as title' )->get();

            /** Edie Product */
            $product = Product::findOrFail($id);

            return view('BackEnd.products.edit' , ['product' => $product , 'category' => $category]);

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
            $product = Product::findOrFail($id);

            /** Add Image */
            if ($request->hasFile('image')) {
                /** Delete Old Iamge */
                File::delete('images/products/' . $product->image);
                $image = $request->image;
                // Take Image Extension.
                $imageExtension = $image->extension();
                // Image Nameing.
                $imageName = time() . "-" . rand(0, 1000) . "." . $imageExtension;
                // Upload the image in the project files.
                $image->move(public_path('images/products'), $imageName);

                /** Update Form With Image */
                $product->update([
                    'name_en' => $request->name_en,
                    'name_ar' => $request->name_ar,
                    'description_en' => $request->description_en,
                    'description_ar' => $request->description_ar,
                    'image' => $imageName,
                    'old_price' => $request->old_price,
                    'current_price' => $request->current_price,
                    'status' => $request->status,
                    'amount' => $request->amount,
                    'category_id' => $request->category_id,
                ]);
            }

            /** Add Sub_Image */
            if ($request->hasFile('sub_image')) {
                /** Delete Old Iamge */
                File::delete('images/products/MultiImages/' . $product->sub_image);
                $image = $request->sub_image;
                // Take Image Extension.
                $imageExtension = $image->extension();
                // Image Nameing.
                $imageName1 = time() . "-" . rand(0, 1000) . "." . $imageExtension;
                // Upload the image in the project files.
                $image->move(public_path('images/products/MultiImages'), $imageName1);

                /** Update Form With Image */
                $product->update([
                    'name_en' => $request->name_en,
                    'name_ar' => $request->name_ar,
                    'description_en' => $request->description_en,
                    'description_ar' => $request->description_ar,
                    'sub_image' => $imageName1,
                    'old_price' => $request->old_price,
                    'current_price' => $request->current_price,
                    'status' => $request->status,
                    'amount' => $request->amount,
                    'category_id' => $request->category_id,
                ]);
            }

            /** Update form if the image has not changed */
            $product->update([
                'name_en' => $request->name_en,
                'name_ar' => $request->name_ar,
                'description_en' => $request->description_en,
                'description_ar' => $request->description_ar,
                'old_price' => $request->old_price,
                'current_price' => $request->current_price,
                'status' => $request->status,
                'amount' => $request->amount,
                'category_id' => $request->category_id,
            ]);

            /** Package Toastr */
            toastr()->info(trans('messages.Update'));
            // return redirect()->back();   // The modification takes place in the same form.
            return redirect()->route('products.index')->with('Info', trans('messages.Update'));

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
        try
        {
            $product = Product::findOrFail($id);
            // Delete Image in my project.
            File::delete('images/products/' . $product->image);
            // Delete Sub_Image in my project.
            File::delete('images/products/MultiImages/' . $product->sub_image);
            $product->delete();

            /** Package Toastr */
            toastr()->error(trans('messages.Delete'));
            return redirect()->route('products.index')->with('Danger', trans('messages.Delete'));

        } catch (\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
