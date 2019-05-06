@extends('adminlte::page')

@section('content')

    <div class="error-page">
        <div class="row">
            <h2 class="headline text-red text-center">
                <i class="fa fa-hand-paper-o fa-5x text-red"></i>
            </h2>
        </div>

        <div class="row">
            <div class="error-content text-center">
                <h3>
                    Desculpe-nos mas o acesso a esta área é SOMENTE para usuários AUTORIZADOS !
                </h3>
            </div>
        </div>
        <div class="text-center">
            <a href="javascript:history.go(-1)" class="btn btn-primary btn-flat btn-md"><span class="fa fa-undo"></span> Voltar </a>
        </div>
    </div>
@endsection