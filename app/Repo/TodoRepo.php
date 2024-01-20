<?php

namespace App\Repo;
use App\Models\Todo;

class TodoRepo
{
    public function save($data)
    {
        $createTodo = auth()->user()->todos()->create($data);
        if ($createTodo) {
            return $createTodo;
        }
    }

    public function getTodo($todoId)
    {
        return auth()->user()->todos()->find($todoId);
    }
    public function fetchAll()
    {
        $todos = auth()->user()->todos()->latest()->paginate(15);
        return $todos;
    }

    public function update($todoId, $editedTodo)
    {
        $todo = $this->getTodo($todoId);
        return $todo->update([
            'todo' => $editedTodo
        ]);
    }
}
