DROP procedure IF EXISTS `bsp_listar_nombre_cargo`;
DELIMITER $$

BEGIN 
CREATE PROCEDURE `bsp_listar_nombre_cargo`(pReparticion.Nombre varchar(65), pCargo.Nombre varchar(65))

/*
	Listar los departamentos correspondientes a Casa de Gobierno, 
	sus directores correspondientes y los teléfonos de los mismos.

*/

SELECT (Agente.IdAgente, Agente.Apellido, Agente.Nombre, Departamento.Nombre, Departamento.Telefono)
 
WHERE	(Reparticion.Nombre = pReparticion.Nombre AND Cargo.Nombre = pCargo.Nombre)

FROM	((((Agentes Ag INNER JOIN Asumen As ON Ag.IdAgente = As.IdAgente) 
		INNER JOIN Cargos C ON As.IdCargo = C.IdCargo) 
		INNER JOIN Departamento D ON C.IdDepartamento = D.IdDepartamento) 
		INNER JOIN Reparticion R ON D.IdReparticion = R.IdReparticion)

END$$
DELIMITER;

