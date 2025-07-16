<?php
class Reserva {
    public static function insertar($conn, $id_cliente, $fecha_reserva, $id_vuelo, $id_hotel) {
        if (!$conn) {
            error_log("Conexión no válida en Reserva::insertar");
            return false;
        }

        $sql = "INSERT INTO reserva (id_cliente, fecha_reserva, id_vuelo, id_hotel) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            error_log("Error en prepare(): " . $conn->error);
            return false;
        }

        $stmt->bind_param("isii", $id_cliente, $fecha_reserva, $id_vuelo, $id_hotel);

        if (!$stmt->execute()) {
            error_log("Error en execute(): " . $stmt->error);
            $stmt->close();
            return false;
        }

        $stmt->close();
        return true;
    }


    public static function hotelesConMasDeDosReservas($conn) {
        $sql = "
        SELECT h.id_hotel, h.nombre, h.ubicacion, COUNT(r.id_reserva) AS total_reservas
        FROM HOTEL h
        JOIN RESERVA r ON h.id_hotel = r.id_hotel
        GROUP BY h.id_hotel, h.nombre, h.ubicacion
        HAVING total_reservas > 2
        ORDER BY total_reservas DESC
        ";
        return mysqli_query($conn, $sql);
  
   }
}