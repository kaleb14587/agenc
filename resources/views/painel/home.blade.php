@extends('layouts.app')

@section('content')
    <div class="container">

        @if(session()->has('message'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('message') }}
            </div>
        @endif

        <div class="col-md-4">
            <div class="col-md-12">

                <div class="card" id="card_search">
                    <div class="card-body">
                        <form class="form " id="search-form" method="post" action="{{url('cliente\show')}}">
                            {{csrf_field()}}
                            <b class="title-card">Pesquisar cliente</b>
                            <div class="row formulario-margin">

                                <div class="form-group col-md-9">
                                    <input type="text" name="name" id="search" class="form-control"/>
                                </div>
                                <div class="col-md-1">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"
                                                                                     aria-hidden="true"></i></button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <ul id="search-itens" class="none-style" style="display:none;">


                    <li class="item adicionar_novo"><a href="{{url('cliente/create')}}">Adicionar novo</a></li>
                </ul>
            </div>

            <div class="col-md-12">
                <div class="card" style="    padding: 0;     border: 1px solid white;">
                    <div class="card-body">
                        <ul class="none-style">
                            <li class="img-card-none"><i class="fa fa-user-circle" aria-hidden="true"></i></li>
                            <li class="dados-card-cliente">
                                <p class="nome">
                                    {{$cliente->name}}  </p>
                                <p class="telefone"> telefone ({{$cliente->ddd}})
                                    {{$cliente->fone1}}</p>
                                <p class="birthday"> {{$cliente->data_aniversario}} </p>
                                <p class="email"> {{$cliente->email}}</p>
                            </li>
                            <li class="links">
                                <a href="#" class="btn btn-primary"
                                   data-toggle="modal" data-target="#modalNovoPedido">Novo pedido</a>
                                <a href="{{url('cliente/'.$cliente->id.'/edit/')}}" class="btn btn-default"
                                   >Atualizar dados</a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
            @if(!empty($pedidos->first()))
                @endif
        </div>
        <div class="col-md-8" style="padding-left: 0px;">

            <div class="col-md-12">
                @forelse($pedidos as $pedido)
                    <div class="card-none-border">
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="col-md-3 datas">
                                    <b>Data do pedido</b>
                                    <p> {{$pedido->created_at}}</p>
                                    <b>Data de entrega</b>
                                    <p> {{$pedido->data_entrega}}</p>
                                </div>
                                <div class="col-md-6">
                                    <b>Pedido</b>

                                    <p>
                                        {{$pedido->produto()->get()->first()->nome}}
                                    </p>

                                    <b>Observaçoes</b>
                                    <p>{{$pedido->descricao}}</p>
                                </div>
                            </div>

                        </div>
                    </div>
                @empty
                    <div class="card-none-border">
                        <div class="card-body" style="    line-height: 50px;text-align: center;">
                            <p> Este cliente não tem pedidos cadastrados</p>

                        </div>
                    </div>
                @endforelse


            </div>


        </div>
    </div>

    </div>

    <!--div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

            You are logged in!
        </div>
    </div>
</div>
</div>
</div-->



    @include('modais.novopedido')
    @include('modais.atualizadados')


    @push('script')
    <script>
        $(document).ready(function () {
            $('form#search-form').on('submit', function (event) {
                $('.simple-item').remove();
                window.util.getRequest(
                        "{{url('/cliente/show/')}}"//+$('input#search').text()
                        , $(this).serialize(),
                        function () {
                            //alert('iniciou a pesquisa');
                            debugger;
                        }, function (status, data) {
                            // alert('finalizou a pesquisa');
                            $('#card_search').attr('style', '    margin-bottom: 1px;border-bottom-left-radius: 0;border-bottom-right-radius: 0;');

                            $('#search-itens').show();
                            data.clientes.forEach(function (item, index) {
                                setTimeout(function () {
                                    $('#search-itens').prepend("<li class='item simple-item'><a href='{{url('/home')}}/" + item.id + "'>" + item.name + "</a></li>");
                                }, 200);

                            });

                        });
                event.preventDefault();

                return false;

            });

        });
    </script>

    @endpush
@endsection

