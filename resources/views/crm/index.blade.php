@extends('layouts.master')
@section('Page-Title', 'My Customer')
@section('Page-Content')
@if (session()->has("success"))
<div class="alert alert-success">
    {{session("success")}}
</div>
@elseIf(session()->has("danger"))
<div class="alert alert-danger">
    {{session("danger")}}
</div>
@endif
    <div class="row">
        @foreach ($customers as $customer)
            <div class="card" style="width: 18rem;" id="{{$customer->id}}">
                <img src="{{asset("storage/$customer->customer_image")}}" alt="">
                <div class="card-body">
                    <h5 class="card-title">{{ $customer->fullName }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $customer->email }}</h6>
                    <p class="card-text">
                        {{ $customer->status }}
                        , from
                        {{ $customer->address }}
                        and age
                        {{ $customer->age }}
                    </p>
                    <button onclick="confirmDelete({{ $customer->id }})" type="button" class="btn btn-danger">delete</button>
                    <a href="{{route("customers.edit",$customer->id)}}" class="card-link">update</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@section('js')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteCustomer(id);

                }
            })
        }

        function deleteCustomer(id) {
            
            axios.delete(`/customers/${id}`)
                .then(function(response) {
                    Swal.fire(
                        'Deleted!',
                        response.data["message"],
                        'success'
                    );
                    document.getElementById(id).remove();
                    
                });
               
        }
        
    </script>
@endsection
