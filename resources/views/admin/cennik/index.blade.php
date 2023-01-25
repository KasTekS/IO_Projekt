@extends('layouts.app')

@section('content')
    <section class="search-sec">
        <div class="container">
            <form action="{{ route('cennik.filter') }}" method="post" novalidate="novalidate">
                <div class="row">
                    Podaj czego szukasz i w jaki sposób  (przy wyszukiwaniu tekstu zaleca używanie się wartości równe(=) w przeciwnym wypadku podane wrtosci moga byc niepoprawne)
                    <div class="col-lg-12">
                        <div class="row">

                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <select name="co_szukac" class="form-control search-slt" id="exampleFormControlSelect1">
                                    <option value="id">ID</option>
                                    <option value="nazwa">Nazwy</option>
                                    <option value="cena">Ceny</option>

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
                <a class="float-right" href="{{ route('ceenikedit') }}">
                    <h1>Lista Cen</h1>
                </a>
            </div>
            <div class="col-6">
                <a class="float-right" href="{{ route('cennik.create') }}">
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
                            <th scope="col">Nazwa</th>
                            <th scope="col">Cena</th>
                            <th scope="col">Akcje</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($ceny as $cena)
                            <tr>
                                <th scope="row">{{$cena->id}}</th>
                                <td>{{$cena->nazwa}}</td>
                                <td>{{$cena->cena}}</td>
                                <td>

                                    <button href="{{route('cennik.destroy', $cena)}}" class="btn btn-danger btn-sm delete mr-2" data-id="{{$cena->id}}" >
                                        Usuń
                                    </button>
                                    <a href="{{route('cennik.edit', ['cena' => $cena->id])}}" class="btn btn-success btn-sm edit" data-id="{{$cena->id}}" >
                                        Edytuj
                                    </a>
                                </td>




                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            {{ $ceny->links() }}
                        </ul>
                    </nav>
                </div>
@endsection
@section('javascript')
    const urldelete= "{{ url('admin/cennik/')}}/";
@endsection
@section('js-file')
    <script src="{{ asset('js/delete.js') }}"></script>
@endsection

