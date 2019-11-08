@extends('layouts.master')

@section('css')

<link href="{{ asset('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">

@endsection

@section('header')
<div class="block-header">
    <h2>USUARIOS</h2>
</div>
@endsection

@section('content')
 <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Nuevo Usuario
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="{{ URL::previous() }}">Cancelar</a></li>
                                        <!-- <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li> -->
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                              <form id="form_validation" method="POST" action="{{ route('usuario.store') }}">
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
                                  <div class="form-group">
                                    <label class="form-label">Seleciona un rol: </label>
                                    @foreach($roles as $id=>$name)
                                      <input type="checkbox" id="checkbox{{$id}}" name="roles[]" value="{{$name}}">
                                      <label for="checkbox{{$id}}">{{$name}}</label>
                                    @endforeach
                                  </div>
                                  <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                              </form>
                        </div>
                    </div>
                </div>
            </div>

@endsection

@section('js')
<script src="{{asset('plugins/jquery-validation/jquery.validate.js')}}"></script>
<!-- <script src="{{asset('js/form-validation.js')}}"></script> -->

<!-- <script src="{{ asset('plugins/jquery-datatable/jquery.dataTables.js') }}" defer></script>
<script src="{{ asset('js/tables/jquery-datatable.js') }}" defer></script>
<script src="{{ asset('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}" defer></script>
<script src="{{ asset('plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}" defer></script>
<script src="{{ asset('plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}" defer></script> -->



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
          }
    });
});
</script>
@endsection
