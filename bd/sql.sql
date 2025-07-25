-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-07-2025 a las 18:20:23
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


-- Crear la base de datos si no existe y usarla
CREATE DATABASE IF NOT EXISTS agencia_viajes;
USE agencia_viajes;

-- Tabla: vuelo
CREATE TABLE IF NOT EXISTS vuelo (
  id_vuelo INT AUTO_INCREMENT PRIMARY KEY,
  origen VARCHAR(100) NOT NULL,
  destino VARCHAR(100) NOT NULL,
  fecha_salida DATE NOT NULL,
  fecha_regreso DATE NOT NULL,
  plazas INT NOT NULL
);

-- Tabla: hotel
CREATE TABLE IF NOT EXISTS hotel (
  id_hotel INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  ubicacion VARCHAR(100) NOT NULL,
  tarifa_noche DECIMAL(10,2) NOT NULL
);

-- Tabla: cliente
CREATE TABLE IF NOT EXISTS cliente (
  id_cliente INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  correo VARCHAR(100) NOT NULL
);

-- Tabla: reserva
CREATE TABLE IF NOT EXISTS reserva (
  id_reserva INT AUTO_INCREMENT PRIMARY KEY,
  id_vuelo INT,
  id_hotel INT,
  id_cliente INT,
  fecha_reserva DATE NOT NULL,
  FOREIGN KEY (id_vuelo) REFERENCES vuelo(id_vuelo),
  FOREIGN KEY (id_hotel) REFERENCES hotel(id_hotel),
  FOREIGN KEY (id_cliente) REFERENCES cliente(id_cliente)
);
