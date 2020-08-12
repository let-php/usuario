<?php
	
namespace LetApps\Usuario\Ajax;
class Theme_Ajax
{
	public function changetheme()
	{
		$oJs = JS();
		$oAuth = Auth();
		$oAuth->setSession('theme', $oJs->getParam('theme'));
		
		$oJs
		->let_html('#choose-theme', 'Cargando...')
		->LetPHPJavascript('window.location.href="'.Router()->getFullRoute().'" ');
	}
}