<?php
namespace Src\Database\Mangers\Contracts;
interface DatabaseManger{
public function connect():\PDO;
public function raw(string $query,array $values=[]);
public function create(array $data);
public function read(array $columns=['*'],$filters=null);
public function update(array $data,$filters=null);
public function delete($filters=null);
}