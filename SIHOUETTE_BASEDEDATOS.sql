/*Creamos la base de datos*/
Create database SILHOUETTE_db;

/*Usamos la base de datos*/
Use SILHOUETTE_db;

/*Creamos la tabla para registrar e inicio de sesion*/
CREATE TABLE usuarios (
  id_usuario INT AUTO_INCREMENT,
  nombre_completo VARCHAR(50),
  usuario varchar(50) ,
  correo VARCHAR(50) ,
  contrasena VARCHAR(50),
  fecha_registro DATETIME,
  activo INT,
  PRIMARY KEY (id_usuario));
  
  /*Seleccionamos la tabla para ver el contenido*/
  select * from usuarios;
  
  /*PLANES DE GYM*/
CREATE TABLE planes (
  id_planes INT AUTO_INCREMENT,
  nombre VARCHAR(50),
  descripcion text ,
  precio decimal(10,2) ,
  detalles text,
  activo INT,
  PRIMARY KEY (id_planes));
  
  select * from planes;
  insert into planes (nombre,descripcion,precio,detalles,activo) values ("PLAN COMÚN","Por un mes",59.90,"<li>Maquinaria</li>
                            <li>Acceso a las duchas</li>
                            <li>Acceso al sauna</li>
                            <li>Acceso a las clases de zumba</li>" ,1);
  insert into planes (nombre,descripcion, precio,detalles,activo) values ("PLAN VIP","Por un mes",79.90,"<li>Plan común</li>
                            <li>Entrenador</li>
                            <li>Plan nutricional</li>" ,1);
  insert into planes (nombre,descripcion, precio,detalles,activo) values ("PLAN PREMIUM","Por un mes",99.90, "<li>Plan VIP</li>
                            <li>Personal crossfit</li>
                            <li>Acceso a las clases de full body</li>
                            <li>Acceso a las sillas de masaje</li>",1);

/*COMPRA*/
CREATE TABLE compra (
  id INT AUTO_INCREMENT,
  id_transaccion varchar(20),
  fecha DATETIME,
  status varchar(20),
  name varchar (30),
  lastname varchar (30),
  email VARCHAR(50),
  id_cliente varchar(20),
  total decimal(10,2),
  PRIMARY KEY (id));
  
  select * from compra;
  
  CREATE TABLE detalle_compra (
  id INT AUTO_INCREMENT,
  id_compra int,
  id_planes int,
  nombre VARCHAR(50),
  fecha DATETIME,
  precio decimal(10,2),
  cantidad int,
  PRIMARY KEY (id));
  
 select * from detalle_compra;
