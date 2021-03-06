@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Aqui va el detalle del pedido creado -->
            <div class="col-sm-4">
                @component('layouts.listaMantenedor')
                @endcomponent
            </div>
            <!-- fin detalle pedido -->
            <!-- Menú para agregar elementos al pedido -->
            <div class="col-sm-8">
                <div class="row">
                <a href="{{ url('/ingredienteNew') }}"><button class="btn btn-default">+ Nuevo ingrediente</button></a>
                </div>
                <div class="tab-content">
                  <div id="home" class="tab-pane fade in active">
                    <h3>Ingredientes</h3>
                           @foreach ($ingrediente as $ingrediente)
                           <div class="row">
                             <div class="col-sm-2">{{$ingrediente->ingrediente_nombre}}</div>
                             <div class="col-sm-8">{{$ingrediente->ingrediente_descripcion}}</div>
                             <div class="col-sm-2">
                              <a href="{{ url('/ingrediente/') }}/{{$ingrediente->idingrediente}}"><button type="button" class="btn btn-success">Modificar</button></a>

                              <button
                                 type="button"
                                 class="btn btn-danger"
                                 data-toggle="modal"
                                 data-id="{{$ingrediente->idingrediente}}"
                                 data-title="{{$ingrediente->ingrediente_nombre}}"
                                 data-target="#eliminarModal">
                                Eliminar
                              </button>

                             </div>
                          </div>
                          <hr/>
                           @endforeach
                  </div>
                </div>

                <div class="row">
                  <a href="{{ url('/ingredienteNew') }}"><button type="submit" class="btn btn-default">+ Nuevo ingrediente</button></a>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="eliminarModal"
     tabindex="-1" role="dialog"
     aria-labelledby="eliminarModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close"
          data-dismiss="modal"
          aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"
        id="eliminarModalLabel"></h4>
      </div>
      <div class="modal-body">
        <p>
        Desea eliminar
        <b><span id="elim-title"></span></b>
        del sistema?.
        </p>
      </div>
      <div class="modal-footer">
        <button type="button"
           class="btn btn-default"
           data-dismiss="modal">Close</button>
        <span class="pull-right">
          {!! Form::open(
            [
             'route' => 'ingredienteDelete',
             'class' => 'form'
            ]
          ) !!}
          {!! Form::hidden('id', '', ['id' => 'elim-id']) !!}
          <button type="submit" class="btn btn-primary">
              Eliminar
          </button>

          {!! Form::close() !!}
        </span>
      </div>
    </div>
  </div>
</div>

@endsection
