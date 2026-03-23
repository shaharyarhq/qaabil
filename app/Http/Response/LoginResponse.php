<?php

namespace App\Http\Response;

use Filament\Auth\Http\Responses\LoginResponse as ResponsesLoginResponse;
use Filament\Facades\Filament;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Uri;
use Livewire\Features\SupportRedirects\Redirector;

class LoginResponse extends ResponsesLoginResponse
{
    public function toResponse($request): RedirectResponse|Redirector
    {
        $redirectTo = optional(
            $request->session()->previousUrl(),
            fn($url) => Uri::of($url)->query()->get('redirectTo')
        );

        if (Filament::getCurrentPanel()->getId() === 'member') {
            return redirect()->to(
                $this->safeRedirect($redirectTo) ?? route('home')
            );
        }

        return parent::toResponse($request);
    }

    protected function safeRedirect(?string $url): ?string
    {
        return $url && str_starts_with($url, url('/'))
            ? $url
            : null;
    }
}
