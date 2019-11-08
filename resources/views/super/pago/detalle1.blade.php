@extends('layouts.master')

@section('css')
<!-- <link rel="stylesheet" href="{{asset('browser_components/datatables.net-bs/css/dataTables.bootstrap.css')}}">  -->


@endsection

@section('header')
<h1>
        Clientes
        <small>Mostrar Clientes</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Here</li>
      </ol>
@endsection

@section('content')
<div class="box">
         <div class="box-header">
           <h3 class="box-title">Cliente N° {{$dato->id}}  -- {{isset($uno)}} 
              @if($diferencia > 0)
              <span class="badge bg-green" >{{$diferencia}} </span> 
              @endif
              @if($diferencia == 0)
              <span class="badge bg-yellow" >{{$diferencia}} </span> 
              @endif
              @if($diferencia < 0)
              <span class="badge bg-red" >{{$diferencia}} </span> 
              @endif
           </h3>
           <!-- <a href="{{ route('usuario.create') }}" class="btn btn-success pull-right">Pagar <i class="fas fa-user-plus"></i></a> -->
           <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#nuevo" >Pagar <i class="fas fa-plus-circle"></i></button>
         </div>
          <div class="box-body">
           <table class="table table-bordered table-striped table-hover">
             <tbody>
              <tr>
                <td><b>RFC</b></td>
                <td>{{$dato->Rfc}}</td>
              </tr>
              <tr>
                <td><b>Nombre</b></td>
                <td>{{$dato->Nombre}}</td>
              </tr>
              <tr>
                <td><b>Direccion</b></td>
                <td>{{$dato->Direccion}}</td>
              </tr>
              <tr>
                <td><b>Telefono</b></td>
                <td>{{$dato->Telefono}}</td>
              </tr>

             </tbody>
           </table>
         </div>
         <div class="box-body">
           <table id="usuarios" class="table table-bordered table-striped table-hover">
             <thead>
             <tr>
               <th>ID</th>
               <th>MONTO</th>
               <th>FECHA DE PAGO(s)</th>
               <th>FECHA DE VENCIMIENTO</th>
               <th>ACCIONES</th>
             </tr>
             </thead>
             <tbody>
            @foreach($pago as $dat)
             <tr>
                   <td> {{ $dat->id }}</td>
                   <td> {{ $dat->monto }}</td>
                   <td> {{ $dat->fechaainicio}}</td>
                   <td> {{ $dat->fechafin }}</td>
                   <td>
                     <a href="#" class="btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
                       <a href="{{route ('usuario.edit',$dat->id)}}" class="btn btn-xs btn-info"><i class="fas fa-pencil-alt"></i></a>
                       <form method='POST' 
                             action="{{route('usuario.destroy',$dat['id'])}}"
                             style="display:inline" >
                             {{csrf_field()}}
                             <input type="hidden" name="_method" value="DELETE">
                             <button class="btn btn-xs btn-danger" onclick="return confirm('¿Estas seguro de eliminar este usuario?') ">
                             <i class="fa fa-times"></i>

                       </form>
                       </a>
                   </td>
               </tr>
              
            @endforeach
             </tbody>
             <tfoot>
             <tr>
               <th>ID</th>
               <th>MONTO</th>
               <th>FECHA DE PAGO(s)</th>
               <th>FECHA DE VENCIMIENTO</th>
               <th>ACCIONES</th>
             </tr>
             </tfoot>
           </table>
         </div>
 
       </div>
          

<!-- <example></example> -->

<!-- ------------------------- modal -------------------------- -->
                                <div class="modal fade" id="nuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="exampleModalLabel">Nueva Impresora</h4>
                                      </div>
                                          <form method="POST" action="{{route('pagos.store')}}">
                                                {{ csrf_field() }}
                                            <div class="modal-body">
                                                <div class="row">
                                                  <div class="col-md-12">
                                                      <div class="form-group">
                                                        <p>
                                                          <input type="text" class="form-control " value="{{$dato->id}}" placeholder="{{$hoy}}" name="cliente" required>
                                                        </p>
                                                        
                                                      </div>
                                                      <div class="form-group">
                                                        <p>
                                                          <input type="text" class="form-control " value="{{$hoy}}" placeholder="{{$hoy}}" name="hoy" required>
                                                        </p>
                                                        
                                                      </div>
                                                      <div class="form-group" >
                                                        <p>
                                                         <select class="form-control " name="mes">
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
                                                        </p>
                                                        
                                                      </div>
                                                      <div class="form-group">
                                                        <p>
                                                         <input type="text" class="form-control " value="" placeholder="Monto" name="monto" required>
                                                        </p>
                                                        
                                                      </div>
                                                   
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                              <button type="submit" class="btn btn-warning">Agregar</button>
                                            </div>
                                          </form>
                                    </div>
                                  </div>
                                </div>
<!-- ------------------------- modal -------------------------- -->   
@endsection

@section('js')
<!-- <script src="{{asset('browser_components/datatables.net-bs/js/jquery.dataTables.min.js')}}"></script> -->
<!-- <script src="{{asset('browser_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>  -->

<!-- <script src="{{asset('browser_components/datatables.net-bs/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('browser_components/datatables.net-bs/js/datatables.min.js')}}"></script>
 -->


<script>
  $(function () {
    
    $('#usuarios').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      'select'      : false,
      'stateSave'   : true,


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
    })
    
  })
</script>
@endsection