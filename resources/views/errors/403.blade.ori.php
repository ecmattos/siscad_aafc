@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="access_denied-template">
                     @if (Auth::guest())
                        <h1>Oops ...</h1>
                        <h2>Usuário NÃO identificado !</h2>
                        <div class="access_denied-details">
                            Desculpe-nos mas o acesso a esta área é SOMENTE para usuários logados e autorizados !
                        </div>
                        <div class="access_denied-actions">
                            <a href="{{ url('/login/') }}" class="btn btn-primary">Entrar</a>
                            <a href="javascript:history.go(-1)" class="btn btn-default"><span class="fa fa-undo"></span> Voltar </a>
                        </div>
                    @else
                        <h1>Oops ...</h1>
                        <h2>Acesso NEGADO !</h2>
                        <div class="access_denied-details">
                            Desculpe-nos mas o acesso a esta área é SOMENTE para usuários autorizados !
                        </div>
                        <div class="access_denied-actions">
                            <a href="{{ url('/') }}" class="btn btn-primary btn-lg"><span class="fa fa-home"></span> Inicio </a>
                            <a href="javascript:history.go(-1)" class="btn btn-default btn-lg"><span class="fa fa-undo"></span> Voltar </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection