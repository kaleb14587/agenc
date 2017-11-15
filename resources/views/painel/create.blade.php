@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card text-center">
            <div class="card-header" style="    border-bottom: 1px solid #e4e4e4;">
                Novo cliente
            </div>
            <div class="card-body">

                    @if(session()->has('message'))
                    <div class="alert alert-danger" role="alert">
                        {{ session()->get('message') }}
                    </div>
                @endif


                <form class="form form-created" method="post" action="{{route('cliente.store')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nome : "
                               value="{{old('name')}}"/>
                        @if($errors->has('name'))
                            <label class="has-error">{{$errors->first('name')}}</label>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" id="email" class="form-control" placeholder="Email : "
                               value="{{old('email')}}"/>
                        @if($errors->has('email'))
                            <label class="has-error">{{$errors->first('email')}}</label>
                        @endif
                    </div>
                    <div class="row col-md-12">
                        <div class="form-group col-lg-4">
                            <input type="text" name="ddd" id="ddd" class="form-control" placeholder="DDD : "
                                   value="{{old('ddd')}}"/>
                            @if($errors->has('ddd'))
                                <label class="has-error">{{$errors->first('ddd')}}</label>
                            @endif
                        </div>
                        <div class="form-group col-md-8">
                            <input type="text" name="fone1" id="fone1" class="form-control" placeholder="Telefone : "
                                   value="{{old('fone1')}}"/>
                            @if($errors->has('fone1'))
                                <label class="has-error">{{$errors->first('fone1')}}</label>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="text" name="logradouro" id="endereco" class="form-control" placeholder="Endereco : "
                               value="{{old('logradouro')}}"/>
                        @if($errors->has('logradouro'))
                            <label class="has-error">{{$errors->first('logradouro')}}</label>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="date" name="data_aniversario" id="data_aniversario" class="form-control"
                               placeholder="Data de aniversario : " value="{{old('data_aniversario')}}"/>
                        @if($errors->has('data_aniversario'))
                            <label class="has-error">{{$errors->first('data_aniversario')}}</label>
                        @endif
                    </div>
                    <button class="btn btn-primary">Salvar</button>
                </form>
            </div>
            <div class="card-footer text-muted">
                Adicione novos clientes a qualquer momento
            </div>
        </div>

        <!--div class="panel">
            <div class="panel-heading">

            </div>
            <div class="panel-body">
                    corpo do bagulho
            </div>
        </div-->
    </div>
@endsection