@extends('layouts.app')

@section('content')
    <section class="search-sec">
        <div class="container">
            <form action="{{ route('seans.filter') }}" method="post" novalidate="novalidate">
                <div class="row">
                    Podaj czego szukasz i w jaki sposób  (przy wyszukiwaniu tekstu zaleca używanie się wartości równe(=) w przeciwnym wypadku podane wrtosci moga byc niepoprawne)
                    <div class="col-lg-12">
                        <div class="row">

                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <select name="co_szukac" class="form-control search-slt" id="exampleFormControlSelect1">
                                    <option value="id">ID</option>
                                    <option value="rodzaj">Rodzaj Ekranizacji</option>
                                    <option value="glos">Głos</option>


                                    <option value="data_seansu">Data Seansu</option>
                                    <option value="film_id">Id filmu</option>
                                    <option value="sala_id">Numer Sali</option>


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
                <a class="float-right" href="{{ route('seans') }}">
                    <h1>Lista Sensów</h1>
                </a>
            </div>
            <div class="col-6">
                <a class="float-right btn btn-primary" href="{{ route('seans.create') }}">
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
      <th scope="col">Głos</th>
      <th scope="col">Jaki film</th>
      <th scope="col">Nr sali</th>
      <th scope="col">Operacje</th>
    </tr>
  </thead>
  <tbody>


      @foreach($seans as $sean)
    <tr>
      <th scope="row">{{$sean->id}}</th>
      <td>{{$sean->data_seansu}}</td>
      <td>{{$sean->rodzaj}}</td>
      <td>{{$sean->glos}}</td>
      <td>{{$sean->film->tytul}}</td>
      <td>{{$sean->sala->id}}</td>

      <td>
          <button href="{{route('seans.destroy', $sean)}}" class="btn btn-danger btn-sm delete mr-2" data-id="{{$sean->id}}" >
              Usuń
          </button>
          <a href="{{route('seans.edit', ['seans' => $sean->id])}}" class="btn btn-success btn-sm edit" data-id="{{$sean->id}}" >
              Edytuj
          </a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
    {{ $seans->links() }}
        </ul>
    </nav>
</div>
</div>
</div>
@endsection
@section('javascript')
    const urldelete= "{{ url('admin/seans/')}}/";
@endsection
@section('js-file')
    <script src="{{ asset('js/delete.js') }}"></script>
@endsection

