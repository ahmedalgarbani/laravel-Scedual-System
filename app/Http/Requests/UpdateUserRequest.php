<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>['required','max:255'],
            'email'=>['required','unique:users','email','max:255'],
            'password'=>['required','min:6','confirmed'],
            'Role'=>['nullable'],
            'teacher_id'=>['nullable','max:255']
        ];
    }
}
