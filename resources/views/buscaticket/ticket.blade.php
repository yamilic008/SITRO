@extends('layouts.log')
@section('css')

<link href="{{ asset('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endsection


@section('content')
  <?php $sumaiva = 0; ?>
    <?php $sumsub = 0; ?>
    <?php $total = 0; ?>
    <section class="container">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                    <div class="card">
                        <div class="header" style="background-color: #004D40;" >
                            <h2 style="color: #ffffff;">
                                Ticket <b>{{$tarea->id}}</b> --- {{$tarea->created_at}}
                            </h2>
                            
                        </div>
                        <div class="body">
                        <div class="table-responsive">

                            <table class="table " border="0">
                                
                                  <tr>
                                    <td WIDTH="50px" HEIGHT="50px">
                                      @if($tarea->empresa->logo==='logo.png')
                                        <img src="{{ asset('uploads/avatars/logo.png') }}" width="128px" height="128px" alt="User" style="border-radius:2%" />
                                      @else
                                        <img src="{{ asset('uploads/empresa/'.$tarea->empresa->id.'/'.$tarea->empresa->logo) }}" alt="Imagen de Perfil" width="130px" height="130px" style="border-radius:10%" >
                                      @endif
                                      
                                    </td>
                                    <td >
                                      <p style="vertical-align:top;"> <strong> <font size="5">{{$tarea->empresa->Nombre}}</font>  </strong></p> 
                                      <p>Dirección;{{$tarea->empresa->Direccion}} Tel: {{$tarea->empresa->Telefono}} <br> Rfc: {{$tarea->empresa->Rfc}}</p>
                                    </td>
                                    <td colspan="" rowspan="" headers="">
                                      
                                    </td>
                                    <td colspan="" rowspan="" headers=""><b>Descripción:</b>{{$tarea->observacion}} 
                                      <br>
                                      <b>Estatus:</b>
                                      @if( $tarea->estatus==='0%')
                                       <span class="badge bg-yellow" >{{$tarea->estatus}}</span>
                                       @endif
                                       @if($tarea->estatus==='25%')
                                          <div class="progress">
                                            <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 25%">
                                              <span class="sr-only">25% Complete</span> 25%
                                            </div>
                                          </div>
                                       @endif
                                       @if($tarea->estatus==='50%')
                                          <div class="progress">
                                            <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                                              <span class="sr-only">50% Complete</span> 50%
                                            </div>
                                          </div>
                                       @endif
                                       @if($tarea->estatus==='75%')
                                          <div class="progress">
                                            <div class="progress-bar bg-amber progress-bar-aqua progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
                                              <span class="sr-only">75% Complete</span> 75%
                                            </div>
                                          </div>
                                       @endif
                                       @if($tarea->estatus==='100%')
                                          <div class="progress">
                                            <div class="progress-bar bg-green progress-bar-aqua progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                              <span class="sr-only">100% Complete</span>100%
                                            </div>
                                          </div>
                                       @endif
                                       @if($tarea->estatus==='Entregado')
                                          <span class="badge bg-green"  ><font >{{$tarea->estatus}}</font></span> 

                                       @endif
                                       <br>
                                       <br>
                                       <b>Anticipo:</b> ${{$tarea->pagado}}
                                       
                                    </td>
                                  </tr>
                                  
                              </table>
                              <table  class="table table-bordered table-striped">
                <thead>
                <tr class="success">
                  <th>CANT</th>
                  <th>UDM</th>
                  <th>ARTICULO</th>
                  <th>OBSERVACION</th>
                  <th>P.UNIT</th>
                  <th>IMPORTE</th>
                  <!-- <th>IVA</th> -->
                </tr>
                </thead>
                <tbody>
               @foreach($articulo as $art)
                  <tr>
                      <td>{{$art->cantidad}} <input type="hidden" name="id" value="{{$importe=0}}"> </td>
                      <td>{{$art->udm}}</td>
                      <td><font >{{$art->nombre}}</font></td>
                      <td>{{$art->observacion}}</td>
                      <td class="text-right">$ {{number_format( $art->precio, 2, '.', ',' )}}</td>

                      <td class="text-right">
                         <input type="hidden" name="id" value="{{$importe = $importe+ ($art->precio * $art->cantidad)}}"> 
                         <input type="hidden" name="id" value="{{$sumsub=$sumsub+$art->subtotal}}"> 
                         <input type="hidden" name="id" value="{{$total=$total+$art->total}}"> $ {{number_format( $art->subtotal, 2, '.', ',' )}}</td>
                      <!-- <td class="text-right"> $ {{number_format( $art->iva, 2, '.', ',' )}}</td> -->
                      <input  type="hidden" value="{{$sumaiva=$art->iva+$sumaiva}}">
                         
  
                  </tr>
               @endforeach
                </tbody>
                <tfoot>
                  
                <tr>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th><font size="-2">SUBT</font></th>
                  <th class="text-right"><font size="-2">$ {{number_format($sumsub,2,".",",")}}</font></th>
                </tr>
                <tr>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th><font size="-2">IVA</font></th>
                  <th class="text-right"><font size="-2">$ {{number_format($sumaiva,2,".",",")}}</font></th>
                </tr>
                <tr>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th>TOTAL</th>
                  <th class="text-right">$ {{number_format($total,2,".",",")}}</th>
                </tr>
  
                </tfoot>
              </table>
            </div>
            </div>
        </div>
    </div>
                            
    </section>

 


@endsection
