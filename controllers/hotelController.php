<?php
require_once(__DIR__ . '/../models/Hotel.php');
require_once(__DIR__ . '/../bd/conexiondb.php'); // este contiene $conn (mysqli)

// Este método se ejecuta cuando el formulario de hotel es enviado
class HotelController {

    public function guardar() {
        global $conn;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // Capturar datos del formulario

            $nombre = trim($_POST['nombre']);
            $ubicacion = trim($_POST['ubicacion']);
            $habitaciones_disponibles = (int)$_POST['habitaciones_disponibles'];
            $tarifa_noche = (float)$_POST['tarifa_noche'];

            // Validación básica
            if ($nombre === '' || $ubicacion === '' || $habitaciones_disponibles <= 0 || $tarifa_noche < 0) {
                echo "❌ Datos inválidos.";
                return;
            }

            // Llamar al modelo para insertar
            $resultado = Hotel::insertar($conn, $nombre, $ubicacion, $habitaciones_disponibles, $tarifa_noche);

            if ($resultado) {
                // Redirigir o mostrar mensaje
                header("Location: index.php?action=hotel_listo");
                exit();
            } else {
                echo "❌ Error al insertar el hotel.";
            }
        } else {
            echo "⚠️ Acceso inválido.";
        }
    }
}
