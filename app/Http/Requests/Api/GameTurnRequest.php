<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class GameTurnRequest extends FormRequest
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
            'players' => 'required|integer|min:2|max:26',
            'turns' => 'required|integer|min:1|max:26',
            'start' => 'required|in:A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z',
        ];
    }

    public function messages()
    {

        return [
            'start.in' => 'The starting player must be one of the following Capital letters: A, B, C, etc ....',
        ];

    }
}
