<?php

namespace App\Controllers;

//os recursos do framework
use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action {

    public function dashboard() {
        $this->validaAutenticacao();                 

        $this->render('dashboard');
    }

    public function validaAutenticacao() {

        session_start();

        if(!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == '') {
            header('Location: /?login=erro');
        }

    }

}

?>