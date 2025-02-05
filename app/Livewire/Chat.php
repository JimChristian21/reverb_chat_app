<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Chat extends Component
{
    public $user;

    public function mount(int $userId)
    {
        $this->user = $this->getUser($userId);
    }

    public function render()
    {
        return view('livewire.chat');
    }
    
    public function getUser(int $userId)
    {
        return User::find($userId);
    }
}

