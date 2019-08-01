<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Factura!</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
</style>

</head>
<body>

  <table width="100%">
    <tr>
        <td valign="top"><img src="{{asset('images/beescanner.png')}}" alt="" width="150"/></td>
        <td align="right">
            <h3>BeeScanner</h3>
            <pre>
                Un proiect pentru concursul infoeducatie
                Iasi
                0787648791
            </pre>
        </td>
    </tr>

  </table>

  <br/>

  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>#</th>
        <th>Denumire produs</th>
        <th>Cantitate</th>
        <th>Pret / bucata</th>
        <th>Total lei</th>
      </tr>
    </thead>
    <tbody>
    @php
        $contor = 0;
        $total = 0;
    @endphp 
    @foreach($products as $product)
    @php
        $contor++;
        $total += $product->product->price * $product->quantity;
    @endphp 
      <tr>
        <th scope="row">{{$contor}}</th>
        <td>{{$product->product->name}}</td>
        <td align="right">{{$product->quantity}}</td>
        <td align="right">{{$product->product->price}}</td>
        <td align="right">{{$product->product->price * $product->quantity}}</td>
      </tr>
    @endforeach
    </tbody>

    <tfoot>
        <tr>
            <td colspan="3"></td>
            <td align="right">Subtotal lei</td>
            <td align="right">{{$total}}</td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td align="right">Transport lei</td>
            <td align="right">20</td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td align="right">Total lei</td>
            <td align="right" class="gray">{{ $total + 20 }}</td>
        </tr>
    </tfoot>
  </table>

</body>
</html>