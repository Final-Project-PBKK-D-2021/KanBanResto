<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditBusinessFormRequest extends FormRequest
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
                'business_id' => 'required',
                'name' => 'required|max:255',
                'description' => 'required',
                'since' => 'required|numeric',
                'owner_name' => 'required|max:255'
        ];
    }
}
