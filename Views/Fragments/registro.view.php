
<form action="" method="POST" class="form" accept-charset="utf-8">
			<h1>Registrate en {name}</h1>
			
			{if $bErrores}
				{each values=$aErrores value=error}
					<div class="mensaje-error">
						{$error}
					</div>
				{/each}
			{/if}
			
			<div class="form-control">
				
				<label for="name" >Ingresa Nombre</label>
				<input type="text" name="nombre" id="nombre" placeholder="Ingresa Nombre" value="{$sNombre}" />
				
			</div>
			
			
			<div class="form-control">
				
				
				<label for="email" >Ingresa Correo Electrónico</label>
				<input type="email" name="email" id="email" placeholder="Ingresa Correo Electrónico" value="{$sEmail}" />
				
			</div>
			
			<div class="form-control">
				
				
				<label for="name" >Ingresa Contraseña</label>
				<input type="password" name="password" id="password" placeholder="Ingresa Contraseña" />
				
			</div>
			
			
			<div class="form-control">
				
				<label for="name" >Selecciona País</label>
				<select name="pais" >
					{each values=$aPaises value=aPais}
					<option 
						value="{$aPais.id}" 
						{if $aPais.id == $sPais}selected{/if} 
						>{$aPais.texto}</option>
					{/each}
				</select>
				
			</div>
			
			<input type="hidden" name="form-registrar" value="1" />
			<button type="submit" >Registrar</button>
			<a href="{route link='usuario.login'}" class="link" >Iniciar Sesión</a>
			
			{Usuario_ChangeTheme}
</form>