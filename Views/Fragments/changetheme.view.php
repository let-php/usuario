{$sTheme}
<br/>
<div id="choose-theme">
	<select onchange="$.LetPHPAjax('usuario.theme.changetheme', 'theme='+this.value, 'POST'); return false;" >
		<option value="">Cambiar Tema</option>
		<option value="" {if $sTheme == ''}selected{/if} >Default</option>
		<option value="bulma" {if $sTheme == 'bulma'}selected{/if} >Bulma</option>
	</select>
</div>