<?php

namespace App\Http\Requests\Velin;

use App\Http\Requests\Request;

class UserProfile extends Request
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
        $this->sanitize();

        $id = user()->id;

        return [
            'name'  => 'required|max:255',
            'username'  => 'required|max:15|unique:users,username,'.$id,
            'email'    => 'required|unique:users,email,'.$id,
            'password'  => 'required',
            'verify_password'   => 'same:password',
        ];
    }

    public function sanitize()
    {
        $input = $this->all();

        $input['password'] = \Hash::make($input['password']);

        $this->replace($input);
    }
}
