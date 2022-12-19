<?php
namespace Src\Database;

use Src\Database\Concerns\ConnectTo;
use Src\Database\Mangers\Contracts\DatabaseManger;

class DB{
    public function __construct(public DatabaseManger $databaseManger) {

    }
    public function init()
    {
       ConnectTo::connect($this->databaseManger);
    }
       
    public function raw(string $query,array $values=[]){
        return $this->databaseManger->raw($query,$values);
    }
    public function create(array $data){
        return $this->databaseManger->create($data);
    
    }
    public function read(array $columns=['*'],$filters=null){
        return $this->databaseManger->read($columns,$filters);    

    }

    public function update(array $data,$filters=null){
        return $this->databaseManger->update($data,$filters);    
    
    }
    public function delete($filters=null){
    
        return $this->databaseManger->delete($filters);
    }
    
}