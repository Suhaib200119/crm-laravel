<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomersRequest;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=Auth::user();
        $customers=$user->customers;
        return view("crm.index",["customers"=>$customers]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("crm.create");

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomersRequest $request)
    {
        $validated=$request->validated();
        $customer=new Customer();
        $customer->user_id =Auth::id();
        $customer->first_name =$request->post("first_name");
        $customer->mid_name =$request->post("mid_name");
        $customer->last_name =$request->post("last_name");
        $customer->email =$request->post("email");
        $customer->status =$request->post("status");
        $customer->address =$request->post("address");
        $customer->phone_number =$request->post("phone_number");
        $customer->age =$request->post("age");
        $file=$request->file("customer_image");
        $path=$file->store("/images","public");
        $customer->customer_image=$path;
        if($customer->save()){
            Session::flash("success","The operation succeeded");
        }else{
            Session::flash("danger","The operation failed");
        }
        return redirect()->route("customers.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer=Customer::findOrFail($id);
        return view("crm.edit",["customer"=>$customer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomersRequest $request, string $id)
    {
        $validated=$request->validated();
        $customer=Customer::findOrFail($id);
        $customer->first_name =$request->post("first_name");
        $customer->mid_name =$request->post("mid_name");
        $customer->last_name =$request->post("last_name");
        $customer->email =$request->post("email");
        $customer->status =$request->post("status");
        $customer->address =$request->post("address");
        $customer->phone_number =$request->post("phone_number");
        $customer->age =$request->post("age");
        if($customer->save()){
            Session::flash("success","The operation succeeded");
        }else{
            Session::flash("danger","The operation failed");
        }
        return redirect()->route("customers.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer=Customer::findOrFail($id);
        $customer->delete();
        return response()->json(["message"=>"The operation succeeded"],200);

    }
}
