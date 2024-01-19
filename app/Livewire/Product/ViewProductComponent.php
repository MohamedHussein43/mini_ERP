<?php

namespace App\Livewire\Product;

use Livewire\Component;

class ViewProductComponent extends Component
{
    public function render()
    {
        return view('livewire.product.view-product-component')->layout('layouts.base');
    }
}
