<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">



        @stack('css')

    </head>
    <body>




      <div class="container-fluid">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="{{asset('images/logo.png')}}" width="140" height="45" ></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('etudients.index')}}">Etudients</a>
        </li>
        <li class="nav-item">
          <a href="{{route('etudients.create')}}" type="button" class="btn btn-primary"> @lang('messages.title')  </a>
        </li>

          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                  Forum
              </a>
              <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{route('articles.index')}}">Les articles</a>

                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{route('articles.create')}}">Ecrire un article</a>
              </div>
          </li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                  Documents
              </a>
              <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{route('documents.index')}}">Consulter</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{route('documents.create')}}">Ajouter Document</a>
              </div>
          </li>
      </ul>
    </div>



      <a  class="nav-link text-info" href="{{ route('changeLang', 'fr') }}" ><img src="{{asset('images/fr.svg')}}" width="16px" height="16px"/> </a>
      <a class="nav-link text-info" href="{{ route('changeLang', 'en') }}" ><img src="{{asset('images/en.svg')}}" width="16px" height="16px"/>  </a>

      Connecté en tant que :   <b>{{ Auth::user()->name}}</b>

      <div class="ml-5">
          <a  class="btn-link" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
      </div>



  </div>
</nav>








<div class="container">
  <main>
    <div class="py-5 text-left">

      @include('flash-message')

@yield('content')

    </div>
  </main>
</div>

</div>

      <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>


@stack('js')
    </body>
</html>
