<?php

namespace App\Livewire\Product;

use Livewire\Component;

class CreateProductComponent extends Component
{
    public function render()
    {
        return view('livewire.product.create-product-component')->layout('layouts.base');
    }
}
