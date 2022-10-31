<?php

namespace App\Http\Livewire\Pages\Order;

use App\Models\Order;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class OrderView extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $search_value = '';
    public $selected_order;
    public $date, $payment_date, $total_payment, $customer_id;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'destroy',
        'resetFields'
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $orders = Order::paginate(25);

        return view('livewire.pages.order.order-view', [
            'orders' => $orders
        ]);
    }

    public function resetFields()
    {
        $this->date = '';
        $this->payment_date = '';
        $this->total_payment = '';
        $this->customer_id = '';
    }

    public function show($id)
    {
        $this->selected_order = Order::findOrFail($id);
        $this->date = $this->selected_order->date;
        $this->payment_date = $this->selected_order->payment_date;
        $this->total_payment = $this->selected_order->total_payment;
        $this->customer_id = $this->selected_order->customer_id;
    }
}
