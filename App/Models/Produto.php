<?php

namespace App\Models;

use MF\Model\Model;

class Produto extends Model {

    private $id;
    private $nome;
    private $marca;
    private $categoria;
    private $quantidade;
    private $numero_de_serie;
    private $numero_da_nota_fiscal;
    private $custo_do_produto;
    private $preco_do_produto;
    private $descricao;

    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }

    //salvar novo produto
    public function salvar() {
        
        $query = "
            insert into 
                produtos(
                    nome,
                    marca, 
                    categoria, 
                    quantidade, 
                    numero_de_serie, 
                    numero_da_nota_fiscal, 
                    custo_do_produto, 
                    preco_do_produto, 
                    descricao
                    )
                values(
                    :nome, 
                    :marca, 
                    :categoria, 
                    :quantidade, 
                    :numero_de_serie, 
                    :numero_da_nota_fiscal, 
                    :custo_do_produto, 
                    :preco_do_produto, 
                    :descricao
                )";
                
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nome', $this->__get('nome'));
        $stmt->bindValue(':marca', $this->__get('marca'));
        $stmt->bindValue(':categoria', $this->__get('categoria'));
        $stmt->bindValue(':quantidade', $this->__get('quantidade'));
        $stmt->bindValue(':numero_de_serie', $this->__get('numero_de_serie'));
        $stmt->bindValue(':numero_da_nota_fiscal', $this->__get('numero_da_nota_fiscal'));
        $stmt->bindValue(':custo_do_produto', $this->__get('custo_do_produto'));
        $stmt->bindValue(':preco_do_produto', $this->__get('preco_do_produto'));
        $stmt->bindValue(':descricao', $this->__get('descricao'));
        $stmt->execute();

        return $this;
    }

    //função que recuperar informações dos produtos
    public function getAll() {

        $query = "
            select
                id,
                nome,
                marca,
                categoria,
                quantidade,
                numero_de_serie,
                numero_da_nota_fiscal,
                custo_do_produto,
                preco_do_produto,
                descricao
            from
                produtos
            order by
                id asc
        ";

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getPorPagina($limit, $offset) {

        $query = "
            select
                id,
                nome,
                marca,
                categoria,
                quantidade,
                numero_de_serie,
                numero_da_nota_fiscal,
                custo_do_produto,
                preco_do_produto,
                descricao
            from
                produtos
            order by
                id asc
            limit
                $limit
            offset
                $offset
        ";

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function getTotalRegistros() {

        $query = "
            select
                count (id) as total
            from                
                produtos
            where
                id = :id
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->__get('id'));
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);

    }

        /*
        $stmt->bindValue(':id', $_POST['id']);
        $stmt->bindValue('nome', $_POST['nome']);
        $stmt->bindValue('marca', $_POST['marca']);
        $stmt->bindValue('categoria', $_POST['categoria']);
        $stmt->bindValue('quantidade', $_POST['quantidade']);
        $stmt->bindValue('numero_de_serie', $_POST['numero_de_serie']);
        $stmt->bindValue('numero_da_nota_fiscal', $_POST['numero_da_nota_fiscal']);
        $stmt->bindValue('custo_do_produto', $_POST['custo_do_produto']);
        $stmt->bindValue('preco_do_produto', $_POST['preco_do_produto']);
        $stmt->bindValue('descricao', $_POST['descricao']);
        */

}
