@extends('layouts.global') 
 
@section('title') Create Brands @endsection  
 
@section('content') 
 
<div class="col-md-8"> 
@if(session('status'))     <div class="alert alert-success">         {{session('status')}}     </div> @endif    <form      enctype="multipart/form-data"      class="bg-white shadow-sm p-3"      action="{{route('brands.store')}}"      method="POST"> 
 
    {{ csrf_field() }}
 
    <label>Brand name</label><br>     <input        type="text"        class="form-control"        name="name"/>     <br>      
 
    <input        type="submit"        class="btn btn-primary"        value="Save"/> 
 
  </form> </div>
 
@endsection 