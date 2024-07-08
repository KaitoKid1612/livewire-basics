<?php

namespace App\Livewire;

use Livewire\Component;

class Comments extends Component
{
    public $postId;
    public $comments = [];

    protected $listeners = ['postIdUpdated'];

    public function mount($postId = null)
    {
        $this->postId = $postId;
        $this->loadComments();
    }

    public function postIdUpdated($postId)
    {
        $this->postId = $postId;
        $this->loadComments();
    }

    public function loadComments()
    {
        if ($this->postId) {
            $this->comments = [
                ['id' => 1, 'content' => 'First comment on post ' . $this->postId],
                ['id' => 2, 'content' => 'Second comment on post ' . $this->postId],
            ];
        } else {
            $this->comments = [];
        }
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
