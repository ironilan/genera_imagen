<?php
    session_start();

    if ($_FILES['foto']['size'] > 2000000) {
        
        $_SESSION['errorImg'] = 'La imagen no debe pesar mas de 2MB  '. $_FILES['foto']['size'];
        header("Location: index.php");

    }else{
        //eliminamos el error de la imagen si existe
        unset($_SESSION['errorImg']);

        $target_path = "images/uploads/";
        $target_path = $target_path . basename( $_FILES['foto']['name']); 
        move_uploaded_file($_FILES['foto']['tmp_name'], $target_path);

        $version = $_REQUEST['version'];


        switch ($_REQUEST['version']) {
            case 'v2':
                $fondo = './images/v2.png';
                break;
            case 'v3':
                $fondo = './images/v3.png';
                break;
            case 'v4':
                $fondo = './images/v4.png';
                break;
            case 'v5':
                $fondo = './images/v5.png';
                break;
            case 'v6':
                $fondo = './images/v6.png';
                break;
            default:
                $fondo = './images/v2.png';
                break;
        }


        

        $_SESSION["foto"] = './images/uploads/'.$_FILES['foto']['name'];
        $_SESSION["fondo"] = $fondo;
        $_SESSION["nombre"] = $_REQUEST['nombre'];


        header("Location: index.php");
    }
    
    

 ?>