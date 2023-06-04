<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        

        @stack('css')
        
    </head>
    <body>

      <div class="container-fluid">
      
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Maisonneuve</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('etudients.index')}}">Etudiants</a>
        </li>
        <li class="nav-item">
          <a href="{{route('etudients.create')}}" type="button" class="btn btn-primary">Ajouter</a>
        </li>
      


      </ul>
   
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


<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

@stack('js')
    </body>
</html>
