<?php
/*
* Trabalho realizado para a disciplina de Programação para Web da Faculdade de
* Computação da Universidade Federal de Mato Grosso do Sul (FACOM / UFMS).
* Trata-se de um sistema de reservas de um hotel específico.
*
*
*
* AbstractFactory - Classe abstrata que define o padrão para todas as fábricas.

* @author Isadora Ajala Martinez
* @author Laís Santos de Souza
*
*
* @version 6.0 - 05/Dez/2018
*/

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
        }
        catch ( PDOException $e ){
            echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
        }
    }

    abstract public function salvar($obj);
    abstract public function salvarReserva($obj);
    abstract public function buscarPorEmail($param): array;
    abstract public function buscarReservaPorEmail($param): array;
    abstract public function buscarReservaPorId($param): array;
    abstract public function buscarReservaIgual($reserva): string;
    abstract public function atualizar($obj); 
    abstract public function countDatas(String $dataEntrada, String $dataSaida, String $quarto): array;
    
   
    protected function queryRowsToListOfObjects
    (PDOStatement $result, $nameObject): array {
        $list = array();
        $r = $result->fetchAll(PDO::FETCH_NUM);
        
        foreach ($r as $row) {
            
            $ref = new ReflectionClass($nameObject);
            
            $list[] = $ref->newInstanceArgs($row);
            
        }
        return $list;
    }

}

?>
