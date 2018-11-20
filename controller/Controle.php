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

            case "escolherQuarto":
            $this->escolherQuarto();
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

    public function verificaDisponibilidade() {
        
        if (isset($_POST['disponibilidadeEnviado'])) 
        {
            $dataEntrada = $_POST['dataEntrada'];
            $dataSaida = $_POST['dataSaida'];
            
            $sucesso = $this->manager->verificaDisponibilidade($dataEntrada);

            //salvar dataEntrada e dataSaida em sessão

            echo "sucesso:\n";
            var_dump($sucesso);

            require 'view/escolherQuarto.php';
            // se der errado
                // setar variavel flag
               // require 'view/reservas.php'
        }
    }

    public function escolherQuarto() {
        
        if (isset($_POST['quartoEnviado'])) 
        {           
            // bla bla bla
            require 'view/pagamento.php';           
        }
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


