@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Наименование</th>
                                    <th>Производитель</th>
                                    <th>Номер оригинала</th>
                                    <th>Номер аналога</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php /** @var \App\Models\Cross $crosses */ @endphp
                                @foreach($crosses as $cross)
                                    <tr @if(!$cross->autopart_numb_analog ) style="background-color:#ccc;" @endif>
                                        <td><a href="{{ route('shop.search.autopart', ['numb' => $cross->id]) }}">
                                                {{ $cross->autopart_name }}</a></td>
                                        <td>{{ $cross->brand }}</td>
                                        <td>{{ $cross->autopart_numb_orig }}</td>
                                        <td>{{ $cross->autopart_numb_analog }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot></tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
