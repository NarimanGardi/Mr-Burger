<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
       $check =  $this->user->can('edit-user') ? 'required|exists:roles,name' : 'sometimes';
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$this->user->id,
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5500',
            'role' => $check,
        ];
    }
}
