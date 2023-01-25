@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dodawanie Filmów</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('film.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="tytul" class="col-md-4 col-form-label text-md-right">Tytuł</label>

                                <div class="col-md-6">
                                    <input id="tytul" type="text" maxlength="50"  class="form-control @error('tytul') is-invalid @enderror" name="tytul" value="{{ old('tytul') }}" required autocomplete="tytul" autofocus>

                                    @error('tytul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="data_premiery" class="col-md-4 col-form-label text-md-right">Data premiery</label>

                                <div class="col-md-6">
                                    <input id="data_premiery" type="date" class="form-control @error('data_premiery') is-invalid @enderror" name="data_premiery" value="{{ old('data_premiery') }}" required autocomplete="data_premiery" autofocus>

                                    @error('data_premiery')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="opis" class="col-md-4 col-form-label text-md-right">Opis</label>

                                <div class="col-md-6">
                                    <textarea id="opis" maxlength="500" class="form-control @error('opis') is-invalid @enderror" name="opis" autofocus>{{ old('opis') }}</textarea>

                                    @error('opis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="kategoria" class="col-md-4 col-form-label text-md-right">Kategoria</label>

                                <div class="col-md-6">
                                    <select name="kategoria" class="form-select" aria-label="Default select example">

                                        <option  value="akcja">akcja</option>
                                        <option  value="bajka">bajka</option>
                                        <option  value="dokumentalny">dokumentalny</option>
                                        <option  value="dramat">dramat</option>
                                        <option  value="fantastyka">fantastyka</option>
                                        <option  value="historyczny">historyczny</option>
                                        <option  value="komedia">komedia</option>
                                        <option  value="romantyczny">romantyczny</option>





                                    </select>
                                    @error('kategoria')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="czas_trwania" class="col-md-4 col-form-label text-md-right">Czas trwania</label>

                                <div class="col-md-6">
                                    <input id="czas_trwania" type="text" pattern="\d{3} minut"  class="form-control @error('czas_trwania') is-invalid @enderror" name="czas_trwania" value="{{ old('czas_trwania') }}" required autocomplete="czas_trwania" autofocus>

                                    @error('czas_trwania')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kategoria_wiekowa" class="col-md-4 col-form-label text-md-right">Kategoria wiekowa</label>

                                <div class="col-md-6">
                                    <select name="kategoria_wiekowa" class="form-select" aria-label="Default select example">

                                        <option  value="0+">0+</option>
                                        <option  value="7+">7+</option>
                                        <option  value="13+">13+</option>
                                        <option  value="16+">16+</option>
                                        <option  value="18+">18+</option>





                                    </select>

                                    @error('kategoria_wiekowa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="czy_jest_grany" class="col-md-4 col-form-label text-md-right">Czy jest grany 1 lub 0</label>

                                <div class="col-md-6">
                                    <input id="czy_jest_grany" type="number" max="1" min="0" class="form-control @error('czy_jest_grany') is-invalid @enderror" name="czy_jest_grany" value="{{ old('czy_jest_grany') }}" required autocomplete="czy_jest_grany" autofocus>

                                    @error('czy_jest_grany')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="okladka_link" class="col-md-4 col-form-label text-md-right">Avatar</label>

                                <div class="col-md-6">
                                    <input id="okladka_link" type="file"  class="form-control @error('okladka_link') is-invalid @enderror"  required name="okladka_link" >

                                    @error('okladka_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="duze_zdj_link" class="col-md-4 col-form-label text-md-right">Tło</label>

                                <div class="col-md-6">
                                    <input id="duze_zdj_link" type="file"  class="form-control @error('duze_zdj_link') is-invalid @enderror"  required  name="duze_zdj_link" >
                                    @error('duze_zdj_link')
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
                                    <a href="{{route('film')}}" class="btn btn-primary">
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
