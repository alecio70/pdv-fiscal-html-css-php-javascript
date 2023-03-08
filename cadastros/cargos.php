<?php 
session_start();  
include_once("../conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargos</title>
    <link rel="stylesheet" href="estilo-cadastro.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.3/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/plug-ins/1.13.3/i18n/pt-PT.json">
</head>

<body>


    
    <div class="container">
        <button type="button" class="b btn btn-outline-primary" data-bs-toggle="modal"
            data-bs-target="#cargoModal">
            Novo
        </button>

        <div class="modal fade" id="cargoModal" tabindex="-1" aria-labelledby="cargoModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="cargoModalLabel">Cadastro Cargos</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="nome-cargo" method="POST" action="../processa.php">

                            <div class="mb-3">
                                <label for="nome" class="col-form-label">Nome do Cargo:</label>
                                <input type="text" name="cargo" class="form-control" id="nome"
                                    placeholder="Digite o cargo">
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="btn btn-outline-primary btn-sm" id="nome-cargo"
                                    value="Salvar">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <?php
                    if(isset($_SESSION['msg'])) {
                        echo  $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }   
                ?> 

        <div class="navegador">
            <ul>
                <li class="lista">
                    <b></b>
                    <b></b>
                    <a href="#" class="home">
                        <span class="material-icons">
                            home
                        </span>
                        <span class="title">home</span>
                    </a>
                </li>
                <li class="lista">
                    <b></b>
                    <b></b>
                    <a href="#" class="cadastro">
                        <span class="material-icons" class="cadastro">
                            app_registration
                        </span>
                        <span class="title">Cadastro</span>
                    </a>
                </li>
                <li class="lista">
                    <b></b>
                    <b></b>
                    <a href="#" class="estoque">
                        <span class="material-icons">
                            inventory
                        </span>
                        <span class="title">Estoque</span>
                    </a>
                </li>
                <li class="lista">
                    <b></b>
                    <b></b>
                    <a href="#" class="movimentos">
                        <span class="material-icons">
                            timeline
                        </span>
                        <span class="title">Movimentações</span>
                    </a>
                </li>
                <li class="lista active">
                    <b></b>
                    <b></b>
                    <a href="#" class="cargos">
                        <span class="material-icons">
                            receipt_long
                        </span>
                        <span class="title">Cargos</span>
                    </a>
                </li>
                <li class="lista">
                    <b></b>
                    <b></b>
                    <a href="#">
                        <span class="material-icons">
                            logout
                        </span>
                        <span class="title">Sair</span>
                    </a>
                </li>

            </ul>
        </div>
        <div class="alterna">
            <span class="material-icons" id="abrir">
                menu
            </span>
            <span class="material-icons" id="fechar">
                close
            </span>
        </div>

        <div class="posicao container w-50 pt-5">
            <div class="row">
                
                <table id="tabelaCargo" class="table table-striped table-bordered compact" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th class="w-50">Nome</th>
                            <th>Editar</th>
                            <th>Apagar</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                            $result_cargos = "SELECT * FROM cargos";
                            $resultado_cargos = mysqli_query($conn, $result_cargos);

                            while($row_cargos = mysqli_fetch_assoc($resultado_cargos)){
                                echo "<tr>";   
                                echo "<td>" . $row_cargos['id'] . "</td>";   
                                echo "<td>" . $row_cargos['cargo'] . "</td>";
                                echo "</td>"; 
                                echo 
                                    "<td>
                                        <a href='#'>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='100' height='22' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                                <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814'/>
                                                <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                                            </svg>
                                        </a>
                                    </td>";
                                echo 
                                    "<td>
                                        <a href='#'>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='100' height='22' fill='currentColor' class='bi bi-trash3' viewBox='0 0 16 16'>
                                                <path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5'/>
                                            </svg>
                                        </a>
                                    </td>";
                                echo "</tr>";
                            }
                        ?>
                        
                        

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>nome</th>
                            <th>Editar</th>
                            <th>Apagar</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap4.min.js"></script>



        <script src="cadastro.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
            integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
            crossorigin="anonymous"></script>
</body>

</html>