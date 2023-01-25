@extends('layouts.app')

@section('content')
    <section class="search-sec">
        <div class="container">
            <form action="{{ route('filmy.filter') }}" method="post" novalidate="novalidate">
                <div class="row">
                    Podaj czego szukasz i w jaki sposób  (przy wyszukiwaniu tekstu zaleca używanie się wartości równe(=) w przeciwnym wypadku podane wrtosci moga byc niepoprawne)
                    <div class="col-lg-12">
                        <div class="row">

                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <select name="co_szukac" class="form-control search-slt" id="exampleFormControlSelect1">
                                    <option value="id">ID</option>
                                    <option value="tytul">Tytuł</option>
                                    <option value="data_premiery">Data Premiery</option>
                                    <option value="kategoria">Kategoria</option>
                                    <option value="czas_trwania">Czas Trwania</option>
                                    <option value="kategoria_wiekowa">Kategoria wiekowa</option>
                                    <option value="opis">Opis</option>
                                    <option value="czy_jest_grany">Czy jest grany</option>

                                </select>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">

                                <select name="jak_szukac" class="form-control search-slt" id="exampleFormControlSelect1">
                                    <option value="=" >Dokładna wartosc (=)</option>
                                    <option value=">=" >Większe równe (>=)</option>
                                    <option value="<=" >Mniejsze równe (<=)</option>
                                    <option value=">" >Większe (>)</option>
                                    <option value="<" >Mniejsze (<)</option>
                                    <option value="!=" >Różne (!=)</option>

                                </select>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">

                                <input name="wartosc" type="text" class="form-control search-slt" placeholder="Szukana wartosć">
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <button type="submit" class="btn btn-danger wrn-btn">Filtruj</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <div class="container">

        <div class="row">
            <div class="col-6">
                <a class="float-right" href="{{ route('film') }}">
                <h1>Lista Filmów</h1>
                </a>
            </div>
            <div class="col-6">
                <a class="float-right" href="{{ route('film.create') }}">
                    <button type="button" class="btn btn-primary">Dodaj</button>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="row">
                <div class="container">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tytuł</th>
                            <th scope="col">Data premiery</th>
                            <th scope="col">Kategoria</th>
                            <th scope="col">Czas trwania</th>
                            <th scope="col">Kategoria wiekowa</th>
                            <th scope="col">Opis</th>
                            <th scope="col">Czy jest grany</th>
                            <th scope="col">Okładka</th>


                            <th scope="col">Akcje</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($filmy as $film)
                            <tr>
                                <th scope="row">{{$film->id}}</th>
                                <td>{{$film->tytul}}</td>
                                <td>{{$film->data_premiery}}</td>
                                <td>{{$film->kategoria}}</td>
                                <td>{{$film->czas_trwania}}</td>
                                <td>{{$film->kategoria_wiekowa}}</td>
                                <td>{{$film->opis}}</td>
                                <td>@if($film->czy_jest_grany==1)
                                      Tak

                                    @else
                                   Nie
                                    @endif
                                </td>
                                <td><img src="{{asset('storage/'.$film->okladka_link)}}" class="rounded" alt="Zdj filmu" style="width: 50px !important; height: 50px !important;">
                                </td>

                                <td>

                                    <button href="{{route('film.destroy', $film)}}" class="btn btn-danger btn-sm delete mr-2" data-id="{{$film->id}}" >
                                        Usuń
                                    </button>
                                    <a href="{{route('film.edit', ['film' => $film->id])}}" class="btn btn-success btn-sm edit" data-id="{{$film->id}}" >
                                        Edytuj
                                    </a>
                                </td>




                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            {{ $filmy->links() }}
                        </ul>
                    </nav>
                </div>
@endsection
@section('javascript')
    const urldelete= "{{ url('admin/film/')}}/";
@endsection
@section('js-file')
    <script src="{{ asset('js/delete.js') }}"></script>
@endsection

