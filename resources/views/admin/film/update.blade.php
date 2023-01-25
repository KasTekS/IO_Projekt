@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Aktualizacja</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('film.update', ['film' => $film ]) }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="tytul" class="col-md-4 col-form-label text-md-right">Tytuł</label>

                                <div class="col-md-6">
                                    <input name="tytul" maxlength="50"  id="tytul" type="text"  class="form-control @error('tytul') is-invalid @enderror" value="{{$film->tytul}}">
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
                                    <input id="data_premiery" type="date" class="form-control @error('data_premiery') is-invalid @enderror" name="data_premiery" value="{{$film->data_premiery}}">
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
                                    <textarea id="opis" maxlength="500" class="form-control @error('opis') is-invalid @enderror" name="opis" >{{$film->opis}}</textarea>
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
                                        @if($film->kategoria=="akcja")
                                            <option  selected value="akcja">akcja</option>
                                        @else
                                            <option  value="akcja">akcja</option>
                                        @endif
                                        @if($film->kategoria=="bajka")
                                            <option  selected value="bajka">bajka</option>
                                        @else
                                            <option  value="bajka">bajka</option>
                                        @endif
                                        @if($film->kategoria=="dokumentalny")
                                            <option  selected value="dokumentalny">dokumentalny</option>
                                        @else
                                            <option  value="dokumentalny">dokumentalny</option>
                                        @endif
                                        @if($film->kategoria=="dramat")
                                            <option  selected value="dramat">dramat</option>
                                        @else
                                            <option  value="dramat">dramat</option>
                                        @endif
                                        @if($film->kategoria=="fantastyka")
                                            <option  selected value="fantastyka">fantastyka</option>
                                        @else
                                            <option  value="fantastyka">fantastyka</option>
                                        @endif
                                        @if($film->kategoria=="historyczny")
                                            <option  selected value="historyczny">historyczny</option>
                                        @else
                                            <option  value="historyczny">historyczny</option>
                                        @endif
                                        @if($film->kategoria=="komedia")
                                            <option  selected value="komedia">komedia</option>
                                        @else
                                            <option  value="komedia">komedia</option>
                                        @endif
                                        @if($film->kategoria=="romantyczny")
                                            <option  selected value="romantyczny">romantyczny</option>
                                        @else
                                            <option  value="romantyczny">romantyczny</option>
                                        @endif




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
                                    <input id="czas_trwania" pattern="\d{3} minut" type="text" title="XXX minut"  class="form-control @error('czas_trwania') is-invalid @enderror" name="czas_trwania"value="{{$film->czas_trwania}}">

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
                                        @if($film->kategoria_wiekowa=="0+")
                                            <option  selected value="0+">0+</option>
                                        @else
                                            <option  value="0+">0+</option>
                                        @endif
                                          @if($film->kategoria_wiekowa=="7+")
                                            <option  selected value="7+">7+</option>
                                        @else
                                            <option  value="7+">7+</option>
                                        @endif
                                          @if($film->kategoria_wiekowa=="13+")
                                            <option  selected value="13+">13+</option>
                                        @else
                                            <option  value="13+">13+</option>
                                        @endif
                                          @if($film->kategoria_wiekowa=="16+")
                                            <option  selected value="16+">16+</option>
                                        @else
                                            <option  value="16+">16+</option>
                                        @endif
                                          @if($film->kategoria_wiekowa=="18+")
                                            <option  selected value="18+">18+</option>
                                        @else
                                            <option  value="18+">18+</option>
                                        @endif


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
                                    <input id="czy_jest_grany" type="number" maxlength="1"  class="form-control @error('czy_jest_grany') is-invalid @enderror" name="czy_jest_grany" value="{{$film->czy_jest_grany}}">

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
                                    <input id="okladka_link" type="file" class="form-control @error('okladka_link') is-invalid @enderror"  name="okladka_link" >

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
                                    <input id="duze_zdj_link" type="file"  class="form-control @error('okladka_link') is-invalid @enderror" name="duze_zdj_link" >
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

