<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Empleados</h1>
    
    
    
 <?php
include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT user_id, username, first_name, last_name, gender, password, status, FROM empleados";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>


<div class="container">
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Nuevo</button>    
            </div>      
            </div>    
        </div>    
    </div>    
    <br>  

    <div class="container caja  text-white">
        <div class="row">
            <div class="col-lg-12">
            <div class="table-responsive bg-dark">        
                <table id="tablaUsuarios" class="table table-striped table-bordered table-condensed  text-white " style="width:100%" >
                    <thead class="text-center bg-success">
                        <tr>
                            <th>User_Id</th>
                            <th>Dni</th>
                            <th>Nombre</th>                                
                            <th>Apellido</th>  
                            <th>Pais</th>
                            <th>Password</th>
                            <th>Status</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php                            
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $dat['user_id'] ?></td>
                                <td><?php echo $dat['username'] ?></td>
                                <td><?php echo $dat['first_name'] ?></td>
                                <td><?php echo $dat['last_name'] ?></td>
                                <td><?php echo $dat['gender'] ?></td> 
                                <td><?php echo $dat['password'] ?></td> 
                                <td><?php echo $dat['status'] ?></td> 
                                <td></td>
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

<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formUsuarios">    
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label"><strong>Dni</strong></label>
                    <input type="text" class="form-control" id="username">
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label"><strong>Nombre</strong></label>
                    <input type="text" class="form-control" id="first_name">
                    </div> 
                    </div>    
                </div>
                <div class="row"> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label"><strong>Apellido</strong></label>
                    <input type="text" class="form-control" id="last_name">
                    </div>               
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label"><strong>Pais</strong></label>
                    <input type="text" class="form-control" id="gender">
                    </div>
                    </div>  
                </div>
                <div class="row">
                    <div class="col-lg-9">
                        <div class="form-group">
                        <label for="" class="col-form-label"><strong>Password</strong></label>
                        <input type="text" class="form-control" id="password">
                        </div>
                    </div>    
                    <div class="col-lg-3">    
                        <div class="form-group">
                        <label for="" class="col-form-label"><strong>Status</strong></label>
                        <input type="number" class="form-control" id="status">
                        </div>            
                    </div>    
                </div>                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  
<!--FIN del cont principal-->
<?php require_once "vistas/vista_emple.php"?>
