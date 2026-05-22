<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SocialiteUnableToCreateUserException extends Exception
{
    public function render(Request $request): RedirectResponse
    {
        session()->put('filament-socialite-login-error', 'Unable to create your account.');
        return response()->redirectTo(filament()->getCurrentPanel()->getLoginUrl());
    }
}
