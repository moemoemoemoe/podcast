<?php

namespace App\Http\Livewire\Category;

use App\Models\Podcast;
use LivewireUI\Modal\ModalComponent;

class Episode extends ModalComponent
{
    public $episodes;

    public function mount($categoryId)
    {
        $this->episodes = Podcast::with('category')->where('category_id' , $categoryId)->get();
    }
    public function render()
    {
       
        return view('livewire.category.episode');
    }
}
