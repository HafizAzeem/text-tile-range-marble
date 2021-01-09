<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Aloha!</title>

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

    }
    .gray {
        background-color: lightgray
    }
    .table2, .table2 th, .table2 td,{
        
        border: 1px solid black;
        border-collapse: collapse;

    }
    th, td{
      padding-left: 10px;
    }
</style>

</head>
<body>

  <table width="100%">
    <tr>
        <td valign="top"><img src="{{ asset('public/assets/images/logo1.PNG')}}" class="img-thumbnail" alt=""   width="200"/></td>
        <td align="right">
            <h3>Textile Range</h3>
            <pre>
                20-Air Line Housing Society, <br/>
                Khayaban-e-Jinah، Road،<br/>
                Block G 5 Wapda Town Phase 1,<br/> 
                Lahore, Punjab 54000<br/>
                0300 4009419<br/>   
            </pre>
        </td>
    </tr>

  </table>

  <table class="table1" width="100%">
    <tr>
        <td>
            <div>
                <strong>Bill To:</strong> 
                {{$order->customer_id}}
                Linblum - Barrio teatral <br/>
                88k Gulberg 4 Lahore<br/>
                Pakistan
            </div>
        </td>

        <td>
            <div>Invoice #:{{$order->invoice_no}}</div>
            <div>Order #:{{$order->order_no}}</div>
            <div>Client PO #:{{$order->customer_po_no}}</div>
        </td>
        <td>
            <div>Order Date:{{$order->order_date}}</div>
            <div>Due Date:{{$order->due_date}}</div>
        </td>
    </tr>

  </table>

  <br/>

  <table width="100%" class="table2" >
    <thead style="background-color: lightgray;">
      <tr>
        <th style="padding:5px;">#</th>
        <th style="padding:5px;">Description</th>
        <th style="padding:5px;">Quantity</th>
        <th style="padding:5px;">Unit Price</th>
        <th style="padding:5px;">Total </th>
      </tr>
    </thead>
      <tbody>
      <?php 
        $usd = 0; 
        $eur = 0; 
        $usdFlag = false;
        $eurFlag = false;
      ?>
      @foreach($order->orderItem as $key=>$item)
        
          @if($item->currency=="USD")
            <?php 
            $usdFlag = true;
            $usd += $item->rate * $item->qty ?>
          @endif
          @if($item->currency=="EUR")
            <?php 
             $eurFlag = true;
            $eur += $item->rate * $item->qty ?>
          @endif
      <tr>
        <td scope="row"  style="width: 10px;">{{($key+1)}}</td>
        <td>
        {{$item->product->name}}<br/>
        {{$item->description}}</td>
        <td >{{$item->qty}}</td>
        <td >{{$item->rate}}</td>
        <td >{{$item->currency}} {{$item->rate * $item->qty}}</td>
        
      </tr>
      @endforeach
      @if ($usdFlag)
      <tr>
        <td colspan="4" align="right">Net Total (USD)</td>
        <td style="width: 20%;"> {{$usd}} </td>
      </tr>
      @endif 
      @if ($eurFlag)
       <tr>
          <td colspan="4" align="right">Net Total (EUR)</td>
          <td style="width: 20%;"> {{$eur}}</td>
      </tr>
      @endif 
      
     </tbody>
  </table>   
</body>
</html>