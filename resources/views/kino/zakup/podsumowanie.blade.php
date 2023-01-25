
@extends('layouts.app')
@section('content')


<div class="container rounded bg-white">
    <div class="bg row d-flex justify-content-center pb-5">
        <div class="col-sm-4 col-md-4 ml-1">
            <div class="py-4 pl-6 d-flex flex-row">
                <h5><span class="fa fa-check-square-o"></span><b>Podsumowanie</b></h5>
            </div>
            <div class="bg-white p-2 d-flex flex-column" style="border-radius:14px">
                <div class="text-center mt-4"> <img class="img-fluid" src="{{asset('storage/'.$seans->film->okladka_link)}}" width="600"/> </div>
                <h5>{{$seans->film->tytul}}</h5>
                <p>Kategoria: {{$seans->film->kategoria}}</p>
                <p>Kategoria wiekowa: {{$seans->film->kategoria_wiekowa}}</p>
                <p>Czas trwania: {{$seans->film->czas_trwania}}</p>
                <p>Data premiery: {{$seans->film->data_premiery}}</p>
                <p>Data seansu: {{$seans->data_seansu}}</p>

            </div>
        </div>
        <div class="col-sm-5 col-md-6 mobile">
            <div class="py-4 d-flex justify-content-end">
                <h6><a href="/">Anuluj i wróć do strony głównej</a></h6>
            </div>
            <div class="bg-white p-3 d-flex flex-column" style="border-radius:14px">
                <div class="pt-2">
                    <h5>Zarezerwowane miejsca</h5>
                </div>
                @foreach($miejsca as $miejsce)
                <div class="d-flex">
                    <div class="col-8">Miejsce nr: {{$miejsce->nr}}</div>
                    <div class="ml-auto"><b>Rząd nr: {{$miejsce->rzad}}</b></div>
                </div>
                @endforeach

                <div class="pt-2">
                    <h5>Do zapłaty</h5>
                </div>
                <form method="POST" action="{{ route('kup.bilety') }}">

                @foreach($miejsca as $miejsce)
                    <div class="d-flex">
                        <div class="col-8">Miejsce nr {{$miejsce->nr}}</div>
                        <div class="ml-auto"><b>{{$miejsce->cennik->cena}} PLN</b></div>
                        <input name="miejsca[]" value="{{$miejsce->id}}" class="d-none">
                    </div>
                @endforeach

                <div class="d-flex">
                    <div class="col-8">Suma: </div>
                    <div class="ml-auto "><b>{{$do_zaplaty}} PLN</b></div>
                </div>
                <div class="pt-2">
                    <div class="border-top px-4 mx-8 p-2"></div>
                    <h5>Dane płatnosci</h5>
                </div>

                <div class="col-md-6 offset-md-3">

                    <!-- form card cc payment -->
                    <div class="card card-outline-secondary">
                        <div class="card-body">



                                <div class="form-group">
                                    <label for="cc_name">Imie i nazwisko</label>
                                    <input value="{{ Auth::user()->imie }} {{ Auth::user()->nazwisko }}" type="text" class="form-control" id="cc_name"  title="Imie i Nazwisko" required="required">
                                </div>

                                <input name="user_id" value="{{ Auth::user()->id }}" class="d-none">
                                <input name="seans_id" value="{{ $seans->id }}" class="d-none">


                                <div class="form-group">
                                    <label>Numer Karty</label>
                                    <input  type="number" class="form-control" autocomplete="off" min="1000000000000000" max="9999999999999999"  title="Numer karty kredytowej" required="">
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-12">Data wygaśniecia karty:</label>
                                    <div class="col-md-4">
                                        <select class="form-control" name="cc_exp_mo" size="0">
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control" name="cc_exp_yr" size="0">

                                            <option>2022</option>
                                            <option>2023</option>
                                            <option>2024</option>
                                            <option>2025</option>
                                            <option>2026</option>

                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="number" class="form-control" autocomplete="off" min="100" max="999" pattern="\d{3}" title="Kod CVV" required="" placeholder="CVC">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-12">Do Zapłaty</label>
                                </div>
                                <div class="form-inline">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text">PLN</span></div>
                                        <input disabled value="{{$do_zaplaty}}" type="text" class="form-control text-right" id="exampleInputAmount" placeholder="39">
                                        <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">

                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-success btn-lg btn-block">Zamawiam</button>
                                    </div>
                                </div>



                        </div>
                    </div>
                </div>
                </form>
                <div class="bg-white mt-4 p-3 d-flex flex-column" style="border-radius:14px">


                <div class="pt-2">
                    <h5>Jeśli masz problem skontaktuj się z administratorem </h5>
                </div>
                <div class="d-flex">
                    <div class="col-8">Administrator</div>
                    <div class="ml-auto">Telefon</div>
                </div>
                <div class="d-flex">
                    <div class="col-8">No. WhatsApp</div>
                    <div class="ml-auto"><b>+48792393875</b></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
