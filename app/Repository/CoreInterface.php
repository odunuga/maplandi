<?php


namespace App\Repository;


interface CoreInterface
{
    public function model($model = null);

    public function find_by_id(int $id);

    public function get_by_id(int $id, array $where = []);

    public function with_model(array $with = []);

    public function get_by_slug($slug);

}
