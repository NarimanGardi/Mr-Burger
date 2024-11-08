<?php

namespace App\Livewire;

use App\Models\Food;
use App\Models\Order;
use App\Models\Client;
use Livewire\Component;

class OrderCreate extends Component
{
    public $clients, $foods, $food_ids = [], $quantities = [], $prices = [], $client_id;
    public $inputs = [];
    public $total = 0;

    public function mount()
    {
        $this->clients = Client::all();
        $this->foods = Food::where('is_available', true)->get();
    }

    public function addFood()
    {
        $index = count($this->inputs);
        $this->inputs[] = $index;
        $this->food_ids[$index] = null;
        $this->quantities[$index] = 1; // Default quantity is 1
        $this->prices[$index] = 0;     // Default price is 0
    }

    public function removeFood($index)
    {
        unset($this->inputs[$index]);
        unset($this->food_ids[$index]);
        unset($this->quantities[$index]);
        unset($this->prices[$index]);
        $this->calculateTotal();
    }

    public function updatedFoodIds($value, $key)
    {
        $food = $this->foods->firstWhere('id', $value);
        if ($food) {
            $this->prices[$key] = $food->price; // Set default price from the food
        }
        $this->calculateTotal();
    }

    public function updatedQuantities($value, $key)
    {
        $this->calculateTotal();
    }

    public function updatedPrices($value, $key)
    {
        $this->calculateTotal();
    }

    public function calculateTotal()
    {
        $this->total = 0;
        foreach ($this->inputs as $index) {
            if (isset($this->food_ids[$index]) && isset($this->quantities[$index]) && isset($this->prices[$index])) {
                $this->total += $this->prices[$index] * $this->quantities[$index];
            }
        }
    }

    public function store()
    {
        $this->validate([
            'client_id' => 'required|exists:clients,id',
            'food_ids.*' => 'required|exists:food,id',
            'quantities.*' => 'required|numeric|min:1',
            'prices.*' => 'required|numeric|min:0',
        ]);

        $order_number = Order::max('order_number') + 1;

        $order = Order::create([
            'user_id' => auth()->id(),
            'client_id' => $this->client_id,
            'status' => 'pending',
            'total' => $this->total,
            'order_number' => $order_number,
        ]);

        foreach ($this->inputs as $index) {
            $order->foods()->attach($this->food_ids[$index], [
                'price' => $this->prices[$index],
                'amount' => $this->quantities[$index],
            ]);
        }

        toast()->success('داواکاری بەسەرکەوتویی زیاد کرا');
        return redirect()->route('orders.index');
    }

    public function render()
    {
        return view('livewire.order-create');
    }
}
