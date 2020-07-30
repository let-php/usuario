<?php
	
namespace LetApps\Usuario\Models;
class Errores_Model
{
	public function estaVacio(string $sValor, string $sCampo)
	{
		$aErrores = [];
		
		if( (empty($sValor)) && ($sValor === '') )
		{
			$aErrores[] = "El campo ".$sCampo." esta vacío.";
		}
		
		return $aErrores;
		
	}
	
	public function existeEmail(string $sEmail)
	{
		$bExiste = Db()
		->select('*')
		->table(DbTable('usuarios'))
		->cond("usuario_correo_electronico = '".$sEmail."'")
		->count();
		
		if($bExiste)
		{
			return ['El <b>Email</b> ya existe.'];
		}
		
		return [];
	}
	
	
	
}	
	