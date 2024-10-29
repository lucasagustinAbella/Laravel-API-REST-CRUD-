<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
   
   
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255', 
            'text' => 'required|string', 
            'user_id' => 'required|exists:users,id', 
        ];
    }
}
