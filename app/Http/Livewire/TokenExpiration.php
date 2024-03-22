<?php

namespace App\Http\Livewire;
use Carbon\Carbon;
use Livewire\Component;

class TokenExpiration extends Component
{
    public $expiration;

    public function mount()
    {
        $this->calculateExpiration();
    }

    public function render()
    {
        return view('livewire.token-expiration');
    }

    public function calculateExpiration()
    {
        $expiration = session('GContactTokenExpiration');
        if (!$expiration) {
            $this->expiration = '0:00';
            return;
        }

        $now = Carbon::now();
        $diff = $now->diffInSeconds($expiration);

        $minutes = floor($diff / 60);
        $seconds = $diff % 60;

        $this->expiration = sprintf('%d:%02d', $minutes, $seconds);
    }

    public function updatedExpiration()
    {
        $this->refresh(); 
    }

    public function hydrate()
    {
        $this->calculateExpiration();
    }
}