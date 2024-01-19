<?php

namespace App\Livewire\Product;
use App\Models\Product;
use Livewire\Component;

class ViewProductComponent extends Component
{
    public $en_name;
    public $ar_name;
    public $en_description;
    public $ar_description;
    public $price;
    public $product;
    public function mount($id){
        
        $product = Product::find($id);
        $this->product = $product;
        if ($product) {
            $this->en_name = $product->attrByLocale('en','name');
            $this->ar_name = $product->attrByLocale('ar','name');
            $this->en_description = $product->attrByLocale('en','description');
            $this->ar_description = $product->attrByLocale('ar','description');
            $this->price = $product->getRawOriginal('price');
        } else {
            // Handle the case where the product is not found (e.g., redirect or show an error)
            abort(404);
        }
    }
    public function render()
    {
        return view('livewire.product.view-product-component')->layout('layouts.base');
    }
}
