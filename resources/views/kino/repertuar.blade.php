
@extends('layouts.app')
@section('content')
    <div class="container">
@foreach($filmy as $film)
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <a href="{{route('zakupy.film', ['film' => $film->id,'tytul'])}}">   <img
                    src="{{asset('storage/'.$film->okladka_link)}}"
                    alt="Trendy Pants and Shoes"
                    class="img-fluid rounded-start"
                    /></a>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                   <a href="{{route('zakupy.film', ['film' => $film->id,'tytul'])}}"> <h5 class="card-title">{{$film->tytul}}</h5></a>
                    <p class="card-text">
                        {{$film->opis}}
                    </p>

                    Seanse dzis:
                    <br>
                    @foreach($seanse as $seans)




                        @if($seans->film_id==$film->id  )

                            <a href="{{route('kup.miejsce',  ['seans' => $seans->id])}}" class="btn btn-outline-primary">
                            <h5 class="card-title mb-3">{{$seans->data_seansu}}</h5>
                            <h5 class="card-titles mb-3 ">{{$seans->rodzaj}} / {{$seans->glos}}</h5>

                            </a>


                            @endif
                        @endforeach

                </div>
            </div>
        </div>
    </div>

@endforeach
    </div>

@endsection
