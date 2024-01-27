<?php

namespace App\Livewire\Tag;
use Livewire\Attributes\Rule;
use App\Models\Tag;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Livewire\Component;

class CreateTagComponent extends Component
{
    public $en_name;
    public $ar_name;

    public function creat_tag(){
        $validated = $this->validate([
            'en_name' => 'required|min:2',
            'ar_name' => 'required|min:2',
        ]);
        if($validated){
            //dd($this->attachments);
            DB::beginTransaction();
            try{
                $tag = new Tag();
                $tag->name = json_encode([
                    'ar' => $this->ar_name,
                    'en' => $this->en_name,
                ]);
                
                $tag->save();                
                $this->reset();
                DB::commit();
                
            }catch(Exception $e){
                DB::rollback();
                session()->flash('danger','Some Things Went Wrong!');
            }
           
        }
    }

    public function mount(){
        $this->en_name="";
        $this->ar_name="";
    }
    public function render()
    {
        return view('livewire.tag.create-tag-component')->layout('layouts.base');
    }
}
