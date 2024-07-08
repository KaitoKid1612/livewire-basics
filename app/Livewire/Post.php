<?php

namespace App\Livewire;

use Livewire\Component;

class Post extends Component
{
    public $postId;

    protected $listeners = ['postSelected'];

    public function postSelected($postId)
    {
        Log::info("message", ['postId' => $postId]);
        $this->postId = $postId;
        $this->emit('postIdUpdated', $postId);
    }

    public function render()
    {
        return view('livewire.post');
    }
}
