@extends('layouts.admin')

@section('content')


<h1 class="text-4xl font-bold mt-10 mb-15 text-center text-white">
    Dashboards
</h1>

<div class="flex flex-col min-h-screen gap-6 px-6">

    <!-- Primeira linha com 2 gráficos lado a lado -->
    <div class="flex gap-6 mb-10">
        <div class="w-1/2 px-10">
            {!! $chartPizza->container() !!}
        </div>

        <div class="w-1/2 px-10">
             {!! $chartBarra->container() !!}
        </div>
    </div>

    <!-- Linha de baixo com gráfico ocupando 100% -->
    <div class="w-full">
         {!! $chartLinha->container() !!}
    </div>

</div>




{!! $chartBarra->script() !!}
{!! $chartPizza->script() !!}
{!! $chartLinha->script() !!}


</div>
@endsection





