<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            //'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'image', 'max:1024'],

            // 'last_name' => ['nullable', 'string', 'max:255'],
            // 'country' => ['nullable', 'string', 'max:255'],
            // 'country_state' => ['nullable', 'string', 'max:255'],
            // 'city' => ['nullable', 'string', 'max:255'],
            // 'telephone' => ['nullable', 'string', 'max:255'],
            // 'address' => ['nullable', 'string', 'max:255'],
            // 'state' => ['nullable', 'string', 'max:255'],


        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if (
            $input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail
        ) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                //'name' => $input['name'],
                'email' => $input['email'],

                // 'last_name' => $input['last_name'],
                // 'country' => $input['country'],
                // 'country_state' => $input['country_state'],
                // 'city' => $input['city'],
                // 'telephone' => $input['telephone'],
                // 'address' => $input['address'],
                // 'state' => $input['state'],
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            //'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
