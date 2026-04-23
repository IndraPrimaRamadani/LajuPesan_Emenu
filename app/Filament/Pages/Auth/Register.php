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
        $user = $this->handleRegistration($data);
        $this->callHook('afterRegister');

        // Logout the user so they are redirected to login
        Auth::guard(Filament::getAuthGuard())->logout();

        session()->flush();
        session()->regenerate();

        $this->redirect(Filament::getLoginUrl());

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
        ->minLength(5)
        ->unique($this->getUserModel());
    }
}
