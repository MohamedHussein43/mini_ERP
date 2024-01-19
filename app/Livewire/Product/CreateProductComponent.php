<?php

namespace App\Livewire\Product;

use Livewire\Component;

class CreateProductComponent extends Component
{
    public $en_name;
    public $ar_name;
    public $en_description;
    public $ar_description;
    public $price;
    public function creat_product(){
        
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
