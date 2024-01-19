<?php

namespace App\Livewire\Product;
use Livewire\Attributes\Rule;
use Livewire\Component;
use App\Models\Product;
use App\Events\Product\ProductHassBeenCreatendEvent;

class CreateProductComponent extends Component
{
    public $en_name;
    public $ar_name;
    public $en_description;
    public $ar_description;
    public $price;
    public function creat_product(){
        $validated = $this->validate([
            'en_name' => 'required|min:2',
            'ar_name' => 'required|min:2',
            'en_description' => 'required|min:10',
            'ar_description' => 'required|min:10',
            'price' => 'required|numeric',
        
        ]);
        if($validated){
            $product = new Product();
            $product->name = json_encode([
                'ar' => $this->ar_name,
                'en' => $this->en_name,
            ]);
            $product->description = json_encode([
                'ar' => $this->ar_description,
                'en' => $this->en_description,
            ]);
            $product->price = $this->price;
            $product->save();
            event(new ProductHassBeenCreatendEvent($product));
            session()->flash('message','Product has been created successfully!');
        }
    }
    public function mount(){
        $this->en_name="";
        $this->ar_name="";
        $this->en_description="";
        $this->ar_description="";
        $this->ptice=0;
    }
    public function render()
    {
        return view('livewire.product.create-product-component')->layout('layouts.base');
    }
}
