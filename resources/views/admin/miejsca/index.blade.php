@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1>Sala Podgląd</h1>
            </div>
            <div class="col-6">
                <a class="float-right" href="{{ route('miejsca.create') }}">
                    <button type="button" class="btn btn-primary">Dodaj</button>
                </a>
            </div>
        </div>
        <div style="display: grid;
            background-color: #0f5132;
            grid-template-columns: repeat({{$max->max}}, 1fr);
            grid-template-rows: repeat({{$ilerzedow->max}}, 1fr);
            grid-column-gap: 0px;
            grid-row-gap: 0px;">


            @php
                $zmienna=0;
                $rzad =0;
                $kolumna =0;
                $sal =0;
            @endphp
            @for($i=1;$i<$ilerzedow->max+1;$i++)
                @for($j=1;$j<$max->max+1;$j++)
                    @foreach($miejsca as $miejsce)
                        @if($miejsce->nr_na_grid ==$j and$miejsce->rzad ==$i  )
                            <div  style=" grid-area: {{$i}} / {{$j}} / {{$i+1}} / {{$j+1}};"class="{{$miejsce->rodzaj}}" >
                                {{$miejsce->nr}}
                                <a href="{{route('miejsca.edit', ['miejsce' => $miejsce->id])}}" class="btn btn-success btn-sm edit" data-id="{{$miejsce->id}}" >
                                    E
                                </a>
                                <button href="{{route('miejsca.destroy', $miejsce)}}" class="btn btn-danger btn-sm delete mr-2" data-id="{{$miejsce->id}}" >
                                    D
                                </button>
                            </div>
                            @php
                                $zmienna=1;
                            @endphp
                        @endif
                    @endforeach
                    @if($zmienna==0)
                            <form method="POST" action="{{ route('miejsca.dodaj') }}">
                        <div  style=" grid-area: {{$i}} / {{$j}} / {{$i+1}} / {{$j+1}};"class="puste" >
                            Puste
                            <input name="rzad" id="rzad" value="{{$i}}" class="d-none">
                            <input name="kolumna" id="kolumna" value="{{$j}}" class="d-none">
                            <input name="sala" id="sala" value="{{$miejsca[0]->sala_id}}" class="d-none">
                            <button class="btn btn-primary btn-sm dodaj mr-2"  >
                               Nowe
                                miejsce
                            </button>

                        </div>
                            </form>

                    @endif
                    @php
                        $zmienna=0;

                    @endphp
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
        <a class="flex-sm-fill text-sm-center nav-link disabled" style="color: black;
            background-color: #fcd202;">Puste</a>
    </nav>
@endsection
@section('javascript')
    const urldelete= "{{ url('/admin/sale/miejsca')}}/";

@endsection
@section('js-file')
    <script src="{{ asset('js/delete.js') }}"></script>
@endsection
