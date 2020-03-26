DROP procedure IF EXISTS `bsp_borra_agente`;
DELIMITER $$

SALIR:BEGIN 
CREATE PROCEDURE `bsp_borra_agente`(pIdAgente int)

/*
		Permite borrar un agente en nuestra bd.
*/


-- Control de parámetros 
-- QUE CONTROLOES HACER?

DELETE FROM Agentes WHERE IdAgente = pIdAgente;

SELECT 'OK' AS Mensaje;

END$$
DELIMITER; 
