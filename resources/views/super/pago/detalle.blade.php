@extends('layouts.master')

@section('css')

<link href="{{ asset('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/select/bootstrap-select.css') }}" rel="stylesheet">
@endsection

@section('header')
<div class="block-header">
    <h2>PAGOS</h2>
</div>
@endsection

@section('content')
 <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Pagos del Cliente N° {{$dato->id}}  -- {{isset($uno)}} 
                                @if($contador > 0)
                                <span class="badge bg-green" >{{$contador}} </span> 
                                @endif
                                @if($contador == 0)
                                <span class="badge bg-yellow" >{{$contador}} </span> 
                                @endif
                                @if($contador < 0)
                                <span class="badge bg-red" >{{$contador}} </span> 
                                @endif
                            </h2>

                            {{$CaducidadAnterior}}----{{$contador}}

                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                  <li>
                                      <a href="#" data-toggle="modal" data-target="#defaultModal">
                                          <i class="material-icons">add_circle</i>
                                      </a>
                                  </li>
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="{{ route('usuario.create') }}">Nuevo</a></li>
                                        <li><a href="#" data-toggle="modal" data-target="#defaultModal">Nuevo Modal</a></li>
                                        <!-- <button type="button" class="btn btn-default waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal">MODAL - DEFAULT SIZE</button> -->

                                        <!-- <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li> -->
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                          <th>ID</th>
                                          <th>MONTO</th>
                                          <th>FECHA DE PAGO(s)</th>
                                          <th>FECHA DE VENCIMIENTO</th>
                                          <th>ACCIONES</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                         <th>ID</th>
                                         <th>MONTO</th>
                                         <th>FECHA DE PAGO(s)</th>
                                         <th>FECHA DE VENCIMIENTO</th>
                                         <th>ACCIONES</th>
                                       </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($pago as $dat)
                                           <tr>
                                              <td> {{ $dat->id }}</td>
                                              <td> {{ $dat->monto }}</td>
                                              <td> {{ $dat->fechaainicio}}</td>
                                              <td> {{ $dat->fechafin }}</td>
                                               <td>
                                                   <!-- <a href="#" class="btn btn-xs btn-default waves-effect">
                                                                                                          <i class="material-icons" style="font-size: 16px;">person_add</i>
                                                   </a>
                                                   <a href="#" class="btn btn-xs btn-success waves-effect">
                                                        <i class="material-icons" style="font-size: 16px;">add_shopping_cart</i>
                                                   </a>
                                                   <a href="#" class="btn btn-xs btn-primary waves-effect">
                                                        <i class="material-icons" style="font-size: 16px;">edit</i> 
                                                   </a> -->
                                                   <form method='POST' 
                                                         action="{{route('pagos.destroy',$dat['id'])}}"
                                                         style="display:inline"
                                                         class="validar" 
                                                         name="formulario1">
                                                         {{csrf_field()}}
                                                         <input type="hidden" name="_method" value="DELETE"> 
                                                         <button class="btn btn-xs btn-danger waves-effect" >
                                                           <i class="material-icons" style="font-size: 16px;">delete</i>
                                                         </button>

                                                   </form>
                                               </td>
                                           </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


<!-- -----------------------------Modal ----------------------------------------------------------------------------->
            <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Nuevo Usuario</h4>
                        </div>
                     <form id="form_validation" method="POST" action="{{route('pagos.store')}}">
                        <div class="modal-body">
                                 {{ csrf_field() }}
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                        <input type="text" class="form-control " value="{{$dato->id}}" placeholder="{{$hoy}}" name="cliente" required>
                                          <label id="nombre" class="form-label">Cliente</label>
                                      </div>
                                  </div>
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <input type="text" class="form-control " value="{{$hoy}}" placeholder="{{$hoy}}" name="hoy" required>
                                          <label class="form-label">Fecha de hoy</label>
                                      </div>
                                  </div>
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <select class="form-control show-tick">
                                              <option value="">Meses a pagar</option>
                                              <option value="1" >1</option>
                                              <option value="2" >2</option>
                                              <option value="3" >3</option>
                                              <option value="4" >4</option>
                                              <option value="5" >5</option>
                                              <option value="6" >6</option>
                                              <option value="7" >7</option>
                                              <option value="8" >8</option>
                                              <option value="9" >9</option>
                                              <option value="10" >10</option>
                                              <option value="11" >11</option>
                                              <option value="12" >12</option>
                                          </select>
                                          <label class="form-label">Meses a pagar</label>
                                      </div>
                                  </div>
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <input type="text" class="form-control " value=""  name="monto" required>
                                          <label class="form-label">Monto</label>
                                      </div>
                                  </div>
                                 
                        </div>
                        <div class="modal-footer">
                             <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
<!-- -----------------------------Modal ----------------------------------------------------------------------------->            
@endsection

@section('js')
<script src="{{ asset('plugins/jquery-datatable/jquery.dataTables.js') }}" defer></script>
<script src="{{ asset('js/tables/jquery-datatable.js') }}" defer></script>
<script src="{{ asset('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}" defer></script>
<script src="{{ asset('plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}" defer></script>
<script src="{{ asset('plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}" defer></script>
<script src="{{ asset('plugins/select/bootstrap-select.js') }}" defer></script>
<!-- <script>
  $(function () {
    
    $('#usuarios').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      'select'      : true,
      'stateSave'   : true,
      "scrollX"     : true,
       language     : {
        search:         "Buscar:",
        sLengthMenu:     "Mostrar _MENU_ registros",
        sInfo:           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "oPaginate": 
        {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
        },
     }
    });

    
  })
</script> -->
<script>
$(".validar").on('submit', function(e) {
        var form = $(this);
        e.preventDefault();
        Swal({
          title: 'Estas seguro?',
          text: 'Esta accion no podra ser revertida!',
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Si, Borra esto!',
          confirmButtonColor: '#d33',
          cancelButtonText: 'No'
        }).then((result) => {
          if (result.value) {
            this.submit();

          // For more information about handling dismissals please visit
          // https://sweetalert2.github.io/#handling-dismissals
          } else if (result.dismiss === Swal.DismissReason.cancel) {
            /*Swal(
              'Cancelled',
              'Your imaginary file is safe :)',
              'error'
            )*/
          }
        })
    });
  

</script>

@endsection