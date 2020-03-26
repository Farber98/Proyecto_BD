INSERT INTO `AdministracionPublica`.`Reparticiones` (`IdReparticion`, `Reparticion`, `Direccion`) VALUES ('1', 'Casa de Gobierno', '25 de mayo 15');
INSERT INTO `AdministracionPublica`.`Reparticiones` (`IdReparticion`, `Reparticion`, `Direccion`) VALUES ('2', 'Salud', 'Crisostomo Alvarez 150');
INSERT INTO `AdministracionPublica`.`Reparticiones` (`IdReparticion`, `Reparticion`, `Direccion`) VALUES ('3', 'Turismo', '24 de Septiembre 500');
INSERT INTO `AdministracionPublica`.`Reparticiones` (`IdReparticion`, `Reparticion`, `Direccion`) VALUES ('4', 'Economia', 'San Martin 500');
INSERT INTO `AdministracionPublica`.`Reparticiones` (`IdReparticion`, `Reparticion`, `Direccion`) VALUES ('5', 'Educacion', 'Junin 800');


INSERT INTO `AdministracionPublica`.`Departamentos` (`IdDepartamento`, `IdReparticion`, `Departamento`, `Telefono`) VALUES ('1', '1', 'Gastos', '4329434');
INSERT INTO `AdministracionPublica`.`Departamentos` (`IdDepartamento`, `IdReparticion`, `Departamento`, `Telefono`) VALUES ('2', '1', 'Secretaria', '4329593');
INSERT INTO `AdministracionPublica`.`Departamentos` (`IdDepartamento`, `IdReparticion`, `Departamento`, `Telefono`) VALUES ('3', '1', 'Mesa de entrada', '4939234');
INSERT INTO `AdministracionPublica`.`Departamentos` (`IdDepartamento`, `IdReparticion`, `Departamento`, `Telefono`) VALUES ('1', '2', 'Instrumentacion', '4329493');
INSERT INTO `AdministracionPublica`.`Departamentos` (`IdDepartamento`, `IdReparticion`, `Departamento`, `Telefono`) VALUES ('2', '2', 'Gastos', '4320034');


INSERT INTO `AdministracionPublica`.`CategoriasCargo` (`IdCC`, `TipoCategoriaCargo`, `Estado`) VALUES ('1', 'Superior', 'A');
INSERT INTO `AdministracionPublica`.`CategoriasCargo` (`IdCC`, `TipoCategoriaCargo`, `Estado`) VALUES ('2', 'Media', 'A');
INSERT INTO `AdministracionPublica`.`CategoriasCargo` (`IdCC`, `TipoCategoriaCargo`, `Estado`) VALUES ('3', 'Baja', 'A');


INSERT INTO `AdministracionPublica`.`TiposCargos` (`IdTipoCargo`, `TipoCargo`, `Estado`) VALUES ('1', 'Permanente', 'A');
INSERT INTO `AdministracionPublica`.`TiposCargos` (`IdTipoCargo`, `TipoCargo`, `Estado`) VALUES ('2', 'No Permanente', 'A');
INSERT INTO `AdministracionPublica`.`TiposCargos` (`IdTipoCargo`, `TipoCargo`, `Estado`) VALUES ('3', 'Transitoria', 'A');



INSERT INTO `AdministracionPublica`.`Cargos` (`IdCargo`, `IdDepartamento`, `IdReparticion`, `IdCC`, `IdTipoCargo`, `Cargo`) VALUES ('1', '1', '1', '1', '1', 'Director');
INSERT INTO `AdministracionPublica`.`Cargos` (`IdCargo`, `IdDepartamento`, `IdReparticion`, `IdCC`, `IdTipoCargo`, `Cargo`) VALUES ('2', '2', '1', '1', '1', 'Director');
INSERT INTO `AdministracionPublica`.`Cargos` (`IdCargo`, `IdDepartamento`, `IdReparticion`, `IdCC`, `IdTipoCargo`, `Cargo`) VALUES ('3', '1', '1', '2', '2', 'Secretaria');
INSERT INTO `AdministracionPublica`.`Cargos` (`IdCargo`, `IdDepartamento`, `IdReparticion`, `IdCC`, `IdTipoCargo`, `Cargo`) VALUES ('4', '3', '1', '3', '3', 'Ordenanza');
INSERT INTO `AdministracionPublica`.`Agentes` (`IdAgente`, `Nombre`, `Apellido`, `DNI`, `CUIL`, `FechaAlta`, `FechaBaja`) VALUES ('1', 'Pablo', 'Plantas', '41232232', '41232232000', '2014-03-19', null);
INSERT INTO `AdministracionPublica`.`Agentes` (`IdAgente`, `Nombre`, `Apellido`, `DNI`, `CUIL`, `FechaAlta`, `FechaBaja`) VALUES ('2', 'Augusto', 'Barita', '39231242', '39231242001', '2014-03-19', '2019-03-19');
INSERT INTO `AdministracionPublica`.`Agentes` (`IdAgente`, `Nombre`, `Apellido`, `DNI`, `CUIL`, `FechaAlta`, `FechaBaja`) VALUES ('3', 'Leo', 'Griego', '34323454', '34323454002', '2019-03-19', null);
INSERT INTO `AdministracionPublica`.`Agentes` (`IdAgente`, `Nombre`, `Apellido`, `DNI`, `CUIL`, `FechaAlta`, `FechaBaja`) VALUES ('4', 'Martin', 'Buza', '49394234', '49394234003', '2019-03-19', '2019-07-19');


INSERT INTO `AdministracionPublica`.`TipoAseguradora` (`IdAseguradora`, `Aseguradora`, `Estado`) VALUES ('1', 'Zurich', 'A');
INSERT INTO `AdministracionPublica`.`TipoAseguradora` (`IdAseguradora`, `Aseguradora`, `Estado`) VALUES ('2', 'Sancor', 'A');
INSERT INTO `AdministracionPublica`.`TipoAseguradora` (`IdAseguradora`, `Aseguradora`, `Estado`) VALUES ('3', 'Caja Popular', 'A');


INSERT INTO `AdministracionPublica`.`TiposSeguro` (`IdTipoSeguro`, `TipoSeguro`, `Estado`) VALUES ('1', 'Vida', 'A');
INSERT INTO `AdministracionPublica`.`TiposSeguro` (`IdTipoSeguro`, `TipoSeguro`, `Estado`) VALUES ('2', 'Dependencia', 'A');
INSERT INTO `AdministracionPublica`.`TiposSeguro` (`IdTipoSeguro`, `TipoSeguro`, `Estado`) VALUES ('3', 'Accidentes', 'A');
INSERT INTO `AdministracionPublica`.`TiposSeguro` (`IdTipoSeguro`, `TipoSeguro`, `Estado`) VALUES ('4', 'Salud', 'A');
INSERT INTO `AdministracionPublica`.`Seguros` (`IdAgente`, `IdTipoSeguro`, `IdAseguradora`, `NroPoliza`) VALUES ('1', '1', '1', '123456');
INSERT INTO `AdministracionPublica`.`Seguros` (`IdAgente`, `IdTipoSeguro`, `IdAseguradora`, `NroPoliza`) VALUES ('2', '4', '2', '123456');
INSERT INTO `AdministracionPublica`.`Seguros` (`IdAgente`, `IdTipoSeguro`, `IdAseguradora`, `NroPoliza`) VALUES ('3', '3', '3', '534325');
INSERT INTO `AdministracionPublica`.`Seguros` (`IdAgente`, `IdTipoSeguro`, `IdAseguradora`, `NroPoliza`) VALUES ('4', '2', '2', '124532');

INSERT INTO `AdministracionPublica`.`Ocupaciones` (`IdAgente`, `IdCargo`, `IdDepartamento`, `IdReparticion`, `FechaInicio`, `FechaFin`) VALUES ('1', '1', '1', '1', '2014-03-19', null);
INSERT INTO `AdministracionPublica`.`Ocupaciones` (`IdAgente`, `IdCargo`, `IdDepartamento`, `IdReparticion`, `FechaInicio`, `FechaFin`) VALUES ('2', '2', '2', '1', '2014-03-19', '2019-03-19');
INSERT INTO `AdministracionPublica`.`Ocupaciones` (`IdAgente`, `IdCargo`, `IdDepartamento`, `IdReparticion`, `FechaInicio`, `FechaFin`) VALUES ('3', '3', '1', '1', '2019-03-19', null);
INSERT INTO `AdministracionPublica`.`Ocupaciones` (`IdAgente`, `IdCargo`, `IdDepartamento`, `IdReparticion`, `FechaInicio`, `FechaFin`) VALUES ('4', '4', '3', '1', '2019-03-19', '2019-07-19');


INSERT INTO `AdministracionPublica`.`TiposLicencia` (`IdTipoLicencia`, `TipoLicencia`, `Estado`) VALUES ('1', 'Vacaciones anuales ordinarias', 'A');
INSERT INTO `AdministracionPublica`.`TiposLicencia` (`IdTipoLicencia`, `TipoLicencia`, `Estado`) VALUES ('2', 'Matrimonio', 'A');
INSERT INTO `AdministracionPublica`.`TiposLicencia` (`IdTipoLicencia`, `TipoLicencia`, `Estado`) VALUES ('3', 'Adopcion', 'A');
INSERT INTO `AdministracionPublica`.`TiposLicencia` (`IdTipoLicencia`, `TipoLicencia`, `Estado`) VALUES ('4', 'Nacimiento', 'A');
INSERT INTO `AdministracionPublica`.`TiposLicencia` (`IdTipoLicencia`, `TipoLicencia`, `Estado`) VALUES ('5', 'Maternidad', 'A');
INSERT INTO `AdministracionPublica`.`TiposLicencia` (`IdTipoLicencia`, `TipoLicencia`, `Estado`) VALUES ('6', 'Enfermedad corta', 'A');
INSERT INTO `AdministracionPublica`.`TiposLicencia` (`IdTipoLicencia`, `TipoLicencia`, `Estado`) VALUES ('7', 'Enfermedad larga', 'A');
INSERT INTO `AdministracionPublica`.`TiposLicencia` (`IdTipoLicencia`, `TipoLicencia`, `Estado`) VALUES ('8', 'Enfermedad familiar', 'A');
INSERT INTO `AdministracionPublica`.`TiposLicencia` (`IdTipoLicencia`, `TipoLicencia`, `Estado`) VALUES ('9', 'Duelo', 'A');
INSERT INTO `AdministracionPublica`.`TiposLicencia` (`IdTipoLicencia`, `TipoLicencia`, `Estado`) VALUES ('10', 'Examen', 'A');
INSERT INTO `AdministracionPublica`.`TiposLicencia` (`IdTipoLicencia`, `TipoLicencia`, `Estado`) VALUES ('11', 'Capacitacion', 'A');
INSERT INTO `AdministracionPublica`.`TiposLicencia` (`IdTipoLicencia`, `TipoLicencia`, `Estado`) VALUES ('12', 'Deporte', 'A');
INSERT INTO `AdministracionPublica`.`TiposLicencia` (`IdTipoLicencia`, `TipoLicencia`, `Estado`) VALUES ('13', 'Discapacidad familiar', 'A');


INSERT INTO `AdministracionPublica`.`Licencias` (`IdLicencia`, `FechaInicio`, `FechaFin`, `Razon`, `IdAgente`, `IdTipoLicencia`) VALUES ('1', '2014-03-19', '2014-04-05', 'Vacaciones.', '1', '1');
INSERT INTO `AdministracionPublica`.`Licencias` (`IdLicencia`, `FechaInicio`, `FechaFin`, `Razon`, `IdAgente`, `IdTipoLicencia`) VALUES ('2', '2015-03-25', '2014-04-10', 'Vacaciones', '1', '1');
INSERT INTO `AdministracionPublica`.`Licencias` (`IdLicencia`, `FechaInicio`, `FechaFin`, `Razon`, `IdAgente`, `IdTipoLicencia`) VALUES ('3', '2016-03-30', '2016-04-20', 'Vacaciones', '1', '1');
INSERT INTO `AdministracionPublica`.`Licencias` (`IdLicencia`, `FechaInicio`, `FechaFin`, `Razon`, `IdAgente`, `IdTipoLicencia`) VALUES ('4', '2017-04-01', '2017-04-15', 'Vacaciones.', '1', '1');
INSERT INTO `AdministracionPublica`.`Licencias` (`IdLicencia`, `FechaInicio`, `FechaFin`, `Razon`, `IdAgente`, `IdTipoLicencia`) VALUES ('5', '2018-04-05', '2018-04-20', 'Vacaciones', '1', '1');
INSERT INTO `AdministracionPublica`.`Licencias` (`IdLicencia`, `FechaInicio`, `FechaFin`, `Razon`, `IdAgente`, `IdTipoLicencia`) VALUES ('6', '2019-04-10', '2019-04-30', 'Vacaciones', '1', '1');
INSERT INTO `AdministracionPublica`.`Licencias` (`IdLicencia`, `FechaInicio`, `FechaFin`, `Razon`, `IdAgente`, `IdTipoLicencia`) VALUES ('7', '2014-07-19', '2014-07-23', 'Enfermedad.', '2', '6');
INSERT INTO `AdministracionPublica`.`Licencias` (`IdLicencia`, `FechaInicio`, `FechaFin`, `Razon`, `IdAgente`, `IdTipoLicencia`) VALUES ('8', '2015-08-01', '2015-08-04', 'Casamiento', '2', '2');
INSERT INTO `AdministracionPublica`.`Licencias` (`IdLicencia`, `FechaInicio`, `FechaFin`, `Razon`, `IdAgente`, `IdTipoLicencia`) VALUES ('9', '2019-03-19', '2019-03-20', 'Partido de futbol.', '3', '12');
INSERT INTO `AdministracionPublica`.`Licencias` (`IdLicencia`, `FechaInicio`, `FechaFin`, `Razon`, `IdAgente`, `IdTipoLicencia`) VALUES ('10', '2019-05-19', '2019-05-20', 'Examenes.', '3', '10');

INSERT INTO `AdministracionPublica`.`Anios` (`Anio`, `FechaInicio`, `FechaFin`) VALUES (2014, '2014-01-05', '2014-12-20');
INSERT INTO `AdministracionPublica`.`Anios` (`Anio`, `FechaInicio`, `FechaFin`) VALUES (2015, '2015-01-03', '2015-12-23');
INSERT INTO `AdministracionPublica`.`Anios` (`Anio`, `FechaInicio`, `FechaFin`) VALUES (2016, '2016-01-07', '2016-12-24');
INSERT INTO `AdministracionPublica`.`Anios` (`Anio`, `FechaInicio`, `FechaFin`) VALUES (2017, '2017-01-04', '2017-12-19');
INSERT INTO `AdministracionPublica`.`Anios` (`Anio`, `FechaInicio`, `FechaFin`) VALUES (2018, '2018-01-08', '2018-12-22');
INSERT INTO `AdministracionPublica`.`Anios` (`Anio`, `FechaInicio`, `FechaFin`) VALUES (2019, '2019-01-09', '2014-12-21');

INSERT INTO `AdministracionPublica`.`Meses` (`Anio`, `Mes`, `DiaLiquidacion`) VALUES ('2014', '1', '7');
INSERT INTO `AdministracionPublica`.`Meses` (`Anio`, `Mes`, `DiaLiquidacion`) VALUES ('2015', '3', '7');
INSERT INTO `AdministracionPublica`.`Meses` (`Anio`, `Mes`, `DiaLiquidacion`) VALUES ('2016', '4', '8');
INSERT INTO `AdministracionPublica`.`Meses` (`Anio`, `Mes`, `DiaLiquidacion`) VALUES ('2017', '9', '5');
INSERT INTO `AdministracionPublica`.`Meses` (`Anio`, `Mes`, `DiaLiquidacion`) VALUES ('2018', '10', '9');
INSERT INTO `AdministracionPublica`.`Meses` (`Anio`, `Mes`, `DiaLiquidacion`) VALUES ('2019', '11', '7');
INSERT INTO `AdministracionPublica`.`Meses` (`Anio`, `Mes`, `DiaLiquidacion`) VALUES ('2019', '12', '5');


INSERT INTO `AdministracionPublica`.`Asistencias` (`IdAgente`, `Anio`, `Mes`, `Asistencias`, `Inasistencias`, `Tardanzas`) VALUES ('1', '2019', '11', '30', '0', '0');
INSERT INTO `AdministracionPublica`.`Asistencias` (`IdAgente`, `Anio`, `Mes`, `Asistencias`, `Inasistencias`, `Tardanzas`) VALUES ('2', '2019', '11', '29', '1', '0');
INSERT INTO `AdministracionPublica`.`Asistencias` (`IdAgente`, `Anio`, `Mes`, `Asistencias`, `Inasistencias`, `Tardanzas`) VALUES ('3', '2019', '11', '29', '0', '1');
INSERT INTO `AdministracionPublica`.`Asistencias` (`IdAgente`, `Anio`, `Mes`, `Asistencias`, `Inasistencias`, `Tardanzas`) VALUES ('4', '2019', '11', '27', '3', '0');

INSERT INTO `AdministracionPublica`.`Sueldos` (`IdSueldo`, `IdAgente`, `Mes`, `Anio`, `FechaCobro`, `Estado`) VALUES ('1', '1', '11', '2019', '2019-11-08', 'A');
INSERT INTO `AdministracionPublica`.`Sueldos` (`IdSueldo`, `IdAgente`, `Mes`, `Anio`, `FechaCobro`, `Estado`) VALUES ('2', '2', '11', '2019', '2019-11-08', 'A');
INSERT INTO `AdministracionPublica`.`Sueldos` (`IdSueldo`, `IdAgente`, `Mes`, `Anio`, `FechaCobro`, `Estado`) VALUES ('3', '3', '11', '2019', '2019-11-08', 'A');
INSERT INTO `AdministracionPublica`.`Sueldos` (`IdSueldo`, `IdAgente`, `Mes`, `Anio`, `FechaCobro`, `Estado`) VALUES ('4', '4', '11', '2019', '2019-11-08', 'A');
INSERT INTO `AdministracionPublica`.`Sueldos` (`IdSueldo`, `IdAgente`, `Mes`, `Anio`, `FechaCobro`, `Estado`) VALUES ('5', '1', '10', '2018', '2018-10-10', 'A');
INSERT INTO `AdministracionPublica`.`Sueldos` (`IdSueldo`, `IdAgente`, `Mes`, `Anio`, `FechaCobro`, `Estado`) VALUES ('6', '2', '10', '2018', '2018-10-10', 'A');
INSERT INTO `AdministracionPublica`.`Sueldos` (`IdSueldo`, `IdAgente`, `Mes`, `Anio`, `FechaCobro`, `Estado`) VALUES ('7', '3', '10', '2018', '2018-10-10', 'A');
INSERT INTO `AdministracionPublica`.`Sueldos` (`IdSueldo`, `IdAgente`, `Mes`, `Anio`, `FechaCobro`, `Estado`) VALUES ('8', '4', '10', '2018', '2018-10-10', 'A');
INSERT INTO `AdministracionPublica`.`Sueldos` (`IdSueldo`, `IdAgente`, `Mes`, `Anio`, `Estado`) VALUES ('9', '1', '12', '2019', 'A');
INSERT INTO `AdministracionPublica`.`Sueldos` (`IdSueldo`, `IdAgente`, `Mes`, `Anio`, `Estado`) VALUES ('10', '2', '12', '2019', 'A');
INSERT INTO `AdministracionPublica`.`Sueldos` (`IdSueldo`, `IdAgente`, `Mes`, `Anio`, `Estado`) VALUES ('11', '3', '12', '2019', 'A');
INSERT INTO `AdministracionPublica`.`Sueldos` (`IdSueldo`, `IdAgente`, `Mes`, `Anio`, `Estado`) VALUES ('12', '4', '12', '2019', 'A');



INSERT INTO `AdministracionPublica`.`ItemsDetalle` (`IdItemDetalle`, `ItemDetalle`, `TipoItem`, `Alicuota`, `Estado`) VALUES ('1', 'Aporte jubilatorio', 'Debito', '11.00', 'A');
INSERT INTO `AdministracionPublica`.`ItemsDetalle` (`IdItemDetalle`, `ItemDetalle`, `TipoItem`, `Alicuota`, `Estado`) VALUES ('2', 'Aporte salud', 'Debito', '4.50', 'A');
INSERT INTO `AdministracionPublica`.`ItemsDetalle` (`IdItemDetalle`, `ItemDetalle`, `TipoItem`, `Alicuota`, `Estado`) VALUES ('3', 'Aporte seguro', 'Debito', '10.00', 'A');
INSERT INTO `AdministracionPublica`.`ItemsDetalle` (`IdItemDetalle`, `ItemDetalle`, `TipoItem`, `Alicuota`, `Estado`) VALUES ('4', 'Accidente de trabajo', 'Credito', '50.00', 'A');
INSERT INTO `AdministracionPublica`.`ItemsDetalle` (`IdItemDetalle`, `ItemDetalle`, `TipoItem`, `Alicuota`, `Estado`) VALUES ('5', 'Sueldo anual complementario', 'Credito', '50.00', 'A');
INSERT INTO `AdministracionPublica`.`ItemsDetalle` (`IdItemDetalle`, `ItemDetalle`, `TipoItem`, `Alicuota`, `Estado`) VALUES ('6', 'Discapacidad', 'Credito', '75.00', 'A');
INSERT INTO `AdministracionPublica`.`ItemsDetalle` (`IdItemDetalle`, `ItemDetalle`, `TipoItem`, `Alicuota`, `Estado`) VALUES ('7', 'Asignacion familiar', 'Credito', '25.00', 'A');
INSERT INTO `AdministracionPublica`.`ItemsDetalle` (`IdItemDetalle`, `ItemDetalle`, `TipoItem`, `Alicuota`, `Estado`) VALUES ('8', 'Horas extras', 'Credito', '10.00', 'A');
INSERT INTO `AdministracionPublica`.`ItemsDetalle` (`IdItemDetalle`, `ItemDetalle`, `TipoItem`, `Alicuota`, `Estado`) VALUES ('9', 'Titulo', 'Credito', '20.00', 'A');
INSERT INTO `AdministracionPublica`.`ItemsDetalle` (`IdItemDetalle`, `ItemDetalle`, `TipoItem`, `Alicuota`, `Estado`) VALUES ('10', 'Escalafon', 'Credito', '10.00', 'A');
INSERT INTO `AdministracionPublica`.`ItemsDetalle` (`IdItemDetalle`, `ItemDetalle`, `TipoItem`, `Alicuota`, `Estado`) VALUES ('11', 'Presentismo', 'Credito', '15.00', 'A');
INSERT INTO `AdministracionPublica`.`ItemsDetalle` (`IdItemDetalle`, `ItemDetalle`, `TipoItem`, `Alicuota`, `Estado`) VALUES ('12', 'Compensacion no remunerativa', 'Credito', '19.00', 'A');


INSERT INTO `AdministracionPublica`.`AdjuntosEn` (`IdSueldo`, `IdAgente`, `Mes`, `Anio`, `IdItemDetalle`, `MontoParcial`) VALUES ('1', '1', '11', '2019', '1', '33000.00');
INSERT INTO `AdministracionPublica`.`AdjuntosEn` (`IdSueldo`, `IdAgente`, `Mes`, `Anio`, `IdItemDetalle`, `MontoParcial`) VALUES ('1', '1', '11', '2019', '2', '13500.00');
INSERT INTO `AdministracionPublica`.`AdjuntosEn` (`IdSueldo`, `IdAgente`, `Mes`, `Anio`, `IdItemDetalle`, `MontoParcial`) VALUES ('1', '1', '11', '2019', '3', '30000.00');
INSERT INTO `AdministracionPublica`.`AdjuntosEn` (`IdSueldo`, `IdAgente`, `Mes`, `Anio`, `IdItemDetalle`, `MontoParcial`) VALUES ('1', '1', '11', '2019', '9', '60000.00');
INSERT INTO `AdministracionPublica`.`AdjuntosEn` (`IdSueldo`, `IdAgente`, `Mes`, `Anio`, `IdItemDetalle`, `MontoParcial`) VALUES ('1', '1', '11', '2019', '10', '30000.00');
INSERT INTO `AdministracionPublica`.`AdjuntosEn` (`IdSueldo`, `IdAgente`, `Mes`, `Anio`, `IdItemDetalle`, `MontoParcial`) VALUES ('1', '1', '11', '2019', '11', '45000.00');
