@extends('layouts.app')
@section('content')



<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>


    <div class="carousel-inner">
        <div class="carousel-item active">
            <a href="" > <img src="{{asset('storage/img/doktor.jpg')}}" class="d-block w-100" alt="..."></a>
            <div class="carousel-caption d-none d-md-block">
                <h5>DOKTOR STRANGE W MULTIWERSUM OBŁĘDU</h5>

            </div>
        </div>


        <div class="carousel-item">
            <img src="{{asset('storage/img/sonic.png')}}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>SONIC 2. SZYBKI JAK BŁYSKAWICA</h5>

            </div>
        </div>
        <div class="carousel-item">
            <img src="{{asset('storage/img/top.jpg')}}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>TOP GUN: MAVERICK</h5>

            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<br>
<div class="conteiner px-4">
    <div class="container px-4" id="karty">
        <h3>Filmy</h3>
        <br>



        <div class="row gx-5">
            @foreach($film as $fi)
                @if($fi->czy_jest_grany==1)
            <div class="col col-12 col-sm-6 col-md-6 col-lg-3 mb-5">
                <div class="card  h-100">
                  <a href="{{route('zakupy.film', ['film' => $fi->id,'tytul'])}}">  <img  src="{{asset('storage/'.$fi->okladka_link)}}" class="card-img-top" alt="Zdj filmu"></a>
                    <div class="card-body">
                        <h5 class="card-title">{{$fi->tytul}}
                        </h5>
                        <p>{{$fi->opis}}</p>
                        <a href="{{route('zakupy.film', ['film' => $fi->id,'tytul'])}}" class="btn btn-primary">Zobacz film</a>
                    </div>
                </div>

            </div>
                @endif
            @endforeach


            </div>

        </div>

    </div>
    <br>


</div>
</div>
</div>

</div>
@endsection

