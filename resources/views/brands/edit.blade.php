@extends('layouts.global') 
 
@section('title') Edit Brand @endsection  
 
@section('content')  @if(session('status'))   <div class="alert alert-success">     {{session('status')}}   </div> @endif  <div class="col-md-8">     <form        action="{{route('brands.update', ['id' => $brand->id])}}"       enctype="multipart/form-data"       method="POST"       class="bg-white shadow-sm p-3"       > 

       {{ csrf_field() }}
 
      <input          type="hidden"          value="PUT"          name="_method"> 
 
      <label>Category name</label> <br>       <input          type="text"          class="form-control"          value="{{$brand->name}}"          name="name">       <br><br> 
 
      <label>Cateogry slug</label>       
      <input          type="text"          class="form-control"          value="{{$brand->slug}}"          name="slug">       <br><br> 
 
      <input type="submit" class="btn btn-primary" value="Update"> 
 
    </form>   </div> @endsection