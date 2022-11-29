<?php

namespace App\Http\Livewire\Pages\Order;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class SalesView extends Component
{
    public $search_item = '';
    public $search_customer = '';

    public $customer_id = '0', $customers, $selected_customer;
    public $warehouse_id = '0', $warehouses, $selected_warehouse;
    public $products = [];
    public $order, $total, $items = [];

    public function render()
    {
        $this->customers = Customer::where('name', 'like', '%'.$this->search_customer.'%')->get();
        $this->warehouses = Warehouse::all();

        return view('livewire.pages.order.sales-view')
            ->extends('layouts.dashboard')
            ->section('main');
    }

    public function redirect_page(string $route_name, $param = null)
    {
        if (isset($param)) {
            return redirect()->route($route_name, $param);
        } else {
            return redirect()->route($route_name);
        }
    }

    public function get_warehouse()
    {
        $this->selected_warehouse = Warehouse::findOrFail($this->warehouse_id);
        $this->products = Product::where('warehouse_id', $this->warehouse_id)->orWhere('name', 'like', '%'.$this->search_item.'%')->get();
    }

    public function get_customer($customer_id)
    {
        $this->selected_customer = Customer::findOrFail($customer_id);
    }

    public function create_order()
    {
        $this->order = new Order();
    }

    public function qty($action, $id, $stock)
    {
        if ($action == 'add') {
            if ($this->items[$id]['qty'] < $stock) {
                $this->items[$id]['qty'] += 1;
            }
        } else {
            if ($this->items[$id]['qty'] > 1) {
                $this->items[$id]['qty'] -= 1;
            }
        }

        $this->total = $this->total();
    }

    public function add_to_lists($product)
    {
        if (!isset($this->order)) {
            $this->create_order();
        }

        $product_item = [
            'id' => $product['id'],
            'warehouse_id' => $product['warehouse_id'],
            'brand_id' => $product['brand_id'],
            'name' => $product['name'],
            'stock' => $product['stock'],
            'price' => $product['price'],
            'qty' => 1
        ];

        if (isset($this->items[$product['id']])) {
            $this->qty('add', $product['id'], $product['stock']);
        } else {
            $this->items[$product['id']] = $product_item;
        }

        $this->total = $this->total();
    }

    public function total()
    {
        $this->total = 0;

        foreach ($this->items as $item) {
            $this->total += $item['qty'] * $item['price'];
        }

        return $this->total;
    }

    public function remove_from_list($id)
    {
        unset($this->items[$id]);
        $this->total = $this->total();
    }

    public function checkout()
    {
        $total = $this->total();

        DB::transaction(function () use ($total) {
            $this->order->payment_date = null;
            $this->order->customer_id = $this->selected_customer->id;
            $this->order->date = date("Y-m-d H:i:s");
            $this->order->total_payment = $total;
            $this->order->save();

            foreach ($this->items as $item) {
                $order_detail = new OrderDetail();
                $order_detail->order_id = $this->order->id;
                $order_detail->product_id = $item['id'];
                $order_detail->price = $item['price'];
                $order_detail->quantity = $item['qty'];
                $order_detail->save();

                $product = Product::find($item['id']);
                $product->stock = $product->stock - $item['qty'];
                $product->save();
            }
        });

        $this->redirect_page('order.show', $this->order->id);
    }
}
