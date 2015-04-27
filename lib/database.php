<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/27
 * Time: 15:12
 */

require('adodb.inc.php');

class myDataBase {
    public $_dbAddr = 'localhost';//数据库连接地址
    public $_dbUser = 'root';
    public $_dbName = 'money_blog';//数据库名称
    public $_dbPwd = '123456';//数据库密码
    public $_db = false; //数据库连接信息

    function myDataBase() {

    }
    //析构函数
    function __destruct() {
        if ($this->_db && $this->_db->IsConnected()) {
            $this->_db->disconnect();
        }
    }

    /**
     * 初始化链接
     */
    function initConnect() {
        if ($this->_db && $this->_db->IsConnected()) {
            return;
        }

        $this->_db = NewADOConnection("mysqli");
        $this->_db->connect($this->_dbAddr,$this->_dbUser,$this->_dbPwd,$this->_dbName);
        $this->_db->Query("set names utf8"); //客户端编码
        $this->_db->SetFetchMode(ADODB_FETCH_ASSOC);
    }


    function execForArray($sql)
    {
        //执行一个sql语句 ，返回类型是数组
        $this->initConnect();
        $result=$this->_db->Execute($sql);
        if($result)
        {
            $returnArray=array();
            while(!$result->EOF)
            {
                $returnArray[]=$result->fields;
                $result->MoveNext();
            }
            return $returnArray;
        }
        else
            return  false;


    }
    function execForOne($sql)
    {
        //执行一个sql语句 ，返回 单列字符串
        $this->initConnect();
        $result=$this->_db->GetOne($sql); //adodb的函数，来获取单个值
        return $result;
    }

    function execForNothing($sql)//执行一条sql什么都不返回
    {
        $this->initConnect();
        $this->_db->Execute($sql);
    }

    function execForTrac($sqllist,$resulttype) //用事务 来执行
    {
        //$sqllist 参数 是sql数组
        $type=array("none","string","array","int"); //返回类型
        if(!in_array($resulttype,$type)) return false;
        if(count($sqllist)==0) return false;
        $this->initConnect();
        $this->_db->BeginTrans(); //开启事务
        $sqlindex=0;
        $ret=false;
        foreach($sqllist as $sql)
        {
            if($sqlindex==(count($sqllist)-1)) //最后一个语句 需要根据返回类型来做不同的处理
            {
                if($resulttype=="none")
                {
                    $this->_db->Execute($sql);
                }
                else if($resulttype=="array")
                {
                    $ret=$this->execForArray($sql);
                }
                else
                {

                    $ret=$this->execForOne($sql);
                }

            }
            else
                $this->_db->Execute($sql);
            $sqlindex++;
        }
        $this->_db->CommitTrans();

        if($ret) return $ret;
    }
}

$myDB=new myDataBase();