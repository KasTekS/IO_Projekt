@extends('layouts.app')


@section('content')
    <div class="container">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nazwa</th>
                <th scope="col">Cena</th>

            </tr>
            </thead>
            <tbody>
            @foreach($cens as $cena)
                <tr>
                    <th scope="row">{{$cena->id}}</th>
                    <td>{{$cena->nazwa}}</td>
                    <td>{{$cena->cena}}</td>




                </tr>
            @endforeach
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                {{ $cens->links() }}
            </ul>
        </nav>
    </div>
@endsection


