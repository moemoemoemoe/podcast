<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;

class CategoryTable extends DataTableComponent
{
    protected $model = Category::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make('id')->hideIf(1 === 1),
            Column::make('Thumbnail', 'thumbnail')->format(
                fn ($value, $row, Column $column) =>
                '<img src="' . $row->thumbnail . '"
                class="w-10 h-10 rounded-lg object-contain object-center"/>'
            )->html(),
            Column::make("Name", "name")->searchable()->sortable(),
            BooleanColumn::make('Is Active')->sortable()->collapseOnMobile(),
            Column::make('action')
                ->label(
                    fn ($row, Column $column) => view('livewire.category.category-action')->withRow($row)
                ),
                Column::make('Episodes')
                ->label(
                    fn ($row, Column $column) => view('livewire.category.modal-show')->withRow($row)
                ),


        ];
    }
}
