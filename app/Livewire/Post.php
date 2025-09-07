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
    public $description;
    public $editID;

    protected $rules = [
        'title' => 'required|max:255|min:10',
        'description' => 'required|string|max:500'
    ];

    public function togglePostForm()
    {
        $this->showForm = !$this->showForm;
    }



    public function edit($id)
    {
        $post = ModelsPost::find($id);
        $this->title = $post->title;
        $this->description = $post->description;
        $this->showForm = true;
        $this->editID = $id;
    }
    public function updated()
    {
        $this->validate();
    }


    public function delete($id)
    {
        ModelsPost::find($id)->delete();
        session()->flash('success', 'Post Deleted');
    }


    public function updatePost()
    {
        $this->validate();
        ModelsPost::find($this->editID)->updated([
            'title' => $this->title,
            'description' => $this->description
        ]);
        $this->showForm = false;
        $this->resetPage();
        $this->reset('title', 'description', 'editID');
        session()->flash('success', 'Post Updated');
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
            'description' => $this->description,
        ]);

        $this->reset(['title', 'description', 'showForm']);
        session()->flash('success', 'Post Created');
    }



    public function render()
    {
        // $posts = ModelsPost::all();

        $posts = ModelsPost::paginate(5);
        return view('livewire.post', compact('posts'));
    }
}
