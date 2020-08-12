<form action="" method="POST" class="form" accept-charset="utf-8">
	<h1 class="py-2 title is-dark is-4 is-uppercase" >
		Inicia Sesión
	</h1>
	
	
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
	
	
	<input type="hidden" name="form-login" value="1" />
	<button type="submit" class="button mt-2 is-primary is-fullwidth has-text-weight-bold is-uppercase" >
	
		
		<span>Iniciar Sesión</span>
		<span class="icon is-small">
			<i data-jam="log-in" data-fill="#FFF" data-width="24" ></i>
		</span>
	</button>
	<hr/>
	<a href="{route link=''}" class="has-text-primary has-text-weight-bold" >Crear una cuenta en {name}</a>
</form>