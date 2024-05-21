<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>IMPRIMIR</title>
</head>
<style>
    td.Space {
    padding-right: 637px;
}
td.table-image {
    width: 7%;
}
td.Table-date {
    width: 19%;
}
b.text-access {
    font-size: 30px;
    font-weight: 800;
}
b.text-infor {
    font-size: 17px;
    font-weight: 400;
    font-family: tahoma;
}
</style>
<body>
    <h1></h1>
    <table class="table" cellpadding="0" cellspacing="0" border="0">
        <!--<thead>
          <tr>
            <th scope="col"  class="Space"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            
          </tr>
        </thead>-->
        <tbody>

          <tr >
            @if ($ultimaFila)
            <td class="Space"></td>
            <td class="table-image">
                <img src='/img/exiven.png' height="80px"><br>
            </td>
            <td class="Table-date">
                <b style="font-size: 30px; font-weight:800;font-family: tahoma;">{{$ultimaFila->id_acceso}}</b><br>
                <b class="text-infor" >{{ strtoupper($ultimaFila->nom_acreditar) }}</b><br>
                <b class="text-infor">{{ $ultimaFila->dni_acreditar }}</b>
            </td>
            <td class="barcode" style="width:280px;">
                <br>{!! $codigoBarras !!}
                
                {{ $ultimaFila->cod_evento }}{{ $ultimaFila->correlativo }}<br>
                
            </td>
            <td><br><br>{{ $ultimaFila->cod_usuario }}<br></td>
          </tr>
          <tr>
          </tr>
            @else
            <p>Sin registros</p>
            @endif
        </tbody>
      </table>
</body>
</html>





