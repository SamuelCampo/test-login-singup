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
 
 <p>2.	En el manejo de servicios en la nube (Azure, AWS, CloudFlare, etc.) hay tipos de servicios los cuales son influyentes para la administración de servicios de una compañía; de acuerdo con esto, mencione que conocimientos y experiencia tiene ud en servicios en la nube, ¿y especifique en cuáles? </p>
 
 Tengo conicmientos en desplegar proyecto en servidores de Ubuntu 20.4 mayormente, despliegue de sitios utilizando la configuración de dns cloudfare
 
 ## Ejercicios 3
 
 3.	En servidores Linux/Unix la sentencia para listar elementos de un directorio es:
    a.	ll
    b.	dir
    c.	ld
    d.	dr
 <p>Con el comnado ls -ll se puede listar los elementos de un directorio</p>
 
 <img src="https://drive.google.com/file/d/1W3BE90numoU3RJRBG3tZLm8zpCxTugmp/view?usp=sharing" />

## Ejercicios 4

4.	En el siguiente fragmento de código hay un error, identifique cual es el error y descríbalo junto la solución:

En este fragmento de código tenemos dos errores una en la línea 5 al finalizar donde no tenemos una coma para separar el array y el segundo estamos concatenando mal los valores ya que usamos + y en php se utiliza un punto para concatenar. Como bonus colocar un “\n” para que la salida del código se viera más ordenada


 
 
