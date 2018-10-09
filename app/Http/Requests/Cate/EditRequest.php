<?php

namespace App\Http\Requests\Cate;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
        $id = $this->route('id');
        return [
           'cate_name' => 'required|unique:categorys,cate_name,'.$id.',cate_id'
        ];
    }

    public function messages()
    {
        return [
            'cate_name.required' => 'Tên danh mục không được để trống',
            'cate_name.unique'   => 'Danh mục đã tồn tại'
        ];
    }
}
