<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public $pages = [
      'warehouse' => 'Warehouse', 'brand' => 'Brand', 'product' => 'Product', 'order' => 'Orders', 'order-sales' => 'Order-Sale', 'customers' => 'Customers'
    ];

    public $page = 'Warehouse';

    public function render()
    {
        return view('livewire.dashboard');
    }

    public function change_page($page)
    {
        $this->page = $this->pages[$page];
    }
}
