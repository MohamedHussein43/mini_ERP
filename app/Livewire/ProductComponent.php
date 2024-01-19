<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;
class ProductComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public function mount(){
        
    }
    public function render()
    {
        return view('livewire.product-component',['products' => Product::orderBy('id','desc')->paginate(10),])->layout('layouts.base');
    }
}
