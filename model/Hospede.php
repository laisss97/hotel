<?php

class Hospede {

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

    public function __construct(string $id="", string $nome, string $email, string $telefone, 
                                string $dataNascimento, string $cpf, string $rua, string $numeroCasa, 
                                string $bairro, string $cep, string $senha) {

        $this->id = $id;
        $this->nome = $nome;
		$this->email = $email;
        $this->telefone = $telefone;
        $this->dataNascimento = $dataNascimento;
        $this->cpf = $cpf;
        $this->rua = $rua;
        $this->numeroCasa = $numeroCasa;
        $this->bairro = $bairro;
        $this->cep = $cep;
        $this->senha = $senha;
        
    }

    /**
     * Retorna o id do contato. A declaração do método está usando o tipo de retorno.
     * @return id - string
     */
    public function getId(): string {
        return $this->id;
    }

    public function getNome(): string{
        return $this->nome;
    } 

    public function getEmail(): string{
        return $this->email;
    }

    public function getTelefone(): string{
        return $this->telefone;
    }

    public function getDataNascimento(): string{
        return $this->dataNascimento;
    }

    public function getCpf(): string{
        return $this->cpf;
    }

    public function getRua(): string{
        return $this->rua;
    }

    public function getNumeroCasa(): string{
        return $this->numeroCasa;
    }

    public function getBairro(): string{
        return $this->bairro;
    }

    public function getCep(): string{
        return $this->cep;
    }

    public function getSenha(): string{
        return $this->senha;
    }

    // set
    
    public function setNome(string $nome) {
        $this->nome = $nome;
    }

    public function setEmail(string $email) {
        $this->email = $email;
    }

    public function setTelefone(string $telefone) {
        $this->telefone = $telefone;
    }

    public function setDataNascimento(string $dataNascimento) {
        $this->dataNascimento = $dataNascimento;
    }

    public function setCpf(string $cpf) {
        $this->cpf = $cpf;
    }

    public function setRua(string $rua) {
        $this->rua = $rua;
    }

    public function setNumeroCasa(string $numeroCasa) {
        $this->numeroCasa = $numeroCasa;
    }

    public function setBairro(string $bairro) {
        $this->bairro = $bairro;
    }

    public function setCep($cep) {
        $this->cep = $cep;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }
}

?>
