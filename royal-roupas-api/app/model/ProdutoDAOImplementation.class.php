<?php

namespace app\model;

use app\classes\Produto;
use app\model\ProdutoDAOInterface;
use app\model\ConexaoDB;

class ProdutoDAOImplementation implements ProdutoDAOInterface
{

    public function getAllProdutos()
    {
        $connDB = new ConexaoDB();
        $stmt = $connDB->con->prepare("SELECT * FROM tbl_produtos");
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $arrayProdutos = null;
        if ( $stmt->rowCount() > 0 ) {
            $arrayProdutos = array();
            foreach ($result as $row) {
                $produtoTemp = new Produto ( $row );
                array_push($arrayProdutos, $produtoTemp);
            }            
        };
        return $arrayProdutos;
    }

    public function getProdutoById ( $idProduto )
    {
        $connDB = new ConexaoDB();
        $stmt = $connDB->con->prepare("SELECT * FROM tbl_produtos where id = :ID");
        $stmt->bindParam(":ID", $idProduto);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $produtoTemp = null;
        if ( $stmt->rowCount() > 0 ) {
            $produtoTemp = new Produto( $result[0] );
        };

        return $produtoTemp;
    }

    public function getProdutoByName ( $nome )
    {
        $connDB = new ConexaoDB();
        $stmt = $connDB->con->prepare("SELECT * FROM tbl_produtos where nome = :NOME");
        $stmt->bindParam(":NOME", $nome);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $produtoTemp = null;
        if ( $stmt->rowCount() > 0 ) {
            $produtoTemp = new Produto( $result[0] );
        };
        return $produtoTemp;
    }

    public function createProduto( Produto $produtoInstancia )
    {
        $connDB = new ConexaoDB();
        $stmt = $connDB->con->prepare("INSERT INTO tbl_produtos (nome, marca, tamanho, descricao, preco) VALUES (:NOME, :MARCA, :TAMANHO, :DESCRICAO, :PRECO)");

        $stmt->bindParam(":NOME", $nome);
        $stmt->bindParam(":MARCA", $marca);
        $stmt->bindParam(":TAMANHO", $tamanho);
        $stmt->bindParam(":DESCRICAO", $descricao);
        $stmt->bindParam(":PRECO", $preco);        

        $nome = $produtoInstancia->getNome();
        $marca = $produtoInstancia->getMarca();
        $tamanho = $produtoInstancia->getTamanho();
        $descricao = $produtoInstancia->getDescricao();
        $preco = $produtoInstancia->getPreco();        
        $stmt->execute();
    }
    // ":bool porque retorna um boolean, true no caso de sucesso e false caso não haja tal id
    public function deleteProdutoById( $idProduto ):bool
    {
        $connDB = new ConexaoDB();
        $stmt = $connDB->con->prepare("DELETE FROM tbl_produtos where id_produto = :ID");
        $stmt->bindParam(":ID", $idProduto);

        $stmt->execute();
        return ( $stmt->rowCount() >= 1 );

    }
    // ":bool porque retorna um boolean, true no caso de sucesso e false caso não haja tal id
    public function updateProdutoById( $idProduto, Produto $produtoInstancia ):bool
    {
        $connDB = new ConexaoDB();
        $stmt = $connDB->con->prepare("UPDATE tbl_produtos SET nome = :NOME, marca = :MARCA, tamanho = :TAMANHO, descricao =:DESCRICAO, preco =:PRECO
                                    WHERE id_produto = $idProduto");

        $stmt->bindParam(":NOME", $nome);
        $stmt->bindParam(":MARCA", $marca);
        $stmt->bindParam(":TAMANHO", $tamanho);
        $stmt->bindParam(":DESCRICAO", $descricao);
        $stmt->bindParam(":PRECO", $preco); 

        $nome = $produtoInstancia->getNome();
        $marca = $produtoInstancia->getMarca();
        $tamanho = $produtoInstancia->getTamanho();
        $descricao = $produtoInstancia->getDescricao();
        $preco = $produtoInstancia->getPreco();        
        $stmt->execute();
        
        return ( $stmt->rowCount() >= 1 );        
    }
}