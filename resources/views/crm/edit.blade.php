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
<form action="{{route("customers.update",$customer->id)}}" method="post">
    @csrf
    @method("put")
    <div class="mb-3">
      <label for="fname" class="form-label">new first name</label>
      <input type="text" class="form-control" id="fname" name="first_name" value="{{$customer->first_name}}">
    </div>
    <div class="mb-3">
        <label for="mname" class="form-label">new mid name</label>
        <input type="text" class="form-control" id="mname" name="mid_name" value="{{$customer->mid_name}}">
      </div>
      <div class="mb-3">
        <label for="lname" class="form-label">new last name</label>
        <input type="text" class="form-control" id="lname" name="last_name" value="{{$customer->last_name}}">
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">new email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{$customer->email}}">
      </div>
      <div class="mb-3">
        <label for="address" class="form-label">new address</label>
        <input type="text" class="form-control" id="address" name="address" value="{{$customer->address}}">
      </div>
      <div class="mb-3">
        <label for="phone" class="form-label">new phone</label>
        <input type="text" class="form-control" id="phone" name="phone_number" value="{{$customer->address}}">
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
        <input  type="number" min="17" max="35" class="form-control" id="age" name="age" value="{{$customer->age}}">
      </div>
    <button type="submit" class="btn btn-primary">update</button>
  </form>
@endsection