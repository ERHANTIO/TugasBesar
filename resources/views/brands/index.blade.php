
@extends('layouts.global') 
 
@section('title') Brand list @endsection 
 
@section('content')
@if(session('status'))   <div class="row">     <div class="col-md-12"> 
      <div class="alert alert-warning">         {{session('status')}}       </div>     </div>   </div> @endif 
<div class="row">     <div class="col-md-6">       <form action="{{route('brands.index')}}"> 
 
        <div class="input-group">             <input                type="text"                class="form-control"                placeholder="Filter by brand name"               name="name">             <div class="input-group-append">               <input                  type="submit"                  value="Filter"                  class="btn btn-primary">             </div>         </div>                  </form>     </div>  <div class="col-md-6">       <ul class="nav nav-pills card-header-pills">         <li class="nav-item">           <a class="nav-link active" href=" {{route('brands.index')}}">Published</a>         </li>         <li class="nav-item">           <a class="nav-link" href="
{{route('brands.trash')}}">Trash</a>         </li>       </ul>     </div> </div>   <hr class="my-3"> 
<div class="row">     <div class="col-md-12">     <div class="row mb-3">   <div class="col-md-12 text-right">     <a       href="{{route('brands.create')}}"       class="btn btn-primary"     >Create brand</a>   </div> </div>    <table class="table table-bordered table-stripped">         <thead>             <tr>             <th><b>Name</b></th>             <th><b>Slug</b></th>                          <th><b>Actions</b></th>             </tr>         </thead> 
 
        <tbody>             @foreach ($brands as $brand)             <tr>                 <td>{{$brand->name}}</td>                 <td>{{$brand->slug}}</td>                             <td>                 <a      href="{{route('brands.edit', ['id' => $brand->id])}}"     class="btn btn-info btn-sm"> Edit </a>      <form    class="d-inline"   action="{{route('brands.destroy', ['id' => $brand->id])}}"   method="POST"   onsubmit="return confirm('Move brand to trash?')"   > 
 
  {{ csrf_field() }}
 
  <input      type="hidden"      value="DELETE"      name="_method"> 
  <input      type="submit"      class="btn btn-danger btn-sm"      value="Trash">    </form>            </td>             </tr>             @endforeach         </tbody>         <tfoot>           <tr>             <td colSpan="10">               {{$brands->appends(Request::all())->links()}}             </td>           </tr>         </tfoot>         </table> 


    </div> </div>
 
@endsection 

