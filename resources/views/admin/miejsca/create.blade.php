@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dodawanie Miejsc</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('miejsca.store') }}">
                            @if(session()->has('error'))
                                <div class="alert alert-danger">
                                    {{ session()->get('error') }}
                                </div>
                            @endif

                            <div class="form-group row mt-3">
                                <label for="nr" class="col-md-4 col-form-label text-md-right">Numer miejsca</label>

                                <div class="col-md-6">
                                    <input min="0" name="nr" id="nr" type="number" max="30" class="form-control @error('nr') is-invalid @enderror" required autocomplete="nr" autofocus>

                                    @error('nr')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="nr_na_grid" class="col-md-4 col-form-label text-md-right">Jaki numer w siatce</label>

                                <div class="col-md-6">
                                    <input min="0" name="nr_na_grid" id="nr_na_grid" type="number" max="30" class="form-control @error('nr_na_grid') is-invalid @enderror"  required autocomplete="nr_na_grid" autofocus>

                                    @error('nr_na_grid')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="rzad" class="col-md-4 col-form-label text-md-right">Jaki rzad</label>

                                <div class="col-md-6">
                                    <input min="0" name="rzad" id="rzad" type="number" max="15" class="form-control @error('rzad') is-invalid @enderror"  required autocomplete="rzad" autofocus>

                                    @error('rzad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-3 ">
                                <label for="rodzaj" class="col-md-4 col-form-label text-md-right">Wyświetlany rodzaj</label>

                                <div class="col-md-6">
                                    <select name="rodzaj" class="form-select" aria-label="Default select example">

                                        <option value="ulgowy">Ulgowy</option>
                                        <option value="normalny">Normalny</option>
                                        <option value="vip">Vip</option>
                                    </select>
                                    @error('rodzaj')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="cennik_id" class="col-md-4 col-form-label text-md-right">Jaka Cena</label>

                                <div class="col-md-6">
                                    <select name="cennik_id" id="cennik_id" class="form-control @error('cennik_id') is-invalid @enderror" required>
                                        @foreach($cennik as $cena)
                                            <option value="{{$cena->id}}">{{$cena->nazwa}}</option>
                                        @endforeach
                                    </select>
                                    @error('cennik_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="sala_id" class="col-md-4 col-form-label text-md-right">Jaka Sala</label>

                                <div class="col-md-6">
                                    <select name="sala_id" id="sala_id" class="form-control @error('sala_id') is-invalid @enderror" required>
                                        @foreach($sala as $sal)
                                            <option value="{{$sal->id}}">{{$sal->id}}</option>
                                        @endforeach
                                    </select>
                                    @error('sala_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Zapisz
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
