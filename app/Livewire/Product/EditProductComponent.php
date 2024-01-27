<?php

namespace App\Livewire\Product;
use App\Models\Product;
use Livewire\Component;
use App\Events\Product\ProductHasBeenUpdatedendEvent;
use App\Models\Attachment;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
class EditProductComponent extends Component
{
    use WithFileUploads;
    public $en_name;
    public $ar_name;
    public $en_description;
    public $ar_description;
    public $price;
    public $product;
    public $attachments;
    public function mount($id){
        
        $product = Product::find($id);
        $this->product = $product;
        if ($product) {
            $this->en_name = $product->attrByLocale('en','name');
            $this->ar_name = $product->attrByLocale('ar','name');
            $this->en_description = $product->attrByLocale('en','description');
            $this->ar_description = $product->attrByLocale('ar','description');
            $this->price = $product->getRawOriginal('price');
            $this->attachments = array();
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
            'attachments' => 'array',
            'attachments.*' => 'required|file',
        
        ]);
        if($validated){
            DB::beginTransaction();
            try{
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
                if ($this->attachments){
                    foreach ($this->attachments as $file) {
                        $is_master = false;
                                            
                        //$path = $file->store('attachments');
                    
                        $path = $file->store('products','public');
                    
                        $this->product->attachments()->create([
                            'url' => $path,
                            'is_master' => $is_master
                        ]);
                    }
                }
                //$this->reset();
                //$this->mount();
                DB::commit();
                //event(new ProductHassBeenCreatendEvent($product));
                //event(new ProductHasBeenUpdatedendEvent($this->product));
                session()->flash('message','Product has been updated successfully!');
            
            $this->mount($this->product->id);
            }catch(Exception $e){
                DB::rollback();
                session()->flash('danger','Some Things Went Wrong!');
            }
            
            
            //$this->refresh();
        }
    }

    public function remove_image($id){
        $attachment = Attachment::find($id);
        $attachment->delete();
    }
    public function set_master($id){
        $attachment = Attachment::find($id);
        $attachment->product->attachments()->update(['is_master' => false]);
        $attachment->update(['is_master' => true]);
        
    }

    public function render()
    {
        return view('livewire.product.edit-product-component')->layout('layouts.base');
    }
}
