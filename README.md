# PRUEBA TECNICA PARA SENIOR LARAVEL

## Ejercicios Uno

Genere las relaciones que crea pertinentes para relacionar cada tabla, en donde:
-	Un usuario puede tener un solo rol.
-	Un permiso puede estar en muchos roles
-	Un rol puede estar en muchos permisos
Genere las siguientes sentencias en formato SQL:
-	Los usuarios que tengan el rol 1 y 2.
-	Los permisos que se tienen del rol 1
-	Los usuarios y el rol que tienen el permiso 2

Respuesta 
    
 INSERT INTO usuarios (id,nombre,apellido,correo,telefono,roles_id) VALUES ( 1,'Samuel','Campo','samuelcampo@miweb.com','+573219646346',1);
 INSERT INTO usuarios (id,nombre,apellido,correo,telefono,roles_id) VALUES ( 1,'Martha','Ocampo','mocampo@miweb.com','+573219646346',2);
 
 INSERT INTO roles (id,nombre) values (1,'Editor');
 INSERT INTO roles (id,nombre) values (2,'Administrador');
 INSERT INTO roles (id,nombre) values (3,'Suscriptor');
 
 INSERT INTO permisos (id,permisos) VALUES (1,'Eliminar');
 INSERT INTO permisos (id,permisos) VALUES (2,'Modificar');
 INSERT INTO permisos (id,permisos) VALUES (3,'Guardar');
 
 INSERT INTO roles_permisos (id_rol_permiso,sku_rol,sku_permisos) VALUES (1,1,1);
 INSERT INTO roles_permisos (id_rol_permiso,sku_rol,sku_permisos) VALUES (2,1,2);
 INSERT INTO roles_permisos (id_rol_permiso,sku_rol,sku_permisos) VALUES (3,1,3);
 INSERT INTO roles_permisos (id_rol_permiso,sku_rol,sku_permisos) VALUES (4,2,1);
 INSERT INTO roles_permisos (id_rol_permiso,sku_rol,sku_permisos) VALUES (5,2,2);
 INSERT INTO roles_permisos (id_rol_permiso,sku_rol,sku_permisos) VALUES (6,2,3);
 
SELECT * FROM usuarios WHERE roles_id IN (1,2)
SELECT * FROM usuarios WHERE roles_id = 1
SELECT * from usuarios
	INNER JOIN roles ON usuarios.roles_id = roles.id 
    INNER JOIN roles_permisos ON roles_permisos.sku_rol = roles.id 
    INNER JOIN permisos ON permisos.id = roles_permisos.sku_permisos 
    where permisos.id = 2
    
    
 ## Ejercicios 2
 
 <p>2.	En el manejo de servicios en la nube (Azure, AWS, CloudFlare, etc.) hay tipos de servicios los cuales son influyentes para la administraci??n de servicios de una compa????a; de acuerdo con esto, mencione que conocimientos y experiencia tiene ud en servicios en la nube, ??y especifique en cu??les? </p>
 
 Tengo conicmientos en desplegar proyecto en servidores de Ubuntu 20.4 mayormente, despliegue de sitios utilizando la configuraci??n de dns cloudfare
 
 ## Ejercicios 3
 
 3.	En servidores Linux/Unix la sentencia para listar elementos de un directorio es:
    a.	ll
    b.	dir
    c.	ld
    d.	dr
 <p>Con el comnado ls -ll se puede listar los elementos de un directorio</p>

## Ejercicios 4

4.	En el siguiente fragmento de c??digo hay un error, identifique cual es el error y descr??balo junto la soluci??n:

<img src="https://github.com/SamuelCampo/test-login-singup/blob/master/public/enuncuadi.png" />

En este fragmento de c??digo tenemos dos errores una en la l??nea 5 al finalizar donde no tenemos una coma para separar el array y el segundo estamos concatenando mal los valores ya que usamos + y en php se utiliza un punto para concatenar. Como bonus colocar un ???\n??? para que la salida del c??digo se viera m??s ordenada

## Ejercicios 5

5.	Realice los siguientes middlewares de ejecuci??n para la sesi??n del usuario los cuales deben validar:
- Si la cuenta no est?? verificada mediante el campo email_verified_at, lo redirija a una p??gina /verificaci??n
- Si la ??ltima sesi??n del usuario fue hace m??s de un d??a lo redirija a una p??gina llamada /sesiones
- Cuando el usuario inicie sesi??n le almacene una Cookie llamada origin_sesion si el usuario tiene el rol 1 y la IP de origen es 127.0.0.1
- Autenticaci??n por Two Factor (puede ser propio o de alg??n proveedor externo) con un m??ximo de sesi??n de 30 minutos

Pueden encontrar la soluci??n en el middleware 

LoginSession -> <a href="https://github.com/SamuelCampo/test-login-singup/blob/master/app/Http/Middleware/LoginSession.php">Click aqui para ver el codigo</a>

## Bonus track

<p>Se creo sistema de login y registro con autenticaci??n de dos factores para comprobar el correcto funcionamiento</p>
<p>Se creo test para comprobar el buen uso de las funciones realizadas</p>



 
 
