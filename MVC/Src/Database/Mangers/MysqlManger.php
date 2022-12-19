<?php
namespace Src\Database\Mangers;

use Src\Database\Grammers\MysqlGrammer;
use Src\Database\Mangers\Contracts\DatabaseManger;

class MysqlManger implements DatabaseManger{
    private static $instance =null;

public function connect():\PDO{
    if(!self::$instance){
        self::$instance=new \PDO(env("DB_DRIVER").":host=".env("DB_HOST").";dbname=".env("DB_DATABASE"),env("DB_USERNAME"),env("DB_PASSWORD"));
    }
      return self::$instance;  
}
public function raw(string $query,array $values=[]){
    $stmt=self::$instance->prepare($query);
    foreach($values as $index=>$value){
        $stmt->prepare($index+1,$value);
    }
    $return =$stmt->execute();
    if(str_starts_with(strtolower($query), 'select')){
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    return $return;
}
public function create(array $data){//insert
    $query=MysqlGrammer::buildInsertQuery(array_keys($data));
    $stmt=self::$instance->prepare($query);
    foreach(array_values($data) as $index=>$value){
        $stmt->bindValue($index+1,$value);
    }
    return $stmt->execute();
}
public function read(array $columns=['*'],$filters=null){
    $query=MysqlGrammer::buildSelectQuery($columns,$filters);
    $stmt=self::$instance->prepare($query);
    if($filters){
        $this->filter($stmt, $filters,);
    }
   $stmt->execute();
   return $stmt->fetchAll(\PDO::FETCH_ASSOC);

}

public function update(array $data,$filters=null){
    $query=MysqlGrammer::buildUpdateQuery(array_keys($data), $filters);
    $stmt=self::$instance->prepare($query);
    foreach(array_values($data) as $index=>$value){
        $stmt->bindValue( $index+1,$value); 

    }
    if($filters){
        $this->filter($stmt, $filters,count($data));
    }
    return  $stmt->execute();
 
}
public function delete($filters=null){
    $query=MysqlGrammer::buildDeleteQuery($filters);
    $stmt=self::$instance->prepare($query);
    if($filters){
       $this->filter($stmt, $filters);
    }
  
   return  $stmt->execute();

}
private function filter( $stmt,array $filters,$startBindingIndex=0)
{
    if(is_array($filters[0])){
        foreach($filters as $index=>$filter){
            $stmt->bindValue( $index+$startBindingIndex+1,$filter[2]); 
        }
    }else{
    $stmt->bindValue(1+$startBindingIndex,$filters[2]);        

}
}
}