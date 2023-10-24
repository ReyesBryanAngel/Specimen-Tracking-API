<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecimenForm extends Model
{
    use HasFactory;

    protected $table = "specimen_forms";

    protected $fillable = [
        'type_of_sample',
        'baby_last_name',
        'baby_last_first_name',
        'for_multiple_births',
        'mothers_first_name',
        'date_and_time_of_birth',
        'sex',
        'babys_weight_in_grams',
        'date_and_time_of_collection',
        'age_of_gestation_in_weeks',
        'place_of_collection',
        'place_of_birth',
        'attending_practitioner',
        'practitioner_profession',
        'practitioners_day_contact_number',
        'practitioners_mobile_number',
        'baby_status',
        'baby_status_cont',
        'name_of_parent',
        'number_and_street',
        'barangay_or_city',
        'province',
        'zip_code',
        'contact_number_of_parent',
        'additional_contact_number',
    ];
}
