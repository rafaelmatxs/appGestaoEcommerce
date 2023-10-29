<?php 

namespace App\Controllers;

use App\Models\Usuario;
use MF\Controller\Action;
use MF\Model\Container;

class AuthController extends Action {

    public function autenticar() {

        $usuario = Container::getModel('Usuario');

        $usuario->__set('email', $_POST['email']);
        $usuario->__set('senha', md5($_POST['senha']));

        $retorno = $usuario->autenticar();
        
        if($usuario->__get('id') != '' && $usuario->__get('nome')) {
            
            session_start();

            $_SESSION['id'] = $usuario->__get('id');
            $_SESSION['nome'] = $usuario->__get('nome');

            header('Location: /dashboard');
        } else {
            header('Location: /?login=erro');
        }
    }

}

?>