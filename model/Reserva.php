<?php

class Reserva {

    private  $id;
    private  $emailHospede;

	private  $dataEntrada;
    private  $dataSaida;

    private  $nQuartoSimple;
    private  $nQuartoLux;
    private  $nQuartoLuxMaster;
    private  $nQuartoLuxImperial;

    //pagamento
    private $cartao;
    private $numCartao;
    private $nomeCartao;
    private $validade;
    private $codSeguranca;
    private $parcelas;


    public function __construct(string $id="", string $emailHospede, string $dataEntrada, 
                                string $dataSaida, string $nQuartoSimple, string $nQuartoLux, 
                                string $nQuartoLuxMaster, string $nQuartoLuxImperial, 
                                string $cartao, string $numCartao, string $nomeCartao,
                                string $validade, string $codSeguranca, string $parcelas) {

        $this->id = $id;
        $this->emailHospede = $emailHospede;

		$this->dataEntrada = $dataEntrada;
        $this->dataSaida = $dataSaida;

        $this->nQuartoSimple = $nQuartoSimple;
        $this->nQuartoLux = $nQuartoLux;
        $this->nQuartoLuxMaster = $nQuartoLuxMaster;
        $this->nQuartoLuxImperial = $nQuartoLuxImperial;

        $this->cartao = $cartao;
        $this->numCartao = $numCartao;
        $this->nomeCartao = $nomeCartao;
        $this->validade = $validade;
        $this->codSeguranca = $codSeguranca;
        $this->parcelas = $parcelas;
    }

    /**
     * Retorna o id do contato. A declaração do método está usando o tipo de retorno.
     * @return id - string
     */
    public function getId(): string {
        return $this->id;
    }

    public function getEmailHospede(): string{
        return $this->emailHospede;
    } 

    public function getDataEntrada(): string{
        return $this->dataEntrada;
    }

    public function getDataSaida(): string{
        return $this->dataSaida;
    }

    public function getNQuartoSimple(): string{
        return $this->nQuartoSimple;
    }

    public function getNQuartoLux(): string{
        return $this->nQuartoLux;
    }

    public function getNQuartoLuxMaster(): string{
        return $this->nQuartoLuxMaster;
    }

    public function getNQuartoLuxImperial(): string{
        return $this->nQuartoLuxImperial;
    }

    public function getCartao(): string{
        return $this->cartao;
    }    

    public function getNumCartao(): string{
        return $this->numCartao;
    }    

    public function getNomeCartao(): string{
        return $this->nomeCartao;
    }  

    public function getValidade(): string{
        return $this->validade;
    }    

    public function getCodSeguranca(): string{
        return $this->codSeguranca;
    }    

    public function getParcelas(): string{
        return $this->parcelas;
    }    

    // set
    
    public function setEmailHospede(string $emailHospede) {
        $this->emailHospede = $emailHospede;
    }


    public function setDataEntrada(string $dataEntrada) {
        $this->dataEntrada = $dataEntrada;
    }

    public function setDataSaida(string $dataSaida) {
        $this->dataSaida = $dataSaida;
    }


    public function setNQuartoSimple(string $nQuartoSimple) {
        $this->nQuartoSimple = $nQuartoSimple;
    }

    public function setNQuartoLux(string $nQuartoLux) {
        $this->nQuartoLux = $nQuartoLux;
    }

    public function setNQuartoLuxMaster(string $nQuartoLuxMaster) {
        $this->nQuartoLuxMaster = $nQuartoLuxMaster;
    }

    public function setNQuartoLuxImperial(string $nQuartoLuxImperial) {
        $this->nQuartoLuxImperial = $nQuartoLuxImperial;
    }

    public function setCartao(string $cartao){
        $this->cartao = $cartao;
    }    

    public function setNumCartao(string $numCartao){
        $this->numCartao = $numCartao;
    }    

    public function setNomeCartao(string $nomeCartao){
        $this->nomeCartao = $nomeCartao;
    }  

    public function setValidade(string $validade){
        $this->validade = $validade;
    }    

    public function setCodSeguranca(string $codSeguranca){
        $this->codSeguranca = $codSeguranca;
    }    

    public function setParcelas(string $parcelas){
        $this->parcelas = $parcelas;
    }
    
}

?>
