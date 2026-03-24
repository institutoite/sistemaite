<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class AdminUsers extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';
    protected $queryString = ['search' => ['except' => '']];

    public function render()
    {
        $search = trim((string) $this->search);

        $users = User::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'LIKE', '%' . $search . '%')
                        ->orWhere('email', 'LIKE', '%' . $search . '%');

                    if (is_numeric($search)) {
                        $q->orWhere('id', (int) $search);
                    }
                });
            })
            ->orderBy('id', 'desc')
            ->paginate(8);

        return view('livewire.admin-users', compact('users'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function limpiar_page()
    {
        $this->resetPage();
    }

}
