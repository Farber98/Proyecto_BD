DROP procedure IF EXISTS `bsp_listar_licencias`;
DELIMITER $$

BEGIN 
CREATE PROCEDURE `bsp_listar_licencias`(pAgente.Nombre varchar(65), pAgente.Apellido varchar(65))

/*
	Listar todas las licencias que se tomó el empleado Juan Reyes en el año vigente, 
	indicando la causa, la cantidad de días y la fecha de inicio de las mismas.
*/

SELECT (TipoLicencia.TipoLicencia, Licencia.Razon, Licencia.FechaInicio,Licencia.FechaFin,Cantidad) /* Como saco cantidad*/

WHERE		(Agente.Nombre = pAgente.Nombre AND Agente.Apellido = p.Agente.Apellido 
			AND (Licencia.FechaInicio.Año OR Licencia.FechaFin.Año == thisyear() ) /* Como se esto */

FROM 	((Agentes A INNER JOIN Licencias L ON A.IdAgente = L.IdAgente) 
		INNER JOIN TiposLicencia Tip ON L.IdTiposLicencia = Tip.IdTiposLicencia


END$$
DELIMITER;

