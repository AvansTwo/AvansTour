<?php

namespace App\Http\Requests\Question;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Redirect;

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
            'title'         => ['required', 'min:3', 'max:40'],
            'description'   => ['required', 'min:3', 'max:200'],
            'image_url'     => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048', 'dimensions:min_width=600,min_height=350'],
            'gps_location'  => ['required', 'between:-180,180', 'regex:/^(-?\d+(.\d+)?),\s*(-?\d+(.\d+)?)$/'],
            'points'        => ['required', 'integer'],
            'type'          => ['required']
        ];
    }

    public function messages()
    {
        return [
            'image_url.image'                       => 'Bestandstype dient een afbeelding te zijn.',
            'image_url.mimes:jpeg,png,jpg,gif,svg'  => 'Het foto type dient een: jpeg,png,jpg,gif of svg te zijn.',
            'image_url.max'                         => 'Een foto dient maximaal 2mb te zijn.',
            'image_url.dimensions'                  => 'Een foto dient minimaal 600px breedt te zijn en 350px hoog.',
            'gps_location.between'                  => 'Locatie dient tussen -180 en 180 te liggen.',
        ];
    }

    public function attributes()
    {
        return [
            'title'         => 'Titel vraag',
            'description'   => 'Omschrijving vraag',
            'image_url'     => 'Foto vraag',
            'gps_location'  => 'Locatie vraag',
            'points'        => 'Punten vraag',
            'type'          => 'type vraag'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        return Redirect::back()->withErrors($validator)->withInput();
    }
}
