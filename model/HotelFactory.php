<?php

require_once("Hospede.php");
require_once("AbstractFactory.php");

class HotelFactory extends AbstractFactory {

    public function __construct() {

        parent::__construct();
    }
    
    public function salvar($obj) {
    	
        $novoHospede = $obj;

        
		try {
		        $data = [ 'nome' => $novoHospede->getNome(), 
		                  'email' => $novoHospede->getEmail(),
		                  'telefone' => $novoHospede->getTelefone(),
						  'dataNascimento' => $novoHospede->getDataNascimento(),
						  'cpf' => $novoHospede->getCpf(),
						  'rua' => $novoHospede->getRua(),
						  'numeroCasa' => $novoHospede->getNumeroCasa(),
						  'bairro' => $novoHospede->getBairro(),
						  'cep' => $novoHospede->getCep(),
					      'senha' => $novoHospede->getSenha(),];

				$sql = "INSERT INTO tbhospede (nome, email, telefone, dataNascimento, cpf,
                                                rua, numeroCasa, bairro, cep, senha) VALUES 
											  (:nome, :email, :telefone, :dataNascimento, :cpf,
                                               :rua, :numeroCasa, :bairro, :cep, :senha)";

				$stmt= $this->db->prepare($sql);
				$stmt->execute($data);

                if ($stmt) {
                    $result = true;
                } else {
                    $result = false;
             	}
            }
        catch(PDOException $e) {
  				echo 'Error: ' . $e->getMessage();
  			}	
          
            return $result;
    }

    public function salvarReserva($obj) {
    	
        $novaReserva = $obj;   //arrumar

        
		try {
		        $data = [ 'nome' => $novoHospede->getNome(), 
		                  'email' => $novoHospede->getEmail(),
		                  'telefone' => $novoHospede->getTelefone(),
						  'dataNascimento' => $novoHospede->getDataNascimento(),
						  'cpf' => $novoHospede->getCpf(),
						  'rua' => $novoHospede->getRua(),
						  'numeroCasa' => $novoHospede->getNumeroCasa(),
						  'bairro' => $novoHospede->getBairro(),
						  'cep' => $novoHospede->getCep(),
					      'senha' => $novoHospede->getSenha(),];

				$sql = "INSERT INTO tbhospede (nome, email, telefone, dataNascimento, cpf,
                                                rua, numeroCasa, bairro, cep, senha) VALUES 
											  (:nome, :email, :telefone, :dataNascimento, :cpf,
                                               :rua, :numeroCasa, :bairro, :cep, :senha)";

				$stmt= $this->db->prepare($sql);
				$stmt->execute($data);

                if ($stmt) {
                    $result = true;
                } else {
                    $result = false;
             	}
            }
        catch(PDOException $e) {
  				echo 'Error: ' . $e->getMessage();
  			}	
          
            return $result;
    }


    /**
	* Lista os objetos persistidos no banco, que possuem o $email.
	* @param string $email - email a ser buscado.
	* @return  array -  Array de objetos da classe, ou null se não encontrar
	* objetos.
	*/
	
	public function buscarPorEmail($param): array { // tem que ajustar
		$sql = "SELECT * FROM tbhospede WHERE email='" . $param . "'";

		try {
			$resultRows = $this->db->query($sql);

			if (!($resultRows instanceof PDOStatement)) {
				throw new Exception("Tem erro no seu SQL!<br> '" . $sql . "'");
			}

			$resultObject = $this->queryRowsToListOfObjects($resultRows, "Hospede");

		} catch (Exception $exc) {

			echo $exc->getMessage();
			$resultObject = null;
		}
		
		return $resultObject;
	}

	public function countDatas(String $dataEntrada, String $dataSaida, String $nameOfQuarto): array{

		//$sql = "SELECT * FROM tbreserva"; // Escrever SQL
		$sql = "SELECT COUNT(" . $nameOfQuarto . ") FROM tbreserva " .
		"WHERE dataEntrada > " . $dataEntrada . " AND dataEntrada < " . $dataSaida .
				 " OR dataEntrada < " . $dataEntrada . " AND dataSaida > " . $dataSaida .
				 " OR dataSaida > " . $dataEntrada . " AND dataSaida < " . $dataSaida;

		
		try {
			$resultRows = $this->db->query($sql);

			if (!($resultRows instanceof PDOStatement)) {
				throw new Exception("Tem erro no seu SQL!<br> '" . $sql . "'");
			}

			$r = $resultRows->fetchAll(PDO::FETCH_NUM);
        	
        	echo "CountDatas\n";
			var_dump($r);
			//$resultObject = $this->queryRowsToListOfObjects($resultRows, "Reserva");

		} catch (Exception $exc) {

			echo $exc->getMessage();
			$r= null;
		}
		
		return $r;
	}

	/**
	* Modifica/atualiza o objeto persistido no banco.
	* @param  $obj - objeto a ser atualizado com as suas devidas modificações.
	* @return  boolean - se conseguiu atualizar ou não.
	*/
    public function atualizar($obj) {

        $hospede = $obj;

        try {
            $sql = "UPDATE tbhospede SET
				nome='". $hospede->getNome() . "',
				email='". $hospede->getEmail() . "',
				telefone='". $hospede->getTelefone() . "',
				dataNascimento='". $hospede->getDataNascimento() . "',
				cpf='". $hospede->getCpf() . "',
				rua='". $hospede->getRua() . "',
				numeroCasa='". $hospede->getNumeroCasa() . "',
				bairro='". $hospede->getBairro() . "',
				cep='". $hospede->getCep() . "',
				senha='". $hospede->getSenha() . "'
				
				WHERE id='"
                . $hospede->getId() . "' ";

                if ($this->db->exec($sql)) {
                    $result = true;
                } else {
                    $result = false;
                }
            } catch (PDOException $exc) {
                echo $exc->getMessage();
                $result = false;
            }

            return $result;
    }


/*	/**
	* Lista os objetos persistidos no banco, que possuem o $id.
	* @param string $id - id a ser buscado.
	* @return  array -  Array de objetos da classe, ou null se não encontrar
	* objetos.
	*/
/*	public function buscar(string $param): array{
		$sql = "SELECT * FROM tbhospede WHERE id='" . $param . "'";

		try {
			$resultRows = $this->db->query($sql);

			if (!($resultRows instanceof PDOStatement)) {
				throw new Exception("Tem erro no seu SQL!<br> '" . $sql . "'");
			}

			$resultObject = $this->queryRowsToListOfObjects($resultRows, "Contato");
		} catch (Exception $exc) {

			echo $exc->getMessage();
			$resultObject = null;
		}

		return $resultObject;
	}

	*/

    /*

	public function listar(): array {

		$sql = "SELECT * FROM tbinfoconversao";

		try {
			$resultRows = $this->db->query($sql);

			if (!($resultRows instanceof PDOStatement)) {
				throw new Exception("Tem erro no seu SQL!<br> '" . $sql . "'");
			}

			$resultObject = $this->queryRowsToListOfObjects($resultRows, "Converte");

			return $resultObject;

		} catch (Exception $exc) {
			echo $exc->getMessage();
			$resultObject = array();
		}
	}

	*/
}

?>
