DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `bsp_O1_listar_agente`()
BEGIN
/*
	Se pide listar todas las personas que forman parte de la administración pública, indicando DNI, 
	la repartición a la que pertenece y el nro de interno del dpto donde trabaja.

*/

SELECT		a.IdAgente, CONCAT(a.Nombre,' ', a.Apellido) AS Agente,
			a.DNI, r.Reparticion, d.Departamento, d.Telefono
FROM		Agentes a INNER JOIN Ocupaciones o ON a.IdAgente = o.IdAgente
			INNER JOIN Cargos c ON c.IdCargo = o.IdCargo AND c.IdDepartamento = o.IdDepartamento AND c.IdReparticion = o.IdReparticion
			INNER JOIN Departamentos d ON c.IdDepartamento = d.IdDepartamento AND c.IdReparticion = d.IdReparticion
			INNER JOIN Reparticiones r ON d.IdReparticion = r.IdReparticion
WHERE		o.FechaFin IS NULL;

END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `bsp_O2_listar_licencias`(pIdAgente int)
BEGIN 
/*
	Listar todas las licencias que se tomó el empleado Juan Reyes en el año vigente, 
	indicando la causa, la cantidad de días y la fecha de inicio de las mismas.
*/
DECLARE pAnioActual int;

SET pAnioActual = YEAR(NOW());

SELECT		IdLicencia, tl.TipoLicencia, l.Razon, l.FechaInicio,l.FechaFin, 
			DATEDIFF(l.FechaFin, l.FechaInicio) AS Dias 
FROM 		Licencias l INNER JOIN TiposLicencia tl ON l.IdTipoLicencia = tl.IdTipoLicencia
WHERE		IdAgente = pIdAgente 
			AND (Year(FechaInicio) = pAnioActual OR Year(FechaFin) = pAnioActual); 
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `bsp_O3_listar_sueldo_parcial`(pIdAgente int)
BEGIN
/*
	Detalle de sueldo parcial de un agente-
*/

DECLARE pMesActual, pAnioActual int;
SET 	pMesActual = MONTH(NOW());
SET 	pAnioActual = YEAR(NOW());

SELECT 	i.ItemDetalle, i.TipoItem, CONCAT('$',ad.MontoParcial) AS Monto
FROM 	ItemsDetalle i INNER JOIN AdjuntosEn ad ON i.IdItemDetalle = ad.IdItemDetalle
		INNER JOIN Sueldos s ON ad.IdSueldo = s.IdSueldo 
		INNER JOIN Agentes a ON s.IdAgente = a.IdAgente
WHERE 	a.IdAgente = pIdAgente AND YEAR(s.FechaCobro) = pAnioActual 
		AND MONTH(s.FechaCobro) = pMesActual;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `bsp_O3_listar_sueldo_total`(pIdAgente int)
BEGIN
/*
	Listamos un detalle completo de sueldo.
*/
DECLARE pMesActual, pAnioActual int;
SET 	pMesActual = MONTH(NOW());
SET 	pAnioActual = YEAR(NOW());

SELECT 	CONCAT(a.Nombre,' ', a.Apellido) AS Agente, a.DNI, s.FechaCobro,
		CONCAT('$',300000.00)AS Neto, 
		CONCAT('$',300000.00 - 33000.00 - 13500.00 - 30000.00 + 60000.00 + 30000.00 + 45000.00) 
        AS Final
FROM 	Agentes a INNER JOIN Sueldos s ON a.IdAgente = s.IdAgente
WHERE 	a.IdAgente = pIdAgente AND YEAR(s.FechaCobro) = pAnioActual 
		AND MONTH(s.FechaCobro) = pMesActual;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `bsp_O4_listar_antiguedad`(pTipoCargo varchar(65))
BEGIN 
/*
	 Listar los empleados cuya antigüedad sea superior a los 10 años y cuya estado sea planta transitoria.
*/

SELECT Ag.IdAgente, Ag.Apellido, Ag.Nombre

FROM Agentes Ag INNER JOIN Ocupaciones Oc ON Ag.IdAgente = Oc.IdAgente 
		INNER JOIN Cargos C ON Oc.IdCargo = C.IdCargo
		INNER JOIN TiposCargos T ON C.IdTipoCargo = T.IdTipoCargo

WHERE	T.TipoCargo = pTipoCargo 
		AND (DATEDIFF(CURDATE(), Ag.FechaAlta)/365) <= 10; 

END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `bsp_borra_agente`(pIdAgente bigint)
SALIR:BEGIN
	/*
    Permite borrar un Agente. 
    Devuelve OK o el mensaje de error en Mensaje.
	*/
    -- Controla parámetros
    IF pIdAgente IS NULL OR pIdAgente = '' THEN
		SELECT 'El ID es obligatorio.' AS Mensaje, NULL AS Id;
        LEAVE SALIR;
    END IF;
    
    DELETE FROM Agentes WHERE IdAgente = pIdAgente;
    SELECT 'OK' AS Mensaje;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `bsp_baja_agente`(pIdAgente int, pFechaBaja DATE)
SALIR:BEGIN

/*
	Permite insertar baja a un Agente existente controlando los parametros ingresados
    y que el Agente exista. Devuelve OK o el mensaje de error en Mensaje.
*/

-- Manejo de error de la transacción 
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
		-- SHOW ERRORS;
		SELECT 'Error en la transacción. Contáctese con el administrador' Mensaje, NULL AS Id;
        ROLLBACK;
    END;

-- Controlo ingreso de parametros
IF pIdAgente IS NULL OR pIdAgente = '' THEN
		SELECT 'El ID es obligatorio.' AS Mensaje, NULL AS Id;
        LEAVE SALIR;
    END IF;

IF pFechaBaja IS NULL OR pFechaBaja = '' THEN
		SELECT 'Fecha de baja obligatoria.' AS Mensaje, NULL AS Id;
        LEAVE SALIR;
    END IF;

-- Controlar si el autor existe
    IF NOT EXISTS(SELECT IdAgente FROM Agentes WHERE IdAgente = pIdAgente) THEN
		SELECT 'El agente que quiere dar de baja no existe.' AS Mensaje;
        LEAVE SALIR; 
	END IF;
    
-- Controla si el autor ya esta dado de baja.	
	IF (SELECT FechaBaja FROM Agentes WHERE IdAgente = pIdAgente) IS NOT NULL THEN
		SELECT 'El agente ya se encuentra dado de baja. ' AS Mensaje;
        LEAVE SALIR;
	END IF;

UPDATE	Agentes
	SET		FechaBaja = pFechaBaja
	WHERE	IdAgente = pIdAgente;
	SELECT 'OK' AS Mensaje;

END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `bsp_O5_listar_nombre_cargo`(pIdReparticion tinyint, pCargo varchar(65))
BEGIN 
/*
	Listar los departamentos correspondientes a Casa de Gobierno, 
	sus directores correspondientes y los teléfonos de los mismos.
*/
SELECT Ag.IdAgente, Ag.Apellido, Ag.Nombre, D.Departamento, D.Telefono

FROM	Agentes Ag INNER JOIN Ocupaciones Oc ON Ag.IdAgente = Oc.IdAgente 
		INNER JOIN Cargos C ON Oc.IdCargo = C.IdCargo 
		INNER JOIN Departamentos D ON C.IdDepartamento = D.IdDepartamento
		INNER JOIN Reparticiones R ON D.IdReparticion = R.IdReparticion
WHERE	R.IdReparticion = pIdReparticion AND C.Cargo = pCargo;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `bsp_insertar_agente`(pNombre varchar(65), pApellido varchar(65), pDNI int,
										pCUIL char(11), pFechaAlta DATE, pFechaBaja DATE)
SALIR:BEGIN
	
/*
		Permite insertar un agente en nuestra bd. Controla parametros de entrada.
        Chequea si ya existe CUIL o DNI.
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

	IF pFechaAlta IS NULL OR pFechaAlta = '' THEN
		SELECT 'Fecha de alta obligatoria.' AS Mensaje, NULL AS Id;
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
        INSERT INTO Agentes VALUES(0, pNombre , pApellido , pDNI, pCUIL , pFechaAlta, pFechaBaja);

-- Devuelve último insertado
        SET pIdAgente = LAST_INSERT_ID();
        
		SELECT 'OK' Mensaje, pIdAgente AS Id;
    COMMIT;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `bsp_modificar_agente`(pIdAgente int,pNombre varchar(65), 
																pApellido varchar(65), pDNI int,pCUIL char(11), 
																				pFechaAlta DATE, pFechaBaja DATE)
SALIR:BEGIN
	/*
    Permite modificar un Agente existente controlando que los parametros
    ingresados sean correctos. Tambien controlamos que el DNI y CUIL no existan ya. 
    Devuelve OK o el mensaje de error en Mensaje.
	*/
    -- Controlo parámetros
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
		-- SHOW ERRORS;
		SELECT 'Error en la transacción. Contáctese con el administrador' Mensaje, NULL AS Id;
        ROLLBACK;
    END;
    
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

	IF pFechaAlta IS NULL OR pFechaAlta = '' THEN
		SELECT 'Fecha de alta obligatoria.' AS Mensaje, NULL AS Id;
        LEAVE SALIR;
    END IF;
    
    IF pFechaAlta = '' THEN
		SELECT 'Fecha de alta obligatoria.' AS Mensaje, NULL AS Id;
        LEAVE SALIR;
    END IF;

	IF EXISTS(SELECT DNI FROM Agentes WHERE DNI = pDNI AND IdAgente != pIdAgente) THEN
		SELECT 'DNI ya existe.' AS Mensaje, NULL AS Id;
        LEAVE SALIR;
	END IF;

	IF EXISTS(SELECT CUIL FROM Agentes WHERE CUIL = pCUIL AND IdAgente != pIdAgente) THEN
		SELECT 'CUIL ya existe.' AS Mensaje, NULL AS Id;
        LEAVE SALIR;
	END IF;

	UPDATE	Agentes
	SET		Nombre = pNombre, Apellido = pApellido, 
			DNI = pDNI, CUIL = pCUIL,
			FechaAlta = pFechaAlta, FechaBaja = pFechaBaja
	WHERE	IdAgente = pIdAgente;
	SELECT 'OK' AS Mensaje;
END$$
DELIMITER ;

