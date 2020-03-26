DROP procedure IF EXISTS `bsp_insertar_agente`;
DELIMITER $$
CREATE PROCEDURE `bsp_insertar_agente`(pNombre varchar(65), pApellido varchar(65), pDNI int,
													 pCUIL int, pAñoIncorporacion int)

SALIR:BEGIN
	
/*
		Permite insertar un agente en nuestra bd.
*/

DECLARE pIdAgente int;

-- Manejo de error de la transacción 
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN

		-- SHOW ERRORS;
		SELECT 'Error en la transacción. Contáctese con el administrador' Mensaje, NULL AS Id;
        ROLLBACK;
    END;

-- Control de parámetros 

    IF pApellidos IS NULL OR pApellidos = '' THEN
		SELECT 'El apellido es obligatorio.' AS Mensaje, NULL AS Id;
        LEAVE SALIR;
    END IF;

    IF pNombres IS NULL OR pNombres = '' THEN
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
    
    START TRANSACTION;

-- Inserta
        INSERT INTO Agentes VALUES(0, pNombre , pApellido , pDNI, pCUIL , pAñoIncorporacion );

-- Devuelve último insertado
        SET pIdAgente = LAST_INSERT_ID();
        
		SELECT 'OK' Mensaje, pIdAgente AS Id;

    COMMIT;

END$$
DELIMITER ;

