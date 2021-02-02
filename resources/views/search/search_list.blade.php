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
                                    <tr @if($part->ANALOG != 'X') style="background-color:#CDFFBD;" @endif>
                                        <td>{{ $part->BRAND }}</td>
                                        <td>{{ $part->PIN }}</td>
                                        <td>{{ $part->NAME }}</td>
                                        <td></td>
                                        <td>{{ $part->PRICE }}</td>
                                        <td>{{ $part->RVALUE }}</td>
                                        <td>{{ $part->RETDAYS }}</td>
                                        <td>Корзина</td>
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
