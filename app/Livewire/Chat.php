<?php

namespace App\Livewire;

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Chat extends Component
{
    public $user;
    public $message;
    public $receiver_id;

    public function mount(int $userId)
    {
        $this->user = $this->getUser($userId);
        $this->receiver_id = $userId;
    }

    public function render()
    {
        return view('livewire.chat');
    }

    public function sendMessage()
    {
        $this->saveMessage();
        $this->resetFields();
    }

    public function saveMessage()
    {
        return Message::create([
            'sender_id' => Auth::user()->id,
            'receiver_id' => $this->receiver_id,
            'message' => $this->message,
            // 'file_name',
            // 'file_original_name',
            // 'folder_path',
            'is_read' => false
        ]);
    }

    public function getUser(int $userId)
    {
        return User::find($userId);
    }

    public function resetFields()
    {
        $this->message = null;
    }
}

