@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="container mt-3">
                            <div class="card p-3 text-center">
                                <div class="d-flex flex-row justify-content-center mb-3">
                                    <div class="d-flex flex-column ms-3 user-details">
                                        <h4 class="mb-0">  {{ Auth::user()->imie }} {{ Auth::user()->nazwisko }} </h4>
                                        <div class="ratings"><i class='bx bx-star ms-1'></i> </div> <span> {{ Auth::user()->rodzaj }}</span>
                                    </div>
                                </div>
                                <h4>Edytuj Profil</h4>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('user.update', ['user' => Auth::user()->id ]) }}">
                                        @csrf
                                        @if(session()->has('error'))
                                            <div class="alert alert-danger">
                                                {{ session()->get('error') }}
                                            </div>
                                        @endif

                                        <div class="row mb-3">
                                            <label for="imie" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                            <div class="col-md-6">
                                                <input id="imie" value="{{ Auth::user()->imie }}" type="text" class="form-control @error('imie') is-invalid @enderror" name="imie" value="{{ old('imie') }}" required autocomplete="imie" autofocus>

                                                @error('imie')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="nazwisko" class="col-md-4 col-form-label text-md-end">{{ __('Surname') }}</label>

                                            <div class="col-md-6">
                                                <input id="nazwisko" value="{{ Auth::user()->nazwisko }}" type="text" class="form-control @error('nazwisko') is-invalid @enderror" name="nazwisko" value="{{ old('nazwisko') }}" required autocomplete="nazwisko" autofocus>

                                                @error('nazwisko')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="data_urodzenia" class="col-md-4 col-form-label text-md-end">{{ __('Data urodzenia') }}</label>

                                            <div class="col-md-6">
                                                <input id="data_urodzenia" value="{{ Auth::user()->data_urodzenia }}" type="date" class="form-control @error('data_urodzenia') is-invalid @enderror" name="data_urodzenia" value="{{ old('data_urodzenia') }}" required autocomplete="data_urodzenia" autofocus>

                                                @error('data_urodzenia')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                            <div class="col-md-6">
                                                <input id="email" value="{{Auth::user()->email}}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="haslo" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="haslo" type="password" class="form-control @error('haslo') is-invalid @enderror" name="haslo" required autocomplete="new-password">

                                                @error('haslo')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="haslo-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="haslo-confirm" type="password" class="form-control" name="haslo_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>

                                        <div class="row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Edytuj') }}
                                                </button>
                                            </div>
                                        </div>


                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
