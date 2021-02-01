@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('shop.search.crosses') }}">
        @csrf
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="autopart_numb">Номер запчасти</label>
                        <input name="autopart_numb"
                               type="text"
                               class="form-control"
                               id="autopart_numb"
                               minlength="1"
                               required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
