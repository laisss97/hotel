 <?php


require_once("model/Hospede.php");
require_once("model/Reserva.php");
require_once("model/HotelFactory.php");

class HotelManager {

	private  $id;
    private  $nome;
    private  $email;
    private  $telefone;
    private  $dataNascimento;
    private  $cpf;
    private  $rua;
    private  $numeroCasa;
    private  $bairro;
    private  $cep;
    private  $senha;

    public function __construct() {
        $this->factory = new HotelFactory();
    }

    public function cadastra($nome, $email, $telefone, $dataNascimento, $cpf, $rua, 
                             $numeroCasa, $bairro, $cep, $senha){

        $result = $this->factory->buscarPorEmail($email);
        //var_dump($result);

        // se o resultado for igual a 0 itens, então salva hospede
        if (count($result) == 0) {

            $hospede = new Hospede("", $nome, $email, $telefone, $dataNascimento, $cpf, 
                                    $rua, $numeroCasa, $bairro, $cep, $senha);

            $sucesso = $this->factory->salvar($hospede);

            if(isset($sucesso))
                $msg = "Obrigada " . $nome . "! Seu cadastro no Hotel Palácios foi efetuado com sucesso!";
            else
                $msg = "Erro ao cadastrar no banco de dados.";

        }
        else{
            $msg = "Este email já está cadastrado!";
        }
        
        unset($nome);
        unset($email);
        unset($telefone);
        unset($dataNascimento);
        unset($cpf);
        unset($rua);
        unset($numeroCasa);
        unset($bairro);
        unset($cep);
        unset($senha);

        return $msg;
     
    }

    public function alterarCadastro($nome, $email, $telefone, $dataNascimento, $cpf, $rua, 
                             $numeroCasa, $bairro, $cep, $senha): string{

        //consulta o e-mail no banco
        $result = $this->factory->buscarPorEmail($email);

        // se o resultado for igual a 0 itens, então salva hospede
        if (count($result) == 0) {
            $sucesso = false;
            $msg = "Não foi possível alterar seu cadastro.";
            $hospede = current($result);
        }
        else {

            $hospede = current($result);
            $hospede -> setNome($nome);
            $hospede -> setEmail($email);
            $hospede -> setTelefone($telefone);
            $hospede -> setDataNascimento($dataNascimento);
            $hospede -> setCpf($cpf);
            $hospede -> setRua($rua);
            $hospede -> setNumeroCasa($numeroCasa);
            $hospede -> setBairro($bairro);
            $hospede -> setCep($cep);
            $hospede -> setSenha($senha);
            
            $sucesso = $this->factory->atualizar($hospede);     
        }
            $msg = "Obrigado " . $nome . "!!!" . " Seu cadastro foi atualizado com sucesso!";

        return $msg;
    }

    public function processaLogin(string $email, string $senha): string {

        $hospede = $this->factory->buscarPorEmail($email);

        if (count($hospede) == 0) {
            $msg = "Este email não está cadastrado!";
            $_SESSION['sucesso'] = 0;
            return $msg;
        }

        if($hospede[0]->getSenha() != $senha){
            $msg = "Senha inválida!";
            $_SESSION['sucesso'] = 0;
            return $msg;
        }

        $nome = $hospede[0]->getNome();
        $_SESSION['sucesso'] = 1;

        return $nome;
        
    }

    // verifica se $dataEntrada está dentro do intervalo das datas, 
    // quantas vezes está e se essa quantidade ultrapassa a quantidade
    // de quartos

    public function verificaDisponibilidade(String $dataEntrada, 
                                            String $dataSaida, 
                                            String $quarto,
                                            String $nameOfQuarto){  

        $result = $this->factory->countDatas($dataEntrada, $dataSaida, $nameOfQuarto); // aqui fiquei perdida
        echo "Hotel Manager\n";

        if ($_SESSION[$nameOfQuarto] - $result[0][0] >= $quarto){
            $sucesso = true; // não só isso, tem que ver se a quantidade de 
                            // quartos que tem é suficiente
            echo "Disponibilidade ok!\n";
        }
        else{
            $sucesso = false;
        }

        return $sucesso;
    }

    public function verificaQuartos($sucesso1, $sucesso2, $sucesso3, $sucesso4,
                                    $nQuartoSimple, $nQuartoLux, $nQuartoLuxMaster,
                                    $nQuartoLuxImperial, $dataEntrada, $dataSaida): int{
        
        if ($sucesso1)
        {
            $_SESSION['nQuartoSimple_h'] = $nQuartoSimple;

            if($sucesso2)
            {
                $_SESSION['nQuartoLux_h'] = $nQuartoLux;

                if($sucesso3)
                {   
                    $_SESSION['nQuartoLuxMaster_h'] = $nQuartoLuxMaster;

                    if($sucesso4)
                    {
                        $_SESSION['nQuartoLuxImperial_h'] = $nQuartoLuxImperial;
                        //require 'view/pagamento.php';
                        $flag = 0;
                    }
                    else
                    {
                        $_SESSION['msg_data'] = "Não temos reserva disponível para o quarto lux imperial entre os dias ". 
                        $dataEntrada . " e " . $dataSaida . ".";
                        $flag = 1;
                        //require 'view/reservas.php'; // verificar esta flag em reservas
                    }
                }
                else
                {
                    $_SESSION['msg_data'] = "Não temos reserva disponível para o quarto lux master entre os dias ". 
                     $dataEntrada . " e " . $dataSaida . ".";
                    $flag = 1;
                    //require 'view/reservas.php'; // verificar esta flag em reservas
                }
            }
            else
            {
                $_SESSION['msg_data'] = "Não temos reserva disponível para o quarto lux entre os dias ". 
                $dataEntrada . " e " . $dataSaida . ".";
                $flag = 1;
                //require 'view/reservas.php'; // verificar esta flag em reservas
            }                 
        }
        else
        {
            // detalhar mais...
            $_SESSION['msg_data'] = "Não temos reserva disponível para o quarto simplex entre os dias ". 
            $dataEntrada . " e " . $dataSaida . ".";
            $flag = 1;
            //require 'view/reservas.php'; // verificar esta flag em reservas
        } 

        return $flag;  
    }

    public function salvarReserva(){
        
        $reserva = new Reserva("", $_SESSION['emailHospede'], $_SESSION['dataEntrada'], 
            $_SESSION['dataSaida'], $_SESSION['nQuartoSimple'], $_SESSION['nQuartoLux'], 
            $_SESSION['nQuartoLuxMaster'], $_SESSION['nQuartoLuxImperial'], $_SESSION['cartao'], $_SESSION['numCartao'], $_SESSION['nomeCartao'], $_SESSION['validade'], $_SESSION['codSeguranca'], $_SESSION['parcelas']);

        $sucesso = $this->factory->salvarReserva($reserva);

        if(isset($sucesso))
            $msg = "Obrigada " . $_SESSION["nomeHospede"] . "! Sua reserva no Hotel Palácios foi efetuada com sucesso!";
        else
            $msg = "Erro ao cadastrar sua reserva no banco de dados.";

        return $msg;

    }

    public function limparSessao(){

        if(isset($_SESSION['dataEntrada']))
            unset($_SESSION['dataEntrada']);

        if(isset($_SESSION['dataSaida']))
            unset($_SESSION['dataSaida']);

        if(isset($_SESSION['$nQuartoSimple']))
            unset($_SESSION['$nQuartoSimple']);

        if(isset($_SESSION['$nQuartoLux']))
            unset($_SESSION['$nQuartoLux']);

        if(isset($_SESSION['$nQuartoLuxMaster']))
            unset($_SESSION['$nQuartoLuxMaster']);

        if(isset($_SESSION['$nQuartoLuxImperial']))
            unset($_SESSION['$nQuartoLuxImperial']);

        if(isset($_SESSION['cartao']))
            unset($_SESSION['cartao']);

        if(isset($_SESSION['numCartao']))
            unset($_SESSION['numCartao']);

        if(isset($_SESSION['nomeCartao']))
            unset($_SESSION['nomeCartao']);

        if(isset($_SESSION['validade']))
            unset($_SESSION['validade']);

        if(isset($_SESSION['codSeguranca']))
            unset($_SESSION['codSeguranca']);

        if(isset($_SESSION['parcelas']))
            unset($_SESSION['parcelas']);

    }

    public function busca(string $email): array{

        $hospede = $this->factory->buscarPorEmail($email);

        return $hospede;
    }    
}
?>