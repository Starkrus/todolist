<?php

namespace App\Livewire;

use App\Repo\TodoRepo;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Todo extends Component
{
    use WithPagination;
    protected $repo;

    #[Rule('required|min:3')]
    public $todo = '';
    public $edit;
    public function boot(TodoRepo $repo)
    {
        $this->repo = $repo;
    }

    public function addTodo()
    {
        $validated = $this->validateOnly('todo');
        $this->repo->save($validated);
        $this->todo = '';
    }

    public function editTodo($todoId)
    {
        $this->edit = $todoId;
    }
    public function render()
    {
        $todos = $this->repo->fetchAll();
        return view('livewire.todo', compact('todos'));
    }
}
