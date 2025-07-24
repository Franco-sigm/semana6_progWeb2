<?php

// models/hotel.php
class Hotel {
    public static function insertar($conn, $nombre, $ubicacion, $habitaciones_disponibles, $tarifa_noche) {
        $stmt = $conn->prepare("INSERT INTO hotel (nombre, ubicacion, habitaciones_disponibles, tarifa_noche) VALUES (?, ?, ?, ?)");
        if (!$stmt) return false;

        $stmt->bind_param("ssii", $nombre, $ubicacion, $habitaciones_disponibles, $tarifa_noche);
        $resultado = $stmt->execute();
        $stmt->close();

        return $resultado;
    }
}
