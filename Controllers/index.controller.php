<?php
	
namespace LetApps\Usuario\Controllers;
class Index_Controller
{
	public function start()
	{		

		/*$sTabla = DbTable("usuarios");
		$sQuery = "CREATE TABLE IF NOT EXISTS {$sTabla}(
			usuario_id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
			usuario_nombre VARCHAR(50) NOT NULL,
			usuario_correo_electronico CHAR(100) NOT NULL,
			usuario_password CHAR(75) NOT NULL,
			usuario_pais CHAR(2) NOT NULL,
			usuario_fecha INTEGER(10) NOT NULL
		)";
		echo Db()->query($sQuery);*/
		$oHttp = Http();
		$oModelUsuarios = Model('usuario.usuarios');
		
		$sSection = $oHttp->getParam('param2');
		
		
		if($oModelUsuarios->estaLogueado())
		{
			return  App()->setController('usuario.perfil');
		}
		
		/*
		// Recibir los datos del formulario de registro
		if((isset($_POST['form-registrar'])) && ($_POST['form-registrar'] == 1) )
		{
			// Recibiremos los datos
			$sNombre = $oHttp->getParam('nombre');
			$sEmail = $oHttp->getParam('email');
			$sPassword = $oHttp->getParam('password');
			$sPais = $oHttp->getParam('pais');
			
			$iUsuarioId = $oModelUsuarios->agregarUsuario($sNombre, $sEmail, $sPassword, $sPais);
			if($iUsuarioId > 0)
			{
				Router()->goToPage('usuario.login');
			}
		}*/
		
		// Recibir Formulario Login
		/*if((isset($_POST['form-login'])) && ($_POST['form-login'] == 1) )
		{
			$sEmail = $oHttp->getParam('email');
			$sPassword = $oHttp->getParam('password');
			
			if($oModelUsuarios->loginUsuario($sEmail, $sPassword))
			{
				Router()->goToPage('');
			}
			
		}*/
		
		///echo 'Id de sesion -> '. Auth()->getSession('id');
		
		$aPaises = [
			['id' => 'MX', 'texto' => 'México'],
			['id' => 'CO', 'texto' => 'Colombia'],
			['id' => 'AR', 'texto' => 'Argentina'],
			['id' => 'PE', 'texto' => 'Perú'],
			['id' => 'VE', 'texto' => 'Venezuela'],
		];
		
		$aCss = ['proyecto.css' => 'app@usuario'];	
		if(Config('main.site_theme') == 'bulma' )
		{
			$aCss = [
				'<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css">'
			];
		}
		
		$sImageUser = Router()->getDomain(). 'LetApps/usuario/Public/image/user.png';
		$aMeta = [
			'viewport' => 'width=device-width, initial-scale=1.0',
			'author' => 'Rodrigo Hernández Ortiz',
			'keywords' => 'videos, letphp, roni, letcode, letphp, tutorial, proyectos, app, usuario, login, registro',
			'description' => "Usuario: es una App creada con LetPHP donde el Usuario puede crear una cuenta e iniciar sesión para ingresar a su perfil.",
			'og:title' => 'App de Usuario: App creada con LetPHP para registro de usuarios',
			'og:description' => "App de Usuario: es una App creada con LetPHP donde el Usuario puede crear una cuenta e iniciar sesión para ingresar a su perfil.",
			'og:type' => 'article',
			'og:url' => Router()->getDomain(),
			'og:image' => $sImageUser,
			'og:image:alt' => 'Login y Registro de Usuarios',
			'twitter:card' => 'summary',
			'twitter:site' => '@letphp',
			'twitter:creator' => '@RoniRHO',
			'twitter:image' => $sImageUser
		];
		
		
		View()
		->setMeta($aMeta)
		->setTitle('App de Usuario')
		->setCss($aCss)
		->setJScript([
			'<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>',
			'<script src="https://unpkg.com/jam-icons/js/jam.min.js"></script>',
			'letphp.js' => 'site',
			'ajax.js' => 'site'
		])
		->setValues([
			'aPaises' => $aPaises,
			'sSection' => $sSection
		]);
		
	}
	
}	