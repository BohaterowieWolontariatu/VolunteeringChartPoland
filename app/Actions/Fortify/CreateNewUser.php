<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Rules\Pesel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param array $input
     * @return User
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'pesel' => ['required', 'string', 'max:255', 'unique:users', new Pesel],
            'phone' => ['required', 'string', 'max:12'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'surname' => $input['surname'],
            'pesel' => $input['pesel'],
            'phone' => $input['phone'],
            'email' => $input['email'],
            'has_agreement_signed' => $input['has_agreement_signed'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
