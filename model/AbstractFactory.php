<?php

abstract class AbstractFactory {

    protected $db;

    public function __construct() {

        define( 'MYSQL_HOST', 'localhost' );
        define( 'MYSQL_USER', 'root' );
        define( 'MYSQL_PASSWORD', '' );
        define( 'MYSQL_DB_NAME', 'hotel' );
 
        try
        {
            $this->db = new PDO( 'mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME.';charset=utf8', MYSQL_USER, MYSQL_PASSWORD );
            //$this->db = setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch ( PDOException $e ){
            echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
        }
    }

    abstract public function salvar($obj);
    abstract public function buscarPorEmail($param): array;
    abstract public function atualizar($obj); 
    abstract public function countDatas(String $dataEntrada, String $dataSaida, String $quarto): array;
    
    /**
    * Lista os objetos persistidos no banco, que possuem o $email.
    * @param string $email - email a ser buscado.
    * @return  array -  Array de objetos da classe, ou null se não encontrar
    * objetos.
    */
   
    protected function queryRowsToListOfObjects
    (PDOStatement $result, $nameObject): array {
        $list = array();
        $r = $result->fetchAll(PDO::FETCH_NUM);
        
        foreach ($r as $row) {
            
            //unset($row[0]); //essa linha foi comentada pois ignorava o id do objeto
            
            $ref = new ReflectionClass($nameObject);
            
            $list[] = $ref->newInstanceArgs($row);
            
        }
        return $list;
    }

}

?>
