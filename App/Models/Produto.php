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

    //salva novo produto
    public function salvar() {
        
        $query = "insert into produtos(nome, marca, categoria, quantidade, numero_de_serie, numero_da_nota_fiscal, custo_do_produto, preco_do_produto, descricao)values(:nome, :marca, :categoria, :quantidade, :numero_de_serie, :numero_da_nota_fiscal, :custo_do_produto, :preco_do_produto, :descricao)";
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
}

?>