<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post as ModelsPost;
use Livewire\WithPagination;

class Post extends Component
{
    use WithPagination;
    public $showForm = false;
    public $title;
    public $content;

    public function togglePostForm()
    {
        $this->showForm = !$this->showForm;
    }

    protected $rules = [
        'title' => 'required|max:255|min:10',
        'content' => 'required|string|max:500'
    ];
    public function updated()
    {
        $this->validate();
    }
    public function store()
    {
        // $this->validate([
        //     'title' => 'required|string|max:255|min:5',
        //     'content' => 'required|string',
        // ]);
        $this->validate();
        ModelsPost::create([
            'title' => $this->title,
            'description' => $this->content,
        ]);

        $this->reset(['title', 'content', 'showForm']);
    }



    public function render()
    {
        // $posts = ModelsPost::all();

        $posts = ModelsPost::paginate(5);
        return view('livewire.post', compact('posts'));

        // return $posts;
        // return view('livewire.post');
    }
}
