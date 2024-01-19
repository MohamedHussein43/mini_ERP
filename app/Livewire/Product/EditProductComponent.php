<?php

namespace App\Livewire\Product;
use App\Models\Product;
use Livewire\Component;

class EditProductComponent extends Component
{
    public $product;
    public function mount($id){
        $this->product = Product::find($id);
    }
    public function render()
    {
        return view('livewire.product.edit-product-component')->layout('layouts.base');
    }
}
