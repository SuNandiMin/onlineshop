<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands=Brand::all();
        return view('brands.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('logo'))
        {
              $fileNameToStore=logoUpload($request->file('logo'));
        }
        $checked = $request->input('checked');
        Brand::create([
            'name'=>$request->name,
            'logo'=> $fileNameToStore ?? null,
            'enable'=>$checked ?? 0,
        ]);

        return redirect()->route('brands.index')
                        ->with('success','Brand created successfully.');
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
    public function edit(Brand $brand)
    {
        return view('brands.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        if ($request->hasFile('logo'))
        {
              $fileNameToStore=logoUpload($request->file('logo'));
        }

        $brand->update([
            'name'=>$request->name,
            'logo'=> $fileNameToStore ?? null,
            'enable'=>$request->input('checked') ?? 0,
        ]);

        return redirect()->route('brands.index')
                        ->with('success','Brand updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()->route('brands.index')
                        ->with('success','brand deleted successfully');
    }
}
