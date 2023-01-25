@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1>Twoje Bilety</h1>
            </div>
            <div class="col-6">

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
      <th scope="col">Miejsce</th>



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


