@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dodawanie Biletów</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('bilety.store') }}">
                            @csrf
                            @if(session()->has('error'))
                                <div class="alert alert-danger">
                                    {{ session()->get('error') }}
                                </div>
                            @endif


                            <div class="form-group row">
                                <label for="cena" class="col-md-4 col-form-label text-md-right">Cena</label>

                                <div class="col-md-6">
                                    <input id="cena" type="number" min="0" max="100" class="form-control @error('cena') is-invalid @enderror" name="cena"  required autocomplete="cena" autofocus>

                                    @error('cena')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sean_id" class="col-md-4 col-form-label text-md-right">Jaki Seans</label>

                                <div class="col-md-6">
                                    <select name="sean_id" id="sean_id" class="form-control @error('sean_id') is-invalid @enderror" required>
                                        @foreach($seanse as $seans)
                                            <option value="{{$seans->id}}">{{$seans->film->tytul}} {{$seans->data_seansu}} </option>
                                        @endforeach
                                    </select>
                                    @error('sean_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="user_id" class="col-md-4 col-form-label text-md-right">Jaki Użytkownik</label>

                                <div class="col-md-6">
                                    <select name="user_id" id="user_id" class="form-control @error('user_id') is-invalid @enderror" required>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->email}}</option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="miejsca_id" class="col-md-4 col-form-label text-md-right">Jakie Miejsce</label>

                                <div class="col-md-6">
                                    <select name="miejsca_id" id="miejsca_id" class="form-control @error('miejsca_id') is-invalid @enderror" required>
                                        @foreach($miejsca as $miejsce)
                                            <option value="{{$miejsce->id}}">nr: {{$miejsce->nr}} rzad: {{$miejsce->rzad}} sala: {{$miejsce->sala_id}}</option>
                                        @endforeach
                                    </select>
                                    @error('miejsca_id')
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
                                    <a href="{{route('bilety')}}" class="btn btn-primary">
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

