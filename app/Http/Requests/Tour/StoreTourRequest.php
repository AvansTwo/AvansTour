<?php

namespace App\Http\Requests\Tour;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Redirect;

class StoreTourRequest extends FormRequest
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
            'name'          => ['required', 'min:3', 'max:40', "unique:tour,name"],
            'description'   => ['required', 'min:3', 'max:100'],
            'image_url'     => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:8192', 'dimensions:min_width=600,min_height=350'],
            'location'      => ['required', 'between:-180,180', 'regex:/([0-9]{1,3}.[0-9]*,[0-9]{1,3}.[0-9]*)/'],
            'category_id'   => ['required', 'integer'],
        ];
    }

    public function messages()
    {
        return [
            'image_url.image'                                       => 'Bestandstype dient een afbeelding te zijn.',
            'image_url.mimes:jpeg,png,jpg,gif,svg'                  => 'Het foto type dient een: jpeg,png,jpg,gif of svg te zijn.',
            'name.unique'                                           => 'Een tournaam dient uniek te zijn.',
            'image_url.max'                                         => 'Een foto dient maximaal 2mb te zijn.',
            'image_url.dimensions'                                  => 'Een foto dient minimaal 600px breedt te zijn en 350px hoog.',
            'location.between'                                      => 'Locatie dient tussen -180 en 180 te liggen.',
        ];
    }

    public function attributes()
    {
         return [
            'name'          => 'TourNaam',
            'description'   => 'Omschrijving',
            'image_url'     => 'Foto',
            'location'      => 'Locatie',
            'category_id'   => 'Categorie'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        return Redirect::back()->withErrors($validator)->withInput();
    }
}
