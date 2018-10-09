<?php

namespace App\Http\Requests\Attr;

use Illuminate\Foundation\Http\FormRequest;

class AddRequest extends FormRequest
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
            'att_name' => 'required|unique:attribute,att_name',
            'att_value' => 'required'
        ];
    }

    public function messages()
    {
        return [
        'att_name.required' => 'Không được bỏ trống trường Thuộc tính',
        'att_name.unique' => 'Thuộc tính đã tồn tại',
        'att_value.required' => 'Giá trị không được phép rỗng'
        ];
    }
}
