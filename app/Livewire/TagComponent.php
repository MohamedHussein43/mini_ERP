<?php

namespace App\Livewire;
use App\Models\Tag;
use Livewire\Component;
use Livewire\WithPagination;
class TagComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.tag-component',['tags' => Tag::orderBy('id','desc')->paginate(10),])->layout('layouts.base');
    }
}
