@extends("layouts.master")
@section("Page-Title","Add Customer")
@section("Page-Content")
@if ($errors->any())
<ul>
@foreach ($errors->all() as $error)
    <li>{{$error}}</li>
@endforeach
</ul>
@endif
<form action="{{route("customers.store")}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="customer_image" class="form-label">customer image</label>
      <input type="file" name="customer_image" id="customer_image" class="form-control">
    </div>

    <div class="mb-3">
      <label for="fname" class="form-label">first name</label>
      <input type="text" class="form-control" id="fname" name="first_name" value="{{old("first_name")}}">
    </div>
    <div class="mb-3">
        <label for="mname" class="form-label">mid name</label>
        <input type="text" class="form-control" id="mname" name="mid_name" value="{{old("mid_name")}}">
      </div>
      <div class="mb-3">
        <label for="lname" class="form-label">last name</label>
        <input type="text" class="form-control" id="lname" name="last_name" value="{{old("last_name")}}">
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{old("email")}}">
      </div>
      <div class="mb-3">
        <label for="address" class="form-label">address</label>
        <input type="text" class="form-control" id="address" name="address" value="{{old("address")}}">
      </div>
      <div class="mb-3">
        <label for="phone" class="form-label">phone</label>
        <input type="text" class="form-control" id="phone" name="phone_number" value="{{old("phone")}}">
      </div>

      <div class="mb-3">
        <label for="status" class="form-label">status</label>
        <select name="status" class="form-select" aria-label="Default select example">
            <option value="married">married</option>
            <option value="single">single</option>
          </select>
      </div>

      <div class="mb-3">
        <label for="age" class="form-label">age</label>
        <input  type="number" min="17" max="35" class="form-control" id="age" name="age" value="{{old("age")}}">
      </div>
    <button type="submit" class="btn btn-primary">save</button>
  </form>
@endsection