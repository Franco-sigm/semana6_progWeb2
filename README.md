# 🛡️ Feature: Validaciones en Formulario de Reservas

## 🎯 Objetivo
Mejorar la calidad de los datos ingresados en los formularios de reserva, tanto en el frontend como en el backend, garantizando que los datos sean completos, válidos y consistentes.

## 📌 Áreas de validación a trabajar

### 1. Validaciones en Frontend (JavaScript)
- Campos vacíos (`input[required]`)
- Tipos de datos numéricos (`plazas`, `tarifa_noche`)
- Correos con formato válido
- Fechas válidas y no en el pasado
- Visualización de errores (alertas o mensajes en pantalla)

### 2. Validaciones en Backend (PHP)
- Repetir las validaciones de JS por seguridad
- Sanitizar y validar inputs antes de procesarlos
- Generar mensajes de error específicos y amigables

### 3. Casos especiales
- Validación cruzada para evitar duplicados (cliente + destino + fecha)
- Validaciones distintas para vuelos y hoteles

## 🧪 Casos de prueba recomendados
| Caso | Esperado |
|------|----------|
| Campo vacío | Muestra mensaje y no envía |
| Número negativo | Muestra error |
| Fecha pasada | Muestra advertencia |
| Email mal formado | Bloquea envío |
| Reserva duplicada | Advierte al usuario |

##quienes pueden colaborar?
todos!! especialmente los compañeros de IACC

## 📂 Estructura recomendada
semana6_progWeb2/ └── js/ └── validaciones.js └── php/ └── validar_reserva.php


## ✅ Estado actual
- [x] Base funcional en JS para campos vacíos
- [ ] Validación avanzada numérica
- [ ] Validación de fecha y correo
- [ ] Refactor en funciones modulares
- [ ] Backend pendiente

## 🔗 Rama
`feature/validaciones-reservas`


