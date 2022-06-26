<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use LivewireUI\Modal\ModalComponent;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class EditCategory extends ModalComponent
{
    public $name, $thumbnail_photo, $status ,$category;
    public $statuses = [];
    protected $listeners = ['store' => 'save'];
    use WithFileUploads;
    use LivewireAlert;

    protected $rules = [
        'name' => 'required',
        'status' => 'required'
    ];
    public function mount($categoryId)
    {
        $this->category = Category::find($categoryId);
        $this->status = $this->category->is_active;
        $this->name = $this->category->name;
        $this->statuses = [
            ['name' => 'true'],
            ['name' => 'false']
        ];
        $this->thumbnail_photo = $this->category->thumbnail;
    }
    public function render()
    {
        return view('livewire.category.edit-category');
    }
    public function save()
{
    $this->validate();
  
    try {
        DB::beginTransaction();
        $this->category->update(['name' => $this->name,  'is_active' => $this->status]);
        DB::commit();
        $this->emit('refreshDatatable');
        $this->forceClose()->closeModal();
        $this->alert('success', __('Category updated successfully'), [
            'position' => 'top',
            'timer' => 4000,
            'toast' => true,
        ]);
    } catch (\Exception $exception) {
        DB::rollBack();
        $this->alert('error', $exception->getMessage() . ' ' . $exception->getLine());
    }
}
}
