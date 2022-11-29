<?php

namespace App\Http\Livewire\Pages\Order;

use App\Models\Order;
use Livewire\Component;

class ShowView extends Component
{
    public $order_id;

    public function mount($order_id)
    {
        $this->order_id = $order_id;
    }

    public function render()
    {
        $order = Order::findOrFail($this->order_id);

        return view('livewire.pages.order.show-view', ['order' => $order])
            ->extends('layouts.dashboard')
            ->section('main');
    }
}
