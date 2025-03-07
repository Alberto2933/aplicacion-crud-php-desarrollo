CREATE TABLE JugadoresLOL (
  jugador_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  apellido VARCHAR(100) NOT NULL,
  nombre VARCHAR(100) NOT NULL,
  edad INT UNSIGNED NOT NULL,
  equipo VARCHAR(100) NOT NULL,
  dinero INT NOT NULL,
  anios_activo INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO JugadoresLOL (apellido, nombre, edad, equipo,dinero,anios_activo) VALUES('Gonzalez', 'Faker', 25,'SKT',5.000,12);
INSERT INTO JugadoresLOL (apellido, nombre, edad, equipo,dinero,anios_activo) VALUES('Canovas', 'Werlyb', 34,'MAD_Lions',1.000,8);
INSERT INTO JugadoresLOL (apellido, nombre, edad, equipo,dinero,anios_activo) VALUES('Borregard', 'caps', 19,'G2easports',4.000,6);
INSERT INTO JugadoresLOL (apellido, nombre, edad, equipo,dinero,anios_activo) VALUES('Martin', 'Carl', 25,'SKT',3.500,4);
INSERT INTO JugadoresLOL (apellido, nombre, edad, equipo,dinero,anios_activo) VALUES('Marcin', 'Jankos', 25,'KOI',2.700,2);
INSERT INTO JugadoresLOL (apellido, nombre, edad, equipo,dinero,anios_activo) VALUES('Lee', 'Gumayushi', 31,'T1',1.400,1);
INSERT INTO JugadoresLOL (apellido, nombre, edad, equipo,dinero,anios_activo) VALUES('Camprovin', 'Miguel', 21,'T1',5.300,6);
INSERT INTO JugadoresLOL (apellido, nombre, edad, equipo,dinero,anios_activo) VALUES('Cuadrado', 'ares', 14,'100man',3.300,5);
INSERT INTO JugadoresLOL (apellido, nombre, edad, equipo,dinero,anios_activo) VALUES('Cipitria', 'Sergio', 16,'100man',4.300,4);
INSERT INTO JugadoresLOL (apellido, nombre, edad, equipo,dinero,anios_activo) VALUES('Ionut', 'Patricio', 27,'100man',9.300,3);


