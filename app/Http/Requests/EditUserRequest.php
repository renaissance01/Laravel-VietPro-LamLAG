<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'full'=>'required|min:3|max:10',
            'phone'=>'required|unique:users,phone,'.$this->idUser.',id',
            'address'=>'required',
            'id_number'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'full.required'=>'Tên không được để trống',
            'full.min'=>'Tên không được dưới 3 kí tự',
            'full.max'=>'Tên không được vượt 10 kí tự',
            'phone.required'=>'Số điện thoại không được để trống',
            'phone.unique'=>'Số điện thoại đã tồn tại',
            'address.required'=>'Địa chỉ không được để trống',
            'id_number.required'=>'Số CMT không được để trống',
        ];
    }
}
