<?php
	
namespace LetApps\Usuario\Controllers;
class Perfil_Controller
{
	public function start()
	{
		
		$oModelUsuarios = Model('usuario.usuarios');
		
		// Si no esta logueado
		if(!$oModelUsuarios->estaLogueado())
		{ 
			Router()->goToPage('');
		}
		
		if(Http()->getParam('param2') == 'cerrar' )
		{
			Auth()->removeSession('id');
			Router()->goToPage('usuario.login');
		}
		
		$aUsuario = $oModelUsuarios->getUsuarioInfo();
		
		//d($aUsuario);
		
		View()
		->setCss([
			'proyecto.css' => 'app@usuario',
			'<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css">'
		])
		->setValues([
			'sNombre' => $aUsuario['usuario_nombre'],
			'sEmail' => $aUsuario['usuario_correo_electronico'],
			'sPais' => $aUsuario['usuario_pais']
		]);
		
		
	}
}	
	