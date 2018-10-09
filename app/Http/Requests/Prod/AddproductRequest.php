<?php

namespace App\Http\Requests\Prod;

use Illuminate\Foundation\Http\FormRequest;

class AddproductRequest extends FormRequest
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
            'prod_name' => 'required|unique:product,prod_name',
            'prod_code' => 'required',
            'prod_price' => 'required',
            'prod_cate' => 'required',
            'prod_status' => 'required',
            'prod_type' => 'required',
            'prod_des' => 'required',
            'prod_thumbnail' => 'required'
        ];
    }

    function messages()
    {
        return [
            '*.required' => 'Không được để trống',
            'prod_name.unique' => 'Sản phẩm đã tồn tại'
        ];
    }
}
