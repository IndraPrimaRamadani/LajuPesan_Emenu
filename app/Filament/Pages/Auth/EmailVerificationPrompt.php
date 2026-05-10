<?php

namespace App\Filament\Pages\Auth;

use Filament\Pages\Auth\EmailVerification\EmailVerificationPrompt as BasePrompt;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Auth;

class EmailVerificationPrompt extends BasePrompt
{
    protected static string $view = 'filament.pages.auth.email-verification-prompt';

    // Poll setiap 3 detik untuk cek apakah email sudah diverifikasi
    public function checkVerificationStatus(): void
    {
        /** @var \App\Models\User|null $user */
        $user = Filament::auth()->user();

        // Jika user menjadi null karena di-logout oleh tab sebelah (saat klik verifikasi)
        if (! $user) {
            $this->redirect(Filament::getLoginUrl());
            return;
        }

        if ($user->hasVerifiedEmail()) {
            // Logout user
            Auth::guard(Filament::getAuthGuard())->logout();

            // Redirect ke halaman login
            $this->redirect(Filament::getLoginUrl());
        }
    }
}
