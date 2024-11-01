<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
   
   
    public function rules(): array
    {
        return [
            'name' => 'string|max:255', 
            'text' => 'string', 
            'user_id' => 'exists:users,id', 
        ];
    }
}
