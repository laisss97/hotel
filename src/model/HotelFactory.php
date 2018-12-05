<?php

require_once("Hospede.php");
require_once("Reserva.php");
require_once("AbstractFactory.php");

/*
* Trabalho realizado para a disciplina de Programação para Web da Faculdade de
* Computação da Universidade Federal de Mato Grosso do Sul (FACOM / UFMS).
* Trata-se de um sistema de reservas de um hotel específico.
*
*
*
* Classe HotelFactory - Classe que implementa a classe AbstractFactory. 
* Responsável por conectar com o banco de dados.
*
* @author Isadora Ajala Martinez
* @author Laís Santos de Souza
*
*
* @version 6.0 - 05/Dez/2018
*/

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

				$sql = "INSERT INTO tbhospede (nome, email, telefone, dataNascimento, cpf, rua, numeroCasa, bairro, cep, senha) VALUES :nome, :email, :telefone, :dataNascimento, :cpf, :rua, :numeroCasa, :bairro, :cep, :senha)";

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
		$novaReserva = $obj; 

		try {
	        $data = [ 'emailHospede' => $novaReserva->getEmailHospede(),
	    			  'dataEntrada' => $novaReserva->getDataEntrada(),
	    			  'dataSaida' => $novaReserva->getDataSaida(),
	    			  'nQuartoSimple' => $novaReserva->getNQuartoSimple(),
	    			  'nQuartoLux' => $novaReserva->getNQuartoLux(),
	    			  'nQuartoLuxMaster' => $novaReserva->getNQuartoLuxMaster(),
	    			  'nQuartoLuxImperial' => $novaReserva->getNQuartoLuxImperial(),
	    			  'cartao' => $novaReserva->getCartao(),
	    			  'numCartao' => $novaReserva->getNumCartao(),
	    			  'nomeCartao' => $novaReserva->getNomeCartao(),
	    			  'validade' => $novaReserva->getValidade(),
	    			  'codSeguranca' => $novaReserva->getCodSeguranca(),
	    			  'parcelas' => $novaReserva->getParcelas(),];

			$sql = "INSERT INTO tbreserva (emailHospede, dataEntrada, dataSaida, nQuartoSimple, nQuartoLux, nQuartoLuxMaster, nQuartoLuxImperial, cartao, numCartao, nomeCartao, validade, codSeguranca, parcelas) VALUES(:emailHospede, :dataEntrada, :dataSaida, :nQuartoSimple, :nQuartoLux, :nQuartoLuxMaster, :nQuartoLuxImperial, :cartao, :numCartao, :nomeCartao, :validade, :codSeguranca, :parcelas)";

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
	
	public function buscarPorEmail($param): array { 

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

	public function buscarReservaPorEmail($param): array{

		$sql = "SELECT * FROM tbreserva WHERE emailHospede ='" . $param . "'";

		try {
			$resultRows = $this->db->query($sql);

			if (!($resultRows instanceof PDOStatement)) {
				throw new Exception("Tem erro no seu SQL!<br> '" . $sql . "'");
			}

			$resultObject = $this->queryRowsToListOfObjects($resultRows, "Reserva");

		} catch (Exception $exc) {

			echo $exc->getMessage();
			$resultObject = null;
		}
		
		return $resultObject;
	}

	public function buscarReservaPorId($param): array{

		$sql = "SELECT * FROM tbreserva WHERE id ='" . $param . "'";

		try {
			$resultRows = $this->db->query($sql);

			if (!($resultRows instanceof PDOStatement)) {
				throw new Exception("Tem erro no seu SQL!<br> '" . $sql . "'");
			}

			$resultObject = $this->queryRowsToListOfObjects($resultRows, "Reserva");

		} catch (Exception $exc) {

			echo $exc->getMessage();
			$resultObject = null;
		}
		
		return $resultObject;
	}

	public function buscarReservaIgual($reserva): string{

		$sql = "SELECT id FROM tbreserva WHERE " .  
					  "emailHospede = '" . $reserva->getEmailHospede() . "' AND " .
					  "dataEntrada = '" . $reserva->getDataEntrada() . "' AND " .
					  "dataSaida = '" . $reserva->getDataSaida() . "' AND " .
					  "nQuartoSimple = '" . $reserva->getNQuartoSimple() . "' AND " .
					  "nQuartoLux = '" . $reserva->getNQuartoLux() . "' AND " .
					  "nQuartoLuxMaster = '" . $reserva->getNQuartoLuxMaster() . "' AND " .
					  "nQuartoLuxImperial = '" . $reserva->getNQuartoLuxImperial() . "' AND " .
					  "cartao = '" . $reserva->getCartao() . "' AND " .
					  "numCartao = '" . $reserva->getNumCartao() . "' AND " .
					  "nomeCartao = '" . $reserva->getNomeCartao() . "' AND " .
					  "validade = '" . $reserva->getValidade() . "' AND " .
					  "codSeguranca = '" . $reserva->getCodSeguranca() . "' AND " .
					  "parcelas = '" . $reserva->getParcelas() . "'";

		$resultRows = $this->db->query($sql);

		if (!($resultRows instanceof PDOStatement)) {
			throw new Exception("Tem erro no seu SQL!<br> '" . $sql . "'");
		}

		$r = $resultRows->fetchAll(PDO::FETCH_NUM);

		return $r[0][0];
	}


	public function countDatas(String $dataEntrada, String $dataSaida, String $nameOfQuarto): array{

		$sql = "SELECT " . $nameOfQuarto . ", COUNT(" . $nameOfQuarto . ") FROM tbreserva " .
		"WHERE (dataEntrada >= '" . $dataEntrada . "' AND dataEntrada <= '" . $dataSaida .
		"') OR (dataEntrada <= '" . $dataEntrada . "' AND dataSaida >= '" . $dataSaida . "') OR (dataSaida >= '" . $dataEntrada . "' AND dataSaida <= '" . $dataSaida . "') GROUP BY " . $nameOfQuarto;

		try {
			$resultRows = $this->db->query($sql);

			if (!($resultRows instanceof PDOStatement)) {
				throw new Exception("Tem erro no seu SQL!<br> '" . $sql . "'");
			}

			$r = $resultRows->fetchAll(PDO::FETCH_NUM);

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
    
    /**
    * Deleta reserva pelo id
    * @param string $id - id a ser buscado.
    */
    public function deletaReservaPeloId($id){

    	$sql = "DELETE FROM `tbreserva` WHERE id = $id";

		try {
			$resultRows = $this->db->query($sql);

			if (!($resultRows instanceof PDOStatement)) {
				throw new Exception("Tem erro no seu SQL!<br> '" . $sql . "'");
			}

			$r = $resultRows->fetchAll(PDO::FETCH_NUM);

		} catch (Exception $exc) {

			echo $exc->getMessage();
			$r= null;
		}
		
    }
}

?>
