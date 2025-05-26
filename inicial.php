<?php
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header("Location: index.php");
        exit();
    }
    if (!isset($_SESSION['nomes'])) {
        $emails = json_decode(file_get_contents("email.json"), true);
        $senhas = json_decode(file_get_contents("senha.json"), true);
        $nomes = json_decode(file_get_contents("nome.json"), true);
        $generos = json_decode(file_get_contents("genero.json"), true);
        $id = array_search($_SESSION['usuario'], $emails);
        $_SESSION['nomes'] = $nomes;
        $_SESSION['emails'] = $emails;
        $_SESSION['generos'] = $generos;
        $_SESSION['senhas'] = $senhas;
    }
    else {
        $emails = $_SESSION['emails'];
        $id = array_search($_SESSION['usuario'], $emails);
        $nomes = $_SESSION['nomes'];
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-language" content="pt-br">
    <title>PHP / Array</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #101218;
            color: #fff;
            font-family: 'Segoe UI', Arial, sans-serif;
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
        .btn-success, .btn-success:focus, .btn-success:active {
            background: #1abc9c !important;
            border: none;
        }
        .btn-success:hover {
            background: #16a085 !important;
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
        h1, h3 {
            font-weight: 700;
        }
        hr {
            border-top: 2px solid #1abc9c;
            opacity: 1;
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
    <div class="container">
        <center><h1>PHP/ARRAY</h1></center>
        <hr/>
        <center>
            <button type="button" class="btn btn-success btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">
                CADASTRAR NOVO USUÁRIO
            </button>
        </center>
        <br/>
        <div class="row justify-content-center g-4">
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#fff" class="bi bi-people" viewBox="0 0 16 16">
                                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
                            </svg>
                            USUÁRIOS
                        </h3>
                    </div>
                    <div class="card-body">
                        <?php include "usuarios.php"; ?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#fff" class="bi bi-bar-chart-line" viewBox="0 0 16 16">
                                <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1zm1 12h2V2h-2zm-3 0V7H7v7zm-5 0v-3H2v3z"/>
                            </svg>
                            GENEROS
                        </h3>
                    </div>
                    <div class="card-body">
                        <?php include "generos.php"; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">CADASTRAR USUÁRIO</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-start">
                    <form action="cadastro.php" method="post">
                        <label class="form-label">NOME</label>
                        <input class="form-control" type="text" name="nome" required placeholder="Digite o seu nome"/>
                        <br/>
                        <label class="form-label">E-MAIL</label>
                        <input class="form-control" type="email" name="email" required placeholder="Digite o seu e-mail"/>
                        <br/>
                        <label class="form-label">GENERO</label>
                        <select class="form-select" aria-label="Selecione um genero" name="genero" required>
                            <option selected disabled>Selecione um genero</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>
                            <option value="Outro">Outro</option>
                        </select>
                        <br/>
                        <label class="form-label">SENHA</label>
                        <input class="form-control" type="password" name="senha" required placeholder="Digite a sua senha"/>
                        <br/>
                        <input type="submit" class="btn btn-success w-100" value="CADASTRAR"/>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">FECHAR</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
