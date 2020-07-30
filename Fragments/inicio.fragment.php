<?php
	
namespace LetApps\Usuario\Fragments;

class Inicio_Fragment
{
	public function start()
	{
		
		$oHttp = Http();
		$oModelUsuarios = Model('usuario.usuarios');
		
		
		if((isset($_POST['form-login'])) && ($_POST['form-login'] == 1) )
		{
			$sEmail = $oHttp->getParam('email');
			$sPassword = $oHttp->getParam('password');
			
			if($oModelUsuarios->loginUsuario($sEmail, $sPassword))
			{
				Router()->goToPage('');
			}
			
		}
		
	}
}
