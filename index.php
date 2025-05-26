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
            min-height: 100vh;
        }
        .card {
            background: #111;
            border: none;
            border-radius: 16px;
            box-shadow: 0 2px 16px rgba(0, 0, 0, 0.2);
            margin-bottom: 2rem;
        }
        .card-header {
            background: #1abc9c;
            color: #fff;
            border-radius: 16px 16px 0 0;
        }
        .form-control {
            background: #222;
            color: #fff;
            border: 1px solid #1abc9c;
        }
        .form-control:focus {
            border-color: #1abc9c;
            box-shadow: 0 0 0 0.2rem #2c3e50;
        }
        .btn-success, .btn-success:focus, .btn-success:active {
            background: #1abc9c !important;
            border: none;
        }
        .btn-success:hover {
            background: #16a085 !important;
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
            .card-header h3 {
                font-size: 1.2rem;
            }
            h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <hr/>
    <br/><br/>
    <div class="row justify-content-center row-cols-1 row-cols-md-3 text-center">
        <div class="col">
            <div class="card mb-4 rounded shadow-sw">
                <div class="card-header py-3 text-center">
                    <h3>
                        <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="#fff" class="bi bi-person-vcard-fill" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm9 1.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4a.5.5 0 0 0-.5.5M9 8a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4A.5.5 0 0 0 9 8m1 2.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5m-1 2C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 0 2 13h6.96q.04-.245.04-.5M7 6a2 2 0 1 0-4 0 2 2 0 0 0 4 0"/>
                        </svg>
                        LOGIN
                    </h3>
                </div>
                <div class="card-body">
                    <form action="login.php" method="post" class="text-start">
                        <label class="form-label">E-MAIL</label>
                        <input class="form-control" type="email" name="email" required placeholder="Digite o seu e-mail."/>
                        <br/>
                        <label class="form-label">SENHA</label>
                        <input class="form-control" type="password" name="senha" required placeholder="Digite sua senha."/>
                        <br/>
                        <input type="submit" class="btn btn-success w-100" value="ENTRAR">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
