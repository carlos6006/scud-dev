-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.27-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para scud
CREATE DATABASE IF NOT EXISTS `scud` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `scud`;

-- Volcando estructura para vista scud.payment_summary
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `payment_summary` (
	`users_id` BIGINT(20) UNSIGNED NOT NULL,
	`anio` VARCHAR(4) NULL COLLATE 'utf8mb4_general_ci',
	`mes` INT(2) NULL,
	`recibes` DOUBLE(19,2) NULL,
	`recibes_tus_ganancias` DOUBLE(19,2) NULL,
	`recibes_saldo_viajes_pagos_efectivo` DOUBLE(19,2) NULL,
	`recibes_tus_ganancias_tarifa` DOUBLE(19,2) NULL,
	`recibes_tus_ganancias_impuestos` DOUBLE(19,2) NULL,
	`recibes_tus_ganancias_retencion_isr` DOUBLE(19,2) NULL,
	`recibes_tus_ganancias_tarifa_tarifa` DOUBLE(19,2) NULL,
	`recibes_tus_ganancias_impuesto_servicio` DOUBLE(19,2) NULL,
	`recibes_tus_ganancias_retencion_iva` DOUBLE(19,2) NULL,
	`recibes_saldo_viajes_iva_tarifas_contribuciones` DOUBLE(19,2) NULL,
	`recibes_tus_ganancias_tarifa_ajuste` DOUBLE(19,2) NULL,
	`recibes_tus_ganancias_tarifa_dinamica` DOUBLE(19,2) NULL,
	`recibes_tus_ganancias_tarifa_espera_recoleccion` DOUBLE(19,2) NULL,
	`recibes_saldo_viajes_pagos_transferencia_bancaria` DOUBLE(19,2) NULL,
	`recibes_tus_ganancias_tarifa_cancelacion` DOUBLE(19,2) NULL,
	`recibes_tus_ganancias_promocion_desafio` DOUBLE(19,2) NULL,
	`recibes_saldo_viajes_impuestos_iva_servicio` DOUBLE(19,2) NULL,
	`recibes_tus_ganancias_extra_gratificacion_usuario` DOUBLE(19,2) NULL,
	`recibes_tus_ganancias_promocion_turbo` DOUBLE(19,2) NULL,
	`recibes_tus_ganancias_otras_tarifas_ajuste` DOUBLE(19,2) NULL,
	`recibes_ajustes_posteriores_viaje` DOUBLE(19,2) NULL,
	`recibes_saldo_viajes_gastos_peaje` DOUBLE(19,2) NULL,
	`recibes_saldo_viajes_reembolsos_deposito_validacion_cuenta` DOUBLE(19,2) NULL,
	`recibes_tus_ganancias_tarifa_base` DOUBLE(19,2) NULL,
	`recibes_tus_ganancias_tarifa_base_iva` DOUBLE(19,2) NULL,
	`recibes_saldo_viajes_reembolsos_peaje` DOUBLE(19,2) NULL,
	`recibes_tus_ganancias_otras_ganancias_ajuste` DOUBLE(19,2) NULL,
	`recibes_tus_ganancias_promocion_ganancia_referir` DOUBLE(19,2) NULL,
	`recibes_tus_ganancias_impuestos_retencion` DOUBLE(19,2) NULL,
	`recibes_tus_ganancias_tarifa_cancelacion_extra_espera_adicional` DOUBLE(19,2) NULL
) ENGINE=MyISAM;

-- Volcando estructura para vista scud.payment_summary
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `payment_summary`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `payment_summary` AS SELECT users_id, 
    CAST(YEAR(MAX(vs_informes)) AS CHAR) AS anio,MONTH(vs_informes) AS mes,     SUM(recibes) AS recibes, 
    SUM(recibes_tus_ganancias) AS recibes_tus_ganancias, 
    SUM(recibes_saldo_viajes_pagos_efectivo) AS recibes_saldo_viajes_pagos_efectivo,
    SUM(recibes_tus_ganancias_tarifa) AS recibes_tus_ganancias_tarifa,
    SUM(recibes_tus_ganancias_impuestos) AS recibes_tus_ganancias_impuestos,
    SUM(recibes_tus_ganancias_retencion_isr) AS recibes_tus_ganancias_retencion_isr,
    SUM(recibes_tus_ganancias_tarifa_tarifa) AS recibes_tus_ganancias_tarifa_tarifa,
    SUM(recibes_tus_ganancias_impuesto_servicio) AS recibes_tus_ganancias_impuesto_servicio,
    SUM(recibes_tus_ganancias_retencion_iva) AS recibes_tus_ganancias_retencion_iva,
    SUM(recibes_saldo_viajes_iva_tarifas_contribuciones) AS recibes_saldo_viajes_iva_tarifas_contribuciones,
    SUM(recibes_tus_ganancias_tarifa_ajuste) AS recibes_tus_ganancias_tarifa_ajuste,
    SUM(recibes_tus_ganancias_tarifa_dinamica) AS recibes_tus_ganancias_tarifa_dinamica,
    SUM(recibes_tus_ganancias_tarifa_espera_recoleccion) AS recibes_tus_ganancias_tarifa_espera_recoleccion,
    SUM(recibes_saldo_viajes_pagos_transferencia_bancaria) AS recibes_saldo_viajes_pagos_transferencia_bancaria,
    SUM(recibes_tus_ganancias_tarifa_cancelacion) AS recibes_tus_ganancias_tarifa_cancelacion,
    SUM(recibes_tus_ganancias_promocion_desafio) AS recibes_tus_ganancias_promocion_desafio,
    SUM(recibes_saldo_viajes_impuestos_iva_servicio) AS recibes_saldo_viajes_impuestos_iva_servicio,
    SUM(recibes_tus_ganancias_extra_gratificacion_usuario) AS recibes_tus_ganancias_extra_gratificacion_usuario,
    SUM(recibes_tus_ganancias_promocion_turbo) AS recibes_tus_ganancias_promocion_turbo,
    SUM(recibes_tus_ganancias_otras_tarifas_ajuste) AS recibes_tus_ganancias_otras_tarifas_ajuste,
    SUM(recibes_ajustes_posteriores_viaje) AS recibes_ajustes_posteriores_viaje,
    SUM(recibes_saldo_viajes_gastos_peaje) AS recibes_saldo_viajes_gastos_peaje,
    SUM(recibes_saldo_viajes_reembolsos_deposito_validacion_cuenta) AS recibes_saldo_viajes_reembolsos_deposito_validacion_cuenta,
    SUM(recibes_tus_ganancias_tarifa_base) AS recibes_tus_ganancias_tarifa_base,
    SUM(recibes_tus_ganancias_tarifa_base_iva) AS recibes_tus_ganancias_tarifa_base_iva,
    SUM(recibes_saldo_viajes_reembolsos_peaje) AS recibes_saldo_viajes_reembolsos_peaje,
    SUM(recibes_tus_ganancias_otras_ganancias_ajuste) AS recibes_tus_ganancias_otras_ganancias_ajuste,
    SUM(recibes_tus_ganancias_promocion_ganancia_referir) AS recibes_tus_ganancias_promocion_ganancia_referir,
    SUM(recibes_tus_ganancias_impuestos_retencion) AS recibes_tus_ganancias_impuestos_retencion,
    SUM(recibes_tus_ganancias_tarifa_cancelacion_extra_espera_adicional) AS recibes_tus_ganancias_tarifa_cancelacion_extra_espera_adicional
FROM import_payment_transactions
WHERE YEAR(vs_informes) = 2023
GROUP BY users_id, YEAR(vs_informes), MONTH(vs_informes) ;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
