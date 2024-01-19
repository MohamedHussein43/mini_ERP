<?php

namespace App\Livewire\Product;
use App\Models\Product;
use Livewire\Component;
use App\Events\Product\ProductHasBeenUpdatedendEvent;
class EditProductComponent extends Component
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
    public function update_product(){
        $validated = $this->validate([
            'en_name' => 'required|min:2',
            'ar_name' => 'required|min:2',
            'en_description' => 'required|min:10',
            'ar_description' => 'required|min:10',
            'price' => 'required|numeric',
        
        ]);
        if($validated){
            $this->product->name = json_encode([
                'ar' => $this->ar_name,
                'en' => $this->en_name,
            ]);
            $this->product->description = json_encode([
                'ar' => $this->ar_description,
                'en' => $this->en_description,
            ]);
            $this->product->price = $this->price;
            $this->product->update();
            event(new ProductHasBeenUpdatedendEvent($this->product));
            session()->flash('message','Product has been updated successfully!');
            $temp = $this->product->id;
            $this->reset();
            $this->mount($temp);
            //$this->refresh();
        }
    }
    public function render()
    {
        return view('livewire.product.edit-product-component')->layout('layouts.base');
    }
}
