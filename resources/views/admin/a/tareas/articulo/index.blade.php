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
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Trabajos
                            </h2>
                            <ul class="header-dropdown m-r--5">
                              @if(auth()->user()->hasRole('AdministradorA'))
                                @if($caducidad >0)
                                   <li class="dropdown" data-toggle="tooltip" data-placement="top" title="" data-original-title="Actualizar">
                                     <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                         <i class="material-icons">backup</i>
                                     </a>
                                     <ul class="dropdown-menu pull-right">
                                         <li>
                                           <a href="#">
                                             <form method='POST' 
                                                   action="{{route('actualizartarea',$tarea['id'])}}"
                                                   style="display:inline"
                                                   class="validar1" 
                                                   name="formulario1">
                                                   {{csrf_field()}}{{method_field('PUT')}}
                                                   <input type="hidden" name="_method" value="PUT"> 
                                                   <input type="hidden" name="estatus" value="25%"> 
                                                   <button class="btn btn-block btn-danger btn-xs"> 25%</button>
                                             </form>  
                                           </a>
                                         </li>
                                         <li>
                                           <a href="#">
                                             <form method='POST' 
                                                   action="{{route('actualizartarea',$tarea['id'])}}"
                                                   style="display:inline"
                                                   class="validar1" 
                                                   name="formulario1">
                                                   {{csrf_field()}}{{method_field('PUT')}}
                                                   <input type="hidden" name="_method" value="PUT"> 
                                                   <input type="hidden" name="estatus" value="50%"> 
                                                   <button class="btn btn-block btn-warning btn-xs"> 50%</button>
                                             </form> 
                                           </a>
                                         </li>
                                         <li>
                                           <a href="#">
                                               <form method='POST' 
                                                     action="{{route('actualizartarea',$tarea['id'])}}"
                                                     style="display:inline"
                                                     class="validar1" 
                                                     name="formulario1">
                                                     {{csrf_field()}}{{method_field('PUT')}}
                                                     <input type="hidden" name="_method" value="PUT"> 
                                                     <input type="hidden" name="estatus" value="75%"> 
                                                     <button class="btn btn-block bg-amber color-palette btn-xs"> 75%</button>
                                               </form>
                                             </a>
                                         </li>
                                         <li>
                                           <a href="#">
                                               <form method='POST' 
                                                     action="{{route('actualizartarea',$tarea['id'])}}"
                                                     style="display:inline"
                                                     class="validar1" 
                                                     name="formulario1">
                                                     {{csrf_field()}}{{method_field('PUT')}}
                                                     <input type="hidden" name="_method" value="PUT"> 
                                                     <input type="hidden" name="estatus" value="100%"> 
                                                     <button class="btn btn-block btn-success btn-xs"> 100%</button>
                                               </form>
                                             </a>
                                         </li>
                                         <li>
                                           <a href="#">
                                               <form method='POST' 
                                                     action="{{route('actualizartarea',$tarea['id'])}}"
                                                     style="display:inline"
                                                     class="validar1" 
                                                     name="formulario1">
                                                     {{csrf_field()}}{{method_field('PUT')}}
                                                     <input type="hidden" name="_method" value="PUT"> 
                                                     <input type="hidden" name="estatus" value="Entregado"> 
                                                     <button class="btn btn-block btn-info btn-xs"> Entregado</button>
                                               </form>
                                             </a>
                                         </li>
                                         
                                     </ul>
                                 </li>
                                @else
                                
                                @endif
                              @endif
                                
                                  <!-- <li>
                                      <a href="#" data-toggle="modal" data-target="#defaultModal">
                                          <i class="material-icons">add_circle</i>
                                      </a>
                                  </li> -->
                                  <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Ticket">
                                      <a href="{{ route('ticket',$tarea->id)  }}" target="_blank">
                                          <i class="material-icons" >local_activity</i>
                                      </a>
                                     
                                  </li>
                                  
                            </ul>

                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                  <tr>
                                    <th>No Trabajo.</th>
                                    <td>{{$tarea->id}}</td>
                                    <th>Fecha</th>
                                    <td>{{$tarea->created_at->format('d/m/Y')}}</td>
                                  </tr>
                                  <tr>
                                     <th>Nombre</th>
                                    <td> {{$tarea->nombre}}</td>
                                    <th></th>
                                    <td></td>
                                  </tr>
                                  <tr>
                                    <th>Observación</th>
                                    <td>{{$tarea->observacion}}</td>
                                    <th></th>
                                    <td></td>
                                  </tr>
                                  <tr>
                                    <th>Estatus</th>
                                    <td>{{$tarea->estatus}}</td>
                                    <th></th>
                                    <td></td>
                                  </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <div class="card">
                    <div class="body">
                           .<a href="" class="btn btn-info waves-effect pull-right" target="_blank" >Ticket</a>
                            
                    </div>
                  </div>
                </div> -->

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box hover-expand-effect">
                        <div class="icon bg-teal">
                            <i class="material-icons">shopping_cart</i>
                        </div>
                        <div class="content">
                            <div class="text">COSTO TOTAL</div>
                            <div class="number"><b> <font size="5">{{number_format($total,2,".",",")}} </font></b></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                   <div class="info-box hover-expand-effect">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Agregar Pago">
                       <div class="icon bg-red">
                           <i class="material-icons">account_balance_wallet</i>
                       </div>
                    </a>
                       <div class="content">
                           <div class="text">ANTICIPO</div>
                           <div class="number"><b> <font size="5">{{number_format($tarea->pagado,2,".",",")}} </font></b></div>
                       </div>
                   </div>
                </div>
                
            </div>

 <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Articulos
                            </h2>
                            <ul class="header-dropdown m-r--5"> 
                              @if(auth()->user()->hasRole('AdministradorA'))
                                @if($caducidad >0)
                                 
                                  <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Agregar Articulo">
                                      <!-- <a href="#" data-toggle="modal" data-target="#defaultModal"> -->
                                      <a href="{{ route('articulando',$tarea['id']) }}" >
                                          <i class="material-icons">add_circle</i>
                                      </a>
                                  </li>
                                  <!-- <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="{{ route('articulo.create') }}">Nuevo</a></li>
                                        <li><a href="#" data-toggle="modal" data-target="#defaultModal">Nuevo Modal</a></li> -->
                                        <!-- <button type="button" class="btn btn-default waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal">MODAL - DEFAULT SIZE</button> -->

                                        <!-- <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li> -->
                                  <!--   </ul>
                                                                  </li> -->
                                @else
                                
                                @endif
                              @endif
                                
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>CANTIDAD</th>
                                            <th>UDM</th>
                                            <th>ARTICULO</th>
                                            <th>observacion</th>
                                            <th>PRECIO</th>
                                            <th>TOTAL</th>
                                            <th>ACCIONES</th> 
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>CANTIDAD</th>
                                            <th>UDM</th>
                                            <th>ARTICULO</th>
                                            <th>observacion</th>
                                            <th>PRECIO</th>
                                            <th>TOTAL</th>
                                            <th>ACCIONES</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($dato as $dat)
                                           <tr>
                                              <td> {{ $dat->id }}</td>
                                              <td> {{ $dat->cantidad }}</td>
                                              <td> {{ $dat->udm}}</td> 
                                              <td> {{ $dat->nombre }}</td>
                                              <td> {{ $dat->observacion }}</td>
                                              <td> {{ $dat->precio }}</td>
                                              <td> {{ $dat->total}}</td>
                                              
                                               <td>
                                                  
                                                   <a href="{{route ('articulo.edit',$dat->id)}}" class="btn btn-xs btn-primary waves-effect">
													                           <i class="material-icons" style="font-size: 16px;">edit</i>
                                                   </a>
                                                   
                                                   @if($dat->estatus==='Entregado')

                                                   @else
                                                   <form method='POST' 
                                                         action="{{route('articulo.destroy',$dat['id'])}}"
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
                                  <div class="form-group">
                                     <input type="hidden" class="form-control " value="0%" placeholder="Estatus" name="Estatus" >
                                          <input type="hidden" class="form-control " value="" placeholder="Administrador" name="Administrador" >
                                          <input type="hidden" class="form-control " value="" placeholder="Cliente" name="Cliente" >
                                    <!-- <input type="hidden" name="empresa" value="{{auth()->user()->empresa_id}}"> -->
                                    
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
<script src="{{ asset('plugins/jquery-countto/jquery.countTo.js') }}" defer></script>

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