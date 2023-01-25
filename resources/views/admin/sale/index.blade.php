@extends('layouts.app')

@section('content')
    <section class="search-sec">
        <div class="container">
            <form action="{{ route('sale.filter') }}" method="post" novalidate="novalidate">
                <div class="row">
                    Podaj czego szukasz i w jaki sposób  (przy wyszukiwaniu tekstu zaleca używanie się wartości równe(=) w przeciwnym wypadku podane wrtosci moga byc niepoprawne)
                    <div class="col-lg-12">
                        <div class="row">

                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <select name="co_szukac" class="form-control search-slt" id="exampleFormControlSelect1">
                                    <option value="id">ID</option>
                                    <option value="ilosc_rzedow">Ile rzędów</option>
                                    <option value="ilosc_miejsc">Ilość miejsc</option>
                                    <option value="ekran">Wymiary ekranu</option>




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
                <a class="float-right" href="{{ route('sala') }}">
                    <h1>Lista Sal</h1>
                </a>
            </div>
            <div class="col-6">
                <a class="float-right" href="{{ route('sale.create') }}">
                    <button type="button" class="btn btn-primary">Dodaj</button>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="row">
<table class="table table-hover">
<thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Ilość rzędów</th>
      <th scope="col">Ilość miejsc</th>
      <th scope="col">Ekran</th>
      <th scope="col">Operacje</th>
    </tr>
  </thead>
  <tbody>


      @foreach($sala as $sale)
    <tr>
      <th scope="row">{{$sale->id}}</th>
      <td>{{$sale->ilosc_rzedow}}</td>
      <td>{{$sale->ilosc_miejsc}}</td>
      <td>{{$sale->ekran}}</td>

      <td>
          <button href="{{route('sale.destroy', $sale)}}" class="btn btn-danger btn-sm delete mr-2" data-id="{{$sale->id}}" >
              Usuń
          </button>
          <a href="{{route('sale.edit', ['sala' => $sale->id])}}" class="btn btn-success btn-sm edit" data-id="{{$sale->id}}" >
              Edytuj
          </a>
          <a href="{{route('sala.miejsca', ['sala' => $sale->id])}}" class="btn btn-info btn-sm edit" data-id="{{$sale->id}}" >
              Podgląd
          </a>
          <a href="{{route('sale.miejsca.index', ['sala' => $sale->id])}}" class="btn btn-success btn-sm edit" data-id="{{$sale->id}}" >
              Edytuj miejsca
          </a>

      </td>
    </tr>
    @endforeach
  </tbody>
</table>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
    {{ $sala->links() }}
        </ul>
    </nav>
</div>
</div>
</div>
@endsection
@section('javascript')
    const urldelete= "{{ url('admin/sale/')}}/";
@endsection
@section('js-file')
    <script src="{{ asset('js/delete.js') }}"></script>
@endsection

