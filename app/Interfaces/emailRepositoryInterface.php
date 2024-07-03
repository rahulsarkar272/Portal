<?php

namespace App\Interfaces;

interface emailRepositoryInterface
{
    public function index();
    public function getById($id);
    public function sendMailToContect(array $data);
    public function update(array $data,$id);
    public function delete($id);
}
