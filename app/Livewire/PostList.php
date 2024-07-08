<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class PostList extends Component
{
    public $posts;
    public $newPostTitle;

    public function mount()
    {
        $this->posts = Post::all();
    }

    public function addPost()
    {
        $this->validate([
            'newPostTitle' => 'required|min:3',
        ]);

        Post::create([
            'title' => $this->newPostTitle,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        ]);
        $this->posts = Post::all();
        $this->newPostTitle = '';
    }

    public function render()
    {
        return view('livewire.post-list');
    }
}
