@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dodawanie Seansu</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('seans.store') }}">
                            @csrf



                            <div class="form-group row">
                                <label for="data_seansu" class="col-md-4 col-form-label text-md-right">Data Seansu</label>

                                <div class="col-md-6">
                                    <input id="data_seansu" type="datetime-local" class="form-control @error('data_seansu') is-invalid @enderror" name="data_seansu" value="{{ old('data_seansu') }}" required autocomplete="data_seansu" autofocus>

                                    @error('data_seansu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="rodzaj" class="col-md-4 col-form-label text-md-right">Rodzaj</label>

                                <div class="col-md-6">
                                    <select name="rodzaj" class="form-select" aria-label="Default select example">

                                        <option  value="2D">2D</option>
                                        <option  value="3D">3D</option>






                                    </select>
                                    @error('rodzaj')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="glos" class="col-md-4 col-form-label text-md-right">Głos</label>

                                <div class="col-md-6">
                                    <select name="glos" class="form-select" aria-label="Default select example">

                                        <option  value="lektor">lektor</option>
                                        <option  value="napisy">napisy</option>
                                        <option  value="dubbing">dubbing</option>






                                    </select>

                                    @error('glos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="film_id" class="col-md-4 col-form-label text-md-right">Jaki Film</label>

                                <div class="col-md-6">
                                    <select name="film_id" id="film_id" class="form-control @error('film_id') is-invalid @enderror" required>
                                        @foreach($film as $fi)
                                            <option value="{{$fi->id}}">{{$fi->tytul}}</option>
                                        @endforeach
                                    </select>
                                    @error('film_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
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
                                    <a href="{{route('seans')}}" class="btn btn-primary">
                                        Powrót
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
