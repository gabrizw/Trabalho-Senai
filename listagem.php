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
                        <h3><svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="White" class="bi bi-people" viewBox="0 0 16 16">
                        <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
                        </svg>&nbsp;<b>LISTAGEM DE USUÁRIOS</b></h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <tr>
                                <th>ID</th>
                                <th>NOME</th>
                                <th>E-MAIL</th>
                                <th>GENERO</th>
                                <th>AÇÕES</th>
                            <tr>
                                <td colspan="5">
                                    <form class="d-flex justify-content-center mb-3" method="get" action="" style="max-width:400px;margin:auto;">
                                        <input type="text" class="form-control me-2" name="termo_de_pesquisa" placeholder="Pesquisar usuário..." required>
                                        <button type="submit" class="btn btn-success">Pesquisar</button>
                                    </form>
                                    <?php
                                    $emails_json = file_exists('email.json') ? json_decode(file_get_contents('email.json'), true) : [];
                                    $nomes_json = file_exists('nome.json') ? json_decode(file_get_contents('nome.json'), true) : [];
                                    if (isset($_GET['termo_de_pesquisa'])) {
                                        $termo = strtolower(trim($_GET['termo_de_pesquisa']));
                                        $resultados = [];
                                        foreach ($nomes_json as $idx => $nome) {
                                            $email = isset($emails_json[$idx]) ? $emails_json[$idx] : '';
                                            if (strpos(strtolower($nome), $termo) !== false || strpos(strtolower($email), $termo) !== false) {
                                                $resultados[] = [
                                                    'id' => $idx,
                                                    'nome' => $nome,
                                                    'email' => $email
                                                ];
                                            }
                                        }
                                        if (count($resultados) > 0) {
                                            echo "<div class='mt-3'><h5>Resultados da Pesquisa:</h5><ul>";
                                            foreach ($resultados as $res) {
                                                echo "<li>ID: {$res['id']} | Nome: {$res['nome']} | Email: {$res['email']}</li>";
                                            }
                                            echo "</ul></div>";
                                        } else {
                                            echo "<div class='mt-3'><p>Nenhum resultado encontrado.</p></div>";
                                        }
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php
                                $reg = count($_SESSION['nomes']);
                                for ($i=0; $i <= $reg-1 ; $i++) { 
                                    echo "<tr>";
                                        echo "<td>$i</td>";
                                        echo "<td>".$_SESSION['nomes'][$i]."</td>";
                                        echo "<td>".$_SESSION['emails'][$i]."</td>";
                                        echo "<td>".$_SESSION['generos'][$i]."</td>";
                                        echo "<td><a href='editar.php?pos=$i' class='editar-btn' data-bs-toggle='modal' data-bs-target='#exampleModal' data-id='$i' data-nome='".$_SESSION['nomes'][$i]."' data-email='".$_SESSION['emails'][$i]."' data-genero='".$_SESSION['generos'][$i]."' data-senha='".$_SESSION['senhas'][$i]."'><svg xmlns='http://www.w3.org/2000/svg' width='22' height='22' fill='#1abc9c' class='bi bi-pencil' viewBox='0 0 16 16'>
                                            <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325'/>
                                            </svg></a> | <a href='excluir.php?pos=$i'><svg xmlns='http://www.w3.org/2000/svg' width='22' height='22' fill='#1abc9c' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                            <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0'/>
                                            </svg></a></td>";
                                    echo "</tr>";
                                }
                            ?>
                        </table>
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
            const id = this.getAttribute('data-id');
            const nome = this.getAttribute('data-nome');
            const email = this.getAttribute('data-email');
            const genero = this.getAttribute('data-genero');
            const senha = this.getAttribute('data-senha');
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
