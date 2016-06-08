<?php

namespace App\Http\Requests\Velin;

use App\Http\Requests\Request;

class RoleRequest extends Request
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
            'role'  => 'min:4|required|unique:roles,role,'.$this->segment(4),
        ];
    }

    /*
    public function messages()
    {
        return [
            'role.required' => 'hobah'
        ];
    }*/
}
