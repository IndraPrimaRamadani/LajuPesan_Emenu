<style>
    /* Sembunyikan hanya menu profil user di halaman verifikasi */
    .fi-simple-layout .fi-simple-header-subheading + div,
    [class*="fi-user-menu"] { display: none !important; }
</style>

<div wire:poll.3s="checkVerificationStatus">
    <x-filament-panels::page.simple>
        <p class="text-center text-sm text-gray-500 dark:text-gray-400">
            {{
                __('filament-panels::pages/auth/email-verification/email-verification-prompt.messages.notification_sent', [
                    'email' => filament()->auth()->user()->getEmailForVerification(),
                ])
            }}
        </p>

        <p class="text-center text-sm text-gray-500 dark:text-gray-400">
            {{ __('filament-panels::pages/auth/email-verification/email-verification-prompt.messages.notification_not_received') }}

            {{ $this->resendNotificationAction }}
        </p>
    </x-filament-panels::page.simple>
</div>
