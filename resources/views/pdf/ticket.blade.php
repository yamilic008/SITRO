<!DOCTYPE html>
<html>
  <meta charset="utf-8">
  <title> Ticket {{$dato->id}}</title>
  <link rel="stylesheet" href="{{asset('css/bootstrap/bootstrap.min.css')}}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

 <body>
<!--  	variables -->
  	<?php $sumaiva = 0; ?>
    <?php $sumsub = 0; ?>
    <?php $total = 0; ?>

  <div class="row" >
    <div class="col-xs-12 " >
      <p class="text-right">Fecha:<b>{{$fecha}}</b> Folio:<b>{{$dato->id}}</b> </p>
      <table class="table" border="0">
        
          <tr>
            <td WIDTH="50px" HEIGHT="50px">
              @if($dato->empresa->logo==='logo.png')
                <img src="{{ asset('uploads/avatars/logo.png') }}" width="128px" height="128px" alt="User" style="border-radius:2%" />
              @else
                <img src="{{ asset('uploads/empresa/'.$dato->empresa->id.'/'.$dato->empresa->logo) }}" alt="Imagen de Perfil" width="130px" height="130px" style="border-radius:10%" >
              @endif
              
            </td>
            <td >
              <p style="vertical-align:top;"> <strong> <font size="5">{{$dato->empresa->Nombre}}</font>  </strong></p> 
              <p>Dirección: {{$dato->empresa->Direccion}} Tel: {{$dato->empresa->Telefono}} <br> Rfc: {{$dato->empresa->Rfc}}</p>
            </td>
            <td colspan="" rowspan="" headers=""></td>
            <td colspan="" rowspan="" headers=""><b>Descripción: </b>{{$dato->observacion}} </td>
          </tr>
      </table>
    </div>
  </div>
  <input type="hidden" name="id" value="{{$importe=0}}"> 

  <table class="table " border="0">
                
                  <tr>
                    <th>Trabajo</th>
                    <td>{{$dato->nombre}}</td>
                    <th>Detalles</th>
                    
                    <td>{{$dato->observacion}}</td>
                    
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <th>Anticipo:</th>
                    <td> ${{$dato->pagado}}</td>
                  </tr>
                  
                 
              </table>
 



    <div class="row">
      
      <div class="col-xs-12">
       <table id="usuarios" class="table table-bordered table-striped">
                <thead>
                <tr class="success">
                  <th>CANT</th>
                  <th>UDM</th>
                  <th>ARTICULO</th>
                  <th>DESCIPCIÓN</th>
                  <th>P.UNIT</th>
                  <th>IMPORTE</th>
                  <!-- <th>IVA</th> -->
                </tr>
                </thead>
                <tbody>
               @foreach($articulo as $articulo)
                  <tr>
                      <td>{{$articulo->cantidad}} <input type="hidden" name="id" value="{{$importe=0}}"> </td>
                      <td>{{$articulo->udm}}</td>
                      <td>{{$articulo->nombre}}</td>
                      <td>{{$articulo->observacion}}</td>
                      <td class="text-right">{{number_format( $articulo->precio, 2, '.', ',' )}}</td>
                      <td class="text-right">
                         <input type="hidden" name="id" value="{{$importe = $importe+ ($articulo->precio * $articulo->cantidad)}}"> 
                         <input type="hidden" name="id" value="{{$sumsub=$sumsub+$articulo->subtotal}}"> 
                         <input type="hidden" name="id" value="{{$total=$total+$articulo->total}}"> 
                        
                      {{number_format( $articulo->subtotal, 2, '.', ',' )}}</td>
                      <!-- <td>{{$articulo->iva }}</td> --><input  type="hidden" value="{{$sumaiva=$articulo->iva+$sumaiva}}">
                         

                  </tr>
               @endforeach
                </tbody>
                <tfoot>
                	
                <tr>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th>SUBT</th>
                  <th class="text-right">{{number_format($sumsub,2,".",",")}}</th>
                </tr>
                <tr>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th>IVA</th>
                  <th class="text-right">{{number_format($sumaiva,2,".",",")}}</th>
                </tr>
                <tr>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th>TOTAL</th>
                  <th class="text-right">{{number_format($total,2,".",",")}}</th>
                </tr>

                </tfoot>
              </table>
      </div>
      
   


    
      
  </body>
  <script type="text/php">

  	if ( isset($pdf1) ) {
        $x = 162;
        $y = 578;
        $text = "{{Auth::user()->name}} ";
        $font = $fontMetrics->get_font("Arial", "bold");
        $size = 9;
        $color = array(0,0,0);
        $word_space = 0.0;  //  default
        $char_space = 0.0;  //  default
        $angle = 0.0;   //  default
        $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
    }
    if ( isset($pdf) ) {
        $x = 662;
        $y = 588;
        $text = "Pagina {PAGE_NUM} de {PAGE_COUNT}  ";
        $font = $fontMetrics->get_font("Arial", "bold");
        $size = 9;
        $color = array(0,0,0);
        $word_space = 0.0;  //  default
        $char_space = 0.0;  //  default
        $angle = 0.0;   //  default
        $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
    }
    
</script>
</html>