DROP procedure IF EXISTS `bsp_modificar_agente`;
DELIMITER $$
CREATE PROCEDURE `bsp_modificar_agente`(pIdAgente int,pNombre varchar(65), pApellido varchar(65), 
													pDNI int, pCUIL int, pDireccion varchar(65), pAñoIncorporacion int)

SALIR: BEGIN
/*
		Permite modificar un agente en nuestra bd.
*/


-- Control de parámetros 

    IF pApellido IS NULL OR pApellido = '' THEN
		SELECT 'El apellido es obligatorio.' AS Mensaje, NULL AS Id;
        LEAVE SALIR;
    END IF;

    IF pNombre IS NULL OR pNombre = '' THEN
		SELECT 'El nombre es obligatorio.' AS Mensaje, NULL AS Id;
        LEAVE SALIR;
    END IF;

    IF pDNI IS NULL OR pDNI = '' THEN
		SELECT 'El DNI es obligatorio.' AS Mensaje, NULL AS Id;
        LEAVE SALIR;
    END IF;
    
	IF pCUIL IS NULL OR pCUIL = '' THEN
		SELECT 'El CUIL es obligatorio.' AS Mensaje, NULL AS Id;
        LEAVE SALIR;
    END IF;

	IF pAñoIncorporacion IS NULL OR pAñoIncorporacion = '' THEN
		SELECT 'El año de incorporacion es obligatorio.' AS Mensaje, NULL AS Id;
        LEAVE SALIR;
    END IF;


    IF EXISTS(SELECT DNI FROM Agentes WHERE DNI = pDNI) THEN
		SELECT 'DNI ya existe.' AS Mensaje, NULL AS Id;
        LEAVE SALIR;
    END IF;

	IF EXISTS(SELECT CUIL FROM Agentes WHERE CUIL = pCUIL) THEN
		SELECT 'CUIL ya existe.' AS Mensaje, NULL AS Id;
        LEAVE SALIR;
    END IF;
 
-- MODIFICO
	UPDATE	Agentes
	SET	Nombre = pNombre,
			Apellido = pApellido, DNI = pDNI,
			CUIL = pCUIL, Direccion = pDireccion,
			AñoIncorporacion = pAñoIncorporacion

	WHERE	IdAgente = pIdAgente;

	SELECT 'OK' AS Mensaje;

END$$
DELIMITER ;

