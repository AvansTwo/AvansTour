<?php

namespace App\Http\Requests\Question;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class StoreQuestionRequest extends FormRequest
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
            'questionTitle'         => ['required', 'min:3', 'max:40'],
            'questionDesc'          => ['required', 'min:3', 'max:100'],
            'questionImg'           => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048', 'dimensions:min_width=600,min_height=350'],
            'questionLocation'      => ['required', 'between:-180,180', 'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/'],
            'questionPoints'        => ['required', 'integer'],
        ];
    }

    public function messages()
    {
        return [
            'questionImg.image'                       => 'Bestandstype dient een afbeelding te zijn.',
            'questionImg.mimes:jpeg,png,jpg,gif,svg'  => 'Het foto type dient een: jpeg,png,jpg,gif of svg te zijn.',
            'questionImg.max'                         => 'Een foto dient maximaal 2mb te zijn.',
            'questionImg.dimensions'                  => 'Een foto dient minimaal 600px breedt te zijn en 350px hoog.',
            'questionLocation.between'                => 'Locatie dient tussen -180 en 180 te liggen.',
        ];
    }

    public function attributes()
    {
        return [
            'questionTitle'     => 'Titel vraag',
            'questionDesc'      => 'Omschrijving vraag',
            'questionImg'       => 'Foto vraag',
            'questionLocation'  => 'Locatie vraag',
            'questionPoints'    => 'Punten vraag'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        return Redirect::back()->withErrors($validator)->withInput();
    }
}
