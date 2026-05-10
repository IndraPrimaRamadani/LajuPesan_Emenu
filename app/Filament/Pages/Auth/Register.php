<?php

namespace App\Filament\Pages\Auth;

use Filament\Pages\Auth\Register as BaseRegister;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Component;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Auth;
use Filament\Http\Responses\Auth\Contracts\RegistrationResponse;

class Register extends BaseRegister
{
    public function register(): ?RegistrationResponse
    {
        $this->callHook('beforeValidate');
        $data = $this->form->getState();
        $this->callHook('afterValidate');

        $this->callHook('beforeRegister');
        /** @var \App\Models\User $user */
        $user = $this->handleRegistration($data);
        $this->callHook('afterRegister');

        // Login user agar bisa akses halaman verifikasi
        Auth::guard(Filament::getAuthGuard())->login($user);

        // Kirim email verifikasi otomatis
        $user->sendEmailVerificationNotification();

        // Redirect ke halaman verifikasi email
        $this->redirect(route('filament.admin.auth.email-verification.prompt'));

        return null;
    }
    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                ->schema([
                  $this->getLogoFormComponent(),
                  $this->getNameFormComponent(),
                  $this->getUsernameFormComponent(),
                  $this->getEmailFormComponent(),
                  $this->getPasswordFormComponent(),
                  $this->getPasswordConfirmationFormComponent(),
                ])
                ->statePath('data'),
                ),
            ];
    }

    protected function getLogoFormComponent(): Component
    {
        return FileUpload::make('logo')
        ->label('Logo Toko')
        ->image()
        ->required();
    }

    protected function getUsernameFormComponent(): Component
    {
        return TextInput::make('username')
        ->label('Username')
        ->hint('Minimal 5 karakter, tidak boleh ada spasi.')
        ->required()
        ->rules(['min:5'])
        ->unique($this->getUserModel());
    }
}
