<?php

namespace App\Http\Livewire\Podcast;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Podcast;
use Illuminate\Database\Eloquent\Builder;


class PodcastTable extends DataTableComponent
{
    protected $model = Podcast::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make('id')->hideIf(1 === 1),
            Column::make("Category", "category.name")->searchable()
                ->sortable(),
            Column::make("Name", "pod_name")->searchable()
                ->sortable(),
            Column::make("Description", "pod_description")
                ->sortable(),
            Column::make("Media", "pod_url")
                ->sortable(),
            Column::make("Status", "status")
                ->sortable(),
            Column::make('play')
                ->label(
                    fn ($row, Column $column) => view('livewire.podcast.play')->withRow($row)
                ),

        ];
    }
    public function builder(): Builder
    {
        return Podcast::query();
    }
}
