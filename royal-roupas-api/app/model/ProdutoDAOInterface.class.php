<?php

namespace app\model;

use app\classes\Produto;

Interface ProdutoDAOInterface {

    public function getAllProdutos( );

    public function getProdutoByName( string $nome );

    public function getProdutoById( $idProduto );

    public function createProduto( Produto $produtoInstancia );

    public function deleteProdutoById( $idProduto );

    public function updateProdutoById( $idProduto, Produto $produtoInstancia );
}