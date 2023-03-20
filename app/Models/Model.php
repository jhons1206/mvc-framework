<?php

namespace App\Models;

// Importamos clase mysqli
use mysqli;

class Model {

    protected $db_host = DB_HOST;
    protected $db_user = DB_USER;
    protected $db_pass = DB_PASS;
    protected $db_name = DB_NAME;

    protected $connection;
    protected $query;
    protected $table;

    public function __construct() 
    {
        $this->connection();
    }

    public function connection() 
    {

        $this->connection = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);

        if($this->connection->connect_error) 
        {
            die('Error de conexión: ' . $this->connection->connect_error);
        }
    }

    public function query($sql, $data = [], $params = null) 
    {
        if($data) {

            if($params == null) {
                $params = str_repeat('s', count($data));
            }

            $stmt = $this->connection->prepare($sql);
            $stmt->bind_param($params, ...$data);
            $stmt->execute();

            $this->query = $stmt->get_result();
        } else {
            $this->query = $this->connection->query($sql);
        }

        return $this;
    }

    public function first() 
    {
        return $this->query->fetch_assoc();
    }

    public function get() 
    {
        return $this->query->fetch_all(MYSQLI_ASSOC);
    }

    public function paginate($cant = 15) 
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 1;

        $sql = "SELECT * FROM {$this->table} LIMIT " . ($page - 1) * $cant . ",{$cant}";

        $data = $this->query($sql)->get();

        $total = $this->query("SELECT COUNT(*) as total FROM {$this->table}")->first()['total'];

        $uri = $_SERVER['REQUEST_URI'];
        $uri = trim($uri, '/');

        if(strpos($uri, '?')) {
            $uri = substr($uri, 0, strpos($uri, '?'));
        }

        $last_page = ceil($total / $cant);

        return [
            'total' => $total,
            'from' => ($page - 1) * $cant + 1,
            'to' => ($page - 1) * $cant + count($data),
            'next_page_url' => $page < $last_page ? '/' . $uri . '?page=' . $page + 1 : null,
            'prev_page_url' => $page > 1 ? '/' . $uri . '?page=' . $page - 1 : null,
            'data' => $data
        ];
    }

    // Consultas: Base de Datos
    // --------------------------------------------------
    // 1. Trae todos los registros de una tabla
    public function all() 
    {
        $sql = "SELECT * FROM {$this->table}";
        return $this->query($sql)->get();
    }

    // 2. Trae registros por id
    public function find($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = ?";
        return $this->query($sql, [$id], 'i')->first();
    }

    // 3. Trae registros por campo, condición y valor
    public function where($column, $operator, $value = null)
    {
        if($value == null) {
            $value = $operator;
            $operator = '=';
        }

        $sql = "SELECT * FROM {$this->table} WHERE {$column} {$operator} ?";

        $this->query($sql, [$value], 's');

        return $this;
    }

    // 4. Insertar registros DB
    public function create($data) {

        $columns = array_keys($data);
        $columns = implode(', ', $columns);

        $values = array_values($data);

        // $values = "'" . implode("', '", $values) . "'";

        $sql = "INSERT INTO {$this->table} ({$columns}) VALUES (" . str_repeat('?, ', count($values) - 1) . "?)";

        $this->query($sql, $values);
        
        $insert_id = $this->connection->insert_id;

        return $this->find($insert_id);
    }

    // 5. Actualizar registros DB
    public function update($id, $data)
    {
        $fields = [];

        foreach($data as $key => $value) {

            $fields[] = "{$key} = ?";
        }

        $fields = implode(', ', $fields);

        $sql = "UPDATE {$this->table} SET {$fields} WHERE id = ?";

        $values = array_values($data);
        $values[] = $id;
        
        $this->query($sql, $values);

        return $this->find($id);
    }

    // 6. Eliminar registros DB
    public function delete($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = ?";
        $this->query($sql, [$id], 'i');
    }

}