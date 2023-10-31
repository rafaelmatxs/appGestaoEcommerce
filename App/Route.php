<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap {

	protected function initRoutes() {

		$routes['home'] = array(
			'route' => '/',
			'controller' => 'indexController',
			'action' => 'index'
		);

		$routes['inscreverse'] = array(
			'route' => '/inscreverse',
			'controller' => 'indexController',
			'action' => 'inscreverse'
		);

		$routes['registrar'] = array(
			'route' => '/registrar',
			'controller' => 'indexController',
			'action' => 'registrar'
		);

		$routes['autenticar'] = array(
			'route' => '/autenticar',
			'controller' => 'AuthController',
			'action' => 'autenticar'
		);

		$routes['sair'] = array(
            'route' => '/sair',
            'controller' => 'AuthController',
            'action' => 'sair'
        );

		$routes['dashboard'] = array(
			'route' => '/dashboard',
			'controller' => 'AppController',
			'action' => 'dashboard'
		);

		$routes['adicionar_produto'] = array(
			'route' => '/adicionar_produto',
			'controller' => 'AppController',
			'action' => 'adicionarProduto'
		);

		$routes['produtos'] = array(
			'route' => '/produtos',
			'controller' => 'AppController',
			'action' => 'produtos'
		);

		/* demais rotas */
		$this->setRoutes($routes);
	}

}

?> 