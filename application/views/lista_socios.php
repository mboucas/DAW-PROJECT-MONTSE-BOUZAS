<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Lista de Socios</title> 
<style>

  body {
    background-image: url("../assets/img/lista-socios1.jpg");
    background-size:auto;
    background-position: center;
    background-attachment: fixed;
  }
  
  #tabla-container {
    position: auto;
    z-index: 1;
    background-color: rgba(255, 255, 255, 0.8);
    margin:  auto;
    max-width: 100%;
  }
  
  table {
    width: 100%;
    border-collapse: auto;
  }
  
  th, td {
    padding: 10px;
    text-align: center;
  }
  
  th {
    background-color: #e6e6e6;
    font-weight: bold;
  }
  
  tr:nth-child(even) {
    background-color: #f2f2f2;
  }
</style>

</style>
</head>
<body class="lista-socios">
    <div id="tabla-container">
        <table border="2">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Primer Apellido</th>
                <th>Segundo Apellido</th>
                <th>Teléfono</th>
                <th>EMAIL</th>
                <th>DNI</th>
                <th>Fecha de Alta</th>
                <th>Fecha de Modificación</th>
                <th>Fecha de Deshabilitación</th>
            </tr>

            <?php
            require_once '../src/database.php';
            include "../views/dashboard.php";
            $conn = mysqli_connect($host, $usuario, $contraseña, $baseDatos);

            if (mysqli_connect_errno()) {
                die("Fallo la conexión: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM socios";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $ID = $row['ID'];
                    $NOMBRE = $row['NOMBRE'];
                    $PRIMER_APELLIDO = $row['PRIMER_APELLIDO'];
                    $SEGUNDO_APELLIDO = $row['SEGUNDO_APELLIDO'];
                    $TELEFONO = $row['TELEFONO'];
                    $EMAIL = $row['EMAIL'];
                    $DNI = $row['DNI'];
                    $FECHA_ALTA = $row['FECHA_ALTA'];
                    $FECHA_MODIFICACION = isset($row['FECHA_MODIFICACION']) ? $row['FECHA_MODIFICACION'] : '';
                    $FECHA_DESHABILITACION = isset($row['FECHA_DESHABILITACION']) ? $row['FECHA_DESHABILITACION'] : '';

                    echo "<tr>";
                    echo "<td>$ID</td>";
                    echo "<td>$NOMBRE</td>";
                    echo "<td>$PRIMER_APELLIDO</td>";
                    echo "<td>$SEGUNDO_APELLIDO</td>";
                    echo "<td>$TELEFONO</td>";
                    echo "<td>$EMAIL</td>";
                    echo "<td>$DNI</td>";
                    echo "<td>$FECHA_ALTA</td>";
                    echo "<td>$FECHA_MODIFICACION</td>";
                    echo "<td>$FECHA_DESHABILITACION</td>";
                    echo "</tr>";
                }
            } else {
                echo "0 results";
            }

            mysqli_close($conn);
            ?>
        </table>
    </div>
</body>
</html>


  
