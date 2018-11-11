 <?php

require_once("model/Hospede.php");
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

        // se o resultado for igual a 0 itens, então salva contato
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

    public function processaLogin(string $email, string $senha): string {

        session_start();

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

    public function verificaDisponibilidade(){

    }

   /*
    public function salvarHistorico($infoConversao){

        $sucesso = $this->factory->salvar($infoConversao);

    }

    public function lista() {

        $historicoConversao = $this->factory->listar();
        return $historicoConversao;
    }

    */
    
}
?>