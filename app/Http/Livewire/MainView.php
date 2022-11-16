<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MainView extends Component
{
    public function render()
    {
        return view('livewire.main-view')
            ->layout('livewire.dashboard')
            ->section('main');
    }
}
