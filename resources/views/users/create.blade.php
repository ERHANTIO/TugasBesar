@extends("layouts.app") 
 
@section("title") Create New User @endsection 
 
@section("content") 
 <div class="container">
    <div class="row">
      @if(session('status'))       <div class="alert alert-success">         {{session('status')}}       </div>     @endif 
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('users.store')}}" method="POST"> 
 
      {{ csrf_field() }}
 
      <label for="name">Name</label>       
        <input class="form-control" placeholder="Full Name" type="text" name="name" id="name"/>       
      <br> 
 
      <label for="username">Username</label>       
        <input class="form-control" placeholder="username" type="text" name="username" id="username"/>       
      <br>              

      <label for="">Roles</label>       
      <br>       
 
      <input          type="checkbox"          name="roles[]"          id="CUSTOMER"          value="CUSTOMER">          <label for="CUSTOMER">Customer</label>       <br> 
 
      <br>       <label for="phone">Phone number</label>        <br>       <input          type="text"          name="no_hp"          class="form-control"> 
 
      <br>       <label for="address">Address</label>       <textarea          name="alamat"          id="alamat"          class="form-control"></textarea> 
 
      <br>       <label for="avatar">Avatar image</label>       <br>       <input          id="gambar"          name="gambar"          type="file"          class="form-control"> 
 
      <hr class="my-3"> 
 
      <label for="email">Email</label>       <input          class="form-control"          placeholder="user@mail.com"          type="text"          name="email"          id="email"/>       <br>
      <label for="password">Password</label>       <input          class="form-control"          placeholder="password"          type="password"          name="password"          id="password"/>       <br> 
 
      <label for="password_confirmation">Password Confirmation</label>       <input          class="form-control"          placeholder="password confirmation"          type="password"          name="password_confirmation"          id="password_confirmation"/>       <br> 
 
      <input          class="btn btn-primary"          type="submit"          value="Save"/>     </form>   </div> 
        </div>
            </div>
        </div>
    </div>
 
@endsection 