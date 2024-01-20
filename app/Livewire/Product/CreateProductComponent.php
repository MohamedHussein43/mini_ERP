<?php

namespace App\Livewire\Product;
use Livewire\Attributes\Rule;
use Livewire\Component;
use App\Models\Product;
use App\Events\Product\ProductHassBeenCreatendEvent;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class CreateProductComponent extends Component
{
    use WithFileUploads;

    public $en_name;
    public $ar_name;
    public $en_description;
    public $ar_description;
    public $price;
    public $attachments;
    public function creat_product(){
        $validated = $this->validate([
            'en_name' => 'required|min:2',
            'ar_name' => 'required|min:2',
            'en_description' => 'required|min:10',
            'ar_description' => 'required|min:10',
            'price' => 'required|numeric',
            'attachments' => 'required|array',
            'attachments.*' => 'required|file',
        
        ]);
        if($validated){
            //dd($this->attachments);
            DB::beginTransaction();
            try{
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
                foreach ($this->attachments as $key => $file) {
                    $is_master = false;
                    if ($key == 0)
                        $is_master = true;                    
                    $path = $file->store('attachments');
                    $product->attachments()->create([
                        'url' => $path,
                        'is_master' => $is_master
                    ]);
                }
                DB::commit();
                event(new ProductHassBeenCreatendEvent($product));
                session()->flash('message','Product has been created successfully!');
            }catch(Exception $e){
                DB::rollback();
                session()->flash('danger','Some Things Went Wrong!');
            }
           
        }
    }
    public function mount(){
        $this->en_name="";
        $this->ar_name="";
        $this->en_description="";
        $this->ar_description="";
        $this->ptice=0;
        $this->attachments= array();
    }
    public function render()
    {
        return view('livewire.product.create-product-component')->layout('layouts.base');
    }
}
