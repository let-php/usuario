
		<form action="" method="POST" class="form" accept-charset="utf-8">
			<h1>Inicia Sesión</h1>
			
			<div class="form-control">
				
				
				<label for="email" >Ingresa Correo Electrónico</label>
				<input type="email" name="email" id="email" placeholder="Ingresa Correo Electrónico" />
				
			</div>
			
			
			<div class="form-control">
				
				<label for="name" >Ingresa Contraseña</label>
				<input type="password" name="password" id="password" placeholder="Ingresa Contraseña" />
				
			</div>
			  
			<input type="hidden" name="form-login" value="1" />
			<button type="submit" >Ingresar</button>
			<a href="{route link='' }" class="link" >Crear Una Cuenta en {name}</a>
			
		</form>