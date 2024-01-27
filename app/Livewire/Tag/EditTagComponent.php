<?php

namespace App\Livewire\Tag;

use Livewire\Component;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
class EditTagComponent extends Component
{
    public $en_name;
    public $ar_name;
    public $tag;

    public function mount($id){
       $tag = Tag::find($id);
        $this->tag = $tag;
        if ($tag) {
            $this->en_name = $tag->attrByLocale('en','name');
            $this->ar_name = $tag->attrByLocale('ar','name');
        } else {
            // Handle the case where the product is not found (e.g., redirect or show an error)
            abort(404);
        }
    }
    public function update_tag(){
        $validated = $this->validate([
            'en_name' => 'required|min:2',
            'ar_name' => 'required|min:2',
        ]);
        if($validated){
            //dd($this->attachments);
            DB::beginTransaction();
            try{
                $tag = $this->tag;
                $tag->name = json_encode([
                    'ar' => $this->ar_name,
                    'en' => $this->en_name,
                ]);
                
                $tag->save();                
                //$this->reset();
                DB::commit();
                
            }catch(Exception $e){
                DB::rollback();
                session()->flash('danger','Some Things Went Wrong!');
            }
           
        }
    }


    public function render()
    {
        return view('livewire.tag.edit-tag-component')->layout('layouts.base');
    }
}
