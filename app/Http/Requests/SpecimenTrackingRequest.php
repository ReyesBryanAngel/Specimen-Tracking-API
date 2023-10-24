<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpecimenTrackingRequest extends FormRequest
{
    const STRING_REQUIRED = 'required|string';
    public function rules()
    {
        return [
            'type_of_sample' => self::STRING_REQUIRED,
            'baby_last_name' => self::STRING_REQUIRED,
            'baby_last_first_name' => self::STRING_REQUIRED,
            'for_multiple_births' => self::STRING_REQUIRED,
            'mothers_first_name' => self::STRING_REQUIRED,
            'date_and_time_of_birth' => 'required|date',
            'sex' => 'required|in:Male,Female,Other',
            'babys_weight_in_grams' => 'required|numeric',
            'date_and_time_of_collection' => 'required|date',
            'age_of_gestation_in_weeks' => 'required|integer|min:0',
            'place_of_collection' => self::STRING_REQUIRED,
            'place_of_birth' => self::STRING_REQUIRED,
            'attending_practitioner' => self::STRING_REQUIRED,
            'practitioner_profession' => self::STRING_REQUIRED,
            'practitioners_day_contact_number' => self::STRING_REQUIRED,
            'practitioners_mobile_number' => self::STRING_REQUIRED,
            'baby_status' => self::STRING_REQUIRED,
            'baby_status_cont' => self::STRING_REQUIRED,
            'name_of_parent' => self::STRING_REQUIRED,
            'number_and_street' => self::STRING_REQUIRED,
            'barangay_or_city' => self::STRING_REQUIRED,
            'province' => self::STRING_REQUIRED,
            'zip_code' => self::STRING_REQUIRED,
            'contact_number_of_parent' => self::STRING_REQUIRED,
            'additional_contact_number' => self::STRING_REQUIRED,
        ];
    }
}
