<?php
namespace Src\Database\Grammers;

use Src\Database\Model;
use Src\Database\Grammers\Contracts\DatabaseGrammer;

class MysqlGrammer implements DatabaseGrammer{
    static function buildSelectQuery(array $columns,$filters=null){
        if($columns[0]=='*'){
            $databaseColumns=$columns[0];

        }else{
            $databaseColumns=implode(',',$columns);

        }
        $query="SELECT {$databaseColumns} FROM ". Model::getTableName();
        if($filters){
        $query=self::buildWhereQuery($query,$filters);
        }
        return $query;
    }
    static function buildInsertQuery(array $columns){
        $databaseColumns=implode('`,`',$columns);
        $questionMark=implode(',',array_fill(1,count($columns),'?'));
        $query="INSERT INTO ". Model::getTableName()." (`{$databaseColumns}`) VALUES($questionMark)";
        return $query;
    }
    static function buildUpdateQuery(array $columns,$filters=null){
        $query = "UPDATE ". Model::getTableName()."  SET ";
        $query .=implode(' = ? , ',$columns)." = ?";
        if($filters){
            $query=self::buildWhereQuery($query,$filters);
        }
        return $query;
    }
    static function buildDeleteQuery($filters=null){
        $query="DELETE FROM ". Model::getTableName();
        if($filters){
            $query=self::buildWhereQuery($query,$filters);

        }
        return $query;

    }
    static function buildWhereQuery(string $query,array $filters){
        $where=" WHERE ";
        if(is_array($filters[0])){
            foreach($filters as $index=>$filter){

                $where .=" `{$filter[0]}`";
                $where .=$filter[1];
                $where .="?";
                if($index !=count($filters)-1){
                    $where .=" AND ";
                }

            }
           

        }else{
            $where .="{$filters[0]} {$filters[1]} ?" ;
        }
        $query .=$where;
        return $query;

    }
}