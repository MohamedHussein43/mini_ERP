<?php

namespace App\Livewire\Tag;

use Livewire\Component;

class ViewTagComponent extends Component
{
    public $en_name;
    public $ar_name;
    public $tag;
    public function render()
    {
        return view('livewire.tag.view-tag-component')->layout('layouts.base');
    }
}
