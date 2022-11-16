<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public $pages = [
      'warehouse' => 'Warehouse', 'brand' => 'Brand', 'product' => 'Product', 'order' => 'Orders', 'order-sales' => 'Order-Sale', 'customers' => 'Customers'
    ];

    public $page = 'Warehouse';

    public function render()
    {
        return view('livewire.dashboard')
            ->extends('layouts.app')
            ->section('content');
    }

    public function change_page($page)
    {
        $this->page = $this->pages[$page];
    }

    public function redirect_page(string $route_name)
    {
        return redirect()->route($route_name);
    }

    public function logout()
    {
        Auth::logout();

        $this->redirect_page('auth.login');
    }
}
