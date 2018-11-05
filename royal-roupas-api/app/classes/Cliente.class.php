<?php

namespace app\classes;

class Cliente
{
    private $idCliente;
    private $nome;
    private $cpf;
    private $telefone;  
    private $endereco;
    private $email;

    public function __construct($argsDB = null)
    {
        if ( !is_null($argsDB) ) {
            $this->idCliente = (isset($argsDB["idCliente"])) ? $argsDB["idCliente"] : null ;
            $this->nome = $argsDB["nome"];
            $this->cpf = $argsDB["cpf"];
            $this->telefone = $argsDB["telefone"];
            $this->endereco = $argsDB["endereco"];
            $this->email = $argsDB["email"];
        }
    }

    function getIdCliente() {
        return $this->idCliente;
    }

    function setIdCliente( $idCliente ) {
        $this->idCliente = $idCliente;
    }

    function getNome() {
        return $this->nome;
    }

    function setNome( $nome ) {
        $this->nome = $nome;
    }

    function getCpf() {
        return $this->cpf;
    }

    function setCpf( $cpf ) {
        $this->cpf = $cpf;
        }

    function getTelefone() {
        return $this->telefone;
    }

    function setTelefone( $telefone ) {
        $this->telefone = $telefone;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function setEndereco( $endereco ) {
        $this->endereco = $endereco;
    }

    function getEmail() {
        return $this->email;
    }

    function setEmail( $email ) {
        $this->email = $email;
    }
    
    function __toString() {
        return json_encode( array( 'idCliente' => $this->idCliente,
                        'nome' => $this->nome,
                        'cpf' => $this->cpf,
                        'telefone' => $this->telefone,
                        'endereco' => $this->endereco,
                        'email' => $this->email) );
    }

    public function jsonSerialize()
    {
        return array(
            'idCliente' => $this->idCliente,
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'telefone' => $this->telefone,
            'endereco' => $this->endereco,
            'email' => $this->email
        );
    }

}