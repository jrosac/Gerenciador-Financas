<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Gerenciador de Finanças</title>
</head>
<body>
    <div class="min-h-screen h-full bg-gradient-to-b from-green-900 to-green-700">

        <header class="bg-black/70 backdrop-blur-md text-white p-4 flex justify-between sticky top-0">
            <span class="font-bold">LOGO</span>
        <ul class="flex gap-6">
          <li><a href="#" class="hover:text-green-300">Home</a></li>
          <li><a href="#" class="hover:text-green-300">Sobre</a></li>
          <li><a href="#" class="hover:text-green-300">Contato</a></li>
        </ul>
        </header>

        <div>
               @yield('content')
        </div>


    </div>

</body>
</html>
