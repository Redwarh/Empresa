<?php
     
     if( !empty($_POST) ){
   

       $txt_id = utf8_decode($_POST["txt_id"]);
        $txt_codigo = utf8_decode($_POST["txt_codigo"]);
        $txt_nombres = utf8_decode($_POST["txt_nombre"]);
        $txt_apellidos = utf8_decode($_POST["txt_apellidos"]);
        $txt_direccion = utf8_decode($_POST["txt_direccion"]);
        $txt_telefono = utf8_decode($_POST["txt_telefono"]);
        $drop_puesto = utf8_decode($_POST["drop_puesto"]);
        $txt_fn = utf8_decode($_POST["txt_fn"]);
      include("datos_conexion.php");
        $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
        $sql ="";
        if(isset($_POST['btn_agregar'])  ){
          $sql = "INSERT INTO empleados(codigo_empleado,nombres,apellidos,direccion,telefono,fecha_nacimiento,id_puesto) VALUES ('". $txt_codigo ."','". $txt_nombres ."','". $txt_apellidos ."','". $txt_direccion ."','". $txt_telefono ."','". $txt_fn ."',". $drop_puesto .");";
        }
        if( isset($_POST['btn_modificar'])  ){
          $sql = "update empleados set codigo_empleado='". $txt_codigo ."',nombres='". $txt_nombres ."',apellidos='". $txt_apellidos ."',direccion='". $txt_direccion ."',telefono='". $txt_telefono ."',fecha_nacimiento='". $txt_fn ."',id_puesto=". $drop_puesto ." where id_empleados = ". $txt_id.";";
        }
        if( isset($_POST['btn_eliminar'])  ){
          $sql = "delete from empleados  where id_empleados = ". $txt_id.";";
        }
         
          if ($db_conexion->query($sql)===true){
            $db_conexion->close();
           
            header('Location: /empresa');
          }else{
            $db_conexion->close();
          }
      }
      ?>