@extends('layouts.app')

@section('content')
    <section class="search-sec">
        <div class="container">
            <form action="{{ route('bilety.filter') }}" method="post" novalidate="novalidate">
                <div class="row">
                    Podaj czego szukasz i w jaki sposób  (przy wyszukiwaniu tekstu zaleca używanie się wartości równe(=) w przeciwnym wypadku podane wrtosci moga byc niepoprawne)
                    <div class="col-lg-12">
                        <div class="row">

                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <select name="co_szukac" class="form-control search-slt" id="exampleFormControlSelect1">
                                    <option value="id">ID</option>

                                    <option value="sean_id">Id Seansu</option>

                                    <option value="user_id">Id Użytkowanika</option>
                                    <option value="miejsca_id">Id miejsca</option>


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
                <a class="float-right" href="{{ route('bilety') }}">
                    <h1>Lista Biletów</h1>
                </a>
            </div>
            <div class="col-6">
                <a class="float-right btn btn-primary" href="{{ route('bilety.create') }}">
                 Dodaj
                </a>
            </div>
        </div>
        <div class="row">
            <div class="row">
<table class="table table-hover">
<thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Data seansu</th>
      <th scope="col">Rodzaj</th>

      <th scope="col">Jaki film</th>
      <th scope="col">Nr sali</th>
      <th scope="col">Cena</th>
      <th scope="col">Mijsce</th>

      <th scope="col">Uzytkownik</th>
      <th scope="col">Operacje</th>
    </tr>
  </thead>
  <tbody>


      @foreach($bilety as $bilet)
    <tr>
      <th scope="row">{{$bilet->id}}</th>
      <td>{{$bilet->sean->data_seansu}}</td>
      <td>{{$bilet->sean->rodzaj}} {{$bilet->sean->glos}}</td>
      <td>{{$bilet->sean->film->tytul}}</td>
      <td>{{$bilet->sean->sala_id}}</td>
      <td>{{$bilet->cena}}</td>
      <td>nr: {{$bilet->miejsca->nr}} rzad: {{$bilet->miejsca->rzad}}</td>
      <td>{{$bilet->user->imie}} {{$bilet->user->nazwisko}}</td>

      <td>
          <button href="{{route('bilety.destroy', $bilet)}}" class="btn btn-danger btn-sm delete mr-2" data-id="{{$bilet->id}}" >
              Usuń
          </button>
          <a href="{{route('bilety.edit', ['bilet' => $bilet->id])}}" class="btn btn-success btn-sm edit" data-id="{{$bilet->id}}" >
              Edytuj
          </a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
    {{ $bilety->links() }}
        </ul>
    </nav>
</div>
</div>
</div>
@endsection
@section('javascript')
    const urldelete= "{{ url('admin/bilety/')}}/";
@endsection
@section('js-file')
    <script src="{{ asset('js/delete.js') }}"></script>
@endsection

