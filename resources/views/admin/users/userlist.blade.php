@extends('layouts.app')

@section('content')
    <section class="search-sec">
        <div class="container">
            <form action="{{ route('users.filter') }}" method="post" novalidate="novalidate">
                <div class="row">
                    Podaj czego szukasz i w jaki sposób  (przy wyszukiwaniu tekstu zaleca używanie się wartości równe(=) w przeciwnym wypadku podane wrtosci moga byc niepoprawne)
                    <div class="col-lg-12">
                        <div class="row">

                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <select name="co_szukac" class="form-control search-slt" id="exampleFormControlSelect1">
                                    <option value="id">ID</option>
                                    <option value="imie">Imie</option>
                                    <option value="nazwisko">Nazwisko</option>
                                    <option value="email">E-mail</option>

                                    <option value="data_urodzenia">Data Urodzenia</option>
                                    <option value="rodzaj">rodzaj</option>


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
    <a class="float-right" href="{{ route('userlist') }}">
        <h1>Lista Użytkowników</h1>
    </a>
<table class="table table-hover">
<thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Imie</th>
      <th scope="col">Nazwisko</th>
      <th scope="col">Data urodzenia</th>
      <th scope="col">E-mail</th>
      <th scope="col">Rola</th>
      <th scope="col">Operacje</th>
    </tr>
  </thead>
  <tbody>
      @foreach($users as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->imie}}</td>
      <td>{{$user->nazwisko}}</td>
      <td>{{$user->data_urodzenia}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->rodzaj}}</td>
      <td>
          <button class="btn btn-danger btn-sm delete" data-id="{{$user->id}}" >
             Usuń
          </button>
          <a href="{{route('users.editadmin', ['user' => $user->id])}}" class="btn btn-success btn-sm edit" data-id="{{$user->id}}" >
              Edytuj
          </a></td>

    </tr>
    @endforeach
  </tbody>
</table>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
    {{ $users->links() }}
        </ul>
    </nav>
</div>
@endsection
@section('javascript')
 const urldelete= "{{ url('admin/users/')}}/";
@endsection
@section('js-file')
    <script src="{{ asset('js/delete.js') }}"></script>
@endsection
