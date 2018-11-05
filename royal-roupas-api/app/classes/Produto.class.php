<?php

namespace app\classes;

class Produto implements \JsonSerializable
{
    private $idProduto;
    private $nome;
    private $marca;
    private $tamanho;
    private $descricao;
    private $preco;

    function __construct( $argsDB = null )
    {
        if ( !is_null($argsDB) ) {
            $this->idProduto = (isset($argsDB["id_produto"])) ? $argsDB["id_produto"] : null ;
            $this->nome = $argsDB["nome"];
            $this->marca = $argsDB["marca"];
            $this->tamanho = $argsDB["tamanho"];
            $this->descricao = $argsDB["descricao"];
            $this->preco = $argsDB["preco"];
        }
    }

    public function getIdProduto() {
        return $this->idProduto;
    }

    public function setIdProduto( $idProduto ) {
        $this->idProduto = $idProduto;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome( $nome ) {
        $this->nome = $nome;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function setMarca( $marca ) {
        $this->marca = $marca;
    }

    public function getTamanho() {
        return $this->tamanho;
    }

    public function setTamanho( $tamanho ) {
        $this->tamanho = $tamanho;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao( $descricao ) {
        $this->descricao = $descricao;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function setPreco( $preco ) {
        $this->preco = $preco;
    }

    function __toString() {
        return json_encode( array( 'idproduto' => $this->idProduto,
                        'nome' => $this->nome,
                        'marca' => $this->marca,
                        'tamanho' => $this->tamanho,
                        'descricao' => $this->descricao,
                        'preco' => $this->preco);
    }

    public function jsonSerialize()
    {
        return array( 'idproduto' => $this->idProduto,
                        'nome' => $this->nome,
                        'marca' => $this->marca,
                        'tamanho' => $this->tamanho,
                        'descricao' => $this->descricao,
                        'preco' => $this->preco);
    }


}