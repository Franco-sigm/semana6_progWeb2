<?php
require_once(__DIR__ . '/../models/Vuelo.php');
require_once(__DIR__ . '/../bd/conexiondb.php'); // este contiene $conn (mysqli)

// Este método se ejecuta cuando el formulario de vuelo es enviado
class VueloController {
    
    public function guardar() {
        global $conn;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // Capturar datos del formulario
            $origen = trim($_POST['origen']);
            $destino = trim($_POST['destino']);
            $fecha = $_POST['fecha'];
            $plazas = (int)$_POST['plazas'];
            $precio = (float)$_POST['precio'];

            // Validación básica
            if ($origen === '' || $destino === '' || $plazas <= 0 || $precio < 0) {
                echo "❌ Datos inválidos.";
                return;
            }

            // Llamar al modelo para insertar
            $resultado = Vuelo::insertar($conn, $origen, $destino, $fecha, $plazas, $precio);

            if ($resultado) {
                // Redirigir o mostrar mensaje
                header("Location: index.php?action=vuelo_listo");
                exit();
            } else {
                echo "❌ Error al insertar el vuelo.";
            }
        } else {
            echo "⚠️ Acceso inválido.";
        }
    }
}
