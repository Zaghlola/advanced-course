<?php
namespace Src;

use Dotenv\Dotenv;
use Src\Database\DB;
use Src\Database\Mangers\MysqlManger;
use Src\Database\Mangers\SqlLiteManger;
use Src\http\Request;
use Src\http\Response;
use Src\http\Route;

class App{
    public Request $request ;
    public Response $response ;
    public Route $route ;
    public Dotenv $env ;
    public DB $db;
    public static $instance;
    private function __construct() {
        $this->request= new Request;
        $this->response= new Response ;
        $this->db=new DB($this->getDatabaseDriver());
        $this->route= new Route( $this->request,$this->response);
        $this->env=  Dotenv::createImmutable(base_path()) ;
    }
    public static function checkedInstance()
    {
        if(!isset(self::$instance)){
            self::$instance=new App();
        }
        return self::$instance;
        
    }

    public function run()
    {
        $this->env->safeLoad();
        $this->route->resolve();
        $this->db->init();
    }
    public function getDatabaseDriver()
    {
       return match(env("DB_DRIVER")){
        'mysql'=>new MysqlManger,
        'sqllite'=>new SqlLiteManger,
        default =>new MysqlManger,

       };
    }


}
