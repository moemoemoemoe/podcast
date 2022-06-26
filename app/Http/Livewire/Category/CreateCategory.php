<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use LivewireUI\Modal\ModalComponent;
use App\Services\MediaManagementService;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class CreateCategory extends ModalComponent
{
    public $name, $thumbnail_photo, $status;
    public $statuses = [];
    protected $listeners = ['store' => 'save'];
    use WithFileUploads;
    use LivewireAlert;

    protected $rules = [
        'name' => 'required',
        'thumbnail_photo' => 'required',
        'status' => 'required'
    ];
    public function mount()
    {
        $this->statuses = [
            ['name' => 'true'],
            ['name' => 'false']
        ];
    }
    public function save()
    {
        $this->validate();
        $this->thumbnail_photo = MediaManagementService::uploadMedia(
            $this->thumbnail_photo,
            'images/category',
            env('FILESYSTEM_DISK')
        );
        try {
            DB::beginTransaction();
            Category::create(['name' => $this->name, 'thumbnail' => $this->thumbnail_photo, 'is_active' => $this->status]);
            DB::commit();
            $this->emit('refreshDatatable');
            $this->forceClose()->closeModal();
            $this->alert('success', __('Category created successfully'), [
                'position' => 'top',
                'timer' => 4000,
                'toast' => true,
            ]);
        } catch (\Exception $exception) {
            DB::rollBack();
            $this->alert('error', $exception->getMessage() . ' ' . $exception->getLine());
        }
    }
    public function render()
    {
        return view('livewire.category.create-category');
    }
}
