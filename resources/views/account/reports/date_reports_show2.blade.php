
<html>	
  <head></head>
  <body>
    <table>
    <tr>
      <td><strong>Date</strong></td>
      <td><strong>Account Head</strong></td> 
      <td><strong>Account SubHead</strong></td> 
      <td><strong>Particular Head</strong></td>
      <td><strong>Voucher No</strong></td>
      <td><strong>Details Description</strong></td>
      <td><strong>Expenses</strong></td>
    </tr>
      @foreach($s as $row)
      	<tr>
      		<td>{{$row['recording_date']}}</td>
      		<td>{{$row->head->name}}</td>
          @if($row->subhead)
            <td >{{$row->subhead->description}}</td>
            @else
            <td></td>
          @endif
      		<td>{{$row['particulars']}}</td>
      		<td>{{$row['voucher_no']}}</td>
      		<td>{{$row['details_description']}}</td>
      		<td>{{number_format($row['expense_amount'])}}</td>
      	</tr>
      @endforeach
      	<tr>
      		<td></td>
      		<td></td>
      		<td></td>
      		<td></td>
          <td></td>
      		<td>total</td>
      		<td>{{ number_format($s->sum('expense_amount')) }}</td>
   	</tr>
    </table>

  </body>

</html>

