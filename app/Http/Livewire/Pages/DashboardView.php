<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;

class DashboardView extends Component
{
    public function render()
    {
        return view('livewire.pages.dashboard-view')
            ->extends('layouts.dashboard')
            ->section('main');
    }
}
