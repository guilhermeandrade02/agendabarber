<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('style.css') }}" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <style>
        body {
            background-color: #060113;
            color: white;
            /* Define a cor do texto como branco para melhorar a legibilidade */
        }

        .navbar-dark .navbar-nav .nav-link {
            color: white;
            /* Define a cor dos links no navbar como branco */
        }

        .navbar-dark .navbar-toggler-icon {
            background-color: white;
            /* Define a cor do ícone do toggle como branco */
        }

        .footer {
            background-color: black;
            color: white;
            /* Define a cor do texto no footer como branco */
        }

        .btn-outline-success {
            display: flex;
            align-items: center;
            text-align: center;
        }

        .btn-icon {
            font-size: 30px;
            margin-right: 5px;
            color: white;
        }
    </style>
</head>

<body>
    {{-- <a class="navbar-brand" href="#">  <img src="{{ asset('storage/img/img2.png') }}" alt="Logo" width="200px"></a> --}}
    <header>



        <nav class="navbar navbar-expand-lg" style="background-color:#0a021d">
            <a class="navbar-brand" href="#"><img src="{{ asset('storage/img/img2.png') }}" alt="Logo"
                    width="170px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado"
                aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#" style="color:white">Inicio <span class="sr-only">(página
                                atual)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color:white">Meus Agendamentos</a>
                    </li>

                </ul>

                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                    <iconify-icon icon="octicon:feed-person-16" class="btn-icon"></iconify-icon>
                    Entrar
                </button>
            </div>
        </nav>
    </header>


    <div class="container mt-4">
        @yield('content')
    </div>
    <br><br><br><br>
    <footer class="footer mt-auto py-3 mt-5"  style="background-color:#0a021d">
        <div class="container text-center">
            <span class="text-muted">© 2024 | Desenvolvido por GoDevolpmento</span>
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
