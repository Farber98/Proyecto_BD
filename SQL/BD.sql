--
-- ER/Studio 8.0 SQL Code Generation
-- Company :      juan
-- Project :      GranCambio.dm1
-- Author :       juan
--
-- Date Created : Lunes, Noviembre 25, 2019 09:24:15
-- Target DBMS : MySQL 5.x
--

-- 
-- TABLE: AdjuntosEn 
--

CREATE TABLE AdjuntosEn(
    IdSueldo        INT               NOT NULL,
    IdAgente        INT               NOT NULL,
    Mes             TINYINT           NOT NULL,
    Anio            SMALLINT          NOT NULL,
    IdItemDetalle      TINYINT           NOT NULL,
    MontoParcial    DECIMAL(10, 2)    NOT NULL,
    PRIMARY KEY (IdSueldo, IdAgente, Mes, Anio, IdItemDetalle)
)ENGINE=INNODB
COMMENT='Tabla que almacena los sueldos y sus respectivos items de detalle.'
;

-- 
-- TABLE: Agentes 
--

CREATE TABLE Agentes(
    IdAgente     INT            AUTO_INCREMENT,
    Nombre       VARCHAR(65)    NOT NULL,
    Apellido     VARCHAR(65)    NOT NULL,
    DNI          INT            NOT NULL,
    CUIL         CHAR(11)       NOT NULL,
    FechaAlta    DATE           NOT NULL,
    FechaBaja    DATE,
    PRIMARY KEY (IdAgente)
)ENGINE=INNODB
COMMENT='Tabla que almacena la informacion personal de un Agente.'
;

-- 
-- TABLE: Anios 
--

CREATE TABLE Anios(
    Anio           SMALLINT    NOT NULL,
    FechaInicio    DATE        NOT NULL,
    FechaFin       DATE        NOT NULL,
    PRIMARY KEY (Anio)
)ENGINE=INNODB
COMMENT='Tabla que almacena la informacion de un Año en donde se liquida el Sueldo de un Agente.'
;

-- 
-- TABLE: Asistencias 
--

CREATE TABLE Asistencias(
    IdAgente         INT         NOT NULL,
    Anio             SMALLINT    NOT NULL,
    Mes              TINYINT     NOT NULL,
    Asistencias      TINYINT     NOT NULL,
    Inasistencias    TINYINT     NOT NULL,
    Tardanzas        TINYINT     NOT NULL,
    PRIMARY KEY (IdAgente, Anio, Mes)
)ENGINE=INNODB
COMMENT='Tabla que almacena informacion sobre las Asistencias de un Agente'
;

-- 
-- TABLE: AuditoriaAgentes 
--

CREATE TABLE AuditoriaAgentes(
    IdAA       TINYINT        AUTO_INCREMENT,
    Fecha      DATETIME       NOT NULL,
    Tipo       VARCHAR(65)    NOT NULL,
    Usuario    VARCHAR(65)    NOT NULL,
    PRIMARY KEY (IdAA)
)
COMMENT='Tabla que almacena los cambios en la tabla Agentes'
;

-- 
-- TABLE: Cargos 
--

CREATE TABLE Cargos(
    IdCargo           INT            AUTO_INCREMENT,
    IdDepartamento    INT            NOT NULL,
    IdReparticion     INT            NOT NULL,
    IdCC              INT            NOT NULL,
    IdTipoCargo       INT            NOT NULL,
    Cargo             VARCHAR(65)    NOT NULL,
    PRIMARY KEY (IdCargo, IdDepartamento, IdReparticion)
)ENGINE=INNODB
COMMENT='Tabla que almacena la informacion del Cargo que ocupa un Agente.'
;

-- 
-- TABLE: CategoriasCargo 
--

CREATE TABLE CategoriasCargo(
    IdCC                  INT            NOT NULL,
    TipoCategoriaCargo    VARCHAR(65)    NOT NULL,
    Estado                CHAR(1)        NOT NULL,
    PRIMARY KEY (IdCC)
)ENGINE=INNODB
COMMENT='Tabla que almacena la informacion sobre la Categoria de un Cargo.'
;

-- 
-- TABLE: Departamentos 
--

CREATE TABLE Departamentos(
    IdDepartamento    INT            NOT NULL,
    IdReparticion     INT            NOT NULL,
    Departamento      VARCHAR(65)    NOT NULL,
    Telefono          INT            NOT NULL,
    PRIMARY KEY (IdDepartamento, IdReparticion)
)ENGINE=INNODB
COMMENT='Tabla que almacena informacion sobre el Departamento donde trabaja un Agente.'
;

-- 
-- TABLE: ItemsDetalle 
--

CREATE TABLE ItemsDetalle(
    IdItemDetalle    TINYINT          NOT NULL,
    ItemDetalle      VARCHAR(100)     NOT NULL,
    TipoItem         VARCHAR(65)      NOT NULL,
    Alicuota         DECIMAL(5, 2)    NOT NULL,
    Estado           CHAR(1)          NOT NULL,
    PRIMARY KEY (IdItemDetalle)
)ENGINE=INNODB
COMMENT='Tabla que almacena los Tipos de Items de detalle.
'
;

-- 
-- TABLE: Licencias 
--

CREATE TABLE Licencias(
    IdLicencia        INT        AUTO_INCREMENT,
    FechaInicio       DATE       NOT NULL,
    FechaFin          DATE       NOT NULL,
    Razon             TEXT       NOT NULL,
    IdAgente          INT,
    IdTipoLicencia    TINYINT    NOT NULL,
    PRIMARY KEY (IdLicencia)
)ENGINE=INNODB
COMMENT='Tabla que almacena la informacion sobre las Licencias que puede contraer un Agente.'
;

-- 
-- TABLE: Meses 
--

CREATE TABLE Meses(
    Anio              SMALLINT    NOT NULL,
    Mes               TINYINT     NOT NULL,
    DiaLiquidacion    TINYINT     NOT NULL,
    PRIMARY KEY (Anio, Mes)
)ENGINE=INNODB
COMMENT='Tabla que almacena la informacion sobre el Mes en el que se liquida el Sueldo de un Agente.'
;

-- 
-- TABLE: Ocupaciones 
--

CREATE TABLE Ocupaciones(
    IdAgente          INT     NOT NULL,
    IdCargo           INT     NOT NULL,
    IdDepartamento    INT     NOT NULL,
    IdReparticion     INT     NOT NULL,
    FechaInicio       DATE    NOT NULL,
    FechaFin          DATE,
    PRIMARY KEY (IdAgente, IdCargo, IdDepartamento, IdReparticion)
)ENGINE=INNODB
COMMENT='Tabla resultante de la relacion 1 a 1 entre Cargos y Agentes.'
;

-- 
-- TABLE: Reparticiones 
--

CREATE TABLE Reparticiones(
    IdReparticion    INT            NOT NULL,
    Reparticion      VARCHAR(65)    NOT NULL,
    Direccion        VARCHAR(65)    NOT NULL,
    PRIMARY KEY (IdReparticion)
)ENGINE=INNODB
COMMENT='Tabla que almacena la informacion sobre las reparticiones donde nuestro Agente trabaja.'
;

-- 
-- TABLE: Seguros 
--

CREATE TABLE Seguros(
    IdAgente         INT        NOT NULL,
    IdTipoSeguro     TINYINT    NOT NULL,
    IdAseguradora    TINYINT    NOT NULL,
    NroPoliza        INT        NOT NULL,
    PRIMARY KEY (IdAgente)
)ENGINE=INNODB
COMMENT='Tabla que almacena informacion sobre la Empresa que presta Seguro a un Agente'
;

-- 
-- TABLE: Sueldos 
--

CREATE TABLE Sueldos(
    IdSueldo      INT         AUTO_INCREMENT,
    IdAgente      INT         NOT NULL,
    Mes           TINYINT     NOT NULL,
    Anio          SMALLINT    NOT NULL,
    FechaCobro    DATE,
    Estado        CHAR(1)     NOT NULL,
    PRIMARY KEY (IdSueldo, IdAgente, Mes, Anio)
)ENGINE=INNODB
COMMENT='Tabla que almacena informacion sobre el Sueldo de un Agente'
;

-- 
-- TABLE: TipoAseguradora 
--

CREATE TABLE TipoAseguradora(
    IdAseguradora    TINYINT        NOT NULL,
    Aseguradora      VARCHAR(65)    NOT NULL,
    Estado           CHAR(1)        NOT NULL,
    PRIMARY KEY (IdAseguradora)
)ENGINE=INNODB
COMMENT='Tabla que almacena la informacion sobre las empresas Aseguradoras.'
;

-- 
-- TABLE: TiposCargos 
--

CREATE TABLE TiposCargos(
    IdTipoCargo    INT            NOT NULL,
    TipoCargo      VARCHAR(65)    NOT NULL,
    Estado         CHAR(1)        NOT NULL,
    PRIMARY KEY (IdTipoCargo)
)ENGINE=INNODB
COMMENT='Tabla que almacena los nombres posibles de la Planta de un Cargo.'
;

-- 
-- TABLE: TiposLicencia 
--

CREATE TABLE TiposLicencia(
    IdTipoLicencia    TINYINT        NOT NULL,
    TipoLicencia      VARCHAR(65)    NOT NULL,
    Estado            CHAR(1)        NOT NULL,
    PRIMARY KEY (IdTipoLicencia)
)ENGINE=INNODB
COMMENT='Tabla que almacena los Nombres de los Tipos de Licencia.'
;

-- 
-- TABLE: TiposSeguro 
--

CREATE TABLE TiposSeguro(
    IdTipoSeguro    TINYINT        NOT NULL,
    TipoSeguro      VARCHAR(65)    NOT NULL,
    Estado          CHAR(1)        NOT NULL,
    PRIMARY KEY (IdTipoSeguro)
)ENGINE=INNODB
COMMENT='Tabla que almacena la informacion sobre los Tipos de Seguro.'
;

-- 
-- INDEX: Ref1429 
--

CREATE INDEX Ref1429 ON AdjuntosEn(IdAgente, IdSueldo, Anio, Mes)
;
-- 
-- INDEX: Ref1630 
--

CREATE INDEX Ref1630 ON AdjuntosEn(IdItemDetalle)
;
-- 
-- INDEX: IX_ApellidoNombre 
--

CREATE INDEX IX_ApellidoNombre ON Agentes(Apellido, Nombre)
;
-- 
-- INDEX: UI_DNI 
--

CREATE UNIQUE INDEX UI_DNI ON Agentes(DNI)
;
-- 
-- INDEX: UI_CUIL 
--

CREATE UNIQUE INDEX UI_CUIL ON Agentes(CUIL)
;
-- 
-- INDEX: Ref913 
--

CREATE INDEX Ref913 ON Asistencias(IdAgente)
;
-- 
-- INDEX: Ref2320 
--

CREATE INDEX Ref2320 ON Asistencias(Anio, Mes)
;
-- 
-- INDEX: IX_Estado 
--

CREATE INDEX IX_Estado ON Asistencias(Asistencias)
;
-- 
-- INDEX: IX_Fecha 
--

CREATE INDEX IX_Fecha ON AuditoriaAgentes(Fecha)
;
-- 
-- INDEX: IX_Tipo 
--

CREATE INDEX IX_Tipo ON AuditoriaAgentes(Tipo)
;
-- 
-- INDEX: IX_Usuario 
--

CREATE INDEX IX_Usuario ON AuditoriaAgentes(Usuario)
;
-- 
-- INDEX: IX_Cargo 
--

CREATE INDEX IX_Cargo ON Cargos(Cargo)
;
-- 
-- INDEX: UI_IdCargo 
--

CREATE UNIQUE INDEX UI_IdCargo ON Cargos(IdCargo)
;
-- 
-- INDEX: UI_CargoIdDepartamentoIdReparticion 
--

CREATE UNIQUE INDEX UI_CargoIdDepartamentoIdReparticion ON Cargos(Cargo, IdDepartamento, IdReparticion)
;
-- 
-- INDEX: Ref57 
--

CREATE INDEX Ref57 ON Cargos(IdReparticion, IdDepartamento)
;
-- 
-- INDEX: Ref760 
--

CREATE INDEX Ref760 ON Cargos(IdCC)
;
-- 
-- INDEX: Ref3361 
--

CREATE INDEX Ref3361 ON Cargos(IdTipoCargo)
;
-- 
-- INDEX: UI_TipoCategoriaCargo 
--

CREATE UNIQUE INDEX UI_TipoCategoriaCargo ON CategoriasCargo(TipoCategoriaCargo)
;
-- 
-- INDEX: UI_IdDepartamentoIdReparticion 
--

CREATE UNIQUE INDEX UI_IdDepartamentoIdReparticion ON Departamentos(Departamento, IdReparticion)
;
-- 
-- INDEX: IX_TipoItem 
--

CREATE INDEX IX_TipoItem ON ItemsDetalle(TipoItem)
;
-- 
-- INDEX: UI_TipoItem 
--

CREATE UNIQUE INDEX UI_TipoItem ON ItemsDetalle(ItemDetalle)
;
-- 
-- INDEX: Ref2859 
--

CREATE INDEX Ref2859 ON Licencias(IdTipoLicencia)
;
-- 
-- INDEX: Ref912 
--

CREATE INDEX Ref912 ON Licencias(IdAgente)
;
-- 
-- INDEX: Ref2422 
--

CREATE INDEX Ref2422 ON Meses(Anio)
;
-- 
-- INDEX: Ref98 
--

CREATE INDEX Ref98 ON Ocupaciones(IdAgente)
;
-- 
-- INDEX: Ref69 
--

CREATE INDEX Ref69 ON Ocupaciones(IdDepartamento, IdCargo, IdReparticion)
;
-- 
-- INDEX: UI_Nombre 
--

CREATE UNIQUE INDEX UI_Reparticion ON Reparticiones(Reparticion)
;
-- 
-- INDEX: UI_NroPolizaIdAseguradora 
--

CREATE UNIQUE INDEX UI_NroPolizaIdAseguradora ON Seguros(NroPoliza, IdAseguradora)
;
-- 
-- INDEX: Ref94 
--

CREATE INDEX Ref94 ON Seguros(IdAgente)
;
-- 
-- INDEX: Ref1258 
--

CREATE INDEX Ref1258 ON Seguros(IdTipoSeguro)
;
-- 
-- INDEX: Ref3463 
--

CREATE INDEX Ref3463 ON Seguros(IdAseguradora)
;
-- 
-- INDEX: Ref914 
--

CREATE INDEX Ref914 ON Sueldos(IdAgente)
;
-- 
-- INDEX: Ref2321 
--

CREATE INDEX Ref2321 ON Sueldos(Anio, Mes)
;
-- 
-- INDEX: UI_TipoCargo 
--

CREATE UNIQUE INDEX UI_TipoCargo ON TiposCargos(TipoCargo)
;
-- 
-- INDEX: UI_TipoLicencia 
--

CREATE UNIQUE INDEX UI_TipoLicencia ON TiposLicencia(TipoLicencia)
;
-- 
-- INDEX: UI_TipoSeguro 
--

CREATE UNIQUE INDEX UI_TipoSeguro ON TiposSeguro(TipoSeguro)
;
-- 
-- TABLE: AdjuntosEn 
--

ALTER TABLE AdjuntosEn ADD CONSTRAINT RefSueldos29 
    FOREIGN KEY (IdSueldo, IdAgente, Mes, Anio)
    REFERENCES Sueldos(IdSueldo, IdAgente, Mes, Anio)
;

ALTER TABLE AdjuntosEn ADD CONSTRAINT RefItemsDetalle30 
    FOREIGN KEY (IdItemDetalle)
    REFERENCES ItemsDetalle(IdItemDetalle)
;


-- 
-- TABLE: Asistencias 
--

ALTER TABLE Asistencias ADD CONSTRAINT RefAgentes13 
    FOREIGN KEY (IdAgente)
    REFERENCES Agentes(IdAgente)
;

ALTER TABLE Asistencias ADD CONSTRAINT RefMeses20 
    FOREIGN KEY (Anio, Mes)
    REFERENCES Meses(Anio, Mes)
;


-- 
-- TABLE: Cargos 
--

ALTER TABLE Cargos ADD CONSTRAINT RefDepartamentos7 
    FOREIGN KEY (IdDepartamento, IdReparticion)
    REFERENCES Departamentos(IdDepartamento, IdReparticion)
;

ALTER TABLE Cargos ADD CONSTRAINT RefCategoriasCargo60 
    FOREIGN KEY (IdCC)
    REFERENCES CategoriasCargo(IdCC)
;

ALTER TABLE Cargos ADD CONSTRAINT RefTiposCargos61 
    FOREIGN KEY (IdTipoCargo)
    REFERENCES TiposCargos(IdTipoCargo)
;


-- 
-- TABLE: Departamentos 
--

ALTER TABLE Departamentos ADD CONSTRAINT RefReparticiones6 
    FOREIGN KEY (IdReparticion)
    REFERENCES Reparticiones(IdReparticion)
;


-- 
-- TABLE: Licencias 
--

ALTER TABLE Licencias ADD CONSTRAINT RefTiposLicencia59 
    FOREIGN KEY (IdTipoLicencia)
    REFERENCES TiposLicencia(IdTipoLicencia)
;

ALTER TABLE Licencias ADD CONSTRAINT RefAgentes12 
    FOREIGN KEY (IdAgente)
    REFERENCES Agentes(IdAgente)
;


-- 
-- TABLE: Meses 
--

ALTER TABLE Meses ADD CONSTRAINT RefAnios22 
    FOREIGN KEY (Anio)
    REFERENCES Anios(Anio)
;


-- 
-- TABLE: Ocupaciones 
--

ALTER TABLE Ocupaciones ADD CONSTRAINT RefAgentes8 
    FOREIGN KEY (IdAgente)
    REFERENCES Agentes(IdAgente)
;

ALTER TABLE Ocupaciones ADD CONSTRAINT RefCargos9 
    FOREIGN KEY (IdCargo, IdDepartamento, IdReparticion)
    REFERENCES Cargos(IdCargo, IdDepartamento, IdReparticion)
;


-- 
-- TABLE: Seguros 
--

ALTER TABLE Seguros ADD CONSTRAINT RefAgentes4 
    FOREIGN KEY (IdAgente)
    REFERENCES Agentes(IdAgente)
;

ALTER TABLE Seguros ADD CONSTRAINT RefTiposSeguro58 
    FOREIGN KEY (IdTipoSeguro)
    REFERENCES TiposSeguro(IdTipoSeguro)
;

ALTER TABLE Seguros ADD CONSTRAINT RefTipoAseguradora63 
    FOREIGN KEY (IdAseguradora)
    REFERENCES TipoAseguradora(IdAseguradora)
;


-- 
-- TABLE: Sueldos 
--

ALTER TABLE Sueldos ADD CONSTRAINT RefAgentes14 
    FOREIGN KEY (IdAgente)
    REFERENCES Agentes(IdAgente)
;

ALTER TABLE Sueldos ADD CONSTRAINT RefMeses21 
    FOREIGN KEY (Anio, Mes)
    REFERENCES Meses(Anio, Mes)
;



