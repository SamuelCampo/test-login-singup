/* creación de tablas */

CREATE TABLE `usuarios` (
  `id` int,
  `nombre` varchar(191),
  `apellido` varchar(191),
  `correo` varchar(191),
  `telefono` varchar(191),
  `roles_id` int
);

CREATE TABLE `roles` (
  `id` int,
  `nombre` varchar(191)
);

CREATE TABLE `roles_permisos` (
  `id_rol_permiso` int,
  `sku_rol` int,
  `sku_permisos` int
);

CREATE TABLE `permisos` (
  `id` int,
  `permisos` varchar(191)
);

/* ejecución de consultas */

SELECT * FROM usuarios WHERE roles_id IN (1,2)
SELECT * FROM usuarios WHERE roles_id = 1
SELECT * from usuarios
	INNER JOIN roles ON usuarios.roles_id = roles.id 
    INNER JOIN roles_permisos ON roles_permisos.sku_rol = roles.id 
    INNER JOIN permisos ON permisos.id = roles_permisos.sku_permisos 
    where permisos.id = 2
    
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