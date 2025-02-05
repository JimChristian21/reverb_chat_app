<?php

namespace App\Livewire;

use Livewire\Component;

class Chat extends Component
{
    public function mount(int $userId)
    {
        
    }

    public function render()
    {
        return view('livewire.chat');
    }
}

