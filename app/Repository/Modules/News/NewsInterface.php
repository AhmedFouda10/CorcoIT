<?php
namespace App\Repository\Modules\News;


interface NewsInterface{
    public function index();
    public function create();
    public function store($inputs);
    public function edit($id);
    public function update($id,$inputs);
    public function destroy($id);
}
