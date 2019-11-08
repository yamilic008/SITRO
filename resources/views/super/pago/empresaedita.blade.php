@extends('layouts.master')

@section('css')

<link href="{{ asset('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/dropzone/dropzone.css') }}" rel="stylesheet">
@endsection

@section('header')
<div class="block-header">
    <h2>EMPRESA</h2>
</div>
@endsection

@section('content')
<div class="row clearfix">
  <div class="col-xs-12 col-sm-3">
      <div class="card profile-card">
          <div class="profile-header">&nbsp;</div>
          <div class="profile-body">
              <div class="image-area">
                @if($dato->logo==='logo.png')
                    <img src="{{ asset('uploads/avatars/logo.png') }}" width="128px" height="128px" alt="User" style="border-radius:2%" />
                @else
                  <img src="{{ asset('uploads/empresa/'.$dato->id.'/'.$dato->logo) }}" alt="Imagen de Perfil" width="130px" height="130px" style="border-radius:10%" />
                @endif
              </div>
              <div class="content-area">
                  <h3>{{$dato->Nombre}}</h3>
                  <p>{{$dato->Direccion}}</p>
                  <p>{{$dato->Telefono}}</p>
                  <p>{{$dato->Rfc}}</p>
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
  </div>
  <div class="col-xs-12 col-sm-9">
        <div class="card">
            <div class="body">
                <div>
                      <ul class="nav nav-tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Empresa</a></li>
                          <li role="presentation"><a href="#profile_img" aria-controls="settings" role="tab" data-toggle="tab">Logotipo</a></li>
                      </ul>

                      <div class="tab-content">
                          <div role="tabpanel" class="tab-pane fade in active" id="profile_settings">
                              <form class="form-horizontal" id="form_validation" method="POST" action="{{ route('empresa.update',$dato['id']) }}">
                              {{ csrf_field() }}{{method_field('PUT')}}
                                  <div class="form-group">
                                      <label for="NameSurname" class="col-sm-2 control-label">Nombre de la Empresa</label>
                                      <div class="col-sm-10">
                                          <div class="form-line">
                                              <input type="text" class="form-control" id="NameSurname" name="nombre" placeholder="Nombre" value="{{$dato->Nombre}}" required>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="NameSurname" class="col-sm-2 control-label">Dirección</label>
                                      <div class="col-sm-10">
                                          <div class="form-line">
                                              <input type="text" class="form-control" id="NameSurname" name="direccion" placeholder="Direccion" value="{{$dato->Direccion}}" required>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="NameSurname" class="col-sm-2 control-label">Teléfono</label>
                                      <div class="col-sm-10">
                                          <div class="form-line">
                                              <input type="tel" class="form-control" id="NameSurname" name="telefono" placeholder="telefono" value="{{$dato->Telefono}}" required>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="NameSurname" class="col-sm-2 control-label">RFC</label>
                                      <div class="col-sm-10">
                                          <div class="form-line">
                                              <input type="tel" class="form-control" id="NameSurname" name="rfc" placeholder="telefono" value="{{$dato->Rfc}}" required>
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
                          <div role="tabpanel" class="tab-pane fade in" id="profile_img">
                                <form action="{{route('empresa.update.image')}}" id="frmFileUpload" class="form-horizontal dropzone"  enctype="multipart/form-data">
                                 {{ csrf_field() }}{{method_field('PATCH')}}
                                      <div class="dz-message">
                                          <div class="drag-icon-cph">
                                              <i class="material-icons">touch_app</i>
                                          </div>
                                          <h3>Arrastra una imagen aquí o da clic para seleccionar una.</h3>
                                          <em>(La imagen se subirá automáticamente después de arrastrar o seleccionar)</em> <br>
                                          <em> <b>(la imagen debe ser cuadrada 150px x 150px)</b></em>
                                      </div>
                                      <div class="fallback">
                                          <input name="avatar" type="file" multiple />
                                      </div>
                                      <input type="hidden" value="{{$dato->id}}" name="id">
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