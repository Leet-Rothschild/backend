<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        if( request()->routeIS('user.store')) {
            return [
            'name' => 'required|string|max:255',
            'email'    => 'required|string|email|max:255',
            'password'   => 'required|min:8',
         ];      
      }
      else if( request()->routeIS('user.update'))
      return [
        'name' => 'required|string|max:255'
     ];      
    }
}   