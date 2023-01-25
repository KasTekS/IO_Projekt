@extends('layouts.app')
@section('content')
    <div class="container mt-5 mb-5">
        <div class="card">
            <div class="row g-0">
                <div class="col-md-6 border-end">
                    <div class="d-flex flex-column justify-content-center">
                        <div class="main_image">
                            <img src="{{asset('storage/'.$film->okladka_link)}}" id="main_product_image" >	</div>
                        <div class="container">
                          <h2>Seanse:</h2>

                            @foreach($seanse as $seans)

                                    <a href="{{route('kup.miejsce', ['seans' => $seans->id])}}" class="btn btn-outline-primary">
                                        <h5 class="card-title mb-3">{{$seans->data_seansu}}</h5>
                                        <h5 class="card-titles mb-3 ">{{$seans->rodzaj}} / {{$seans->glos}}</h5>

                                    </a>


                            @endforeach
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    {{ $seanse->links() }}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 right-side">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3>{{$film->tytul}}</h3>
                            <span class="heart"><i class='bx bx-heart'></i></span>
                        </div>
                        <div class="mt-2 pr-3 content">
                            <h5>{{$film->opis}}</h5>
                        </div>
                        <h3>Data premiery: {{$film->data_premiery}}</h3>
                        <h3>Kategoria: {{$film->kategoria}}</h3>
                        <h3>Czas trwania: {{$film->czas_trwania}}</h3>
                        <h3>Kategoria wiekowa: {{$film->kategoria_wiekowa}}</h3>




                </div>
            </div>
        </div>
    </div>


@endsection
