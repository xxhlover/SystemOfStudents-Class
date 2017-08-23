<?php 
    class DB{
        //定义属性
        public $db;
        //定义构造函数
        function __construct($db_config){
            $this->db = new mysqli($db_config['host'], $db_config['user'], $db_config['passwd'], $db_config['db']);
            $this->db->query('SET NAMES utf8');
        }

        //添加数据
        function insertData($table, $formdata){
            $field  = array();
            $valuea = array();
            foreach ($formdata as $key => $value) {
                $field[] = $key;
                if(is_string($value)){
                    $valuea[$key] = '"' . $value . '"';
                }else{
                    $valuea[$key] = $value;
                }
            }
            $fieldstr   = implode(', ', $field);
            $value      = implode(', ', $valuea);
            $sql        = 'INSERT INTO '.$table.'('.$fieldstr.') VALUES('.$value.')';
            $r          = $this->db->query($sql);
            return $r;
        }

        //更新数据
        function updateData($table, $formdata, $where){
            $data = array();
            foreach ($formdata as $key => $value) {
                if(is_string($value)){
                    $value = '"' . $value . '"';
                }
                $data[] = $key . '=' . $value;
            }
            $str = implode(', ', $data);
            $sql = 'UPDATE ' . $table . ' SET ' . $str . ' WHERE ' . $where;
            echo $sql;
            $r   = $this->db->query($sql);
            return $r;
        }

        //删除数据
        function delData($table, $where){
            $sql = 'DELETE FROM '.$table.' WHERE ' . $where;
            $r   = $this->db->query($sql);
            return $r;
        }

        //查询数据
        function selectData($table, $fields='*', $where='', $offset = 0, $limit = 0){
            $sql        = 'SELECT '.$fields.' FROM '.$table.($where ? (' WHERE ' . $where):'');
            //查询指定单位内的记录
            if($limit){
                $sql        .= ' LIMIT '.$offset.', ' . $limit;
            }
            // echo $sql;
            $result     = $this->db->query($sql);
            $data       = array();
            while($row = $result->fetch_array(MYSQLI_ASSOC)){
                $data[] = $row;
            }
            return $data;
        }

        //求符合条件的记录数
        function getCount($table, $where = ''){

            $sql = 'SELECT count(id) as totalnum FROM ' . $table.($where ? (' WHERE ' . $where):'');
            $result     = $this->db->query($sql);
            $row = $result->fetch_array(MYSQLI_ASSOC);
            // array('totalnum'=>199996);
            return $row['totalnum'];
        }

        //析构函数：
        function __destruct(){
            $this->db->close();
        }
    }
