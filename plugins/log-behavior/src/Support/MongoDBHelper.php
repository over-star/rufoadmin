<?php
namespace Rufo\Request\Support;

use MongoDB\Driver\Command;
use MongoDB\Driver\Manager;
use MongoDB\Driver\Query;

class MongoDBHelper
{
    private static $ins;
    private $_conn = null;
    private $_db = null;
    private static $_config =[];

    /**
     * 创建mongo对象
     * @param  string $config
     * @return MongoDBHelper
     */
    public static function getMongoDB($config = NULL)
    {
        if (!isset(self::$ins)) {
            self::$_config=config('database.mongodb.default');
            self::$ins =new MongoDBHelper(self::$_config['host'],self::$_config['database']);
        }
        return self::$ins;
    }


    private function __construct($url,$db_name)
    {
        $this->_conn = new Manager($url);
        $this->_db =$db_name;
    }


    /**
     * 插入数据
     * @param  string $coll_name
     * @param  array $documents [["name"=>"values", ...], ...]
     * @param  array $writeOps ["ordered"=>boolean,"writeConcern"=>array]
     * @return \MongoDB\Driver\Cursor
     */
    public function insert($coll_name, array $documents, array $writeOps = [])
    {
        $cmd = [
            "insert" => $coll_name,
            "documents" => $documents,
        ];
        $cmd += $writeOps;
        return $this->command($cmd);
    }

    /**
     * 删除数据
     * @param  string $coll_name
     * @param  array $deletes [["q"=>query,"limit"=>int], ...]
     * @param  array $writeOps ["ordered"=>boolean,"writeConcern"=>array]
     * @return \MongoDB\Driver\Cursor
     */
    public function del($coll_name, array $deletes, array $writeOps = [])
    {
        foreach ($deletes as &$_) {
            if (isset($_["q"]) && !$_["q"]) {
                $_["q"] = (Object)[];
            }
            if (isset($_["limit"]) && !$_["limit"]) {
                $_["limit"] = 0;
            }
        }
        $cmd = [
            "delete" => $coll_name,
            "deletes" => $deletes,
        ];
        $cmd += $writeOps;
        return $this->command($cmd);
    }

    /**
     * 更新数据
     * @param  string $coll_name
     * @param  array $updates [["q"=>query,"u"=>update,"upsert"=>boolean,"multi"=>boolean], ...]
     * @param  array $writeOps ["ordered"=>boolean,"writeConcern"=>array]
     * @return \MongoDB\Driver\Cursor
     */
    public function update($coll_name, array $updates, array $writeOps = [])
    {
        $cmd = [
            "update" => $coll_name,
            "updates" => $updates,
        ];
        $cmd += $writeOps;
        return $this->command($cmd);
    }


    /**
     * 查询
     * @param $table
     * @param  array $filter [query]
     * @param array $options
     * @return \MongoDB\Driver\Cursor
     * @internal param string $coll_name
     * @internal param array $writeOps ["key"=>vals,...] 其它参数 参数详情请参见文档
     */
    public function query2($table, array $filter=[], array $options = [])
    {
        $query = new Query($filter, $options);
        return $this->_conn->executeQuery($this->_db.'.'.$table, $query);
    }

    public function query($coll_name, array $filter=[], array $writeOps = []){
        $cmd = [
            "find"      => $coll_name,
            "filter"    => $filter
        ];
        $cmd += $writeOps;
        return $this->command($cmd);
    }

    /**
     * 执行MongoDB命令
     * @param  array $param 执行的命令
     * @return \MongoDB\Driver\Cursor
     */
    public function command(array $param)
    {
        $cmd = new Command($param);
        return $this->_conn->executeCommand($this->_db, $cmd);
    }


    /**
     * 获取当前mongoDB Manager
     * @return Manager
     */
    public function getMongoManager()
    {
        return $this->_conn;
    }
}