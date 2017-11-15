<div class="modal fade" id="modalNovoPedido" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="    float: left;">Novo pedido</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form form-group" id="form-novo_pedido" method="post" action="{{route('pedido.store')}}">
                    <div class="form-group">
                        <label>Data e hora de entrega</label>
                        <input class="form-control" name="data_entrega" type="date"/>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="produto">
                            <option value="0">Selecione</option>
                            @if(isset($produtos) )
                            @forelse($produtos as $produto )
                                <option value="{{$produto->id}}">{{$produto->nome}}</option>
                            @empty
                            @endforelse
                                @endif
                        </select>
                    </div>
                    <div class="form-group">
                    <textarea class="form-control" name="observacoes" placeholder="Observações do pedido">
                        </textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="$('#form-novo_pedido').submit()" class="btn btn-primary">Salvar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>