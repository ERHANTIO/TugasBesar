<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $brands = \App\Brand::paginate(10); 
 
    $filterKeyword = $request->get('name'); 
 
    if($filterKeyword){         $brands = \App\Brand::where("name", "LIKE", "%$filterKeyword%")->paginate(10);     } 
 
    return view('brands.index', ['brands' => $brands]);
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
        $name = $request->get('name'); 
 
    $new_brand = new \App\Brand;   

    $new_brand->name = $name; 
 
    $new_brand->created_by = \Auth::user()->id; 
 
    $new_brand->slug = str_slug($name, '-'); 
 
    $new_brand->save(); 
 
    return redirect()->route('brands.create')->with('status', 'Brand successfully created');
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
        $brand_to_edit = \App\Brand::findOrFail($id); 
 
    return view('brands.edit', ['brand' => $brand_to_edit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){     $name = $request->get('name'); 
    $slug = $request->get('slug'); 
 
    $brand = \App\Brand::findOrFail($id); 
 
    $brand->name = $name;     $brand->slug = $slug;      

 
    $brand->updated_by = \Auth::user()->id;          $brand->slug = str_slug($name); 
 
    $brand->save(); 
 
    return redirect()->route('brands.edit', ['id' => $id]); }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $brand = \App\Brand::findOrFail($id); 
 
        $brand->delete(); 
        return redirect()->route('brands.index')   ->with('status', 'Brand successfully moved to trash'); 
    }
    public function trash(){ 
        $deleted_brand = \App\Brand::onlyTrashed()->paginate(10); 
 
        return view('brands.trash', ['brands' => $deleted_brand]); 
    }
    public function restore($id){ 
 
        $brand = \App\Brand::withTrashed()->findOrFail($id); 
 
        if($brand->trashed()){     $brand->restore();   } else {     return redirect()->route('brands.index')     ->with('status', 'Brand is not in trash');   } 
 
        return redirect()->route('brands.index')   ->with('status', 'Brand successfully restored'); 
    }
    public function deletePermanent($id){  
        $brand = \App\Brand::withTrashed()->findOrFail($id); 
 
  if(!$brand->trashed()){     
    return redirect()->route('brands.index')->with('status', 'Can not delete permanent active brand');   
    } else {     
    $brand->forceDelete(); 
 
    return redirect()->route('brands.index')->with('status', 'Brand permanently deleted');   
    }

    }
}
