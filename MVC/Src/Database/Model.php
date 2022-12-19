<?php
namespace Src\Database;
class Model{
    protected static $childModelName;
    public static function all(array $columns=['*'])
    {
        self::$childModelName=static::class;
       return app()->db->read($columns);
    }
    public static function select(array $columns=['*'],array $filters=null)
    {
        self::$childModelName=static::class;
       return app()->db->read($columns,$filters);
    }
    public static function update(array $data,array $filters=null)
    {
        self::$childModelName=static::class;
       return app()->db->update($data,$filters);
    }
    public static function create(array $data,array $filters=null)
    {
        self::$childModelName=static::class;
       return app()->db->create($data,$filters);
    }
    public static function delete(array $filters=null)
    {
        self::$childModelName=static::class;
       return app()->db->delete($filters);
    }
    public static function getTableName()
    {
       return class_basename( self::$childModelName) ;
    }
}