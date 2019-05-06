@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="access_denied-template">
                    <h1>Oops ...</h1>
                    <h2>Exclusão de registro NEGADA !</h2>
                    <div class="access_denied-details">
                        Desculpe-nos mas o registro desejado possui vínculos !
                    </div>
                    <div class="access_denied-actions">
                        <a href="{{ url('/') }}" class="btn btn-primary btn-lg"><span class="fa fa-home"></span> Inicio </a>
                        <a href="javascript:history.go(-1)" class="btn btn-default btn-lg"><span class="fa fa-undo"></span> Voltar </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection