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
<form name="MyForm" class="form-horizontal" method="POST" action="{{ route('articulo.update',$dato->id) }}"  >
    {{ csrf_field() }}{{method_field('PUT')}}

 <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Detalle del articulo o servicio
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                
                            </ul>

                        </div>
                        <div class="body">
                            
                          <div class="row clearfix">
                              <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                  <label for="email_address_2">Articulo</label>
                              </div>
                              <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                  <div class="form-group">
                                      <div class="form-line">
                                          <input type="text" class="form-control" placeholder="Nombre del Articulo o Servicio" name="articulo" required autofocus value="{{$dato->nombre}}">
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="row clearfix">
                              <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                  <label for="email_address_2">Cantidad</label>
                              </div>
                              <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                  <div class="form-group">
                                      <div class="form-line">
                                          <input type="number" class="form-control" placeholder="Numero de Articulos o Servicios" name="cantidad" required autofocus onChange="sumar()" min="0" step="any" value="{{$dato->cantidad}}">
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="row clearfix">
                              <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                  <label for="email_address_2">UDM</label>
                              </div>
                              <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                  <div class="form-group">
                                      <div class="form-line">
                                          <select class="form-control" name="udm"  required autofocus>
                                           <option value="">Unidad de Medida</option>
                                           <option value="PZA"{{$dato->udm === 'PZA' ? 'selected' : ' ' }}>PZA </option>
                                           <option value="KG"{{$dato->udm === 'KG' ? 'selected' : ' ' }}>KG </option>
                                           <option value="LTS"{{$dato->udm === 'LTS' ? 'selected' : ' ' }}>LTS </option>
                                           <option value="MTS"{{$dato->udm === 'MTS' ? 'selected' : ' ' }}>MTS </option>
                                           <option value="PKG"{{$dato->udm === 'PKG' ? 'selected' : ' ' }}>PKG </option>
                                           <option value="SERV"{{$dato->udm === 'SERV' ? 'selected' : ' ' }}>SERV </option>
                                          </select>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="row clearfix">
                              <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                  <label for="email_address_2">Observacion</label>
                              </div>
                              <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                  <div class="form-group">
                                      <div class="form-line">
                                          <textarea rows="4" class="form-control no-resize" name="observacion" placeholder="Agrega una observacion....">{{$dato->observacion}}</textarea>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="row clearfix">
                              <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              </div>
                              <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                  <div class="form-group">
                                          <button class="btn btn-primary waves-effect" type="submit">MODIFICAR</button>
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

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Costo
                            </h2>
                            <ul class="header-dropdown m-r--5">
                              
                              <!-- <input type="checkbox" id="checkiva" onChange="sumar()" name="checkiva"/> -->
                              <!-- <label for="basic_checkbox_1">No Incluir <b> IVA</b></label> -->
                              <!-- <div class="demo-switch-title">No Incluir <b> IVA</b></div> -->
                              <div class="switch">
                                  <label>No Incluir <b> IVA</b><input type="checkbox" id="checkiva" onChange="sumar()" name="checkiva"><span class="lever switch-col-teal"></span></label>
                              </div>
                            </ul>

                        </div>
                        <div class="body">
                          <div class="row clearfix">
                              <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                  <label for="email_address_2">Precio</label>
                              </div>
                              <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                  <div class="input-group">
                                      <span class="input-group-addon">
                                          <i class="material-icons">attach_money</i>
                                      </span>
                                      <div class="form-line">
                                          <input  type="number" class="form-control" id="precio" name="precio" placeholder="" onChange="sumar()" value="{{round(($dato->total/1.16)/$dato->cantidad,2)}}"  autofocus step="any" required autofocus>
                                          <input  type="hidden" class="form-control" id="temporal" name="temporal" placeholder="" onChange="sumar()" value="{{round(($dato->total/1.16)/$dato->cantidad,2)}}">
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="row clearfix">
                              <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                  <label for="email_address_2">Subtotal</label>
                              </div>
                              <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                  <div class="input-group">
                                      <span class="input-group-addon">
                                          <i class="material-icons">attach_money</i>
                                      </span>
                                      <div class="form-line">
                                          <input  type="text" class="form-control" id="sub" name="sub" placeholder="0" value="0" autofocus readonly="readonly">
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="row clearfix">
                              <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                  <label for="email_address_2">IVA</label>
                              </div>
                              <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                  <div class="input-group">
                                      <span class="input-group-addon">
                                          <i class="material-icons">attach_money</i>
                                      </span>
                                      <div class="form-line">
                                          <input  type="text" class="form-control" id="id" name="iva" placeholder="0" value="0" autofocus readonly="readonly">
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="row clearfix">
                              <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                  <label for="email_address_2">Total</label>
                              </div>
                              <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                  <div class="input-group">
                                      <span class="input-group-addon">
                                          <i class="material-icons">attach_money</i>
                                      </span>
                                      <div class="form-line">
                                          <input  type="number" class="form-control" id="exampleInputAmount" name="total" placeholder="0"  autofocus readonly="readonly" value="{{$dato->total}}" >
                                      </div>
                                  </div>
                              </div>
                          </div>

                        </div>
                    </div>
                </div>
</div>
</form>

{{$dato}}


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
  // Declara variables
    var n1 = parseFloat(document.MyForm.cantidad.value);
    var n2 = parseFloat(document.MyForm.precio.value);
    var verificar = parseFloat(document.MyForm.total.value);
    var nx = (n2*1.16*n1).toFixed(2) ;
    if (verificar == nx)
    {
        
        /*alert('Aquí viene el texto');*/
        /*document.getElementById("checkiva").checked = false;*/

        var total = document.MyForm.total.value=(n1*n2*1.16).toFixed(2);

        document.MyForm.sub.value= (n1*n2).toFixed(2);
        document.MyForm.iva.value= (total-(total/1.16)).toFixed(2);


    }
    else
    {
        /*alert('operacion='+nx+'/n verificar'+verificar);*/
         /*document.getElementById("checkiva").checked = true;*/
         var total = document.MyForm.total.value=(n1*n2).toFixed(2);

         var iva = document.MyForm.iva.value= (total-(total/1.16)).toFixed(2);

         document.MyForm.sub.value= ((n1*n2)-iva).toFixed(2);        
    }



  
  
  
 
});
function sumar() 
{
/*    var c1 = document.getElementById('inlineRadio1').checked; 
    var c2 = document.getElementById('inlineRadio2').checked; */
    var c3 = document.getElementById('checkiva').checked;
    var n1 = parseFloat(document.MyForm.cantidad.value);
    var n2 = parseFloat(document.MyForm.precio.value);
    var sub = parseFloat(document.MyForm.sub.value);
    var temporal = parseFloat(document.MyForm.temporal.value);
    
    /*if (c1==true)
    {
        document.MyForm.total.value=n1*n2;
    }
    if (c2==true)
    {
        document.MyForm.total.value=n1*n2*1.16;
    }*/
    if (c3==true)
    {
        var total = document.MyForm.total.value= (n1*n2).toFixed(2);

        var iva = document.MyForm.iva.value= (total-(total/1.16)).toFixed(2);

        document.MyForm.sub.value= ((n1*n2)-iva).toFixed(2);
        document.MyForm.temporal.value =  (n2-((n2-(n2/1.16)).toFixed(2))).toFixed(2);
        
    }
     if (c3==false)
     {
        Math.round(total,2);
        document.MyForm.temporal.value =  0;
        var total = document.MyForm.total.value=(n1*n2*1.16).toFixed(2);

        document.MyForm.sub.value=(n1*n2).toFixed(2);
        document.MyForm.iva.value= (total-(total/1.16)).toFixed(2);
     }

}
</script>

@endsection