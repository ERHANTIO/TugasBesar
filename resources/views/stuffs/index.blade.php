@extends('layouts.global') 
 
@section('title') Stuffs list @endsection  
 
@section('content')  @if(session('status'))   <div class="alert alert-success">     {{session('status')}}   </div> @endif  <div class="row">     <div class="col-md-12">   <div class="row">   <div class="col-md-6"><form   action="{{route('stuffs.index')}}" > 
 
<div class="input-group">     <input name="keyword" type="text" value="{{Request::get('keyword')}}" class="form-control" placeholder="Filter by title">     <div class="input-group-append">       <input type="submit" value="Filter" class="btn btn-primary">     </div> </div> 
 
</form> </div>   <div class="col-md-6">     <ul class="nav nav-pills card-header-pills">       <li class="nav-item">         <a class="nav-link {{Request::get('status') == NULL && Request::path() == 'stuffs' ? 'active' : ''}}" href=" {{route('stuffs.index')}}">All</a>       </li>       <li class="nav-item">           <a class="nav-link {{Request::get('status') == 'publish' ? 'active' : '' }}" href="{{route('stuffs.index', ['status' => 'publish'])}}">Publish</a>       </li>       <li class="nav-item">         <a class="nav-link {{Request::get('status') == 'draft' ? 'active' : '' }}" href="{{route('stuffs.index', ['status' => 'draft'])}}">Draft</a>       </li>       <li class="nav-item">         <a class="nav-link {{Request::path() == 'stuffs/trash' ? 'active' : ''}}" href="{{route('stuffs.trash')}}">Trash</a>       </li>     </ul>   </div> </div>   <div class="row mb-3">   <div class="col-md-12 text-right">     <a       href="{{route('stuffs.create')}}"       class="btn btn-primary"     >Create stuff</a>   </div> </div>  <table class="table table-bordered table-stripped">         <thead>           <tr>             <th><b>Cover</b></th>             <th><b>Title</b></th>                          <th><b>Status</b></th>             <th><b>Categories</b></th> <th><b>Brand</b></th>             <th><b>Stock</b></th>             <th><b>Price</b></th>             <th><b>Action</b></th>           </tr>         </thead>         <tbody>           @foreach($stuffs as $stuff)            
			 <tr> 
              <td>                 
              	@if($stuff->cover)                   
              	<img src="{{asset('storage/' . $stuff->cover)}}" width="96px"/>                 
              @endif               </td>               
              <td>{{$stuff->title}}</td>               
              <td>                 @if($stuff->status == "DRAFT")                   
              	<span class="badge bg-dark text-white">{{$stuff->status}} </span>                 
              	@else                    
              	<span class="badge badge-success">{{$stuff->status}} </span>                 
              @endif                
          </td>     
          <td>{{$stuff->category_id}}</td>
          <td>{{$stuff->brand_id}}</td>
          <td>{{$stuff->stock}}</td>               
          <td>{{$stuff->price}}</td>               
          <td>                <a   href="{{route('stuffs.edit', ['id' => $stuff->id])}}"   class="btn btn-info btn-sm"   > Edit </a>          <form   method="POST"   class="d-inline"   onsubmit="return confirm('Move Stuff to trash?')"   action="{{route('stuffs.destroy', ['id' => $stuff->id ])}}" > 
 
{{ csrf_field() }}   <input    type="hidden"    value="DELETE"   name="_method"> 
 
<input    type="submit"    value="Trash"    class="btn btn-danger btn-sm"> 
 
</form>     </td>             
      </tr>           @endforeach         </tbody>         
      <tfoot>           <tr>             <td colspan="10">               {{$stuffs->appends(Request::all())->links()}}             </td>           </tr>         </tfoot>       </table>     </div>   </div> @endsection