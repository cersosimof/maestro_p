<?php

class ConnectDb {
    private static $instance = null;
    private $conn;
    
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $name = 'proveedores';
     
    // The db connection is established in the private constructor.
    private function __construct()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->name);
        if($this->conn->connect_errno) {
         die("Error al conectarse a MySQL: (" . $this->conn->connect_errno . ") " . $this->conn->connect_error);
        }
    }
    
    public static function getInstance()
    {
      if(!self::$instance)
      {
        self::$instance = new ConnectDb();
      }
     
      return self::$instance;
    }
    
    public function getConnection()
    {
      return $this->conn;
    }

    // public function CloseConnection(){
    //     //Metodo que cierra la conexion a la BD
    //      $this->conn->close();
    //     }
         
        /* Metodo que ejecuta un query sql y retorna un resultado si es un SELECT */
        public function ExecuteQuery($sql){
            $result = $this->conn->query($sql);
            return $result;
        }
          
        public function GetCountAffectedRows(){
        /* Metodo que retorna la cantidad de filas
         afectadas con el ultimo query realizado.*/
         return $this->conn->affected_rows;
        }
          
    //     public function GetRows($result){
    //     /*Metodo que retorna la ultima fila
    //      de un resultado en forma de arreglo.*/
    //      return $result->fetch_row();
    //     }
          
    //     public function SetFreeResult($result){
    //     //Metodo que libera el resultado del query.
    //      $result->free_result();
    //     }
  }