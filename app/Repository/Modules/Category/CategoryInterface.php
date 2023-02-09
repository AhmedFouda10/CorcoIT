<?php
namespace App\Repository\Modules\Category;


interface CategoryInterface{
    public function index();
    public function create();
    public function store($request);
    public function show($request);
    public function edit($id);
    public function update($id,$request);
    public function destroy($id);
}
