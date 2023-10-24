<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthRequest extends FormRequest
{
    public function passes($attribute, $value)
    {
        // Retrieve the user by email
        $user = User::where('email', request('email'))->first();
    
        // Check if the provided password matches the user's hashed password
        return $user && Hash::check($value, $user->password);
    }
}
