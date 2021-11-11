<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Carrera;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class MostrarCarreras extends DataTableComponent
{
    

    public function columns(): array
    {
        return [
            Column::make('id')
                ->sortable()
                ->searchable(),
            Column::make('Carrera', 'carrera')
                ->sortable()
                ->searchable(),
            Column::make('creado', 'created_at')
                ->sortable(),
            Column::make('Acciones')
                ->sortable()
                ->format(function($value, $column, $row) {
                return view('livewire.carreer.actions')->withCarrera($row);
            }),
        ];
    }

    public function query(): Builder
    {
        return Carrera::query();
    }
    public function redirectToModel(string $name, array $parameters = [], $absolute = true): void
    {
        $this->redirectRoute($name, $parameters, $absolute);
    }

    
}
