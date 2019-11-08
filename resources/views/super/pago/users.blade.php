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
           <div class="header">
                            <h2>
                                Usuarios
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                  <li>
                                      <a href="#" data-toggle="modal" data-target="#defaultModal">
                                          <i class="material-icons">add_circle</i>
                                      </a>
                                  </li>
                                   <!--  <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                       <i class="material-icons">more_vert</i>
                                   </a>
                                   <ul class="dropdown-menu pull-right">
                                       <li><a href="{{ route('usuario.create') }}">Nuevo</a></li>
                                       <li><a href="#" data-toggle="modal" data-target="#defaultModal">Nuevo Modal</a></li> -->
                                        <!-- <button type="button" class="btn btn-default waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal">MODAL - DEFAULT SIZE</button> -->

                                        <!-- <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li> -->
                                    </ul>
                                </li>
                            </ul>
                        </div>
            <div class="body">
                <div>
                      

                      <div class="tab-content">
                          <div role="tabpanel" class="tab-pane fade in active" id="profile_settings">
                              <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>NOMBRE</th>
                                            <th>EMAIL</th>
                                            <th>CREADO</th>
                                            <th>ROL</th>
                                            <th>ACCION</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>NOMBRE</th>
                                            <th>EMAIL</th>
                                            <th>CREADO</th>
                                            <th>ROL</th>
                                            <th>ACCION</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($users as $us)
                                           <tr>
                                              <td> {{ $us->id }}</td>
                                              <td> {{ $us->name }}</td>
                                              <td> {{ $us->email }}</td>
                                              <td> {{ $us->created_at }}</td>
                                              <td> {{ $us->getRoleNames()->implode(', ') }}</td>
                                               <td>
                                                  
                                                   <a href="{{route ('usuario.edit',$us->id)}}" class="btn btn-xs btn-primary waves-effect">
                              <i class="material-icons" style="font-size: 16px;">edit</i>
                                                   </a>
                                                   <form method='POST' 
                                                         action="{{route('usuario.destroy',$us['id'])}}"
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

<!-- ------------------------------------ Tab --------------------------------------- -->
                          <div role="tabpanel" class="tab-pane fade in" id="profile_img">
                                <form action="{{route('empresa.update.image')}}" id="frmFileUpload" class="form-horizontal dropzone"  enctype="multipart/form-data">
                                 {{ csrf_field() }}{{method_field('PATCH')}}
                                      <div class="dz-message">
                                          <div class="drag-icon-cph">
                                              <i class="material-icons">touch_app</i>
                                          </div>
                                          <h3>Arrastra una imagen aqui o da clic para seleccionar una.</h3>
                                          <em>(la imagen se subira automaticamente despues de arrastrar o seleccionar)</em> <br>
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
<!-- -----------------------------Modal ----------------------------------------------------------------------------->
            <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Nuevo Usuario</h4>
                        </div>
                     <form id="form_validation" method="POST" action="{{ route('usuario.store') }}">
                        <div class="modal-body">
                                 {{ csrf_field() }}
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <input id="nombre" type="text" class="form-control" name="name" required>
                                          <label id="nombre" class="form-label">Name</label>
                                      </div>
                                  </div>
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <input type="email" class="form-control" name="email" required>
                                          <label class="form-label">Email</label>
                                      </div>
                                  </div>
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <input type="password" class="form-control" name="password" required id="password">
                                          <label class="form-label">Password</label>
                                      </div>
                                  </div>
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <input type="password" class="form-control" name="password_confirmation" required>
                                          <label class="form-label">Confirmar Password</label>
                                      </div>
                                  </div>
                                  <div class="form-group form-float">
                                          <input type="text" class="form-control" name="empresa" value="{{$dato->id}}">
                                  </div>
                                  @if(auth()->user()->hasRole('Super_Usuario'))
                                  <div class="form-group">
                                    <p>
                                      <label class="form-label">Seleciona un rol: </label>
                                    </p>
                                    @foreach($roles as $rol)
                                        <input type="checkbox" id="checkbox{{$rol->id}}" name="roles[]" value="{{$rol->name}}">
                                        <label for="checkbox{{$rol->id}}">{{$rol->name}}</label> <br>
                                    @endforeach
                                  </div>
                                  @else
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="hidden" class="form-control" name="roles" value="cliente">
                                        </div>
                                    </div>
                                  @endif

                                 
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect">SAVE CHANGES</button>
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