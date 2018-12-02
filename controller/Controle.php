<?php

require_once("model/HotelManager.php");

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

    public function homeLogin() {
        //flag de login recebe 1
        require 'view/homeLogin.php';
    }

    
    public function reservar() {
        require 'view/reservas.php';
    }

    public function alterarReserva() {
        require 'view/alteraReserva.php';
    }

    public function cancelarReserva() {
        require 'view/cancelaReserva.php';
    }

    public function sairLogin() {

        // flag de login recebe 0
        unset($_SESSION['nomeHospede']);
        unset($_SESSION['emailHospede']);
        unset ($_SESSION['sucesso']);
        require 'view/home.php';
    }

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
                    //$email = "aleatorio@gmail.com";
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

    public function processaLogin() {
        
        if (isset($_POST['loginEnviado'])) 
        {   
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            
            $result = $this->manager->processaLogin($email, $senha);

            //session_start();
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

    public function verificaDisponibilidade() {  // Escolher quarto antes da data?
                                                // Escolher data e quarto? Sim!!!
                                                // Escolher data e depois mostrar só os quartos
                                                // disponíveis?
        
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

    public function recebeData() {
        
        if (isset($_POST['datasEnviado'])) 
        {           
            $_SESSION['dataEntrada'] = $_POST['dataEntrada'];
            $_SESSION['dataSaida']= $_POST['dataSaida'];
            require 'view/escolherQuarto.php';           
        }
        else
            require 'view/reservas.php';
    }

    public function processaPagamento(){
        if (isset($_POST['pagamentoEnviado'])) 
        {               
            $_SESSION['cartao'] = $_POST['cartao'];
            $_SESSION['numCartao'] = $_POST['numCartao'];
            $_SESSION['nomeCartao'] = $_POST['nomeCartao'];
            $_SESSION['validade'] = $_POST['validade'];
            $_SESSION['codSeguranca'] = $_POST['codSeguranca'];
            $_SESSION['parcelas'] = $_POST['parcelas'];

            require "view/finalizaReserva.php"; // nesta page exibir todos os dados, preço, dar opção de cancelar e de finalizar, 
            // após finalizar, criar função que salva no BD todos os dados em sessão e depois libera
        }
    }

    public function confirmaReserva(){

        $msg = $this->manager->salvarReserva();

        $this->manager->limparSessao();

        require "view/mensagemConfirmaReserva.php";
    }
      
    public function cancelaReserva(){

        $this->manager->limparSessao();
        require "view/mensagemCancelaReserva.php";
    }
    
}
/*

    public function exibeHistorico(){
        $historicoConversao = $this->manager->lista();
        require 'view/historico.php';
    }

    public function converteMedida() {
        if (isset($_POST['enviado'])) 
        {
            $de = $_POST['de'];
            $para = $_POST['para'];

            $deValor = $_POST['deValor'];
            $conversao = $this->manager->converte($de, $para, $deValor); # Calcula conversão

            $infoConversao = new Converte($de, $para, $deValor, $conversao);

            $this->manager->salvarHistorico($infoConversao);

            require 'view/homeResult.php';
        }
    }

    */

?>


