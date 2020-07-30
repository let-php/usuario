<?php
	
namespace LetApps\Usuario\Models;
class Usuarios_Model
{
	
	private $_aUsuario = [];
	public function __construct()
	{
		$this->getUsuario();
	}
	
	public function getUsuario()
	{
		$iUsuarioId = Auth()->getSession('id');
		
		if($iUsuarioId > 0)
		{
			$this->_aUsuario = Db()
			->select('*')
			->table(DbTable('usuarios'))
			->cond("usuario_id = ". $iUsuarioId)
			->run('singular');
			
			//d($this->_aUsuario);
		}

	}
	
	public function estaLogueado()
	{
		$iUsuarioId = $this->_aUsuario['usuario_id'];
		return ($iUsuarioId > 0)? true: false;
	}
	
	public function getUsuarioInfo()
	{
		return $this->_aUsuario;
	}
	
	
	public function agregarUsuario(string $sNombre, string $sEmail, string $sPassword, string $sPais)
	{
		$aInsertar = [
			'usuario_nombre' => $sNombre,
			'usuario_correo_electronico' => $sEmail,
			'usuario_password' => Auth()->encryptPassword($sPassword),
			'usuario_pais' => $sPais,
			'usuario_fecha' => LETPHP_TIME
		];
		return DbInsert('usuarios', $aInsertar);
	}
	
	public function loginUsuario(string $sEmail, string $sPassword)
	{
		
		$sSelect = "usuario_id AS id, usuario_nombre AS nombre, usuario_password AS pass";
		$aUsuario = Db()->select($sSelect)
		->table(DbTable('usuarios'))
		->cond('usuario_correo_electronico = "'.$sEmail.'" ' )
		->run('singular');
		
		$bLogin = false;
		if($aUsuario['pass'] != '')
		{
			if(Auth()->verifyPassword($sPassword, $aUsuario['pass']))
			{
				$bLogin = true;
				Auth()->setSession('id',  $aUsuario['id']);
			}
		}
		
		return $bLogin;
		
	}
	
}	


