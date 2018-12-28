@extends('layouts.global') 
 
@section('title') Create Stuff @endsection  
 
@section('content')  @if(session('status'))   <div class="alert alert-success">     {{session('status')}}   </div> @endif  <div class="row">     <div class="col-md-8">       <form          action="{{route('stuffs.store')}}"         method="POST"         enctype="multipart/form-data"         class="shadow-sm p-3 bg-white"         > 
 
        {{ csrf_field() }}
 
        <label for="title">Title</label> <br>        
         <input type="text" class="form-control" name="title" placeholder="Stuff title">         <br> 
 
        <label for="cover">Cover</label>        
         <input type="file" class="form-control" name="cover">         <br> 
 
        <label for="description">Description</label><br>         <textarea name="description" id="description" class="form-control" placeholder="Give a description about this book"></textarea>         <br> 
 
        <label for="stock">Stock</label><br>         <input type="number" class="form-control" id="stock" name="stock" min=0 value=0>         <br> 
 
        <label for="category_id">Id Category</label><br>        <select name="category_id" class="form-control" >@foreach ($categories as $category)<option value="{{$category->id}}">{{$category->id}}. {{$category->name}}</option>@endforeach</select>         <br> 
 
        <label for="brand_id">Id Merk</label>  <br>        <select name="brand_id" class="form-control" >@foreach ($brands as $brand)<option value="{{$brand->id}}">{{$brand->id}}. {{$brand->name}}</option>@endforeach </select>        <br> 
 
        <label for="Price">Price</label> <br>         <input type="number" class="form-control" name="price" id="price" placeholder="Book price">         <br> 
 
        <button            class="btn btn-primary"            name="save_action"            value="PUBLISH">Publish</button> 
 
        <button            class="btn btn-secondary"            name="save_action"            value="DRAFT">Save as draft</button>       </form>     </div>   </div>  @endsection