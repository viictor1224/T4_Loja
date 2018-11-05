<?php

namespace app\model;

use app\classes\Pedido;

Interface PedidoDAOInterface {

    public function getAllPedidos( );

    public function getPedidoById( $idPedido );

    public function getPedidoByIdCliente( $idCliente );

    public function getPedidoByIdProduto( $idProduto );

    public function createPedido( Pedido $pedidoInstancia );

    public function deletePedidoById( $idPedido );

    public function updatePedidoById( $idPedido, Pedido $pedidoInstancia );

}