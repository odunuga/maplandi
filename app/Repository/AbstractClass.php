<?php


namespace App\Repository;


abstract class AbstractClass
{
    protected $model;

    public function model($model = null)
    {
        return $this->model = $model ?? $this->model;
    }

    public function find_by_id(int $id)
    {
        return $this->model->find($id);
    }

    public function get_by_id(int $id, array $where = [])
    {
        return $this->model->where('id', $id)->where($where);

    }

    public function with_model(array $with = [])
    {
        return $this->model->with($with);
    }

    public function get_by_slug($slug)
    {
        return $this->model->where('slug', $slug);
    }

}
