 <?php


require_once("model/Hospede.php");
require_once("model/Reserva.php");
require_once("model/HotelFactory.php");

/*
* Trabalho realizado para a disciplina de Programação para Web da Faculdade de
* Computação da Universidade Federal de Mato Grosso do Sul (FACOM / UFMS).
* Trata-se de um sistema de reservas de um hotel específico.
*
*
*
* Classe HotelManager - Classe responsável pela lógica de negócio.
* 
*
* @author Isadora Ajala Martinez
* @author Laís Santos de Souza
*
*
* @version 6.0 - 05/Dez/2018
*/

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


    /**
    * Salva os dados do hóspede no banco de dados
    * @param string $nome - nome do hóspede
    * @param string $email - email do hóspede
    * @param string $telefone - telefone do hóspede
    * @param string $dataNascimento - data de nascimento do hóspede
    * @param string $cpf - cpf do hóspede
    * @param string $rua - rua do hóspede  
    * @param string $numeroCasa - número da casa do hóspede
    * @param string $bairro - bairro do hóspede
    * @param string $cep - cep do hóspede
    * @param string $senha - senha do hóspede para login
    * @return string $msg - Mensagem para o hóspede indicando se o cadastro foi ou não 
    efetuado com sucesso
    */
    public function cadastra($nome, $email, $telefone, $dataNascimento, $cpf, $rua, 
                             $numeroCasa, $bairro, $cep, $senha){

        $result = $this->factory->buscarPorEmail($email);

        // Se result for igual a 0 itens, então salva hospede
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

    /**
    * Altera o cadastro do hóspede
    * @param string $nome - nome do hóspede
    * @param string $email - email do hóspede
    * @param string $telefone - telefone do hóspede
    * @param string $dataNascimento - data de nascimento do hóspede
    * @param string $cpf - cpf do hóspede
    * @param string $rua - rua do hóspede  
    * @param string $numeroCasa - número da casa do hóspede
    * @param string $bairro - bairro do hóspede
    * @param string $cep - cep do hóspede
    * @param string $senha - senha do hóspede para login
    * @return string $msg - Mensagem para o hóspede indicando se o cadastro foi ou não 
    alterado com sucesso
    */

    public function alterarCadastro($nome, $email, $telefone, $dataNascimento, $cpf, $rua, 
                             $numeroCasa, $bairro, $cep, $senha): string{

        $result = $this->factory->buscarPorEmail($email);

        // se o resultado for igual a 0 itens, então salva hospede:
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

     /**
    * Verifica se o hóspede digitou email e senha corretamente 
    * @param string $email - email de login do hóspede
    * @param string $senha - senha de login do hóspede
    * @return string -  Retorna o nome do hóspede que será salvo em sessão pelo controller
    */
    
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

    /**
    * Verifica há disponibilidade de um quarto em específico
    * @param string $dataEntrada - Data de entrada da reserva
    * @param string $dataSaida - Data de saída da reserva
    * @param string $quarto - Indica a quantidade de quartos solicitada
    * @param string $nomeOfQuarto - String com o nome do quarto
    * @return int -  Indica se este quarto está disponível
    */
    public function verificaDisponibilidade(String $dataEntrada, 
                                            String $dataSaida, 
                                            String $quarto,
                                            String $nameOfQuarto){  

        $result = $this->factory->countDatas($dataEntrada, $dataSaida, $nameOfQuarto);

        $sum = 0;

        for($i = 0; $i < count($result); $i++)
            $sum = $sum + $result[$i][0] * $result[$i][1];

        if ($_SESSION[$nameOfQuarto] - $sum >= $quarto){
            $sucesso = true; 
        }
        else{
            $sucesso = false;
        }

        return $sucesso;
    }


    /**
    * Verifica se há quartos disponíveis ou não para a data solicitada
    * @param string $sucesso1 - Indica disponibilidade para o quarto Simplex 
    * @param string $sucesso2 - Indica disponibilidade para o quarto Lux
    * @param string $sucesso3 - Indica disponibilidade para o quarto Lux Master
    * @param string $sucesso4 - Indica disponibilidade para o quarto Lux Imperial
    * @param string $nQuartoSimple - Quantidade de quartos Simplex solicitado pelo hóspede
    * @param string $nQuartoLux - Quantidade de quartos Lux solicitado pelo hóspede
    * @param string $nQuartoLuxMaster - Quantidade de quartos Lux Master solicitado pelo hóspede
    * @param string $nQuartoLuxImperial - Quantidade de quartos Lux Imperial solicitado pelo hóspede
    * @param string $dataEntrada - Data de entrada da reserva
    * @param string $dataSaida - Data de saída da reserva
    * @return int -  Indica se há quartos disponíveis ou não para a data solicitada
    */
    public function verificaQuartos($sucesso1, $sucesso2, $sucesso3, $sucesso4,
                                    $nQuartoSimple, $nQuartoLux, $nQuartoLuxMaster,
                                    $nQuartoLuxImperial, $dataEntrada, $dataSaida): int{
        
        if ($sucesso1)
            $_SESSION['nQuartoSimple_h'] = $nQuartoSimple;
        else
        {
            $_SESSION['msg_data'] = "Não temos reserva disponível para o quarto Simplex";
            $flag = 1;
        }

        
        if($sucesso2)
            $_SESSION['nQuartoLux_h'] = $nQuartoLux;
        else
        {
            if($flag = 1)
                $_SESSION['msg_data'] = $_SESSION['msg_data'] . ", para o quarto Lux";
            else
            {
                $_SESSION['msg_data'] = "Não temos reserva disponível para o quarto Lux";
                $flag = 1; 
            }
        }

        if($sucesso3)
            $_SESSION['nQuartoLuxMaster_h'] = $nQuartoLuxMaster;
        else
        {
            if($flag = 1)
                $_SESSION['msg_data'] = $_SESSION['msg_data'] . ", para o quarto Lux Master";
            else
            {
                $_SESSION['msg_data'] = "Não temos reserva disponível para o quarto Lux Master";
                $flag = 1; 
            }
        }

        if($sucesso4)
            $_SESSION['nQuartoLuxImperial_h'] = $nQuartoLuxImperial;
        else
        {
            if($flag = 1)
                $_SESSION['msg_data'] = $_SESSION['msg_data'] . ", para o quarto Lux Imperial";
            else
            {
                $_SESSION['msg_data'] = "Não temos reserva disponível para o quarto Lux Imperial";
                $flag = 1; 
            }
        }

        if(isset($flag) and $flag == 1)
            $_SESSION['msg_data'] = $_SESSION['msg_data'] . " entre os dias " . $dataEntrada . " e " . $dataSaida . ".";
        else
            $flag = 0;

        return $flag;  
    }


    /**
    * Salva os dados de reserva que estão armazenados em sessão no banco de dados
    * @param 
    * @return $msg - Mensagem para o hóspede indicando sucesso ou falha
    */
    public function salvarReserva(){
        
        $reserva = new Reserva("", $_SESSION['emailHospede'], $_SESSION['dataEntrada'], 
            $_SESSION['dataSaida'], $_SESSION['nQuartoSimple_h'], $_SESSION['nQuartoLux_h'], 
            $_SESSION['nQuartoLuxMaster_h'], $_SESSION['nQuartoLuxImperial_h'], $_SESSION['cartao'], $_SESSION['numCartao'], $_SESSION['nomeCartao'], $_SESSION['validade'], $_SESSION['codSeguranca'], $_SESSION['parcelas']);

        $sucesso = $this->factory->salvarReserva($reserva);

        $id = $this->factory->buscarReservaIgual($reserva);

        if(isset($sucesso))
            $msg = "Obrigada " . $_SESSION["nomeHospede"] . "! Sua reserva no Hotel Palácios foi efetuada com sucesso! O código dela é " . $id . ".";
        else
            $msg = "Erro ao cadastrar sua reserva no banco de dados.";

        return $msg;

    }


    /**
    * Armazena os atributos do objeto reserva em sessão
    * @param array $reserva 
    * @return 
    */
    public function salvarReservaEmSessao($reserva){

        $_SESSION['emailHospede'] = $reserva[0]->getEmailHospede();
        $_SESSION['dataEntrada'] = $reserva[0]->getDataEntrada();
        $_SESSION['dataSaida'] = $reserva[0]->getDataSaida();
        $_SESSION['nQuartoSimple'] = $reserva[0]->getNQuartosimple();
        $_SESSION['nQuartoLux'] = $reserva[0]->getNQuartoLux();
        $_SESSION['nQuartoLuxMaster'] = $reserva[0]->getNQuartoLuxMaster();
        $_SESSION['nQuartoLuxImperial'] = $reserva[0]->getNQuartoLuxImperial();
        $_SESSION['cartao'] = $reserva[0]->getCartao();
        $_SESSION['numCartao'] = $reserva[0]->getNumCartao();
        $_SESSION['nomeCartao'] = $reserva[0]->getNomeCartao();
        $_SESSION['validade'] = $reserva[0]->getValidade();
        $_SESSION['codSeguranca'] = $reserva[0]->getCodSeguranca();
        $_SESSION['parcelas'] = $reserva[0]->getParcelas();
    }


    /**
    * Limpa as sessões utilizadas para armazenar os dados no momento da reserva
    * @param 
    * @return  
    */
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
            
        if(isset($_SESSION['msg_data']))
            unset($_SESSION['msg_data']);

        if(isset($flag))
            $flag = 0;
    }


    /**
    * Busca dados do hóspede pelo e-mail
    * @param string $email - email a ser buscado.
    * @return  array -  Array de objetos com os dados do hóspede, ou null se não encontrar
    * objetos.
    */
    public function busca(string $email): array{

        $hospede = $this->factory->buscarPorEmail($email);

        return $hospede;
    }

    /**
    * Busca reservas do hóspede pelo e-mail 
    * @param string $email - email a ser buscado.
    * @return  array -  Array de objetos com os dados das reservas, ou null se não encontrar
    * objetos.
    */
    public function buscarReservaPorEmail(string $email): array{

        $reserva = $this->factory->buscarReservaPorEmail($email);  

        return $reserva;
    }    


    /**
    * Busca reserva pelo id
    * @param string $id - id a ser buscado.
    * @return array -  Array de objetos com os dados da reerva, ou null se não encontrar
    * objetos.
    */
    public function buscarReservaPorId(string $id): array{

        $reserva = $this->factory->buscarReservaPorId($id);  

        return $reserva;
    }    

    /**
    * Busca ids das reservas do hóspede pelo e-mail para cancelar uma delas
    * @param string $email - email a ser buscado.
    * @return  array -  Array de objetos com os ids das reervas, ou null se não encontrar
    * objetos.
    */
    public function buscaReservaParaCancelar(string $email): array{

        $reserva = $this->factory->buscarReservaPorEmail($email);  

        for($i = 0; $i < count($reserva); $i++)
            $msg[$i] = $reserva[$i]->getId();

        return $msg;
    }    

    /**
    * Deleta reserva pelo id
    * @param string $id - id a ser buscado.
    */
    public function deletaReservaPeloId($id){

        $this->factory->deletaReservaPeloId($id);

    }
}
?>