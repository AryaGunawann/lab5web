<?php
class Database {
    protected $host;
    protected $user;
    protected $password;
    protected $db_mobil;
    protected $conn;

    public function __construct() {
        $this->getConfig();
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->db_mobil);
        if ($this->conn->connect_error) {
            throw new Exception("Database connection failed: " . $this->conn->connect_error);
        }
    }

    private function getConfig() {
        include_once("koneksi.php");
        if(!isset($config['host']) || !isset($config['username']) || !isset($config['password']) || !isset($config['db_mobil'])){
            throw new Exception("Database configuration is not valid");
        }
        $this->host = $config['host'];
        $this->user = $config['username'];
        $this->password = $config['password'];
        $this->db_mobil = $config['db_mobil'];
    }

    public function query($sql) {
        $result = $this->conn->query($sql);
        if (!$result) {
            throw new Exception("Database query failed: " . $this->conn->error);
        }
        return $result;
    }

    public function get($table, $where=null) {
        $where_clause = "";
        if ($where) {
            $where_clause = " WHERE ".$this->conn->real_escape_string($where);
        }
        $sql = "SELECT * FROM ".$this->conn->real_escape_string($table).$where_clause;
        $result = $this->query($sql);
        $row = $result->fetch_assoc();
        $result->free();
        return $row;
    }

    public function insert($table, $data) {
        $columns = array();
        $values = array();
        foreach($data as $key => $val) {
            $columns[] = $this->conn->real_escape_string($key);
            $values[] = "'".$this->conn->real_escape_string($val)."'";
        }
        $columns = implode(",", $columns);
        $values = implode(",", $values);
        $sql = "INSERT INTO ".$this->conn->real_escape_string($table)." (".$columns.") VALUES (".$values.")";
        $result = $this->query($sql);
        return $result;
    }

    public function update($table, $data, $where) {
        $update_value = array();
        foreach($data as $key => $val) {
            $update_value[] = $this->conn->real_escape_string($key)."='".$this->conn->real_escape_string($val)."'";
        }
        $update_value = implode(",", $update_value);
        $sql = "UPDATE ".$this->conn->real_escape_string($table)." SET ".$update_value." WHERE ".$this->conn->real_escape_string($where);
        $result = $this->query($sql);
        return $result;
    }

    public function delete($table, $filter) {
        $sql = "DELETE FROM ".$this->conn->real_escape_string($table)." ".$this->conn->real_escape_string($filter);
        $result = $this->query($sql);
        return $result;
    }
}
?>
