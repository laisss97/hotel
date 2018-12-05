<?php

/*
* Trabalho realizado para a disciplina de Programação para Web da Faculdade de
* Computação da Universidade Federal de Mato Grosso do Sul (FACOM / UFMS).
* Trata-se de um sistema de reservas de um hotel específico.
*
*
*
* Classe Hospede - Classe que trata os dados pessoais do hóspede
*
* @author Isadora Ajala Martinez
* @author Laís Santos de Souza
*
*
* @version 6.0 - 05/Dez/2018
*/

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
     * Retorna o id do hóspede. A declaração do método está usando o tipo de retorno.
     * @return id - string
     */
    public function getId(): string {
        return $this->id;
    }

    /**
     * Retorna o nome do hóspede. A declaração do método está usando o tipo de retorno.
     * @return nome - string
     */
    public function getNome(): string{
        return $this->nome;
    } 

    /**
     * Retorna o email do hóspede. A declaração do método está usando o tipo de retorno.
     * @return email - string
     */
    public function getEmail(): string{
        return $this->email;
    }

    /**
     * Retorna o telefone do hóspede. A declaração do método está usando o tipo de retorno.
     * @return telefone - string
     */
    public function getTelefone(): string{
        return $this->telefone;
    }

    /**
     * Retorna a data de nascimento do hóspede. A declaração do método está usando o tipo de retorno.
     * @return data de nascimento - string
     */
    public function getDataNascimento(): string{
        return $this->dataNascimento;
    }

    /**
     * Retorna o CPF do hóspede. A declaração do método está usando o tipo de retorno.
     * @return CPF - string
     */
    public function getCpf(): string{
        return $this->cpf;
    }


    /**
     * Retorna a rua do hóspede. A declaração do método está usando o tipo de retorno.
     * @return rua - string
     */
    public function getRua(): string{
        return $this->rua;
    }

    /**
     * Retorna o número da casa do hóspede. A declaração do método está usando o tipo de retorno.
     * @return número da casa - string
     */
    public function getNumeroCasa(): string{
        return $this->numeroCasa;
    }

    /**
     * Retorna o bairro do hóspede. A declaração do método está usando o tipo de retorno.
     * @return bairro - string
     */
    public function getBairro(): string{
        return $this->bairro;
    }

    /**
     * Retorna a CEP do hóspede. A declaração do método está usando o tipo de retorno.
     * @return cep - string
     */
    public function getCep(): string{
        return $this->cep;
    }

    /**
     * Retorna a senha do hóspede. A declaração do método está usando o tipo de retorno.
     * @return senha - string
     */

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
