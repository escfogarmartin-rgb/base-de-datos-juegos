<?php
include "conexion.php";

$consulta = "";
if (isset($_POST["consulta"])) {
    $consulta = $_POST["consulta"];
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Consultas SQL</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

    <h2>Consultas SQL</h2>

    <form method="post">
        <textarea name="consulta" placeholder="SELECT COUNT(*) FROM ventas;"><?php echo htmlspecialchars($consulta); ?></textarea>
        <br>
        <button type="submit">Ejecutar</button>
    </form>

<?php
if ($consulta != "") {
    
    $inicio = strtolower(substr(trim($consulta), 0, 6));
    if ($inicio != "select" && $inicio != "show t" && $inicio != "descri") {
        echo "<p>Solo se permiten SELECT, SHOW TABLES y DESCRIBE.</p>";
    } else {
        $resultado = mysqli_query($conexion, $consulta);

        if (!$resultado) {
            echo "<p>Error: " . mysqli_error($conexion) . "</p>";
        } else {
            echo "<table><tr>";
            // nombres de las columnas
            while ($campo = mysqli_fetch_field($resultado)) {
                echo "<th>" . $campo->name . "</th>";
            }
            echo "</tr>";
            // filas
            while ($fila = mysqli_fetch_row($resultado)) {
                echo "<tr>";
                foreach ($fila as $dato) {
                    echo "<td>" . htmlspecialchars((string)$dato) . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
            echo "<p>" . mysqli_num_rows($resultado) . " filas</p>";
        }
    }
}
?>

</body>
</html>
