<?php

namespace App\Http\Livewire\Podcast;

use App\Models\Podcast;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use LivewireUI\Modal\ModalComponent;
use App\Services\MediaManagementService;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class CreatePodcast extends ModalComponent
{
    protected $listeners = ['store' => 'save'];
    use WithFileUploads;
    use LivewireAlert;
    public $statuses, $categories;
    public $pod_name, $status, $category, $pod_description, $pod_url;

    protected $rules = [
        'pod_name' => 'required',
        'status' => 'required',
        'category' => 'required',
        'pod_url'=> 'required'
    ];
    public function mount()
    {
        $this->categories = Category::where('is_active', true)->get();
        $this->statuses = [
            ['name' => 'active'],
            ['name' => 'inactive']
        ];
    }
    public function render()
    {
        return view('livewire.podcast.create-podcast');
    }
    public function save()
    {
        {
            $this->validate();
            $this->pod_url = MediaManagementService::uploadMedia(
                $this->pod_url,
                'mp3/podcast',
                env('FILESYSTEM_DISK')
            );
            try {
                DB::beginTransaction();
                Podcast::create(['category_id'=>$this->category ,'pod_name' => $this->pod_name, 'pod_description' => $this->pod_description, 'status' => $this->status , 'pod_url' => $this->pod_url]);
                DB::commit();
                $this->emit('refreshDatatable');
                $this->forceClose()->closeModal();
                $this->alert('success', __('podcast created successfully'), [
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
}
