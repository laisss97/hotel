<?php

class InfoReserva {

    private  $id;

    private  $emailHospede;

	private  $dataEntrada;
    private  $dataSaida;

    private  $nQuartoSimple;
    private  $nQuartoLux;
    private  $nQuartoLuxMaster;
    private  $nQuartoLuxImperial;

























    //pagamento

    public function __construct(string $id="", string $emailHospede, string $dataEntrada, 
                                string $dataSaida, string $nQuartoSimple, string $nQuartoLux, 
                                string $nQuartoLuxMaster, string $nQuartoLuxImperial) {

        $this->id = $id;
        $this->emailHospede = $emailHospede;
		$this->dataEntrada = $dataEntrada;
        $this->dataSaida = $dataSaida;
        $this->nQuartoSimple = $nQuartoSimple;
        $this->nQuartoLux = $nQuartoLux;
        $this->nQuartoLuxMaster = $nQuartoLuxMaster;
        $this->nQuartoLuxImperial = $nQuartoLuxImperial;
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
    
}

?>
