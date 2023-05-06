<?php
include 'conexionBDD.php'
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastos Comunes</title>
    <link rel="stylesheet" href="css/Style.css" type="text/css">
    
</head>
<body>
    <div id = "info">

    <header>
    <h1>Vive Feliz</h1>
    </header>

    <main>
        <div id = "list">
            <nav>
                <ul>
                    <li><a href="?seccion=seccion1">Gastos</a></li>
                    <li><a href="?seccion=seccion2">Pagos</a></li>
                    <li><a href="?seccion=seccion3">Historia de pagos</a></li>
                </ul>
            </nav>
        </div>

        <?php
            if (isset($_GET['seccion']) && $_GET['seccion'] == 'seccion1') {
            ?>
                <div class="seccion">
                <section id="1">
            <h2>Gastos</h2>
            
            <table class = "table">
                <tr>
                    <td>
                        Gastos
                    </td>
                    <td>
                        Valor
                    </td>
                </tr>
                <?php
                $query = $bdd->query("SELECT * FROM gastos");
                $conta =0;
                if($query->num_rows > 0){
                    while($row = $query->fetch_assoc()){
                        $conta = $conta + $row["valor"];
                ?>
                <tr>
                <td scope="row"><?php echo $row["tipo"]?></td>
                <td scope="row"><?php echo $row["valor"]?></td>
                </tr>

                <?php
                } 
                }else{
                    ?>
                    <p>No hay perritos</p>
                    <?php
                }
                ?>
            </table>
            
        </section>
                </div>
            <?php
            }
            elseif (isset($_GET['seccion']) && $_GET['seccion'] == 'seccion2') {
            ?>  
                    <section id="2">
                        <h2>Pagos</h2>
                        <br>
                        <p>Fecha vencimiento : 02/05/2023</p>
                        <h4>Total: $65.000</h4>
                        <p>En caso de atrasarse en su pago se cobrara una multa de $5.000 por semana</p>
                        <br>
                        <div id="boton">
                            <button> Pagar</button>
                        </div>
                    </section>
            <?php
            }
            elseif (isset($_GET['seccion']) && $_GET['seccion'] == 'seccion3') {
            ?>
                <div class="seccion">
                <section id="3">
                    <h2>Historial de Pagos</h2>

                    <ul>
                        <li>Abril : Cancelado</li>
                        <li>Marzo : Cancelado</li>
                        <li>Febrero : Cancelado</li>
                        <li>Enero : Cancelado</li>
                        <li>Diciembre : Cancelado</li>
                    </ul>

                    <div id="boton">
                            <button>Generar informe</button>
                        </div>
                </section>
                </div>
            <?php
            }
            ?>
        
    </main>
    </div>
</body>
</html>