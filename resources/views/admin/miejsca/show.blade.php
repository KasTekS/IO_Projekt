@extends('layouts.app')
@section('content')
    <div class="container">
        <div style="display: grid;
            background-color: #0f5132;
            grid-template-columns: repeat({{$max->max}}, 1fr);
            grid-template-rows: repeat({{$ilerzedow->max}}, 1fr);
            grid-column-gap: 0px;
            grid-row-gap: 0px;">

            @for($i=1;$i<$ilerzedow->max+1;$i++)
                @for($j=1;$j<$max->max+1;$j++)
                    @foreach($miejsca as $miejsce)
                        @if($miejsce->nr_na_grid ==$j and$miejsce->rzad ==$i  )
                            <div  style=" grid-area: {{$i}} / {{$j}} / {{$i+1}} / {{$j+1}};"class="{{$miejsce->rodzaj}}" >
                                {{$miejsce->nr}}

                            </div>

                        @endif
                    @endforeach

                @endfor
            @endfor
        </div>



    </div>
    <br>

    <nav class="nav nav-pills flex-column flex-sm-row">

        <a class="flex-sm-fill text-sm-center nav-link disabled" style="color: black;
            background-color: purple;" href="#">VIP</a>
        <a class="flex-sm-fill text-sm-center nav-link disabled" style="color: black;
            background-color: green;" href="#">Normalne</a>
        <a class="flex-sm-fill text-sm-center nav-link disabled" style="color: black;
            background-color: #0a53be;">Ulgowe</a>
    </nav>
@endsection
