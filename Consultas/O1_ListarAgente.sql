DROP procedure IF EXISTS `bsp_listar_agente`;
DELIMITER $$

BEGIN 
CREATE PROCEDURE `bsp_listar_agente`()

/*
	Se pide listar todas las personas que forman parte de la administración pública, indicando DNI, 
	la repartición a la que pertenece y el nro de interno del dpto donde trabaja.

*/

SELECT 	(Agentes.IdAgente, Agentes.Apellido, Agentes.Nombre, Agentes.DNI, 
			Reparticion.Nombre, Departamentos.Nombre, Departamentos.Telefono)

FROM ((((Agentes Ag INNER JOIN Asumen As ON Ag.IdAgente = As.IdAgente) 
		INNER JOIN Cargos C ON As.IdCargo = C.IdCargo) 
		INNER JOIN Departamento D ON C.IdDepartamento = D.IdDepartamento) 
		INNER JOIN Reparticion R ON D.IdReparticion = R.IdReparticion)

END$$
DELIMITER;

