@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Aktualizacja</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('seans.update', ['seans' =>$seans ]) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="data_seansu" class="col-md-4 col-form-label text-md-right">Data Seansu</label>

                                <div class="col-md-6">
                                    <input id="data_seansu"  type="datetime-local"  class="form-control @error('data_seansu') is-invalid @enderror" name="data_seansu" value="{{ $seans->data_seansu }}" required autocomplete="data_seansu" autofocus>

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
                                        @if($seans->rodzaj=="2D")
                                            <option  selected value="2D">2D</option>
                                        @else
                                            <option  value="2D">2D</option>
                                        @endif
                                        @if($seans->rodzaj=="3D")
                                            <option  selected value="3D">3D</option>
                                        @else
                                            <option  value="3D">3D</option>
                                        @endif




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
                                        @if($seans->glos=="lektor")
                                            <option  selected value="lektor">lektor</option>
                                        @else
                                            <option  value="lektor">lektor</option>
                                        @endif
                                        @if($seans->glos=="napisy")
                                            <option  selected value="napisy">napisy</option>
                                        @else
                                            <option  value="napisy">napisy</option>
                                        @endif
                                        @if($seans->glos=="dubbing")
                                            <option  selected value="dubbing">dubbing</option>
                                        @else
                                            <option  value="dubbing">dubbing</option>
                                        @endif



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
                                        <option value="{{$seans->film_id}}">{{$seans->film->tytul}}</option>
                                        @foreach($film as $fi)
                                            @if($seans->film_id!=$fi->id)
                                            <option value="{{$fi->id}}">{{$fi->tytul}}</option>
                                            @endif
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
                                        <option value="{{$seans->sala_id}}">{{$seans->sala->id}}</option>
                                    @foreach($sala as $sal)
                                        @if($sal->id!=$seans->sala_id)
                                            <option value="{{$sal->id}}">{{$sal->id}}</option>
                                            @endif
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

