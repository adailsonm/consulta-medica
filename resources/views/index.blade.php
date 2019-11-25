<!DOCTYPE html>
<html lang="pt-br">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema de agendamento de consultas">

    <title>Sistema de Agendamento</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom fonts for this template -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-light bg-light static-top">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="{{ url('/img/logo.png')}}" alt="" width="170px" height="60px">
        </a>
        <a class="btn btn-danger" href="{{ url('/entrar') }}">Entrar</a>
      </div>
    </nav>

    <!-- slider-fixed -->
    <header class="slider-fixed text-white text-center">
      <div class="overlay"></div>
      <div class="container">
          <div class="row">
            <div class="col-xl-9 mx-auto">
              <h1 class="mb-5">Aproveite os benefícios de um sistema médico que atende todas as suas necessidades</h1>
            </div>			
          </div>
        <div class="row">
          <div class="col-12 col-md-12 mx-auto">
            <a class="btn btn-danger" href="{{ url('/cadastrar') }}">Cadastre-se gratuitamente</a>
          </div>
        </div>
      </div>
    </header>

    <!-- Image Showcases -->
    <section class="showcase">
      <div class="container-fluid p-0">
        <div class="row no-gutters">

          <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/pacientes.jpg');"></div>
          <div class="col-lg-6 order-lg-1 my-auto showcase-text">
            <h2>Pacientes</h2>
            <p class="lead mb-0">Cadastre todos os pacientes com informações relevantes que auxiliam no diagnósticos</p>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-lg-6 text-white showcase-img" style="background-image: url('img/medicos.jpg');"></div>
          <div class="col-lg-6 my-auto showcase-text">
            <h2>Médicos</h2>
            <p class="lead mb-0">Sistema com funções de gerenciamento de médicos do consultório</p>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/agendamentos.jpg');"></div>
          <div class="col-lg-6 order-lg-1 my-auto showcase-text">
            <h2>Agendamentos</h2>
            <p class="lead mb-0">Prospecte novos pacientes pelo seu website com o agendamento online de consultas</p>
          </div>
        </div>
      </div>
    </section>
  </body>

</html>
