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
