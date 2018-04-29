<!DOCTYPE html>
<html>
<head>
	<title></title>
	
</head>
<body>

    	<table class="table table-hover table-striped" id="table">

            <thead>
              <tr>
              	<td colspan="30">  <h2><b>Vessel Approval List</b></h2></td>
              
              </tr>
              <tr></tr>
                    <tr>
                            <th class="text-center" style="border: 1">Season</th>
                            <th class="text-center" style="border: 1">Collection Code</th>
                            <th class="text-center" style="border: 1">Collection Description</th>
                            <th class="text-center" style="border: 1">Proto Ref.</th>
                            <th class="text-center" style="border: 1">Style No.</th>
                            <th class="text-center" style="border: 1">Style Description</th>
                            <th class="text-center" style="border: 1">Color Code</th>
                            <th class="text-center" style="border: 1">Supplier</th>
                            <th class="text-center" style="border: 1">PO No</th>
                            <th class="text-center" style="border: 1">Qty Ordered</th>
                            <th class="text-center" style="border: 1">Qty to Ship</th>
                            <th class="text-center" style="border: 1">Total Cost Value to Ship</th>
                            <th class="text-center" style="border: 1">Ratio or Backup?</th>
                            <th class="text-center" style="border: 1">Flat or Hanging?</th>
                            <th class="text-center" style="border: 1">Ex-factory Date</th>
                            <th class="text-center" style="border: 1">Vessel</th>
                            <th class="text-center" style="border: 1">ETA UK</th>
                            <th class="text-center" style="border: 1">OTB Date</th>
                            <th class="text-center">Ok to Ship</th>
                            <th class="text-center">CHK</th>
                            <th class="text-center">Wks Cvr</th>
                            <th class="text-center">Told Shippers</th>
                            <th class="text-center">Container No. Checked on Vessel</th>
                            <th class="text-center">Comments</th>
                            <th class="text-center">MERCH COMMENTS</th>
                            <th class="text-center">Cost price</th>
                            <th class="text-center">Approval week no.</th>
                            <th class="text-center">Cat</th>
                            <th class="text-center">Dept</th>
                            <th class="text-center">Dept Desc</th>
                            <th class="text-center">Merch</th>
                            <th class="text-center">Sourcer</th>
                            <th class="text-center">Country</th>
                    </tr>
            </thead>
            <tbody>
            	@foreach($shippinginfo as $shinfo)
                    @if($shinfo->ok_to_ship=='YES')
            	<tr style="background-color: #fbc02d">
                    
               
            		<td>{{$shinfo->sea_name}}</td>
                    <td>{{''}}</td>
                    <td>{{''}}</td>
                    <td>{{$shinfo->proto}}</td>
                    <td>{{$shinfo->style_code}}</td>
                    <td>{{$shinfo->prdct_des}}</td>
                    <td>{{'0'}}</td>
                    <td>{{$shinfo->supplier_name}}</td>
                    <td>{{$shinfo->po_number}}</td>
                    <td>{{$shinfo->quantity}}</td>
                 
                
                    <td>{{$shinfo->ship_qty}}</td>
                   
                    <td>{{''}}</td>
                   
                    <td>{{$shinfo->ratio_backup}}</td>
                   
                    <td>{{$shinfo->flat_hanging}}</td>
                     
                    <td>{{$shinfo->ex_factory_date}}</td>

                    
                    <td>{{$shinfo->vessel_name}}</td>
                    

                      
                    <td>{{$shinfo->ETA_UK}}</td>
                      
                    <td>{{''}}</td>
                    
                    <td>{{$shinfo->ok_to_ship}}</td>
                     

                      <td>{{''}}</td>
                      <td>{{''}}</td>
                      <td>{{''}}</td>
                      <td>{{'0'}}</td>
                      <td>{{''}}</td>
                      <td>{{''}}</td>
                      <td>{{$shinfo->fob_price}}</td>
                      <td>{{''}}</td>
                      <td>{{''}}</td>
                      <td>{{''}}</td>
                      <td>{{''}}</td>
                      <td>{{''}}</td>
                      <td>{{''}}</td>
                      <td>{{'BD'}}</td>
                   
            	</tr>
                @else
                <tr>
                    <td>{{$shinfo->sea_name}}</td>
                    <td>{{''}}</td>
                    <td>{{''}}</td>
                    <td>{{$shinfo->proto}}</td>
                    <td>{{$shinfo->style_code}}</td>
                    <td>{{$shinfo->prdct_des}}</td>
                    <td>{{'0'}}</td>
                    <td>{{$shinfo->supplier_name}}</td>
                    <td>{{$shinfo->po_number}}</td>
                    <td>{{$shinfo->quantity}}</td>
                 
                
                    <td>{{$shinfo->ship_qty}}</td>
                   
                    <td>{{''}}</td>
                   
                    <td>{{$shinfo->ratio_backup}}</td>
                   
                    <td>{{$shinfo->flat_hanging}}</td>
                     
                    <td>{{$shinfo->ex_factory_date}}</td>

                    
                    <td>{{$shinfo->vessel_name}}</td>
                    

                      
                    <td>{{$shinfo->ETA_UK}}</td>
                      
                    <td>{{''}}</td>
                    
                    <td>{{$shinfo->ok_to_ship}}</td>
                     

                      <td>{{''}}</td>
                      <td>{{''}}</td>
                      <td>{{''}}</td>
                      <td>{{'0'}}</td>
                      <td>{{''}}</td>
                      <td>{{''}}</td>
                      <td>{{$shinfo->fob_price}}</td>
                      <td>{{''}}</td>
                      <td>{{''}}</td>
                      <td>{{''}}</td>
                      <td>{{''}}</td>
                      <td>{{''}}</td>
                      <td>{{''}}</td>
                      <td>{{'BD'}}</td>
                      
                   
                </tr>
                    @endif
            	@endforeach
              
            </tbody>
          </table>
</body>
</html>