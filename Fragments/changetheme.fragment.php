<?php
	
namespace LetApps\Usuario\Fragments;
class ChangeTheme_Fragment
{
	public function start()
	{
		
		$sTheme = Config('main.site_theme');
		
		View()
		->setValues([
			'sTheme' => $sTheme
		]);
		
	}
}	