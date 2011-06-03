<?php
class db_mysql {
	public $debug = true;
	private $version = "";
	private $link_id = NULL;
	
	function __construct() {
		$this->debug = false;
	}
	
	function connect($dbhost, $dbuser, $dbpwd, $dbname = '', $dbcharset = 'utf8', $pconnect = 0) {
		if ($pconnect) {
			if (! $this->link_id = mysql_pconnect ( $dbhost, $dbuser, $dbpwd )) {
				$this->ErrorMsg ();
			}
		} else {
			if (! $this->link_id = mysql_connect ( $dbhost, $dbuser, $dbpwd, 1 )) {
				$this->ErrorMsg ();
			}
		}
		$this->version = mysql_get_server_info ( $this->link_id );
		if ($this->getVersion () > '4.1') {
			if ($dbcharset) {
				mysql_query ( "SET character_set_connection=" . $dbcharset . ", character_set_results=" . $dbcharset . ", character_set_client=binary", $this->link_id );
			}
			
			if ($this->getVersion () > '5.0.1') {
				mysql_query ( "SET sql_mode=''", $this->link_id );
			}
		}
		if (mysql_select_db ( $dbname, $this->link_id ) === false) {
			$this->ErrorMsg ();
		}
		mysql_query ( "set names gbk;" );
	}
	
	function query($sql) {
		if ($this->debug)
			echo "<hr>" . $sql . "<hr>";
		if (! ($query = mysql_query ( $sql, $this->link_id ))) {
			$this->ErrorMsg ();
			return false;
		} else {
			return $query;
		}
	}
	
	function insert($table, $field_values) {
		$field_names = $this->getCol ( 'DESC ' . $table );
		$fields = array ();
		$values = array ();
		foreach ( $field_names as $value ) {
			if (array_key_exists ( $value, $field_values ) == true) {
				$fields [] = $value;
				$values [] = "'" . $field_values [$value] . "'";
			}
		}
		if (! empty ( $fields )) {
			$sql = 'INSERT INTO ' . $table . ' (' . implode ( ', ', $fields ) . ') VALUES (' . implode ( ', ', $values ) . ')';
		}
		if ($sql) {
			$this->query ( $sql );
			return $this->getInsertId ();
		} else {
			return false;
		}
	}
	
	function getInsertId() {
		return mysql_insert_id ( $this->link_id );
	}
	
	function update($table, $field_values, $where = '') {
		$field_names = $this->getCol ( 'DESC ' . $table );
		$sets = array ();
		foreach ( $field_names as $value ) {
			if (array_key_exists ( $value, $field_values ) == true) {
				$sets [] = $value . " = '" . $field_values [$value] . "'";
			}
		}
		if (! empty ( $sets )) {
			$sql = 'UPDATE ' . $table . ' SET ' . implode ( ', ', $sets ) . ' WHERE ' . $where;
		}
		if ($sql) {
			return $this->query ( $sql );
		} else {
			return false;
		}
	}
	
	function delete($table, $where = '') {
		if (empty ( $where )) {
			$sql = 'DELETE FROM ' . $table;
		} else {
			$sql = 'DELETE FROM ' . $table . ' WHERE ' . $where;
		}
		if ($this->query ( $sql )) {
			return true;
		} else {
			return false;
		}
	}
	
	function getList($sql) {
		$res = $this->query ( $sql );
		if ($res !== false) {
			$arr = array ();
			while ( ($row = mysql_fetch_assoc ( $res )) != false ) {
				$arr [] = $row;
			}
			return $arr;
		} else {
			return false;
		}
	}
	
	function selectLimit($sql, $numrows = -1, $offset = -1) {
		if ($offset == - 1) {
			$sql .= ' LIMIT ' . $numrows;
		} else {
			$sql .= ' LIMIT ' . $offset . ', ' . $numrows;
		}
		return $this->getList ( $sql );
	}
	
	function getOneRow($sql) {
		$res = $this->query ( $sql );
		if ($res !== false) {
			return mysql_fetch_assoc ( $res );
		} else {
			return false;
		}
	}
	
	function getRowsNum($sql) {
		$query = $this->query ( $sql );
		return mysql_num_rows ( $query );
	}
	
	function getOneField($sql) {
		$val = mysql_fetch_array ( $this->query ( $sql ) );
		return $val [0];
	}
	
	function getCol($sql) {
		$res = mysql_query ( $sql );
		if ($res !== false) {
			$arr = array ();
			while ( ($row = mysql_fetch_row ( $res )) != false ) {
				$arr [] = $row [0];
			}
			return $arr;
		} else {
			return false;
		}
	}
	
	function close() {
		return mysql_close ( $this->link_id );
	}
	
	function getVersion() {
		return $this->version;
	}
	
	function ErrorMsg($message = '') {
		if ($message) {
			echo $message;
		} else {
			echo @mysql_error ();
		}
		exit ();
	}
}
