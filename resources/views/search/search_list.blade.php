@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Список</h1>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Производитель</th>
                                    <th>Номер</th>
                                    <th>Наименование</th>
                                    <th>Склад</th>
                                    <th>Цена</th>
                                    <th>Наличие</th>
                                    <th>Срок поставки</th>
                                    <th>Корзина</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($partsList as $part)
                                    <tr @if($part->analog != 'X') style="background-color:#CDFFBD;" @endif>
                                        <td>{{ $part->brand }}</td>
                                        <td>{{ $part->pin }}</td>
                                        <td>{{ $part->name }}</td>
                                        <td>{{ $part->storage }}</td>
                                        <td>{{ $part->price }}</td>
                                        <td>{{ $part->rvalue }}</td>
                                        <td>{{ $part->retdays }}</td>
                                        <td><button type="button" class="btn btn-success">Корзина</button></td>
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
