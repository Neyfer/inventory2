<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computadoras</title>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="fluid-container">
        <?php
            include "components/header.php";
            include "mysql.php";
        ?>
    </div>
    <div class="row fluid-container">
        <div class="col-2">
            <?php
                include "components/aside.php";
            ?>
        </div>
                <div class="col-10 mt-5 ps-5 pt-3 container">
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-1 pe-0 me-0 col-form-label" style="width: 4%">Tipo</label>
                        <div class="col-sm-2 ps-0 ms-0">
                            <select id="tipo" class="form-select">
                                <option value = "0"></option>
                                <option value = "Todo en 1">Todo en 1</option>
                                <option value = "Laptop">Laptop</option>
                                <option value = "De torre">De Torre</option>
                            </select>
                        </div>

                        <label for="colFormLabel" class="col-sm-1 pe-0 me-0 col-form-label" style="width: 4.5%">Desde</label>
                        <div class="col-sm-2 ps-0 ms-0">
                            <input id="fecha1" type="date" class="form-control">
                        </div>
                        <label for="colFormLabel" class="col-sm-1 pe-0 me-0 col-form-label" style="width: 4.5%">Hasta</label>
                        <div class="col-sm-2 ps-0 ms-0">
                            <input id="fecha2" type="date" class="form-control">
                        </div>

                        <div class="col-sm-3">
                            <input id="nombre" type="text" placeholder="Buscar por nombre" class="form-control">
                        </div>

                        <div class="col-sm-1">
                            <input type="button" data-bs-toggle="modal" href="#registro" value="Agregar"  class="btn btn-primary">
                        </div>
                    </div>

                    <div class="row col-12">
                        <table class="table table-bordered">
                            <thead class="table-secondary">
                                <th>N°</th>
                                <th>Nombre</th>
                                <th>Tipo</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Cantidad</th>
                                <th>Estado</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                            </thead>

                            <tbody id="table-c-body">
                            <?php
                                $data = mysqli_query($conn, "SELECT * FROM compus");

                                while($row = mysqli_fetch_assoc($data)){
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
                            ?>
                        </tbody>
                        </table>
                    </div>
                </div>
         </div>

         <!-- MODAL FORMULARIO DE REGISTRO -->

            <div class="modal modal-lg fade" id="registro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h5 class="modal-title" id="exampleModalLabel">Registrar Computadora</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body container">
                        <form  class="row" method="post" action="computadoras.php">
                            <div class="col-6">
                                <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Nombre:</label>
                                <input type="text" name="nombre" class="form-control" id="recipient-name">
                                </div>

                                <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Tipo:</label>
                                    <select name = "tipo" class="form-select">
                                        <option></option>
                                        <option>Todo en 1</option>
                                        <option>Laptop</option>
                                        <option>De Torre</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Marca:</label>
                                <input type="text" name="marca" class="form-control" id="recipient-name">
                                </div>

                                <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Modelo:</label>
                                <input type="text" name ="modelo" class="form-control" id="recipient-name">
                                </div>

                                <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Cantidad:</label>
                                <input type="number" name="cantidad" class="form-control" id="recipient-name">
                                </div>

                                
                            </div>
                        <div class="col-6">
                                <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Estado:</label>
                                    <select name="estado" class="form-select">
                                        <option></option>
                                        <option>Funcionando</option>
                                        <option>Dañado</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Fecha:</label>
                                <input type="date" name ="fecha" class="form-control" id="recipient-name" value="<?php echo date('Y-m-d'); ?>">
                                </div>

                            <div class="mb-5">
                                <label for="message-text" class="col-form-label">Comentarios:</label>
                                <textarea class="form-control" name="comentarios" id="message-text" rows="8"></textarea>
                            </div>
                        </div>
                        
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" name="save-pc" class="btn btn-primary">Guardar</button>
                    </div>
                        </form>
                    </div>
                    
                    </div>
                </div>
            </div>
<script>
    document.getElementById("c-dash").classList.add("active");
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script src="../js/main.js" crossorigin="anonymous"></script>

    <?php
    include "mysql.php";
        if(isset($_POST['save-pc'])){
            $nombre = $_POST['nombre'];
            $tipo = $_POST['tipo'];
            $marca = $_POST['marca'];
            $modelo = $_POST['modelo'];
            $cantidad = $_POST['cantidad'];
            $estado = $_POST['estado'];
            $fecha = $_POST['fecha'];
            $comentarios = $_POST['comentarios'];
            mysqli_query($conn, "INSERT INTO compus(`nombre`, `tipo`, `marca`, `modelo`, `cantidad`, `estado`, `fecha`, `comentarios`) VALUES('$nombre', '$tipo', '$marca', '$modelo', '$cantidad', '$estado', '$fecha', '$comentarios')");
             echo "<meta http-equiv='refresh' content='0'>";
        }
    ?>

</body>
</html>