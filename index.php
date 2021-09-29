<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Document</title>
</head>
<body>
    <section>
        <div id="formulario" class="">
            
            <form action="generar.php" class="form w-25 mx-auto mt-4" method="post" enctype="multipart/form-data" >
                <?php if (isset($_SESSION['errorImg'])): ?>
                <div class="alert alert-danger">
                    <p><?php echo $_SESSION['errorImg'] ?></p>
                </div>
            <?php endif ?>
                <select name="version" id="" class="form-control mb-2" required>
                    <option value="v2">Versión 2</option>
                    <option value="v3">Versión 3</option>
                    <option value="v4">Versión 4</option>
                    <option value="v5">Versión 5</option>
                    <option value="v6">Versión 6</option>
                </select>

                <input type="text" name="nombre" class="form-control mb-2" required placeholder="Ingresa el nombre">
                <input type="file" name="foto" class="form-control mb-2" required>
                <button type="submit" class="btn btn-info w-full">Generar imagen</button>
                <button type="button" class="btn btn-danger w-full" onclick="limpiar()">Limpiar</button>
                
            </form>
        </div>
    </section>
    
   

    <?php if (isset($_SESSION['foto'])): ?>
    <section>
        <div id="imagengenerada">
            <div class="imagen_fondo" style="background-image: url(<?php echo $_SESSION['fondo'] ?>);">
                <div class="imagen_foto" style="background-image: url(<?php echo $_SESSION['foto'] ?>);"></div>
                <div class="imagen_texto">
                    <h3><?php echo $_SESSION['nombre'] ?></h3>
                </div>
            </div>
        </div>
    </section>
    <?php endif ?>
    


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="http://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

    <script>
        const generar = () => {
            html2canvas(document.querySelector("#imagengenerada")).then(canvas => {
                document.body.appendChild(canvas)
            });
        }


        const limpiar = ()=>{
            let url = "limpiar.php";
            $.get(url, res => {
                location.reload();
            });
        }
    </script>   
</body>
</html>