<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Gerenciador de Finanças</title>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>
<body>
    <div class="min-h-screen h-full bg-gradient-to-b bg-gray-900 to-green-900">

        <header class="bg-black/70 backdrop-blur-md text-white flex justify-between sticky top-0 items-center m-0 p-1 z-1000">
            <a href="/"><img src="{{Vite::asset('resources/assets/logo4.png')}}" alt="Logo da empresa" class="w-22 h-18 m-0 p-0" ></a>

        @auth
        <ul class="flex gap-6 mr-4">
          <li><a href="{{route('home')}}" class="hover:text-green-300 text-lg">Home</a></li>
          <li><a href="{{route('perfil')}}" class="hover:text-green-300 text-lg">Perfil</a></li>
          <li class="hover:text-green-300 text-lg">
            <form action="{{ route('logout') }}" method="POST">
             @csrf
             <button type="submit" class="hover:text-green-300 text-lg cursor-pointer">
                 Sair
             </button>
             </form>
          </li>
        </ul>

        @endauth

        @guest
        <ul class="flex gap-6 mr-4">
          <li><a href="{{route('welcome')}}" class="hover:text-green-300 text-lg">Principal</a></li>
          <li><a href="{{route('cadastro')}}" class="hover:text-green-300 text-lg">Cadastro</a></li>
          <li><a href="{{route('login')}}" class="hover:text-green-300 text-lg">Login</a></li>
        @endguest



        </header>

        <div>
               @yield('content')
        </div>


    </div>

</body>
</html>
