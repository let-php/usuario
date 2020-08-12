
<form action="" method="POST" class="form" accept-charset="utf-8">
	<h1 class="py-2 title is-dark is-4 is-uppercase" >Registrate en {name}</h1>
			
	{if $bErrores}
		{each values=$aErrores value=error}
			<div class="message is-danger is-small has-text-left my-1">
				<div class="message-body py-2 px-2">
				{$error}
				</div>
			</div>
		{/each}
	{/if}
	
	
	<div class="field">
		<div class="control has-icons-left">
			<span class="icon">
				<i data-jam="user" data-fill="#00c4a7" ></i>
			</span>
			
			<input type="text" name="nombre" id="nombre" placeholder="Ingresa Nombre" class="input" value="{$sNombre}" />
		</div>
		
	</div>
	
	
	
	
	<div class="field">
		<div class="control has-icons-left">
			<span class="icon">
				<i data-jam="envelope" data-fill="#00c4a7" ></i>
			</span>
			
			<input type="email" name="email" id="email" placeholder="Ingresa Correo Electrónico" class="input" value="{$sEmail}" />
	
		</div>
	</div>
	
	
	
	<div class="field">
		<div class="control has-icons-left">
			<span class="icon">
				<i data-jam="padlock-f" data-fill="#00c4a7" ></i>
			</span>
			
			<input type="password" class="input" name="password" id="password" placeholder="Ingresa Contraseña" />
	
		</div>
	</div>
	
	
	
	<div class="field">
		<div class="control has-icons-left">
			<span class="icon">
				<i data-jam="flag" data-fill="#00c4a7" ></i>
			</span>
			
			
			<div class="select is-fullwidth">
			
			<select name="pais" >
					{each values=$aPaises value=aPais}
					<option 
						value="{$aPais.id}" 
						{if $aPais.id == $sPais}selected{/if} 
						>{$aPais.texto}</option>
					{/each}
				</select>
				
			</div>
		</div>
	</div>
	
	
	<input type="hidden" name="form-registrar" value="1" />
	<button type="submit" class="button mt-2 is-primary is-fullwidth has-text-weight-bold is-uppercase" >
	
		
		<span>Registrar</span>
		<span class="icon is-small">
			<i data-jam="user-plus" data-fill="#FFF" data-width="16" ></i>
		</span>
	</button>
	<hr/>
	<a href="{route link='usuario.login'}" class="has-text-primary has-text-weight-bold" >Iniciar Sesión</a>
			
	{Usuario_ChangeTheme}
	
			
</form>