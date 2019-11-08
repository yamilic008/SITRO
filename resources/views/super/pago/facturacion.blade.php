@extends('layouts.master')

@section('css')

<link href="{{ asset('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/dropzone/dropzone.css') }}" rel="stylesheet">
@endsection

@section('header')
<div class="block-header">
    <h2>USUARIOS</h2>
</div>
@endsection

@section('content')
<div class="row clearfix">
  <div class="col-xs-12 col-sm-3">
      <div class="card profile-card">
          <div class="profile-header">&nbsp;</div>
          <div class="profile-body">
              <div class="image-area">
                @if(auth()->user()->avatar==='user.png')
                    <img src="{{ asset('uploads/avatars/'.auth()->user()->avatar) }}" width="128px" height="128px" alt="User" />
                @else
                  <img src="{{ asset('uploads/users/'.$user->id.'/'.$user->avatar) }}" alt="Imagen de Perfil" width="128px" height="128px"  />
                @endif
              </div>
              <div class="content-area">
                  <h3>{{$user->name}}</h3>
                  <p>{{$user->email}}</p>
                  <p>{{$user->getRoleNames()->implode(', ')}}</p>
              </div>
          </div>
         <!--  <div class="profile-footer">
             <ul>
                 <li>
                     <span>Followers</span>
                     <span>1.234</span>
                 </li>
                 <li>
                     <span>Following</span>
                     <span>1.201</span>
                 </li>
                 <li>
                     <span>Friends</span>
                     <span>14.252</span>
                 </li>
             </ul>
             <button class="btn btn-primary btn-lg waves-effect btn-block">FOLLOW</button>
         </div> -->
      </div>
      <div class="card card-about-me">
                        <div class="header">
                            <h2>DATOS DE FACTURACION</h2>
                        </div>
                        <div class="body">
                            <ul>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">library_books</i>
                                        Nombre
                                    </div>
                                    <div class="content">
                                      @if(isset($dato->Nombre))
                                        {{$dato->Nombre}}
                                      @else
                                        Sin Datos
                                      @endif
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">location_on</i>
                                        Dirección
                                    </div>
                                    <div class="content">
                                        @if(isset($dato->Direccion))
                                          {{$dato->Direccion}}
                                        @else
                                          Sin Datos
                                        @endif
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">local_phone</i>
                                        Telefono
                                    </div>
                                    <div class="content">
                                        @if(isset($dato->Telefono))
                                          {{$dato->Telefono}}
                                        @else
                                          Sin Datos
                                        @endif
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">notes</i>
                                        RFC
                                    </div>
                                    <div class="content">
                                        @if(isset($dato->RFC))
                                          {{$dato->RFC}}
                                        @else
                                          Sin Datos
                                        @endif
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
  </div>
  <div class="col-xs-12 col-sm-9">
        <div class="card">
            <div class="body">
                <div>
                      <ul class="nav nav-tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Perfil</a></li>
                      </ul>

                      <div class="tab-content">
                          <div role="tabpanel" class="tab-pane fade in active" id="profile_settings">
                              <form class="form-horizontal" id="form_validation" method="POST" action="{{ route('clientes.update',$dato['id']) }}">
                              {{ csrf_field() }}{{method_field('PUT')}}
                                  <div class="form-group">
                                      <label for="NameSurname" class="col-sm-2 control-label">Nombre Facturacion</label>
                                      <div class="col-sm-10">
                                          <div class="form-line">
                                              @if(isset($dato->Nombre))
                                              <input type="text" class="form-control" id="NameSurname" name="nombre" placeholder="Nombre" value="{{$dato->Nombre}}">
                                               @else
                                               <input type="text" class="form-control" id="NameSurname" name="nombre" placeholder="Nombre">
                                              @endif
                                          </div>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="NameSurname" class="col-sm-2 control-label">Direccion Fiscal</label>
                                      <div class="col-sm-10">
                                          <div class="form-line">
                                              @if(isset($dato->Direccion))
                                              <input type="text" class="form-control" id="NameSurname" name="direccion" placeholder="Direccion" value="{{$dato->Direccion}}">
                                               @else
                                               <input type="text" class="form-control" id="NameSurname" name="direccion" placeholder="Direccion">
                                              @endif
                                          </div>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="NameSurname" class="col-sm-2 control-label">Telefono</label>
                                      <div class="col-sm-10">
                                          <div class="form-line">
                                              @if(isset($dato->Telefono))
                                              <input type="text" class="form-control" id="NameSurname" name="telefono" placeholder="Telefono" value="{{$dato->Telefono}}">
                                               @else
                                               <input type="text" class="form-control" id="NameSurname" name="telefono" placeholder="Telefono">
                                              @endif
                                          </div>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="NameSurname" class="col-sm-2 control-label">RFC</label>
                                      <div class="col-sm-10">
                                          <div class="form-line">
                                              @if(isset($dato->RFC))
                                              <input type="text" class="form-control" id="NameSurname" name="rfc" placeholder="RFC" value="{{$dato->RFC}}">
                                               @else
                                               <input type="text" class="form-control" id="NameSurname" name="rfc" placeholder="RFC">
                                              @endif
                                          </div>
                                      </div>
                                  </div>
                                  
                                  <div class="form-group">
                                      <div class="col-sm-offset-2 col-sm-10">
                                          <button type="submit" class="btn btn-success">Actualizar</button>
                                      </div>
                                  </div>
                              </form>
                          </div>
<!-- ------------------------------------ Tab --------------------------------------- -->
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>         
@endsection

@section('js')
<!-- <script src="{{ asset('plugins/jquery-datatable/jquery.dataTables.js') }}" defer></script>
<script src="{{ asset('js/tables/jquery-datatable.js') }}" defer></script>
<script src="{{ asset('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}" defer></script>
<script src="{{ asset('plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}" defer></script>
<script src="{{ asset('plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}" defer></script> -->
<script src="{{asset('plugins/jquery-validation/jquery.validate.js')}}"></script>
<script src="{{asset('plugins/dropzone/dropzone.js')}}"></script>
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
  $(function () {
    $('#form_validation').validate({
        rules: {
            'checkbox': {
                required: true
            },
            'gender': {
                required: true
            },
            'password_confirmation': {
                equalTo: '#password'
            }
        },
        highlight: function (input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
        },
         messages:{
            name:"introduce el nombre",
            email:"introduce un correo valido",
            password_confirmation:"el nuevo password no es igual"
          }
    });

        Dropzone.options.frmFileUpload = {
        paramName: "avatar",
         maxFilesize: 5,
        init: function () 
        {
        // Set up any event handlers
          this.on('success', function()
          {
            if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) 
            {
              location.reload();
            }
          });
        }
    };
});
</script>

@endsection