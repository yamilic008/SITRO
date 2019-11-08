@extends('layouts.master')

@section('header')
<div class="block-header">
    <h2>INICIO Administrador A</h2>
</div>
@endsection

@section('content')
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="info-box hover-expand-effect">
        <div class="icon bg-teal">
            <i class="material-icons">shopping_cart</i>
        </div>
        <div class="content">
            <div class="text">VENTAS TOTALES</div>
            <div class="number"><b> <font size="5">$ {{number_format($tarea,2,".",",")}}</font></b></div>
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
           <div class="text">ANTICIPOS TOTALES</div>
           <div class="number"><b> <font size="5">$ {{number_format($anticipo,2,".",",")}}</font></b></div>
       </div>
   </div>
</div>
<!-- <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
<div class="card">
<div class="header">
    <h2>
        BOOTSTRAP DEFAULT BUTTONS
        <small>Use any of the available button classes to quickly create a styled button</small>
    </h2>
    <ul class="header-dropdown m-r--5">
        <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">more_vert</i>
            </a>
            <ul class="dropdown-menu pull-right">
                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
            </ul>
        </li>
    </ul>
</div>
<div class="body">
    <div class="button-demo">
        <button type="button" class="btn btn-default waves-effect">DEFAULT</button>
        <button type="button" class="btn btn-primary waves-effect">PRIMARY</button>
        <button type="button" class="btn btn-success waves-effect">SUCCESS</button>
        <button type="button" class="btn btn-info waves-effect">INFO</button>
        <button type="button" class="btn btn-warning waves-effect">WARNING</button>
        <button type="button" class="btn btn-danger waves-effect">DANGER</button>
    </div>
</div>
</div>
</div> -->
@endsection
