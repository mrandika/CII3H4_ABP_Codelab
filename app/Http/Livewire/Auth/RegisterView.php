<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class RegisterView extends Component
{
    public $first_name, $last_name, $phone_number;
    public $email, $password, $password_confirmation;

    public function render()
    {
        return view('livewire.auth.register-view')
            ->extends('layouts.auth')
            ->section('auth-content');
    }

    public function redirect_page(string $route_name)
    {
        return redirect()->route($route_name);
    }

    public function reset_fields()
    {
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
    }

    public function flash_message(string $key, string $value)
    {
        session()->flash($key, $value);
    }

    public function register()
    {
        $this->validate([
            'first_name' => ['required', 'min:5'],
            'last_name' => ['required', 'min:5'],
            'email' => ['required', 'email', 'min:10'],
            'password' => ['required', 'confirmed', Password::min(8)->letters()->numbers()->symbols()->mixedCase()],
        ]);

        $user = new User();
        $user->email = $this->email;
        $user->password = Hash::make($this->password);
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->save();

        $this->reset_fields();
        $this->flash_message('info', 'Akun berhasil terdaftar.');
        $this->redirect_page('auth.login');
    }
}
