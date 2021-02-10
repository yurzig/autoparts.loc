@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('shop.search.crosses') }}">
        @csrf
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="form-group">
                        <input name="autopart_numb"
                               type="text"
                               class="form-control"
                               id="autopart_numb"
                               placeholder="Номер запчасти"
                               minlength="1"
                               required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Найти</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
