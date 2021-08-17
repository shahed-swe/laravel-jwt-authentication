<?php

namespace App\Http\Requests\Mechanic;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServicingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "customer_uid" => ["required"],
            "mechanic_uid" => ["required"],
            "device_name" => ["required"],  
            "device_model" => ["required"],   
            "delivery_date" => ["required"],
            "total_fee" => ["required"],  
            "advance_payment" => ["required"],  
            "total_cost" => ["required"],  
            "description" => ["required"],
        ];
    }
}
