@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dodawanie produktu</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('sale.store') }}">


                            <div class="form-group row mt-3">
                                <label for="ilosc_rzedow" class="col-md-4 col-form-label text-md-right">Ilość rzędów</label>

                                <div class="col-md-6">
                                    <input min="0" name="ilosc_rzedow" id="ilosc_rzedow" type="number" min="0" max="15" class="form-control @error('ilosc_rzedow') is-invalid @enderror" required autocomplete="ilosc_rzedow" autofocus>

                                    @error('ilosc_rzedow')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="ilosc_miejsc" class="col-md-4 col-form-label text-md-right">Ilość miejsc</label>

                                <div class="col-md-6">
                                    <input min="0" name="ilosc_miejsc" id="ilosc_miejsc" type="number" min="0" max="450" class="form-control @error('ilosc_miejsc') is-invalid @enderror"  required autocomplete="ilosc_miejsc" autofocus>

                                    @error('ilosc_miejsc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-3 mb-5">
                                <label for="ekran" class="col-md-4 col-form-label text-md-right">Ekran</label>

                                <div class="col-md-6">
                                    <select name="ekran" class="form-select" aria-label="Default select example">

                                            <option  value="22 m × 16,1 m">22 m × 16,1 m</option>

                                            <option  value="40 m × 30 m">40 m × 30 m</option>
                                            <option  value="24 m × 18 m">24 m × 18 m</option>



                                    </select>
                                    @error('ekran')
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
                                    <a href="{{route('sala')}}" class="btn btn-primary">
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
