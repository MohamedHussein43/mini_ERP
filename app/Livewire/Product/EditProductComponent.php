<?php

namespace App\Livewire\Product;

use Livewire\Component;

class EditProductComponent extends Component
{
    public function render()
    {
        return view('livewire.product.edit-product-component')->layout('layouts.base');
    }
}
