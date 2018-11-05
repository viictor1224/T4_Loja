<?php

class Pedido
{
    private $idPedido;
    private $idCliente;
    private $idProduto;
    private $preco;
    private $endereco;
    private $data;

    function getIdPedido(){
        return $this->idPedido;
    }

    function setIdPedido( $idPedido ){
        $this->idPedido = $idPedido;
    }

    function getIdCliente(){
        return $this->idCliente;
    }

    function setIdCliente( $idCliente ) {
        $this->idCliente = $idCliente;
    }

    function getIdProduto() {
        return $this->idProduto;
    }

    function setIdProduto( $idProduto ) {
        $this->idProduto = $idProduto;
    }

    function getPreco() {
        return $this->preco;
    }

    function setPreco( $preco ) {
        $this->preco = $preco;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function setEndereco( $endereco ){
        $this->endereco = $endereco;
    }

    function getData(){
        return $this->data;
    }

    function setData( $data ){
        $this->data = $data;
    }
}