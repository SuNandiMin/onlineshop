<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands=Brand::all();
        return view('products.create',compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image'))
        {
              $fileNameToStore=imageUpload($request->file('image'));
        }

        Product::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'brand_id'=>$request->brand,
            'image'=> $fileNameToStore ?? null,
            'quantity'=>$request->quantity,
            'margin'=>$request->margin,
            'price'=>$request->price,
            'vat'=>$request->vat,
            'discount'=>$request->discount,
            'enable'=>$request->input('checked') ?? 0,
        ]);

        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $brands= Brand::all();
        return view('products.edit',compact('product','brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$product)
    {
        if ($request->hasFile('image'))
        {
              $fileNameToStore=imageUpload($request->file('image'));
        }
        Product::find($product)->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'brand_id'=>$request->brand,
            'image'=> $fileNameToStore,
            'quantity'=>$request->quantity,
            'margin'=>$request->margin,
            'price'=>$request->price,
            'vat'=>$request->vat,
            'discount'=>$request->discount,
            'enable'=>$request->input('checked') ?? 0,
        ]);

        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }
}
