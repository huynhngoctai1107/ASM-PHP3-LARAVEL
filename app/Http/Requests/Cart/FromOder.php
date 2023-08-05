<?php

namespace App\Http\Requests\Cart;

use Illuminate\Foundation\Http\FormRequest;

class FromOder extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name'=>'bail|required|min:10|max:255',
            'email'=>'bail|required|email',
            'phone'=>'bail|required|regex:/(0)[0-9]/|not_regex:/[a-z]/|min:9',
        
        ];
    }
    public function messages(): array
{
    return [
        'name.required' => 'Tên khách hàng không được bỏ trống ! ',
        'name.min' => 'Tên khách hàng phải lớn hơn 10 ký tự',
        'name.max' => 'Tên khách hàng tối đa 255 kí tự ',
        'email.required' => 'Email không được bỏ trống',
        'email.email' => 'Email sai định dạng',
        'phone.required' => 'Số điện thoại không được để trống',
        'phone.regex' => 'Số điện thoại sai định dạng',
    ];
}

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    
}
