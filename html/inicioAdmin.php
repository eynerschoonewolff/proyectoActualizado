<?php
include_once "../database/conexion.php";
$sentencia = $bd->query("select * from usuarios");
$usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="../js/JS property/usuariologin.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- cdn icnonos-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<body>
    
    <div class="col-lg-12 text-center bg-light">
        <img src="../img/cabezera.png" class="img-fluid w-25">
    </div>
    
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-5">
        <div class="container-fluid">
            <img src="../img/logo_colegio.png" alt="" class="col-sm-2 col-lg-2 col-3 navbar-brand">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active text-warning" aria-current="page" href="../html/inicioAdmin.php">Administracion</a>
                </div>
            </div>
            <form class="d-flex mt-4">
                <table class="table table-borderless fs-3" id="usuariologin"></table>
            </form>
            
            <div class="p-2 mt-2">
                <a class="btn btn-outline-danger" href="../html/login.html" role="button">Cerrar sesión</a>
            </div>
            
        </div>
    </nav>
    
    <div class="container my-3">
        <div class="row justify-content-center ">
            <div class="col-md-12 m-5">
                <div class="card">
                    <div class="card-header text-center">
                        Listado de Estudiantes
                    </div>
                    <div class="p-4">
                        <div class="table-responsive">
                            <table class="table table-bordered table table-hover">
                                <thead>
                                    <tr class="p-2">
                                        <th scope="col">Correo</th>
                                        <th scope="col">Contraseña</th>
                                        <th scope="col">tipo de usuario</th>
                                        <th scope="col">fecha registro</th>
                                        <th scope="col">Editar</th>
                                        <th scope="col">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($usuarios as $info) {
                                        ?>
                                        <tr>
                                            <td scope="row"><?php echo $info->correo; ?></td>
                                            <td><?php echo $info->contraseña; ?></td>
                                            <td><?php echo $info->tip_user; ?></td>
                                            <td><?php echo $info->fech_reg; ?></td>
                                            <td><a class="text-success" href="../html/editar.php?valor=<?php echo $info->correo; ?>"> <i class="bi bi-pencil-square"></i></a></td>
                                            <td><a onclick="return confirm('Estas seguro que quieres eliminar el usuario');" class="text-danger" href="../database/eliminar.php?correo=<?php echo $info->correo; ?>"> <i class="bi bi-trash"></a></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'errorCorreo') {
                ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> El correo ya existe
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
            }
            ?>
            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
                ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Eliminado!</strong> Se han eliminado los datos correctamente.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
            }
            ?>
            
            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'EnviadoCorrectamente') {
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Registrado!</strong> Se agregaron los datos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
            }
            ?>
            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'ActualizadoCorrectamente') {
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Actualizado!</strong> Los datos se han actualizado correctamente.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
            }
            ?>

<div class=" card-header col-md-9 m-4">
    <div class="card">
        
        <div class="card-header">
            <h5>Registrar nuevo Usuario:</h5>
        </div>
        
        <form action="../database/registrar_informacion.php" method="post">
            
            <div class="m-3">
                
                <div class="mb-4 row">
                    <label for="staticName" class="col-sm-2 col-form-label">correo</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" name="correo" required>
                    </div>
                </div>
                
                <div class="mb-4 row">
                    <label for="staticName" class="col-sm-2 col-form-label">contraseña</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" name="contraseña" required>
                    </div>
                </div>
                
                <div class="mb-4 row ">
                    <label class="col-sm-2 col-form-label">tipo de usuario</label>
                    <div class="col-sm-9">
                        <select class="form-select" id="opciones" name="tipoUsuario" required>
                            <option selected disabled value="">Seleccione tipo Usuario</option>
                            <option value="Pscicologo">Pscicologo</option>
                            <option value="Estudiante">Estudiante</option>
                        </select>
                    </div>
                </div>
                
                <div class="d-none" id="estudiante">
                    <div class="mb-4 row">
                        <label class="col-sm-2 col-form-label">identificacion</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="id">
                        </div>
                    </div>
                    
                    <div class="mb-4 row">
                        <label class="col-sm-2 col-form-label">nombres</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nombresEstudiantes">
                        </div>
                    </div>
                    <div class="mb-4 row">
                        <label for="staticName" class="col-sm-2 col-form-label">apellidos</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="apellidosEstudiante">
                        </div>
                    </div>
                    <div class="mb-4 row">
                        <label class="col-sm-2 col-form-label">fecha de nacimiento</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="inputFecha" name="fechaNacimiento" placeholder="dd-mm-yyyy" value="" min="1997-01-01" max="2030-12-31">
                        </div>
                    </div>
                    
                    
                    <div class="mb-4 row ">
                        <label class="col-sm-2 col-form-label">curso</label>
                        <div class="col-sm-9">
                            <select class="form-select" id="grado" name="grado">
                                <option selected disabled value="">Seleccione su curso</option>
                                <option value="11 - A">11 - A</option>
                                <option value="11 - B">11 - B</option>
                                <option value="11 - C">11 - C</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                
                <div id="pscicologo" class="d-none">
                    
                    <div class="mb-4 row">
                        <label class="col-sm-2 col-form-label">nombres</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nombrespscicologo" >
                        </div>
                    </div>
                    
                    <div class="mb-4 row">
                        <label for="staticName" class="col-sm-2 col-form-label">apellidos</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="apellidos">
                        </div>
                    </div>
                    <div class="mb-4 row">
                        <label class="col-sm-2 col-form-label">identificacion</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="idpscicologo">
                        </div>
                    </div>
                </div>
                
                <div class="d-grid">
                    <input type="submit" class="btn btn-primary" value="Registrar">
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>
</div>



<footer class="text-center text-white bg-light mt-5">
    <!-- Grid container -->
    <div class="container pt-4">
        <!-- Section: Social media -->
        <section class="mb-4">
            <!-- Facebook -->
            <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="bi bi-facebook"></i></a>
            
            <!-- Twitter -->
            <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="bi bi-twitter"></i></a>
            
            <!-- Google -->
            <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="bi bi-google"></i></a>
            
            <!-- Instagram -->
            <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="bi bi-instagram"></i></a>
            
            <!-- Linkedin -->
            <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="bi bi-linkedin"></i></a>
            <!-- Github -->
            <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="bi bi-github"></i></a>
        </section>
        <!-- Section: Social media -->
    </div>
    <!-- Grid container -->
    
    <!-- Copyright -->
    <div class="text-center text-dark p-3 bg-light">
        © 2020 Copyright:
        <a class="text-dark" href="#">ITSA</a>
    </div>
    <!-- Copyright -->
</footer>
</body>

</html>

<script src="../js/JS property/mostrarVentanas.js"></script>