<?php
	
namespace LetApps\Usuario\Fragments;
class Registro_Fragment
{
	public function start()
	{
		$oHttp = Http();
		$oModelUsuarios = Model('usuario.usuarios');
		
		
		// Recibir los datos del formulario de registro
		if((isset($_POST['form-registrar'])) && ($_POST['form-registrar'] == 1) )
		{
			// Recibiremos los datos
			$sNombre = $oHttp->getParam('nombre');
			$sEmail = $oHttp->getParam('email');
			$sPassword = $oHttp->getParam('password');
			$sPais = $oHttp->getParam('pais');
			
			$oModelErrores = Model('usuario.errores');
			
			$aErrores = [];
			
			$aErroresNombre = $oModelErrores->estaVacio($sNombre, '<b>Nombre</b>');
			$aErrores = array_merge($aErrores, $aErroresNombre);
			 
			$aErroresEmail = $oModelErrores->estaVacio($sEmail, '<b>Email</b>');
			$aErroresEmailExiste = $oModelErrores->existeEmail($sEmail);
			$aErrores = array_merge($aErrores, $aErroresEmail, $aErroresEmailExiste);
			
			$aErroresPassword = $oModelErrores->estaVacio($sPassword, '<b>Contraseña</b>'); 
			$aErrores = array_merge($aErrores, $aErroresPassword);
			
			
			
			if(count($aErrores))
			{
				View()
				->setValues([
					'aErrores' => $aErrores,
					'sNombre' => $sNombre,
					'sEmail' => $sEmail,
					'sPais' => $sPais,
					'bErrores' => true
				]);
			}
			else 
			{
				$iUsuarioId = $oModelUsuarios
				->agregarUsuario($sNombre, $sEmail, $sPassword, $sPais);
				if($iUsuarioId > 0)
				{
					Router()->goToPage('usuario.login');
				}
				
			}
			
			
		}
	}
}	