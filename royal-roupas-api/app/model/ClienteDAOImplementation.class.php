<?php

namespace app\model;

use app\classes\Cliente;
use app\model\ClienteDAOInterface;
use app\model\ConexaoDB;

class ClienteDAOImplementation implements ClienteDAOInterface
{

    public function getAllClientes()
    {
        $connDB = new ConexaoDB();
        $stmt = $connDB->con->prepare("SELECT * FROM tbl_clientes");
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $arrayClientes = null;
        if ( $stmt->rowCount() > 0 ) {
            $arrayClientes = array();
            foreach ($result as $row) {
                $clienteTemp = new Cliente ( $row );
                array_push($arrayClientes, $clienteTemp);
            }            
        };

        return $arrayClientes;
    }

    public function getClienteById ( $idCliente )
    {
        $connDB = new ConexaoDB();
        $stmt = $connDB->con->prepare("SELECT * FROM tbl_clientes where id = :ID");
        $stmt->bindParam(":ID", $idCliente);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $clienteTemp = null;
        if ( $stmt->rowCount() > 0 ) {
            $clienteTemp = new Cliente( $result[0] );
        };

        return $clienteTemp;
    }

    public function getClienteByName ( $nome )
    {
        $connDB = new ConexaoDB();
        $stmt = $connDB->con->prepare("SELECT * FROM tbl_clientes where nome = :NOME");
        $stmt->bindParam(":NOME", $nome);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $clienteTemp = null;
        if ( $stmt->rowCount() > 0 ) {
            $clienteTemp = new Cliente( $result[0] );
        };

        return $clienteTemp;
    }

    public function createCliente( Cliente $clienteInstancia )
    {
        $connDB = new ConexaoDB();
        $stmt = $connDB->con->prepare("INSERT INTO tbl_clientes (nome, cpf, telefone, endereco, email) VALUES (:NOME, :CPF, :TELEFONE, :ENDERECO, :EMAIL)");

        $stmt->bindParam(":NOME", $nome);
        $stmt->bindParam(":CPF", $cpf);
        $stmt->bindParam(":TELEFONE", $telefone);
        $stmt->bindParam(":ENDERECO", $endereco);
        $stmt->bindParam(":EMAIL", $email);        

        $nome = $clienteInstancia->getNome();
        $cpf = $clienteInstancia->getCpf();
        $telefone = $clienteInstancia->getTelefone();
        $endereco = $clienteInstancia->getEndereco();
        $email = $clienteInstancia->getEmail();        
        $stmt->execute();
    }
    // ":bool porque retorna um boolean, true no caso de sucesso e false caso não haja tal id
    public function deleteClienteById( $idCliente ):bool
    {
        $connDB = new ConexaoDB();
        $stmt = $connDB->con->prepare("DELETE FROM tbl_clientes where id_cliente = :ID");
        $stmt->bindParam(":ID", $idCliente);

        $stmt->execute();
        return ( $stmt->rowCount() >= 1 );

    }
    // ":bool porque retorna um boolean, true no caso de sucesso e false caso não haja tal id
    public function updateClienteById( $idCliente, Cliente $clienteInstancia ):bool
    {
        $connDB = new ConexaoDB();
        $stmt = $connDB->con->prepare("UPDATE tbl_clientes SET nome = :NOME, cpf = :CPF, telefone = :TELEFONE, endereco =:ENDERECO, email =:EMAIL
                                    WHERE id_cliente = $idCliente");

        $stmt->bindParam(":NOME", $nome);
        $stmt->bindParam(":CPF", $cpf);
        $stmt->bindParam(":TELEFONE", $telefone);
        $stmt->bindParam(":ENDERECO", $endereco);
        $stmt->bindParam(":EMAIL", $email); 

        $nome = $clienteInstancia->getNome();
        $cpf = $clienteInstancia->getCpf();
        $telefone = $clienteInstancia->getTelefone();
        $endereco = $clienteInstancia->getEndereco();
        $email = $clienteInstancia->getEmail();        
        $stmt->execute();
        
        return ( $stmt->rowCount() >= 1 );        
    }
}