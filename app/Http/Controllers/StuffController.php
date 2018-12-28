<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Stuff;
class StuffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {     
        $status = $request->get('status');     
        $keyword = $request->get('keyword') ? $request->get('keyword') : ''; 
 
    if($status){         
        $stuffs = \App\Stuff::with('categories')->where('title', "LIKE", "%$keyword%")->where('status', strtoupper($status))->paginate(10);     
    } else {         
        $stuffs = \App\Stuff::with('categories')->where("title", "LIKE", "%$keyword%")->paginate(10);     
    }          
    return view('stuffs.index', ['stuffs' => $stuffs]); }

    public function welcome() {     
                 
        $stuffs = \App\Stuff::with('categories')->paginate(10);     
          
    return view('welcome', ['stuffs' => $stuffs]); }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = \App\Category::all();
        $brands = \App\Brand::all();
        return view('stuffs.create', ['brands' => $brands], ['categories' => $categories]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $new_stuff = new \App\Stuff;
    $new_stuff->brand_id = $request->get('brand_id');
    $new_stuff->category_id = $request->get('category_id');   
    $new_stuff->title = $request->get('title');   
    $new_stuff->description = $request->get('description'); 
    $new_stuff->price = $request->get('price');
    $new_stuff->status = $request->get('save_action');    
    $new_stuff->stock = $request->get('stock'); 
    $cover = $request->file('cover'); 
    if($cover){     
        $cover_path = $cover->store('stuff-covers', 'public'); 
        $new_stuff->cover = $cover_path;   
    } 
    
    $new_stuff->slug = str_slug($request->get('title')); 
    $new_stuff->created_by = \Auth::user()->id; 
 
    $new_stuff->save();  
  if($request->get('save_action') == 'PUBLISH'){     
    return redirect()->route('stuffs.create')->with('status', 'Stuff successfully saved and published');   
    } 
    else {     return redirect()           ->route('stuffs.create')           ->with('status', 'Stuff saved as draft');   }
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

        $stuff = \App\Stuff::findOrFail($id); 
        
        $brands = \App\Brand::all();
        $categories = \App\Category::all();
    return view('stuffs.edit', ['stuff' => $stuff], ['brands' => $brands], ['categories' => $categories]);
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
        $stuff = \App\Stuff::findOrFail($id); 
 
        $stuff->title = $request->get('title');     
        $stuff->slug = $request->get('slug');     
        $stuff->description = $request->get('description');  
        $stuff->brand_id = $request->get('brand_id');       
        $stuff->stock = $request->get('stock');     
        $stuff->price = $request->get('price'); 
 
        $new_cover = $request->file('cover'); 
 
        if($new_cover){         
            if($stuff->cover && file_exists(storage_path('app/public/' . $stuff->cover))){             
                \Storage::delete('public/'. $stuff->cover);         } 
 
        $new_cover_path = $new_cover->store('stuff-covers', 'public'); 
 
        $stuff->cover = $new_cover_path;  
   } 
 
    $stuff->updated_by = \Auth::user()->id; 
 
    $stuff->status = $request->get('status'); 
 
    $stuff->save(); 
 
 
    return redirect()->route('stuffs.edit', ['id'=>$stuff->id])->with('status', 'Stuff successfully updated'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stuff = \App\Stuff::findOrFail($id); $stuff->delete(); 
        return redirect()->route('stuffs.index')->with('status', 'Stuff moved to trash');
    }
    public function trash(){  
     $stuffs = \App\Stuff::onlyTrashed()->paginate(10); 
 
  return view('stuffs.trash', ['stuffs' => $stuffs]); 
}
public function restore($id){   
    $stuff = \App\Stuff::withTrashed()->findOrFail($id); 
 
  if($stuff->trashed()){     
    $stuff->restore();     
    return redirect()->route('stuffs.trash')->with('status', 'Stuff successfully restored');   
    } else {    
    return redirect()->route('stuffs.trash')->with('status', 'Stuff is not in trash');  
  } 
}
  public function deletePermanent($id){   
    $stuff = \App\Stuff::withTrashed()->findOrFail($id); 
 
  if(!$stuff->trashed()){     
    return redirect()->route('stuffs.trash')->with('status', 'Stuff is not in trash!')->with('status_type', 'alert');   } else {   
        $stuff->forceDelete(); 
 
    return redirect()->route('stuffs.trash')->with('status', 'Stuff permanently deleted!');   } }
}
