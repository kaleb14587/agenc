
@extends('layouts.app')

@section('content')
<div class="container" style=" width: 500px;">
    <div class="row">

        <div class="card"  id="card_search">
            <div class="card-body">
                <form class="form " id="search-form" method="post" action="{{url('/cliente/show/')}}">
                    {{csrf_field()}}
                    <b class="title-card">Pesquisar cliente</b>
                    <div class="row formulario-margin">

                        <div class="form-group col-md-12">
                            <input type="text" name="name" id="search" placeholder="Pesquisar..." class="form-control"/>
                        </div>
                        <!--div class="col-md-1">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"
                                                                             aria-hidden="true"></i></button>
                        </div-->
                    </div>

                </form>
            </div>
            <ul id="search-itens" class="none-style" style="display:none;">


                <li class="item adicionar_novo"><a href="{{url('cliente/create')}}">Adicionar novo</a></li>
            </ul>
        </div>
    </div>
    <div class="row">


    </div>
</div>


    @endsection


@section('script')
    <script>
        $(document).ready(function(){
            $('#search').keypress(
                    function(){

                        $.ajax(
                                {
                                    type: "get",
                                    url:                         '{{url('/cliente/show/')}}',
                                    data: $('#search-form').serialize(),//+'&acao='+action,
                                    success: function(data) {

                                        if(typeof functionEnd  ==="function"){
                                            functionEnd('success',data);
                                        }
                                        $('#search-itens').html('');
                                        $('#search-itens').show();
                                        data.clientes.forEach(function (item, index) {
$('#search-itens').prepend("<li class='item simple-item'><a href='{{url('/home')}}/" + item.id + "'>" + item.name + "</a></li>");
                                        });
                                    },
                                    error: function() {

                                        if(typeof functionEnd  ==="function"){
                                            functionEnd('error');
                                        }

                                    },
                                    processData: false,
                                    cache: false,
                                    contentType: false
                                });

                        /*    window.util.postRequest(
                        '{{url('/cliente/show/')}}',
                        $('#search-form').serialize(),
                        function(data){
                            debugger;
                            alert('apareceu');
                },function(){
                            debugger;
                    alert('error');
                });*/
            });
        });
    </script>


    @stop

