<?php

namespace App\Controllers;

//os recursos do framework
use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action {

    public function dashboard() {
        $this->validaAutenticacao();      
        

        $produto = Container::getModel('Produto');
        $produtos = $produto->getAll();

        $this->view->produtos = $produtos;

        $usuario = Container::getModel('Usuario');
        $usuario->__set('id', $_SESSION['id']);

        $this->render('dashboard');
    }

    public function validaAutenticacao() {

        session_start();

        if(!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == '') {
            header('Location: /?login=erro');
        }

    }

    public function adicionarProduto() {

        $produto = Container::getModel('Produto');

        $produto->__set('nome', $_POST['nome']);
        $produto->__set('marca', $_POST['marca']);
        $produto->__set('categoria', $_POST['categoria']);
        $produto->__set('quantidade', $_POST['quantidade']);
        $produto->__set('numero_de_serie', $_POST['numero_de_serie']);
        $produto->__set('numero_da_nota_fiscal', $_POST['numero_da_nota_fiscal']);
        $produto->__set('custo_do_produto', $_POST['custo_do_produto']);
        $produto->__set('preco_do_produto', $_POST['preco_do_produto']);
        $produto->__set('descricao', $_POST['descricao']);

        $produto->salvar();

        header('Location: /produtos');

    }

    public function produtos() {
        $this->validaAutenticacao();

        $produto = Container::getModel('Produto');
        $produtos = $produto->getAll();

        $this->view->produtos = $produtos;

        $this->render('produtos');
    }

}

?>