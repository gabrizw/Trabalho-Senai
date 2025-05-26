<?php
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header("Location: index.php");
        exit();
    }
    $emails = $_SESSION['emails'];
    $id = array_search($_SESSION['usuario'], $emails);
    $nomes = $_SESSION['nomes'];
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale-1">
        <meta http-equiv="content-language" content="pt-br">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <style>
        body {
            background: #101218;
            color: #fff;
            font-family: 'Segoe UI', Arial, sans-serif;
            max-width: 100vw;
        overflow-x: hidden;
        }
        .navbar-custom {
            background: #1abc9c;
            padding: 1rem 2rem;
            border-radius: 0 0 16px 16px;
            margin-bottom: 2rem;
            box-shadow: 0 2px 8px #0004;
        }
        .navbar-custom a {
            color: #fff;
            text-decoration: none;
            margin-right: 1.5rem;
            font-weight: 500;
            transition: color 0.2s;
        }
        .navbar-custom a:hover {
            color: #000;
        }
        .user {
            float: right;
            font-weight: bold;
        }
        .card {
            background: #111;
            border: none;
            border-radius: 16px;
            box-shadow: 0 2px 16pxrgba(0, 0, 0, 0.2);
            margin-bottom: 2rem;
        }
        .card-header {
            background: #1abc9c;
            color: #fff;
            border-radius: 16px 16px 0 0;
        }
        .table th, .table td {
            color: #fff;
            vertical-align: middle;
            background: transparent;
        }
        .table th {
            background: #1abc9c;
            border: none;
        }
        .table-hover tbody tr:hover {
            background: #222;
        }
        .action-link svg {
            vertical-align: middle;
        }
        .action-link {
            margin: 0 0.5rem;
        }
        hr {
            border-top: 2px solid #1abc9c;
            opacity: 1;
        }
        h1, h3 {
            font-weight: 700;
        }
        .modal-content {
            background: #111;
            color: #fff;
            border-radius: 16px;
        }
        .form-control, .form-select {
            background: #222;
            color: #fff;
            border: 1px solid #1abc9c;
        }
        .form-control:focus, .form-select:focus {
            border-color: #1abc9c;
            box-shadow: 0 0 0 0.2rem #2c3e50;
        }
        ::placeholder {
            color: #aaa;
        }
        .btn-success, .btn-success:focus, .btn-success:active {
            background: #1abc9c !important;
            border: none;
        }
        .btn-success:hover {
            background: #16a085 !important;
        }
        .btn-danger {
            background: #e74c3c !important;
            border: none;
        }
        .btn-danger:hover {
            background: #c0392b !important;
        }
        @media (max-width: 768px) {
            .navbar-custom {
                padding: 1rem;
            }
            .user {
                float: none;
                display: block;
                margin-top: 1rem;
            }
        }
        
    </style>
    </head>
    <style>
        body {
            background-color: #101218;
        }
        .user {
            float: right;
        }
    </style>
    <body>
        <nav class="navbar-custom d-flex justify-content-between align-items-center">
           <div>
            <a href="inicial.php">HOME</a>
            <a href="listagem.php">LISTAGEM</a>
            <a href="gravar.php">SALVAR DADOS</a>
        </div>
        <div class="user">
            <?php echo $nomes[$id]; ?> | <a href="sair.php">SAIR</a>
        </div>
        </nav>
        <br/><br/>
        <br/><br/>
        <div class="row justify-content-center row-cols-1 row-cols-md-2 text-center">
            <div class="cols">
                <div class="card mb-2 rounded shadow-sw">
                    <div class="card-header py-3">
                        <h3><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="White" class="bi bi-floppy" viewBox="0 0 16 16">
  <path d="M11 2H9v3h2z"/>
  <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z"/>
</svg>&nbsp;<b>Salvar Dados</b></h3>
                    </div>
                    <div class="card-body">
                            <?php
                                $port = 0;
                                $dados = $_SESSION['nomes'];
                                $conteudo = json_encode($dados, JSON_PRETTY_PRINT);
                                file_put_contents("nome.json", $conteudo);
                                $port = 25;
                                $dados = $_SESSION['emails'];
                                $conteudo = json_encode($dados, JSON_PRETTY_PRINT);
                                file_put_contents("email.json", $conteudo);
                                $port = 50;
                                $dados = $_SESSION['generos'];
                                $conteudo = json_encode($dados, JSON_PRETTY_PRINT);
                                file_put_contents("genero.json", $conteudo);
                                $port = 75;
                                $dados = $_SESSION['senhas'];
                                $conteudo = json_encode($dados, JSON_PRETTY_PRINT);
                                file_put_contents("senha.json", $conteudo);
                                $port = 100;
                                echo "<div class='progress'>";
                                    echo "<div class='progress-bar progress-bar-striped progress-bar-animated bg-success' role='progressbar' aria-valuenow='75' aria-valuemin='0' aria-valuemax='100' style='width:$port%'></div>";
                                echo "</div>";
                                if ($port == 100){
                                    echo "<h10><br/>DADOS GRAVADOS COM SUCESSO!</h2>";
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        </div>
            <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>ATUALIZAR USUÁRIO</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body'>
                        <form action='editar.php' method='post'>
                            <label class='form-label'>NOME</label>
                            <input class='form-control' type='text' name='nome' id='edit-nome' required/>
                            <br/>
                            <label class='form-label'>E-MAIL</label>
                            <input class='form-control' type='email' name='email' id='edit-email' required/>
                            <br/>
                            <label class='form-label'>GENERO</label>
                            <select class='form-select' aria-label='Selecione um genero' name='genero' id='edit-genero' required>
                                <option selected>Selecione um genero</option>
                                <option value='Masculino'>Masculino</option>
                                <option value='Feminino'>Feminino</option>
                                <option value='Outro'>Outro</option>
                            </select>
                            <br/>
                            <label class='form-label'>SENHA</label>
                            <input class='form-control' type='password' id='edit-senha' name='senha'/>
                            <br/>
                            <input type='hidden' name='id' id='edit-id'/>
                            <input type='submit' class='btn btn-success' value='ATUALIZAR'/>
                        </form>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>FECHAR</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
            const botoesEditar = document.querySelectorAll('.editar-btn');
            botoesEditar.forEach(function(botao) {
            botao.addEventListener('click', function () {
                // Pega os valores do botão clicado
            const id = this.getAttribute('data-id');
            const nome = this.getAttribute('data-nome');
            const email = this.getAttribute('data-email');
            const genero = this.getAttribute('data-genero');
            const senha = this.getAttribute('data-senha');
                // Preenche os campos do modal
            document.getElementById('edit-id').value = id;
            document.getElementById('edit-nome').value = nome;
            document.getElementById('edit-email').value = email;
            document.getElementById('edit-genero').value = genero;
            document.getElementById('edit-senha').value = senha;
            });
            });
            });
        </script>
    </body>
</html>
