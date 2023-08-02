<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CustomersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            // "user_id"=>"required|exists:users,id",
            "first_name"=>"required",
            "mid_name"=>"required",
            "last_name"=>"required",
            "email"=>"required",
            "status"=>"required",
            "address"=>"required",
            "age"=>"required",
            "customer_image"=>"required",
        ];
    }
    public function messages(): array
    {
        return [

        ];
    }
}
