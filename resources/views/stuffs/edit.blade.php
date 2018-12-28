@extends('layouts.global') 
 
@section('title') Edit stuff @endsection  
 
@section('content') 
 
<div class="row">   <div class="col-md-8"> 
 
    @if(session('status'))       <div class="alert alert-success">         {{session('status')}}       </div>     @endif 
 
    <form       enctype="multipart/form-data"       method="POST"       action="{{route('stuffs.update', ['id' => $stuff->id])}}"       class="p-3 shadow-sm bg-white"     > 
 
    {{ csrf_field() }}      
    <input type="hidden" name="_method" value="PUT"> 
 
    <label for="title">Title</label><br>     
    <input       type="text"       class="form-control"       value="{{$stuff->title}}"       name="title"       placeholder="Stuff title"     />     <br> 
 
    <label for="cover">Cover</label><br>     
    <small class="text-muted">Current cover</small><br>     @if($stuff->cover)       <img src="{{asset('storage/' . $stuff->cover)}}" width="96px"/>     @endif     <br><br>     <input        type="file"  
      class="form-control"       name="cover"     >     <small class="text-muted">Kosongkan jika tidak ingin mengubah cover</small>     <br><br> 
 
 
    <label for="slug">Slug</label><br>     <input        type="text"       class="form-control"       value="{{$stuff->slug}}"       name="slug"       placeholder="enter-a-slug"     />     <br> 
 
    <label for="description">Description</label> <br>     <textarea name="description" id="description" class="form-control"> {{$stuff->description}}</textarea>     <br> 
 


 
        <label for="brand_id">Id Merk</label>  <br>        
        <select name="brand_id" class="form-control" >@foreach ($brands as $brand)<option value="{{$stuff->brand_id}}">{{$brand->id}}</option>@endforeach </select>        <br> 
    <label for="stock">Stock</label><br>     <input type="text" class="form-control" placeholder="Stock" id="stock" name="stock" value="{{$stuff->stock}}">     <br> 
 
    <label for="price">Price</label><br>     <input type="text" class="form-control" name="price" placeholder="Price" id="price" value="{{$stuff->price}}">     <br> 
 
    <label for="">Status</label>     <select name="status" id="status" class="form-control">       <option {{$stuff->status == 'PUBLISH' ? 'selected' : ''}} value="PUBLISH">PUBLISH</option>       <option {{$stuff->status == 'DRAFT' ? 'selected' : ''}} 
value="DRAFT">DRAFT</option>     </select>     <br>          <button class="btn btn-primary" value="PUBLISH">Update</button> 
 
    </form>   </div> </div> 
 
@endsection 
 