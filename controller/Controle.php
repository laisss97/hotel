<?php

require_once("model/HotelManager.php");

/*
* Trabalho realizado para a disciplina de Programação para Web da Faculdade de
* Computação da Universidade Federal de Mato Grosso do Sul (FACOM / UFMS).
* Trata-se de um sistema de reservas de um hotel específico.
*
*
*
* Classe Controle - Classe que controla e gerencia do fluxo da aplicação.
* Essa classe segue o padrão arquitetural MVC, no qual assume o papel de
* controller.
*
* @author Isadora Ajala Martinez
* @author Laís Santos de Souza
*
*
* @version 6.0 - 05/Dez/2018
*/


class Controle {

    private $manager;

    public function __construct() {

        $this->manager = new HotelManager();
    }

    public function init() {

        if (isset($_GET['funcao'])) {
            $f = $_GET['funcao'];
        } else {
            $f = "";
        }

        switch ($f) {

            case "login":
            $this->login();
            break;
            
            case "cadastro":
            $this->cadastro();
            break;

            case "quartos":
            $this->quartos();
            break;

            case "servicos":
            $this->servicos();
            break;

            case "homeLogin":
            $this->homeLogin();
            break;        
            
            case "reservar":
            $this->reservar();
            break;

            case "alterarReserva":
            $this->alterarReserva();
            break;

            case "cancelarReserva":
            $this->cancelarReserva();
            break;
            
            case "sairLogin":
            $this->sairLogin();
            break;    

            case "processaCadastro":
            $this->processaCadastro();
            break;

            case "alterarCadastro":
            $this->alterarCadastro();
            break;

            case "processaLogin":
            $this->processaLogin();
            break;

            case "verificaDisponibilidade":
            $this->verificaDisponibilidade();
            break;

            case "recebeData":
            $this->recebeData();
            break;

            case "processaPagamento":
            $this->processaPagamento();
            break;

            case "confirmaReserva":
            $this->confirmaReserva();
            break;

            case "cancelaReserva":
            $this->cancelaReserva();
            break;

            case "cancelaReservaId":
            $this->cancelaReservaId();
            break;

            default:
            $this->home();
            break;
        }
    }

    public function home() {
        require 'view/home.php';
    }

    public function login() {
        require 'view/login.php';
    }

    public function cadastro() {
        require 'view/cadastro.php';
    }

    public function quartos() {
        require 'view/quartos.php';
    }

    public function servicos() {
        require 'view/servicos.php';
    }

    // Esta será a tela home após o login do usuário
    public function homeLogin() {

        if(isset($flag))
            $flag = 0;
            
        if(isset($_SESSION['msg_data']))
            unset($_SESSION['msg_data']);

        require 'view/homeLogin.php';
    }
    
    public function reservar() {
        require 'view/reservas.php';
    }

    public function alterarReserva() {
        require 'view/alteraReserva.php';
    }

    // Permite que o usuário cancele a reserva desejada
    public function cancelarReserva() {

        if(isset($_SESSION['emailHospede'])){

            if(isset($_POST['codigoEnviado'])){
                $id = $_POST['codigo'];
                $_SESSION['id'] = $id;
                $reserva = $this->manager->buscarReservaPorId($id);
                $this->manager->salvarReservaEmSessao($reserva);

                require 'view/mensagemConfirmaCancelamento.php';
            }
            else
            {
                $email = $_SESSION['emailHospede'];
                $reserva = $this->manager->buscarReservaPorEmail($email);

                if($reserva != NULL){

                    $flag_reserva = 1;
                    $msg = $this->manager->buscaReservaParaCancelar($email);
                    require 'view/cancelaReserva.php';        
                }
                else
                {
                    $flag_reserva = 0;
                    $msg = $_SESSION['nomeHospede'] . ", você não tem uma reserva no Hotel Palacios.";
                    require 'view/cancelaReserva.php';
                }  
            }
        }
        else
        {
            $msg = "Você não está logado.";
            require 'view/mensagemLogin.php';
        }
    }

    // Desabilita as sessões com nome e email do hóspede
    // Volta para a tela home inicial

    public function sairLogin() {

        unset($_SESSION['nomeHospede']);
        unset($_SESSION['emailHospede']);
        unset ($_SESSION['sucesso']);
        require 'view/home.php';
    }

    // Cadastra novo hóspede
    public function processaCadastro() {
        
        if (isset($_POST['cadastroEnviado'])) 
        {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];

            $dataNascimento = $_POST['dataNascimento'];
            $cpf = $_POST['cpf'];
            $rua = $_POST['rua'];
            $numeroCasa = $_POST['numeroCasa'];
            $bairro = $_POST['bairro'];
            $cep = $_POST['cep'];
            $senha = $_POST['senha'];
  
            $msg = $this->manager->cadastra($nome, $email, $telefone, $dataNascimento, $cpf,
                                                $rua, $numeroCasa, $bairro, $cep, $senha);

            require 'view/mensagemCadastro.php';
        }
    }  

    // Permite que o hóspede altere o cadastro salvo
    public function alterarCadastro() {

        if (isset($_POST['alteraCadastroEnviado'])) {
            try {
                    $nome = $_POST['nome'];
                    $email = $_POST['email'];
                    $telefone = $_POST['telefone'];

                    $dataNascimento = $_POST['dataNascimento'];
                    $cpf = $_POST['cpf'];
                    $rua = $_POST['rua'];
                    $numeroCasa = $_POST['numeroCasa'];
                    $bairro = $_POST['bairro'];
                    $cep = $_POST['cep'];
                    $senha = $_POST['senha'];
 
                    $msg = $this->manager->alterarCadastro($nome, $email, $telefone, $dataNascimento,                            $cpf, $rua, $numeroCasa, $bairro, $cep, $senha);
    
            } catch (Exception $e) {
                    $msg = $e->getMessage();
            }

            require 'view/mensagemAlteraCadastro.php';
        }
        else{ 

            try{

                if(isset($_SESSION['emailHospede'])){
                    $email = $_SESSION['emailHospede'];
                    $hospede = $this->manager->busca($email);
                    require 'view/alteraCadastro.php';
                }
                else
                {
                    $msg = "Você não está logado.";
                    require 'view/mensagemAlteraCadastro.php';
                }


            } catch (Exception $e) {
                $msg = $e->getMessage();
                require 'view/mensagemAlteraCadastro.php';
            }
        }
    }

    // Processa os dados recebidos para efetuar o login do hóspede
    public function processaLogin() {
        
        if (isset($_POST['loginEnviado'])) 
        {   
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            
            $result = $this->manager->processaLogin($email, $senha);

            $_SESSION['nomeHospede'] = $result;
            $_SESSION['emailHospede'] = $email;

            if($_SESSION['sucesso'] == 0){
                $msg = $result;
                require 'view/mensagemLogin.php';
            }
            else{
                $_SESSION['sucesso'] = 1;
                $nome = $result;
                require 'view/homeLogin.php';
            }
        }
    }  

    // Verifica a disponibilidade de quartos de acordo com o período de estadia
    public function verificaDisponibilidade() {  
        
        if (isset($_POST['quartosEnviado'])) 
        {
            $dataEntrada = $_SESSION['dataEntrada'];
            $dataSaida = $_SESSION['dataSaida'];

            $nQuartoSimple = $_POST['nQuartoSimple'];
            $nQuartoLux = $_POST['nQuartoLux'];
            $nQuartoLuxMaster = $_POST['nQuartoLuxMaster'];
            $nQuartoLuxImperial = $_POST['nQuartoLuxImperial'];

            if($nQuartoSimple > 0){
                $nameOfQuarto = "nQuartoSimple";
                $sucesso1 = $this->manager->verificaDisponibilidade($dataEntrada, 
                                                            $dataSaida, $nQuartoSimple, 
                                                           $nameOfQuarto);
            }
            else
                $sucesso1 = true;

            if($nQuartoLux > 0){
                $nameOfQuarto = "nQuartoLux";
                $sucesso2 = $this->manager->verificaDisponibilidade($dataEntrada, 
                                                            $dataSaida, $nQuartoLux,
                                                            $nameOfQuarto);
            }
            else
                $sucesso2 = true;

            if($nQuartoLuxMaster > 0){
                $nameOfQuarto = "nQuartoLuxMaster";
                $sucesso3 = $this->manager->verificaDisponibilidade($dataEntrada, 
                                                            $dataSaida, $nQuartoLuxMaster,
                                                            $nameOfQuarto);
            }
            else
                $sucesso3 = true;

            if($nQuartoLuxImperial > 0){
                $nameOfQuarto = "nQuartoLuxImperial";
                $sucesso4 = $this->manager->verificaDisponibilidade($dataEntrada, 
                                                        $dataSaida, $nQuartoLuxImperial,
                                                        $nameOfQuarto);
            }
            else
                $sucesso4 = true;

            $flag = $this->manager->verificaQuartos($sucesso1, $sucesso2, $sucesso3, $sucesso4,
                                    $nQuartoSimple, $nQuartoLux, $nQuartoLuxMaster,
                                    $nQuartoLuxImperial, $dataEntrada, $dataSaida);

            if($flag == 1)
                require "view/reservas.php";
            else
                require "view/pagamento.php";
        }
    }

    // Salva em sessão as datas de Entrada e Saída do hóspede
    public function recebeData() {
        
        if (isset($_POST['datasEnviado'])) 
        {           
            $dataEntrada = date("Y-m-d", strtotime($_POST['dataEntrada']));
            $dataSaida = date("Y-m-d", strtotime($_POST['dataSaida']));

            $_SESSION['dataEntrada'] = $dataEntrada;
            $_SESSION['dataSaida']= $dataSaida;
            
            require 'view/escolherQuarto.php';           
        }
        else
            require 'view/reservas.php';
    }

    // Salva em sessão os dados de pagamento
    public function processaPagamento(){
        if (isset($_POST['pagamentoEnviado'])) 
        {               
            $_SESSION['cartao'] = $_POST['cartao'];
            $_SESSION['numCartao'] = $_POST['numCartao'];
            $_SESSION['nomeCartao'] = $_POST['nomeCartao'];
            $_SESSION['validade'] = $_POST['validade'];
            $_SESSION['codSeguranca'] = $_POST['codSeguranca'];
            $_SESSION['parcelas'] = $_POST['parcelas'];

            require "view/finalizaReserva.php"; 
        }
    }

    // Salva no banco os dados da reserva
    // Limpa os dados da reserva armazenados em sessão
    // Encaminha para página de confirmação da reserva
    public function confirmaReserva(){

        $msg = $this->manager->salvarReserva();

        $this->manager->limparSessao();

        require "view/mensagemConfirmaReserva.php";
    }
      
    // Limpa os dados da reserva armazenados em sessão
    // Encaminha para página de cancelamento da reserva
    public function cancelaReserva(){

        $msg = "A reserva foi cancelada!";
        $this->manager->limparSessao();
        
        require "view/mensagemCancelaReserva.php";
    }

    // Limpa os dados da reserva armazenados em sessão, 
    // Deleta do banco de dados
    // Encaminha para página de cancelamento da reserva
    public function cancelaReservaId(){

        $msg = "A reserva foi cancelada!";
        $id = $_SESSION['id'];

        $this->manager->deletaReservaPeloId($id);
        $this->manager->limparSessao();
        
        require "view/mensagemCancelaReserva.php";
    }
    
}

?>


