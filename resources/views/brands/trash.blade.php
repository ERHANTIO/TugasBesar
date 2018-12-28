@extends('layouts.global') 
 
@section('title') Trashed Categories @endsection  
 
@section('content') 
 
<div class="row">     <div class="col-md-6"> 
      <form action="{{route('brands.index')}}"> 
 
        <div class="input-group">             <input                type="text"                class="form-control"                placeholder="Filter by brand name"               value="{{Request::get('name')}}"               name="name">                            <div class="input-group-append">               <input                  type="submit"                  value="Filter"                  class="btn btn-primary">             </div>         </div>                  </form>     </div> 
 
    <div class="col-md-6">       <ul class="nav nav-pills card-header-pills">         <li class="nav-item">           <a class="nav-link" href=" {{route('brands.index')}}">Published</a>         </li>         <li class="nav-item">           <a class="nav-link active" href=" {{route('brands.trash')}}">Trash</a>         </li>       </ul>     </div> 
 
  </div> 
 
  <hr class="my-3"> 
 
<div class="row">   <div class="col-md-12">     <table class="table table-bordered">       <thead>         <tr>           <th>Nama</th>           <th>Slug</th>        <th>Action</th>         </tr>       </thead>       <tbody>         @foreach($brands as $brand)           <tr>             <td>{{$brand->name}}</td>             <td>{{$brand->slug}}</td> 
                 <td>               <a href="{{route('brands.restore', ['id' => $brand->id])}}" class="btn btn-success">Restore</a>       <form   class="d-inline"   action="{{route('brands.delete-permanent', ['id' => $brand->id])}}"   method="POST"   onsubmit="return confirm('Delete this category permanently?')"   > 
 
  {{ csrf_field() }} 
 
  <input      type="hidden"     name="_method"     value="DELETE"/>      <input      type="submit"     class="btn btn-danger btn-sm"     value="Delete"/> 
 
</form>	     </td>           </tr>         @endforeach        </tbody>       <tfoot>         <tr>           <td colSpan="10">             {{$brands->appends(Request::all())->links()}}           </td>         </tr>       </tfoot>     </table>   </div> </div>    @endsection