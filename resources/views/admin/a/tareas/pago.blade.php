@extends('layouts.master')

@section('css')

<link href="{{ asset('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/select/bootstrap-select.css') }}" rel="stylesheet">
@endsection

@section('header')
<div class="block-header">
    <h2>ARTICULOS</h2>
</div>
@endsection

@section('content')
<form name="MyForm" class="form-horizontal" method="POST" action="{{ route('tareas.pago',$dato->empresa_id) }}"  >
    {{ csrf_field() }}{{method_field('PUT')}}

 <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Pago
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                
                            </ul>

                        </div>
                        <div class="body">
                          <input type="hidden" name="tarea" value="{{$dato->id}}">
                          <input type="hidden" name="lista" value="{{$dato->empresa_id}}">
                          <input type="hidden" name="mientras" value="">
                          <div class="row clearfix">
                              <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                  <label for="email_address_2">Avono</label>
                              </div>
                              <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                  <div class="input-group">
                                      <span class="input-group-addon">
                                          <i class="material-icons">attach_money</i>
                                      </span>
                                      <div class="form-line">
                                          <input  type="text" class="form-control money-dollar" id="precio" name="avono" placeholder="" onChange="resta()" value=""  autofocus step="any" required >

                                          
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="row clearfix">
                              <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                  <label for="email_address_2">Avono acumulado</label>
                              </div>
                              <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                  <div class="input-group">
                                      <span class="input-group-addon">
                                          <i class="material-icons">attach_money</i>
                                      </span>
                                      <div class="form-line">
                                          <input  type="text" class="form-control" id="acumulado" name="acumulado" placeholder="" onChange="resta()" value="{{number_format($dato->pagado,2, '.', ',')}}"  autofocus step="any" required autofocus readonly="readonly" disabled="" >
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="row clearfix">
                              <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                  <label for="email_address_2">Costo Total</label>
                              </div>
                              <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                  <div class="input-group">
                                      <span class="input-group-addon">
                                          <i class="material-icons">attach_money</i>
                                      </span>
                                      <div class="form-line">
                                          <input  type="text" class="form-control" id="total" name="total" placeholder="0" value="{{$dato->total}}" autofocus readonly="readonly" disabled="">
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="row clearfix">
                              <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                  <label for="email_address_2">Restante</label>
                              </div>
                              <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                  <div class="input-group">
                                      <span class="input-group-addon">
                                          <i class="material-icons">attach_money</i>
                                      </span>
                                      <div class="form-line">
                                          <input  type="number" class="form-control money-dollar" id="exampleInputAmount" name="restantes" placeholder="0" value="0" autofocus readonly="readonly" disabled="">
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="row clearfix">
                              <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              </div>
                              <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                  <div class="form-group">
                                          <button class="btn btn-primary waves-effect" type="submit">Pagar</button>
                                  </div>
                              </div>
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

</div>
</form>


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
<script src="{{ asset('js/pages/ui/tooltips-popovers.js') }}" defer></script>
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
<script>
$(function() {
   var n1 = parseFloat(document.MyForm.avono.value);
    var n2 = parseFloat(document.MyForm.total.value);
    var n3 = parseFloat(document.MyForm.acumulado.value);

    
    /*var mientras = document.MyForm.mientras.value= (n3+n1).toFixed(2);*/
    var restantes = document.MyForm.restantes.value= (n2-n3).toFixed(2);
    
   
  });
function resta() 
{
    var n1 = parseFloat(document.MyForm.avono.value);
    var n2 = parseFloat(document.MyForm.total.value);
    var n3 = parseFloat(document.MyForm.acumulado.value);

    
    var mientras = document.MyForm.mientras.value= (n3+n1).toFixed(2);
    var restantes = document.MyForm.restantes.value= (n2-mientras).toFixed(2);

      
}
</script>

@endsection