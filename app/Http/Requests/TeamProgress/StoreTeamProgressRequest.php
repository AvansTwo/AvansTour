<?php

namespace App\Http\Requests\TeamProgress;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class StoreTeamProgressRequest extends FormRequest
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
        return [
            'teamAnswerMedia'     => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:8192', 'dimensions:min_width=600,min_height=350'],
        ];
    }

    public function messages()
    {
        return [
            'teamAnswerMedia.image'                       => 'Bestandstype dient een afbeelding te zijn.',
            'teamAnswerMedia.mimes:jpeg,png,jpg,gif,svg'  => 'Het foto type dient een: jpeg,png,jpg,gif of svg te zijn.',
            'teamAnswerMedia.max'                         => 'Een foto dient maximaal 2mb te zijn.',
            'teamAnswerMedia.dimensions'                  => 'Een foto dient minimaal 600px breedt te zijn en 350px hoog.',
        ];
    }

    public function attributes()
    {
        return [
            'teamAnswerMedia'          => 'Team foto antwoord',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        return Redirect::back()->withErrors($validator)->withInput();
    }
}
