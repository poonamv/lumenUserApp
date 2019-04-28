<?php
namespace App\Repositories;

interface UserRepositoryInterface {
    
    public function index();

    public function create(array $data);

    public function update(array $data, $id);

    public function destroy($id);

    public function show($id);
}