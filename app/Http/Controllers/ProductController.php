<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\ProductCategory;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $products = Product::with('productCategory')->paginate(15);
        //dd($products);
                return view('product.index', compact('products'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::pluck('name', 'id');
        $categories = [''=>'Select productCategory'] + collect($categories)->ToArray();
        return view('product.form',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
         $request->validate([
        'product_category_id' => 'required',    
        'name' => 'required',
    ]);
        $product = new Product;
        $product->category_id = $request->product_category_id;
       // dd($request);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();
         return redirect('product')->with('user','Product Added successfully');
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
        
        $product = Product::find($id);
        $categories = ProductCategory::pluck('name', 'id');
        $categories = [''=>'Select productCategory'] + collect($categories)->ToArray();
        return view('product.form',compact('product','categories'));
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
        $request->validate([
            'product_category_id' => 'required',
            'name' => 'required',
        ]);
        $product = Product::find($id);
        $product->category_id = $request->product_category_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();
         return redirect('product')->with('update','Product Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product= Product::find($id);
        

        $product->productCategory()->delete();

        $product->save();
        Product::where('id', $id)->delete();
        return redirect('product')->with('delete','Product Deleted successfully');
    }
}
