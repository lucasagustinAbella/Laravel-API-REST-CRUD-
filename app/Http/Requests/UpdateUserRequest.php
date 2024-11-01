<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{


    public function rules()
    {
        return [
            'name' => 'string|max:255',
            // 'email' => 'string|email|max:255|unique:users,email,' . $this->user,
        ];
    }
}
