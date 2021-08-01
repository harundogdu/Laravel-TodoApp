<?php


namespace App\Repostories\Elequent\Todo;


use App\Models\Todo;

class TodoRepository implements \App\Repostories\TodoRepositoryInterface
{
    private $model;

    public function __construct(Todo $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->orderBy('created_at','DESC')->get();
    }

    public function getById($id)
    {
        return $this->model->getById($id);
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function update($id, array $attributes)
    {
        $todo = $this->model->findOrFail($id);
        $todo->update($attributes);
        return $todo;
    }

    public function delete($id)
    {
        if ($this->model->findOrFail($id)->delete()) return true;
        else return false;
    }
}
