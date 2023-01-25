@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Aktualizacja</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('cennik.update', ['cena' => $cena ]) }}">
                            @csrf

                            <div class="form-group row mt-3">
                                <label for="nazwa" class="col-md-4 col-form-label text-md-right">Nazwa</label>

                                <div class="col-md-6">
                                    <input name="nazwa" maxlength="20" value="{{$cena->nazwa}}" id="nazwa" type="text"  class="form-control @error('nazwa') is-invalid @enderror" required autocomplete="nazwa" autofocus>

                                    @error('nazwa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="cena" class="col-md-4 col-form-label text-md-right">Cena</label>

                                <div class="col-md-6">
                                    <input name="cena" min="0" max="100" value="{{$cena->cena}}" id="cena" type="number"  class="form-control @error('cena') is-invalid @enderror"  required autocomplete="cena" autofocus>

                                    @error('cena')
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
                                    <button href="{{route('ceenikedit')}}" class="btn btn-primary">
                                        Powrót
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

