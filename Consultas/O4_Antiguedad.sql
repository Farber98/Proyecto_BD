DROP procedure IF EXISTS `bsp_listar_antiguedad`;
DELIMITER $$

BEGIN 
CREATE PROCEDURE `bsp_listar_antiguedad`(pTiposCargo varchar(65))

/*
	 Listar los empleados cuya antigüedad sea superior a los 10 años y cuya estado sea planta transitoria.
*/

SELECT (Agentes.IdAgentes, Agentes.Apellido, Agentes.Nombre)

WHERE	(TiposCargo = pTiposCargo AND (thisyear() - Agentes.AñoIncorporacion) > 10 ) /* COMO OBTENGO AÑO ACTUAL SIN HARDCODEAR*/

FROM (((Agentes Ag INNER JOIN Asumen As ON Ag.IdAgente = As.IdAgente) 
		INNER JOIN Cargos C ON As.IdCargo = C.IdCargo) 
		INNER JOIN TiposCargos T ON C.IdTiposCargos = T.IdTiposCargos)

END$$
DELIMITER;
