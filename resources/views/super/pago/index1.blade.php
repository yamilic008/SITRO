@extends('layouts.master')

@section('css')
<!-- <link rel="stylesheet" href="{{asset('browser_components/datatables.net-bs/css/dataTables.bootstrap.css')}}">  -->


@endsection

@section('header')
<h1>
        Usuarios
        <small>Mostrar Usuarios</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Here</li>
      </ol>
@endsection

@section('content')
<div class="box">
         <div class="box-header">
           <h3 class="box-title">Usuarios Registrados </h3>
           <!-- <a href="{{ route('usuario.create') }}" class="btn btn-success pull-right">Crear <i class="fas fa-user-plus"></i></a> -->
           <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#nuevo" >Nueva Empresa <i class="fas fa-plus-circle"></i></button>
         </div>
         /.box-header
         <div class="box-body">
           <table id="usuarios" class="table table-bordered table-striped table-hover">
             <thead>
             <tr>
               <th>ID</th>
               <th>EMPRESA(s)</th>
               <th>DIRECCION</th>
               <th>TELEFONO</th>
               <th>ANTIGUEDAD</th>
               <th>ACCIONES</th>
             </tr>
             </thead>
             <tbody>
            @foreach($admin as $dat)
             <tr>
                   <td> {{ $dat->id }}</td>
                   <td> {{ $dat->Nombre}}</td>
                   <td> {{ $dat->Direccion}}</td>
                   <td> {{ $dat->Telefono}}</td>
                   <td> {{ $dat->created_at }}</td>
                   <td>
                     <a href="{{route ('empresa.show',$dat->id)}}" class="btn btn-xs btn-default"><i class="fas fa-user-plus"></i></a>
                     <a href="{{route ('pagos.show',$dat->id)}}" class="btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
                       <a href="{{route ('pagos.edit',$dat->id)}}" class="btn btn-xs btn-info"><i class="fas fa-pencil-alt"></i></a>
                       <form method='POST' 
                             action="{{route('empresa.destroy',$dat['id'])}}"
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
               <th>USUARIO</th>
               <th>DIRECCION</th>
               <th>TELEFONO</th>
               <th>ANTIGUEDAD</th>
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
                                        <h4 class="modal-title" id="exampleModalLabel">Nueva Empresa </h4>
                                      </div>
                                          <form method="POST" action="{{route('empresa.store')}}">
                                                {{ csrf_field() }}
                                            <div class="modal-body">
                                                <div class="row">
                                                  <div class="col-md-12">
                                                    <!-- <div class="form-group" >
                                                        <p>
                                                         <select class="form-control " name="user">
                                                          <option value="">Selecciona Usuario</option>
                                                          @foreach($dato1 as $dat)
                                                            @if($dat->getRoleNames()->implode(', ') === 'AdministradorA' || $dat->getRoleNames()->implode(', ') === 'AdministradorB' || $dat->getRoleNames()->implode(', ') === 'AdministradorC')
                                                              @foreach($admin as $adm)
                                                                @if( $dat->id === $adm->user_id )
                                                                @else
                                                                  <option value="{{ $dat->id }}" >{{ $dat->id }}-{{ $dat->name }}</option>
                                                                @endif
                                                               @endforeach
                                                            @endif
                                                          @endforeach
                                                         </select>
                                                        </p>
                                                        
                                                      </div> -->
                                                      <div class="form-group">
                                                        <p>
                                                          <input type="text" class="form-control " value="" placeholder="RFC" name="rfc" required>
                                                        </p>
                                                      </div>
                                                      <div class="form-group">
                                                        <p>
                                                          <input type="text" class="form-control " value="" placeholder="Nombre" name="nombre" required>
                                                        </p>
                                                      </div>
                                                      <div class="form-group">
                                                        <p>
                                                          <input type="text" class="form-control " value="" placeholder="Direccion" name="direccion" required>
                                                        </p>
                                                      </div>
                                                      <div class="form-group">
                                                        <p>
                                                         <input type="tel" class="TEL form-control " value="" placeholder="Telefono" name="telefono" >
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
<script>
  $(document).ready(function(){
$('.select22').select2({
    });
  
  $(".TEL").inputmask({alias: "tel"});
  $(".fecha").inputmask({alias: "yyyy-mm-dd"});
});
</script>
@include('sweetalert::alert')
@endsection