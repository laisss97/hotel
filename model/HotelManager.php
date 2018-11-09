 <?php

require_once("model/Hospede.php");
require_once("model/HotelFactory.php");

class HotelManager {

	private  $id;
    private  $nome;
    private  $email;

    public function __construct() {
        $this->factory = new HotelFactory();
    }

    public function cadastra(string $nome, string $email, string $telefone, string $dataNascimento, 
                            string $cpf, string $rua, string $numeroCasa, string $bairro,
                            string $cep, string $senha){

        //$result = $this->factory->buscarPorEmail($email);

        // se o resultado for igual a 0 itens, então salva contato
        //if (count($result) == 0) {

            $hospede = new Hospede("", $nome, $email, $telefone, $dataNascimento, $cpf, 
                                    $rua, $numeroCasa, $bairro, $cep, $senha);

            $sucesso = $this->factory->salvar($hospede);

            if(isset($sucesso))
                $msg = "Obrigada " . $nome . "! Seu cadastro no Hotel Palácios foi efetuado com sucesso!";
            else
                $msg = "Erro ao cadastrar no banco de dados.";

        /*}
        else{
            $msg = "Este email já está cadastrado!";
        }
        */
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

    public function processaLogin(string $email, string $senha){

        $hospede = $this->factory->buscarPorEmail($email);

    }

    public function verificaDisponibilidade(){

    }

    /*

    public function converte($de, $para, $deValor){
        switch ($de) {

            case "milhas":
                $conversao = $this->milhas($para, $deValor);
                return $conversao;
                break;
            
            case "pés":
                $conversao = $this->pes($para, $deValor);
                return $conversao;
                break;
            
            case "polegadas":
                $conversao = $this->polegadas($para, $deValor);
                return $conversao;
                break;
            
            case "quilômetros":
                $conversao = $this->quilometro($para, $deValor);
                return $conversao;
                break;

            case "metros":
                $conversao = $this->metro($para, $deValor);
                return $conversao;
                break;
            
            case "centímetros":
                $conversao = $this->centimetro($para, $deValor);
                return $conversao;
                break;

            case "milímetros":
                $conversao = $this->milimetro($para, $deValor);
                return $conversao;
                break;
            
            default:
            break;
        }

    }

    public function milhas($para, $deValor){
        switch ($para) {

            case "milhas":
                return $deValor;
                break;
            
            case "pés":
                $conversao = 5280*$deValor;
                return $conversao;
                break;
            
            case "polegadas":
                $conversao = 63360*$deValor;
                return $conversao;
                break;
            
            case "quilômetros":
                $conversao = 1.609344*$deValor;
                return $conversao;
                break;

            case "metros":
                $conversao = 1609.344*$deValor;
                return $conversao;
                break;
            
            case "centímetros":
                $conversao = 160934.4*$deValor;
                return $conversao;
                break;

            case "milímetros":
                $conversao = 1609344*$deValor;
                return $conversao;
                break;
            
            default:
            break;
        }
    }

    public function pes($para, $deValor){
        switch ($para) {

            case "milhas":
                $conversao = $deValor/5280.0;
                return $conversao;
                break;
            
            case "pés":
                return $deValor;
                break;
            
            case "polegadas":
                $conversao = 12*$deValor;
                return $conversao;
                break;
            
            case "quilômetros":
                $conversao = $deValor/3280.84;
                return $conversao;
                break;

            case "metros":
                $conversao = $deValor/3.281;
                return $conversao;
                break;
            
            case "centímetros":
                $conversao = 30.48*$deValor;
                return $conversao;
                break;

            case "milímetros":
                $conversao = 304.8*$deValor;
                return $conversao;
                break;
            
            default:
            break;
        }
    }
  
    public function polegadas($para, $deValor){
        switch ($para) {

            case "milhas":
                $conversao = $deValor/63360.0;
                return $conversao;
                break;
            
            case "pés":
                $conversao = $deValor/12.0;
                return $conversao;
                break;
            
            case "polegadas":
                return $deValor;
                break;
            
            case "quilômetro":
                $conversao = $deValor/39370.079;
                return $conversao;
                break;

            case "metros":
                $conversao = $deValor/39.37;
                return $conversao;
                break;
            
            case "centímetros":
                $conversao = 2.54*$deValor;
                return $conversao;
                break;

            case "milímetros":
                $conversao = 25.4*$deValor;
                return $conversao;
                break;
            
            default:
            break;
        }
    }
    
    public function quilometro($para, $deValor){
        switch ($para) {

            case "milhas":
                $conversao = $deValor/1.609;
                return $conversao;
                break;
            
            case "pés":
                $conversao = 3280.84*$deValor;
                return $conversao;
                break;
            
            case "polegadas":
                $conversao = 39370.079*$deValor;
                return $conversao;
                break;
            
            case "quilômetros":
                return $deValor;
                break;

            case "metros":
                $conversao = 1000*$deValor;
                return $conversao;
                break;
            
            case "centímetros":
                $conversao = 100000*$deValor;
                return $conversao;
                break;

            case "milímetros":
                $conversao = 1000000*$deValor;
                return $conversao;
                break;
            
            default:
            break;
        }
    }

    
    public function metro($para, $deValor){
        switch ($para) {

            case "milhas":
                $conversao = $deValor/1609.344;
                return $conversao;
                break;
            
            case "pés":
                $conversao = 3.281*$deValor;
                return $conversao;
                break;
            
            case "polegadas":
                $conversao = 39.37*$deValor;
                return $conversao;
                break;
            
            case "quilômetros":
                $conversao = $deValor/1000.0;
                return $conversao;
                break;

            case "metros":
                return $deValor;
                break;
            
            case "centímetros":
                $conversao = 100*$deValor;
                return $conversao;
                break;

            case "milímetros":
                $conversao = 1000*$deValor;
                return $conversao;
                break;
            
            default:
            break;
        }
    }


    public function centimetro($para, $deValor){
        switch ($para) {

            case "milhas":
                $conversao = $deValor/160934.4;
                return $conversao;
                break;
            
            case "pés":
                $conversao = $deValor/30.48;
                return $conversao;
                break;
            
            case "polegadas":
                $conversao = $deValor/2.54;
                return $conversao;
                break;
            
            case "quilômetros":
                $conversao = $deValor/100000.0;
                return $conversao;
                break;

            case "metros":
                $conversao = $deValor/100.0;
                return $conversao;
                break;
            
            case "centímetros":
                return $deValor;
                break;

            case "milímetros":
                $conversao = 10*$deValor;
                return $conversao;
                break;
            
            default:
            break;
        }
    }

    public function milimetro($para, $deValor){
        switch ($para) {

            case "milhas":
                $conversao = $deValor/0.000001609;
                return $conversao;
                break;
            
            case "pés":
                $conversao = $deValor/304.8;
                return $conversao;
                break;
            
            case "polegadas":
                $conversao = $deValor/25.4;
                return $conversao;
                break;
            
            case "quilômetros":
                $conversao = $deValor/1000000.0;
                return $conversao;
                break;

            case "metros":
                $conversao = $deValor/1000.0;
                return $conversao;
                break;
            
            case "centímetros":
                $conversao = $deValor/10.0;
                return $conversao;
                break;

            case "milímetros":
                return $deValor;
                break;
            
            default:
            break;
        }
    }

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