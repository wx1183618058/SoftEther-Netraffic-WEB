<?php
/*
	修改于2016.1.11
	将mysql全部更改为了mysqli  因为在最新的PHP7中，mysql已经不被支持
*/
class D {
    public $dbname;
    public $where;
    public $order;
    public $limit;
    public $link;
    public $sql;
    public $f = '*';
    static $connection_id;//数据库标识
    public $Temp = array();
    public function __construct($db = null) {
		/*
			检测是否已经连接过数据库
			如果没有则连接并且保存连接
		*/
		if(!self::$connection_id){
			$this->connect();
		}
        if($db) {
			$ddcms = $_SERVER['ddcms']['cfg']['host']['ddcms'];
			$this->dbname = '`' . $ddcms . $db . '`';
        }
    }
    public function connect() {
        self::$connection_id = mysqli_connect(_host_, _user_, _pass_,null, _port_);
        if (!self::$connection_id) {
            $this->halt("Can not connect MySQL Servser");
        }
        if (!@mysqli_select_db(self::$connection_id,_ov_)) {
            $this->halt("Can not connect MySQL Database");
        }
         mysqli_query(self::$connection_id, "set sql_mode = ''");
            
          mysqli_query(self::$connection_id, "set character set 'utf8'");
//写库
            mysqli_query(self::$connection_id, "set names 'utf8'");
        return true;
    }
	public function query($sql){
		$this->sql = $sql;
		return mysqli_query(self::$connection_id,$sql);
	}
     public function halt($the_error = "") {
        $message = $the_error . "\r\n";
        if (DEBUG == true) {
            echo "<html><head><title>MySQL 数据库错误</title>";
            echo "<style type=\"text/css\"><!--.error { font: 11px tahoma, verdana, arial, sans-serif, simsun; }--></style></head>\r\n";
            echo "<body>\r\n";
            echo "<blockquote>\r\n";
            echo "<textarea class=\"error\" rows=\"15\" cols=\"100\" wrap=\"on\" >" . htmlspecialchars($message) . "</textarea>\r\n";
            echo "</blockquote>\r\n</body></html>";
            exit;
        }
    }
    public function where($arr, $mix = null) {
        if ($arr != NULL) {
            if (is_array($arr)) {
                foreach ($arr as $key => $value) {
					if(is_array($value)){
						$sqlwhere[] = ' `' . $key . '` in(' . implode(',',$value) . ')';
					}else{
						$f = $mix[$key] == null ? '=' : $mix[$key];
						$sqlwhere[] = ' `' . $key . '` ' . $f . ' \'' . $value . '\' ';
					}
                }
                $this->where = ' WHERE ' . implode("AND", $sqlwhere);
            } else {
                $this->where = ' WHERE ' . $arr;
            }
        }
        return $this;
    }
    public function order($str) {
        if ($str != NULL) {
            $this->order = " ORDER BY {$str} ";
        }
        return $this;
    }
    public function limit($value1, $value2 = null) {
        if ($value2 != NULL) {
            $limit = $value1 . "," . $value2;
            $this->limit = " LIMIT {$limit} ";
        } elseif ($value2 == NULL) {
            $limit = $value1;
            $this->limit = " LIMIT {$limit} ";
        }
        return $this;
    }
	
	public function fpage($page,$limit) {
		$npage = $page <= 0 ? 1 : $page;
		$start = ($npage - 1) * $limit;
        $this->limit = " LIMIT {$start},{$limit} ";
        return $this;
    }
	
    public function select() {
		//serialize 序列号
		$sql = "SELECT {$this->f} FROM {$this->dbname}{$this->where}{$this->link}{$this->order}{$this->limit};";
        $res = $this->query($sql);
        $i = 0;
       if($res && mysqli_num_rows($res) > 0) {
            if (version_compare(PHP_VERSION, '5.3.0') >= 0) {
				while($row = $this->arr($res)){
					$ress[] = $row;
				$i++;
				}
		}else{
				$ress = $res;
			}
			
			return $ress;
        } else {
            return FALSE;
        }
    }
    public function find() {
        $where = $this->where;
        
        $res = $this->query("SELECT {$this->f} FROM {$this->dbname}{$where}{$this->link}{$this->order}{$this->limit};");
       
	   if ($res && mysqli_num_rows($res) > 0) {
            return $this->arr($res);
        }
        return FALSE;
    }
    public function arr($res) {
        return mysqli_fetch_array($res);
    }
    public function like($arr) {
        if ($arr != NULL) {
            if (is_array($arr)) {
                foreach ($arr as $key => $value) {
                    $sqlwhere[] = ' ' . $key . ' LIKE \'%' . $value . '%\' ';
                }
                $where = $this->where() == null ? 'WHERE' : 'AND';
                $this->link = ' ' . $where . ' ' . implode("AND", $sqlwhere);
            } else {
                $this->link = ' ' . $where . ' ' . $this->getfield(0) . ' LIKE %' . $arr . '% ';
            }
        }
        return $this;
    }
    public function update($arr) {
        $where = $this->where;
        if (is_array($arr)) {
            foreach ($arr as $key => $value) {
             $sqlu[] = " `{$key}`='{$value}' ";
			}
			$zd = implode(",", $sqlu);
        }else{
			$zd = $arr;
		}
        $res = $this->query("UPDATE {$this->dbname} SET {$zd}{$this->where}{$this->order}{$this->limit} ");
        if ($res && mysqli_affected_rows(self::$connection_id) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function delete($id) {
        $where = $this->where;
        if ($this->where == NULL) {
            $where = ' ' . $this->getfield() . '=' . $id . ' ';
        }
        $res = $this->query("DELETE FROM {$this->dbname}{$where}{$this->link}{$this->order}{$this->limit}");
        if ($res && mysqli_affected_rows(self::$connection_id) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function insert($Arr = null) {
        if ($Arr == NULL) {
            $Arr = $_POST;
        }
        $fielda = $this->getfield();
		$i = 0;
        foreach ($fielda as $f) {
            $fields[] = '`' . $f['Field'] . '`';
            $fe = $f['Field'];
			$typei = explode('\(', $f[$fe]['Type']);
            $type = $typei[0]; //获取数据库字段类型
            if ($Arr[$fe] != NULL) {
                $sqlarr[] = '\'' . $Arr[$fe] . '\'';
            } else {
                if ($i == 0) {
                    $sqlarr[] = 'NULL';
                } else {
                   
                    if ($type == 'int') {
                        $sqlarr[] = '0';
                    } else {
                        $sqlarr[] = '\'\'';
                    }
                }
            }
			$i++;
        }
        $zd = implode(",", $fields);
        $value = implode(",", $sqlarr);
        $sqlsert = "INSERT INTO {$this->dbname}({$zd})VALUES({$value})";
		//die($sqlsert);
        unset($fields);
        unset($fielda);
        unset($sqlarr);
        $res = $this->query($sqlsert);
        if ($res && mysqli_affected_rows(self::$connection_id) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function getfield($name = null) {
        $dbname = $name == null ? $this->dbname : $name;
        $res = $this->query("SHOW FULL COLUMNS FROM {$dbname}");
        while ($meta = $this->arr($res)) {
            $key = $meta['Field'];
            $fields[$key] = $meta;
        }
        return $fields;
    }
    public function getnums($sql = null) {
        if($sql == null) {
            $sql = "SELECT count(*) AS count FROM {$this->dbname}{$this->where};";
        }
        $nums = $this->arr($this->query($sql));
        if($nums != NULL) {
            return $nums['count'];
        }
        return '0';
    }
    public function f($str = null) {
        $zd = $str == null ? ' * ' : $str;
        $this->f = $zd;
        return $this;
    }
	
	public function showTable($type='Table',$from){
		if($type == 'Table'){
			$sql = 'SHOW TABLES';
		}elseif($type == 'Field'){
			$sql = "SHOW FULL COLUMNS FROM ".$from."";
		}
		$res = $this->query($sql);
		if($res && mysqli_num_rows($res) > 0) {
            while ($array_value = $this->arr($res)) {
                $array[$i] = $array_value;
                $i++;
            }
            return $array;
        } else {
            return FALSE;
        }
	}
	public function auto_id(){
		return mysqli_insert_id(self::$connection_id); 
	}

}