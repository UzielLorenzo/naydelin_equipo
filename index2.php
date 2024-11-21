<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #0078D7;
            color: white;
            padding: 20px 0;
        }
        main {
            padding: 20px;
        }
        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 80%;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        footer {
            background-color: #333;
            color: white;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>¡Bienvenido a Mi Sitio Web!</h1>
    </header>
    <main>
        <?php
            // Mostrar un mensaje dinámico de bienvenida
            $nombre = "Usuario"; // Puedes cambiar este valor dinámicamente
            $hora = date("H");

            // Mensaje de bienvenida basado en la hora del día
            if ($hora < 12) {
                $saludo = "Buenos días";
            } elseif ($hora < 18) {
                $saludo = "Buenas tardes";
            } else {
                $saludo = "Buenas noches";
            }

            echo "<h2>$saludo, $nombre.</h2>";
            echo "<p>Estamos felices de tenerte aquí. Explora y disfruta nuestro contenido.</p>";

            // Conexión a la base de datos
            $servername = "localhost";
            $username = "root"; // Cambia esto si tienes otro usuario
            $password = ""; // Cambia esto si tienes una contraseña
            $dbname = "sistema_estudiantes";

            // Crear conexión
            $conn = pg_connect("host=equipo1.postgres.database.azure.com port=5432 dbname=controlescolar user=equipo password=123Chiquita;

            // Verificar conexión
            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            // Obtener los datos de la tabla
            $sql = "SELECT no_control, nombre, carrera FROM public.estudiantes";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table>
                        <tr>
                            <th>No. de Control</th>
                            <th>Nombre</th>
                            <th>Carrera</th>
                        </tr>";
                // Imprimir los datos
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['no_control']}</td>
                            <td>{$row['nombre']}</td>
                            <td>{$row['carrera']}</td>
                        </tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No hay estudiantes registrados.</p>";
            }

            $conn->close();
        ?>
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Mi Sitio Web. Todos los derechos reservados.</p>
    </footer>
</body>
</html>