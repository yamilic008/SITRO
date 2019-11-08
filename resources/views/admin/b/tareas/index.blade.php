@extends('layouts.master')

@section('css')

<link href="{{ asset('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/select/bootstrap-select.css') }}" rel="stylesheet">
@endsection

@section('header')
<div class="block-header">
    <h2>TRABAJOS</h2>
</div>
@endsection

@section('content')
 <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Trabajos
                            </h2>
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
                                            <th>NOMBRE</th>
                                            <th>OBSERVACION</th>
                                            <th>ESTATUS</th>
                                            <th>TOTAL</th>
                                            <th>PAGADO</th>
                                            <th>CREADO</th>
                                            <th>ACCIONES</th> 
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>NOMBRE</th>
                                            <th>OBSERVACION</th>
                                            <th>ESTATUS</th>
                                            <th>TOTAL</th>
                                            <th>PAGADO</th>
                                            <th>CREADO</th>
                                            <th>ACCIONES</th> 
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($dato as $dat)
                                           <tr>
                                              <td> {{ $dat->id }}</td>
                                              <td> {{ $dat->nombre }}</td>
                                              <td> {{ $dat->observacion }}</td>
                                              <td> 
                                                
                                                 @if( $dat->estatus==='0%')
                                                  <span class="badge bg-yellow" >{{$dat->estatus}}</span>
                                                  @endif
                                                  @if($dat->estatus==='25%')
                                                     <div class="progress">
                                                       <div class="progress-bar bg-orange progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 25%">
                                                         <span class="sr-only">25% Complete</span> 25%
                                                       </div>
                                                     </div>
                                                  @endif
                                                  @if($dat->estatus==='50%')
                                                     <div class="progress">
                                                       <div class="progress-bar bg-yellow progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                                                         <span class="sr-only">50% Complete</span> 50%
                                                       </div>
                                                     </div>
                                                  @endif
                                                  @if($dat->estatus==='75%')
                                                     <div class="progress">
                                                       <div class="progress-bar bg-cyan progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
                                                         <span class="sr-only">75% Complete</span> 75%
                                                       </div>
                                                     </div>
                                                  @endif
                                                  @if($dat->estatus==='100%')
                                                     <div class="progress">
                                                       <div class="progress-bar bg-teal progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                                         <span class="sr-only">100% Complete</span>100%
                                                       </div>
                                                     </div>
                                                  @endif
                                                  @if($dat->estatus==='Entregado')
                                                      <span class="badge bg-aqua" >{{$dat->estatus}}</span>
                                                  @endif
                                                  
                                              </td>


                                              <td> {{ number_format($dat->total,2,".",",") }}</td>
                                              <td> {{ number_format($dat->pagado,2,".",",") }}</td>
                                              <td> {{ $dat->created_at->format('d/M/Y') }}</td>
                                              @if($dato->getRoleNames()->implode(', ') !== 'AdministradorA')
                                               <td>
                                                  
                                                   <a href="{{route ('articulo.show',$dat->id)}}" class="btn btn-xs btn-primary waves-effect">
													                           <i class="material-icons" style="font-size: 16px;">add_circle</i>
                                                   </a>
                                                   @if($dat->total > 0)
                                                     <a href="{{route ('tareas.verpago',$dat->id)}}" class="btn btn-xs btn-primary waves-effect">
                                                      <i class="material-icons" style="font-size: 16px;">attach_money</i>
                                                     </a>
                                                   @endif
                                                   @if($dat->estatus==='Entregado')

                                                   @else
                                                   <form method='POST' 
                                                         action="{{route('tareas.edit',$dat['id'])}}"
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
                                               @endif
                                               @endif
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
                     <form id="form_validation" method="POST" action="{{ route('tareas.store') }}">
                        <div class="modal-body">
                                 {{ csrf_field() }}
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <input id="nombre" type="text" class="form-control" name="Nombre" required>
                                          <label id="nombre" class="form-label">Nombre</label>
                                      </div>
                                  </div>
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <input type="text" class="form-control" name="Observacion" required>
                                         
                                          <label class="form-label">Descripcion</label>
                                      </div>
                                  </div>
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <select class="form-control show-tick" name="Cliente">
                                                  <option value="" >Seleccione un cliente</option>
                                              @foreach($cliente as $cli)
                                                      @if($cli != $cli->hasRole('AdministradorA'))
                                                       <option value="{{ $cli->id }}" >{{ $cli->id }}--{{$cli->name}}</option>
                                                      @endif
                                              @endforeach
                                      </div>
                                  </div>
                                  <div class="form-group">
                                     <input type="hidden" class="form-control " value="0%" placeholder="Estatus" name="Estatus" >
                                          <input type="hidden" class="form-control " value="{{$admin->id}}" placeholder="Administrador" name="Administrador" >
                                          <input type="hidden" class="form-control " value="" placeholder="Cliente" name="Cliente" >
                                    <input type="hidden" name="empresa" value="{{auth()->user()->empresa_id}}">
                                    
                                  </div>

                                 
                        </div>
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-link waves-effect">SAVE CHANGES</button> -->
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