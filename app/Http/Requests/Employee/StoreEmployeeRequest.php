<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            "shift_uid" => ["required"],
            "dokan_uid" => ["required"],
            "age" => ["required"],
            "monthly_salary" => ["required"],
            "overtime_rate" => ["required"],
            "advance_taken" => ["required"],
        ];
    }
}
