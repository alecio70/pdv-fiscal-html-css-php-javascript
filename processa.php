<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<?php
session_start();
include_once("conexao.php");
$cargo = filter_input(INPUT_POST, 'cargo', FILTER_SANITIZE_STRING);

//echo "Cargo: $cargo";

$result_cargo = "INSERT INTO cargos (cargo) VALUES ('$cargo')";

$resultado_cargo = mysqli_query($conn, $result_cargo);

if(mysqli_insert_id($conn)) {
    $_SESSION['msg'] = "<div id='fade-aviso'></div>
    <div id='modal-aviso'>
        <div class='modal-aviso-header'>
            <h2>Aviso</h2>
            <a href='cargos.php'><button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button></a>
        </div>
    
        <div class='modal-aviso-body'>
            <p>Cargo salvo com sucesso!</p>   
        </div>
    </div>";
        
    header("Location: cadastros/cargos.php#cargos");
} else {
    
    header("Location: cadastros/cargos.php#cargos");
}
?>

<div id='fade'>

</div>
<div id='modal'></div>

