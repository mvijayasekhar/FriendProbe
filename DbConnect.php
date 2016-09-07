<?php
class Db {
    protected static $connection;

    public function Connect() {    
        if(!isset(self::$connection)) {
            $config = parse_ini_file('./config.ini'); 
            self::$connection = new mysqli($config['server'],$config['username'],$config['password'],$config['dbname']);
        }
        if(self::$connection === false) {
            return false;
        }
        return self::$connection;
    }
	public function NumRows($result) {
		return mysqli_num_rows($result);
	}
	
    public function Query($query) {
        $connection = $this -> Connect();
        $result = $connection -> query($query);
        return $result;
    }

    public function Select($query) {
        $rows = array();
        $result = $this -> query($query);
        if($result === false) {
            return false;
        }
        while ($row = $result -> fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function Error() {
        $connection = $this -> connect();
        return $connection -> error;
    }

    public function Quote($value) {
        $connection = $this -> connect();
        return "'" . $connection -> real_escape_string($value) . "'";
    }
}
?>