<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCreditRequest extends FormRequest
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
            'custumerName'=>'required',
            'custumerActivity'=>'required',
            'nui'=>'required',
            'custumerHome'=>'required',
            'custumerPhone'=>'required',
            'custumerActivityHome'=>'required',
            'sexe'=>'required',
            'amount'=>'required',
            'deadline'=>'required',
            'pathFoleder'=>'required',
            'type'=>'required',
        ];
    }
}
