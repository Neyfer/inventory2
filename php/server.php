<?php

    include "mysql.php";
    if(isset($_REQUEST['compu_filter'])){
        $tipo = $_POST['tipo'];
        $fecha1 = $_POST['fecha1'];
        $fecha2 = $_POST['fecha2'];
        $nombre = $_POST['nombre'];
        $and = false;

        $query1 = "SELECT * FROM compus";

        if($tipo == "" && $fecha1 == "" && $fecha2 == "" && $nombre = ""){
            $query1 = "SELEC * FROM compus";
        }else{
            if($tipo != ""){
                $q_tipo = "";
                    if($and == true){
                        $q_tipo = " AND `tipo` LIKE '%$tipo%'";
                    }else{
                        $q_tipo = " `tipo` LIKE '%$tipo%'";
                        $and = true;
                    }
                    $query1 .= $q_tipo;
            }

            if($fecha1 != "" && $fecha2 != ""){
                $q_fecha = "";
                    if($and == true){
                        $q_fecha = " AND `fecha` BETWEEN '$fecha1' AND '$fecha2'";
                    }else{
                        $q_fecha = " `fecha` BETWEEN '$fecha1' AND '$fecha2'";
                        $and = true;
                    }
                    $query1 .= $q_fecha;
            }

            if($nombre != ""){
                $q_nombre = "";
                    if($and == true){
                        $q_nombre = " AND `nombre` = '$nombre'";
                    }else{
                        $q_nombre = " `nombre` = '$nombre'";
                        $and = true;
                    }
                    $query1 .= $q_nombre;
            }
        }

        $data = mysqli_query($conn, $query1);

        $i = 0;

        while($rows = mysqli_fetch_assoc($data)){
            $i++;

            echo "
                 <tr>
                     <td>$i</td>
                     <td>$row[nombre]</td>
                     <td>$row[tipo]</td>
                     <td>$row[marca]</td>
                     <td>$row[modelo]</td>
                     <td>$row[cantidad]</td>
                     <td>$row[estado]</td>
                     <td>$row[fecha]</td>
                     <td></td>
                 </tr>
             ";
        }
    }
?>