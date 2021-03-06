<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\PhoneNumber;
use Illuminate\Validation\Rule;

class UpdateOrderRequest extends FormRequest
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
            'description' => 'required|min:3|max:255',
            'quantity' => 'required|integer',
            'status' => '',
            'tracking_code' => [
                'required',
		        Rule::unique('orders', 'tracking_code')->ignore($this->order)], 
            'contact_number' => ['required', new PhoneNumber],
            'address' => ''
        ];
    }
}
