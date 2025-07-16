<?php
require_once(__DIR__ . '/../models/reserva.php');
require_once(__DIR__ . '/../bd/conexiondb.php');
/*require_once(__DIR__ . '/controllers/reservaController.php');*/



class ReservaController {
    
    public function guardar() {
        global $conn;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Capturar datos del formulario
            $id_cliente = $_POST['id_cliente'];
            $fecha_reserva = $_POST['fecha_reserva'];
            $id_vuelo = $_POST['id_vuelo'];
            $id_hotel = $_POST['id_hotel'];

            // Validación básica
            if (
                empty($id_cliente) ||
                empty($fecha_reserva) ||
                $id_vuelo <= 0 ||
                $id_hotel <= 0
            ) {
                echo '<div class="notification is-danger">❌ Datos inválidos. Verifica todos los campos.</div>';
                return;
            }

            // Llamar al modelo para insertar
            if (Reserva::insertar($conn, $id_cliente, $fecha_reserva, $id_vuelo, $id_hotel)) {
                header("Location: index.php?action=reserva_guardada");
                exit();
            } else {
                echo '<div class="notification is-danger">❌ Error al guardar la reserva en la base de datos.</div>';
            }

        } else {
            echo '<div class="notification is-warning">⚠️ Método no permitido.</div>';
        }
    }
    // Método para mostrar los hoteles con más de dos reservas
    public function mostrarHotelesPopulares() {
        global $conn;
        $resultado = Reserva::hotelesConMasDeDosReservas($conn);
        include(__DIR__ . '/../views/hotel_mas_reservas.php');
  }
}




