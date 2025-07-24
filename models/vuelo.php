<?php

// models/Vuelo.php
class Vuelo {
    public static function insertar($conn, $origen, $destino, $fecha, $plazas, $precio) {
        $stmt = $conn->prepare("INSERT INTO vuelo (origen, destino, fecha, plazas_disponibles, precio) VALUES (?, ?, ?, ?, ?)");
        if (!$stmt) return false;

        $stmt->bind_param("sssii", $origen, $destino, $fecha, $plazas, $precio);
        $resultado = $stmt->execute();
        $stmt->close();

        return $resultado;
    }
}
