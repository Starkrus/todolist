<?php

namespace App\Repo;


class TodoRepo
{
    public function save($data)
    {
        $createTodo = auth()->user()->todos()->create($data);
        if ($createTodo) {
            return $createTodo;
        }
    }

    public function fetchAll()
    {
        $todos = auth()->user()->todos()->latest()->paginate(15);
        return $todos;
    }
}
