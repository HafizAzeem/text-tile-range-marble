@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="card-title">
            <h4>Order Form</h4></div>
              
                <form action="{{   isset($order)? route('orders.update',$order->id) :route('orders.store')}}" method="Post" class="forms-sample " >
                  @csrf

                  @if(isset($order['id']))
                    @method('put')
                  @endif
               


                  <div class="row">

                    <div class="col-md-3">
                      <div class="form-group">
                        <label >Client *</label>
                        <select name="customer_id" class="form-control ">
                          @foreach ($clients as $key=> $client)
                          <option value="{{$key}}" {{isset($order->customer_id ) && $order->customer_id == $key ? 'selected="selected"' : ''}}>
                              {{$client}}
                          </option>
                          @endforeach
                        </select>
                      
                      </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                        <label for="" for="order_no">Order # *</label>
                        <input id="" type="text" value="{{  isset($order->order_no ) ? $order->order_no : old('order_no')}}" class="form-control  " id="order_no" name="order_no" required/>                      

                      </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                        <label for="" >Invoice # *</label>
                        <input id="" type="text" value="{{ isset($order->invoice_no) ? $order->invoice_no:old('invoice_no')}}" class="form-control " id="invoice_no" name="invoice_no" required />
                       
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label >Customer PO # *</label>
                        <input type="text" value="{{ isset($order->customer_po_no) ? $order->customer_po_no:''}}" class="form-control " id="customer_po_no" name="customer_po_no" required />
                       
                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label  >Vendor *</label>
                        <select   name="vendor_id" class="form-control  ">
                          @foreach ($vendors as $key=>$client)
                          <option value="{{$key}}" {{isset($order->vendor_id ) && $order->vendor_id == $key ? 'selected="selected"' : ''}}>
                              {{$client}}
                          </option>
                          @endforeach
                        </select>
                      
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Order Date *</label>
                        <input  type="date" value="{{ isset($order->order_date) ? $order->order_date:''}}" class="form-control " id="order_date" name="order_date" required />
                        @error('order_date')
                        <div class="invalid-feedback">
                           {{ $message }}
                         </div>
                       @enderror
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Due Date *</label>
                        <input  type="date" value="{{ isset($order->due_date) ? $order->due_date:''}}" class="form-control " id="due_date" name="due_date" required />
                       
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label >Shipment Date *</label>
                        <input type="date" value="{{ isset($order->shipment_date) ? $order->shipment_date:''}}" class="form-control" id="shipment_date" name="shipment_date" required />
                        
                      </div>
                    </div>

                  </div>
                  <div class="row">
                   
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Notes</label>
                        <textarea value="{{  isset($order->notes) ? $order->notes:''}}" class="form-control" name="notes"></textarea>
                      </div>
                    </div>
                  </div>
                  <br>
                  <p class="card-description">Order Items</p>
                  <div class="row">
                    <table class="table table-bordered  table-order-item" style="width:100%">
                      <thead>
                        <tr>
                        <th>#</th>
                          <th>Product</th>
                          <th style="width:50px">Quantity</th>
                          <th style="width:85px">Rate</th>
                          <th style="width:50px">Comm %</th>
                          <th style="width:50px">Foreigner</th>
                          <th style="width: 170px;">Packing</th>
                          <th style="width: 70px;">Lc Days</th>
                          <th>Piece Length</th>
                          <th style="width: 150px;">Status</th>
                          <th>Total</th>
    
                        </tr>
                      </thead>
                      <tbody>
                        @if(isset($order))
                        @foreach($order->orderItem as $key=>$item)
                        <tr class="tr-row">
                         <td >
                           
                           <button class="remove btn btn-danger" type="button" title="Remove Row" onclick="removeOldItemRow(this, )">&#10007;</button>
                         </td>
                          <td class="p-0">
                              <input class="form-control" type="hidden" name="order_item_id[]" value="{{$item->id}}" />
                              @if($products != null)
                             <select  name="product_id[]" class="form-control  ">
                                  @foreach ($products as $key=>$product)
                                  <option value="{{$key}}" {{isset($item->product_id ) && $item->product_id == $key ? 'selected="selected"' : ''}}>
                                      {{$product}}
                                  </option>
                                  @endforeach
                              </select>
                              @endif
                           <div class="mt-1">
                            <textarea  value="{{ isset($item->description) ? $item->description:''}}" class="form-control" name="description[]" placeholder="Description"></textarea>
                          </div>
                          </td>
                          <td class="px-0">
                          
                            <input id="" value="{{ isset($item->qty) ? $item->qty:''}}" type="number" step="1" class="form-control " onblur="calculateVlues()" name="qty[]"  />
                               
                          </td>
                          
                          <td class="px-0">
                            <div>
                              <input   id="" value="{{ isset($item->rate) ? $item->rate:''}}" type="number" step="0.01" class=" form-control " onblur="calculateVlues()" name="rate[]"  placeholder="Rate"  />
                            </div> 
                            <div>
                              <input value="{{ isset($item->exchange_rate) ? $item->exchange_rate:''}}" type="text" class="form-control" name="exchange_rate[]"  placeholder="Exchange Rate" />
                            </div>
                            <div>
                                <select value="{{ isset($item->currency) ? $item->currency:''}}" name="currency[]" class="form-control">
                                  <option value="USD">USD</option>
                                  <option value="EUR">EUR</option>
                                </select>
                            </div>
                          </td>


                          <td class="px-0">
                              <input value="{{ isset($item->commission) ? $item->commission:''}}" onblur="calculateVlues()"  type="text" name="commission[]"  class="form-control " />
                          </td>
                          <td class="px-0">
                              <div class="mb-1 ">
                                @if($foreign_agents != null)
                                  <select value="{{ isset($item->foreigner_id) ? $item->foreigner_id:''}}" name="foreigner_id[]" class="form-control">
                                  @foreach($foreign_agents as $key => $foreign_agent)
                                      <option value="{{$key}}" {{ $item->foreigner_id == $key ? 'selected="selected"' : '' }}>
                                          {{$foreign_agent}}
                                      </option>
                                      @endforeach
                                  </select>
                                 @endif
                              </div>
                            <input value="{{ isset($item->foreigner_commission) ? $item->foreigner_commission:''}}" onblur="calculateVlues()" type="text" name="foreigner_commission[]"  class="form-control"/>
                          </td>
                          <td>
                              <input value="{{ isset($item->packing) ? $item->packing:''}}" type="text" name="packing[]"  class="form-control">
                          </td>
                          <td class="px-0">
                              <input value="{{ isset($item->lc_days) ? $item->lc_days:''}}" type="text" name="lc_days[]"  class="form-control">
                          </td>
                          <td>
                              <input  value="{{ isset($item->piece_length) ? $item->piece_length:''}}" type="text" name="piece_length[]" value="" class="form-control" />
                          </td>
                          <td>
                           <select name="status[]" id="" class="form-control">
                              <option value="Contract" {{isset($item->status ) && $item->status == "Contract" ? 'selected="selected"' : ''}}>Contract</option>
                              <option value="In Production" {{isset($item->status ) && $item->status == "In Production" ? 'selected="selected"' : ''}}>In Production</option>
                              <option value="Sample Ref Production" {{isset($item->status ) && $item->status == "Sample Ref Production" ? 'selected="selected"' : ''}}>Sample Ref Production</option>
                              <option value="Shipment" {{isset($item->status ) && $item->status == "Shipment" ? 'selected="selected"' : ''}}>Shipment</option>
                              <option value="Maturity" {{isset($item->status ) && $item->status == "Maturity" ? 'selected="selected"' : ''}}>Maturity</option>
                              <option value="Close" {{isset($item->status ) && $item->status == "Close" ? 'selected="selected"' : ''}}>Close</option>
                            </select>
                          </td>
                          <td class="item-total">
                            
                          </td>
                         
                        </tr>
                        @endforeach
                        @endif
                      
                      </tbody>
                      <tfoot>
                        <tr class="tr-total">
                          <td colspan="9">
                          </td>
                          <td class="text-right">Net total</td>
                          <td class="net-total"></td>
                        </tr>
                        <tr class="tr-total">
                          <td colspan="9">
                          </td>
                          <td class="text-right" >Commission</td>
                          <td class="commission"></td>
                        </tr>
                        <tr class="tr-total">
                          <td colspan="9">
                          </td>
                          <td class="text-right">Foreigner Commission</td>
                          <td class="fcommission"></td>
                        </tr>
                      </tfoot>
                    </table>
                    <div class="row">
                      <div class="col-md-12 col-12 my-3 ">
                        <input class="btn btn-success btn-fw" type="button" class="add" value="Add Row" onclick="addNewItemRow()" />
                      </div>
                    </div>
                  </div>

                  <div class="row mt-2">
                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                    <a href= "{{ route('orders.index') }}" type="button" class="btn btn-light"> Cancel</a>
                  </div>
                </form>
              </div>
            </div>
          </div>

      @if(isset($revision ))    
          <!-- Revision Table -->
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex flex-column justify-content-between">
            <div class="d-flex align-items-center">
              <h4>Revisions Table</h4>
              <!-- <a href="{{route('orders.create')}}" class="btn btn-success btn-fw">Add New</a> -->
            </div>

            <div class="table-responsive">
            <table class="js-table-sections table table-hover">
              <thead>
                  <tr>
                      <th style="width: 30px;"></th>
                      <!-- <th>Client</th> -->
                      <th>Order #</th>
                      <th>Invoice #</th>
                      <th>Client PO #</th>
                      <th>Vendor</th>
                      <th>Order Date</th>
                      <th>Due Date</th>
                      <!--<th>Currency</th>-->
                      <th>Total</th>
                      <th>Commision</th>
                      <th>F. Commision</th>
                      <th>Action</th>
                      <!-- <th style="width: 15%;">Access</th>
                      <th class="d-none d-sm-table-cell" style="width: 20%;">Date</th> -->
                  </tr>
              </thead>
              @foreach($revision as $idx => $row) 
                <tbody class="js-table-sections-header {{$idx==0 ? 'show table-active' : ''}}">
                   <tr>
                   <td></td>
                    <td>{{$row['order_no']}}</td>
                    <td>{{$row['invoice_no']}}</td>
                    <td>{{$row['customer_po_no']}}</td>
                    <td></td>
                    <td>{{$row['order_date']}}</td>
                    <td>{{$row['due_date']}}</td>
                    <!--<td>{{$row['currency']}}</td>-->
                    <td>{{$row['net_total']}}</td>
                    <td>{{$row['com_total']}}</td>
                  
                  </tr>
                </tbody> 
                <tbody>
                  <tr>
                    <th></th>
                    <th>Name/Descirption</th>
                    <th>Qty</th>
                    <th>Rate</th>
                    <th>Total</th>
                    <th>commission</th>
                    <th>foreigner_commission</th>
                    <th>packing</th>
                    <th>lc_days</th>
                    <th>piece_length</th>
                    <th>status</th>
                  
                  </tr>
                  @foreach($row['order_item'] as $item) 
                    <tr>
                      <td class="text-center"></td>
                      <!-- text-success -->
                      <td class="font-w600">
                        <br/>
                        {{$item['description']}}
                      </td>
                      <td>{{$item['qty']}}</td>
                      <td>{{$item['rate']}}</td>
                      <td>{{$item['rate'] * $item['qty']}}</td>
                      <td>{{$item['commission']}}% ={{ $item['commission'] ? ($item['rate'] * $item['qty'])*($item['commission']/100) : 0 }}</td>
                      <td>{{$item['foreigner_commission']}}% ={{ $item['foreigner_commission'] ? ($item['rate'] * $item['qty'])*($item['foreigner_commission']/100) : 0 }}</td>
                      <td>{{$item['packing']}}</td>
                      <td>{{$item['lc_days']}}</td>
                      <td>{{$item['piece_length']}}</td>
                      <td>{{$item['status']}}</td>
                    
                      
                      <!-- <td class="font-size-sm">Stripe</td>
                      <td class="d-none d-sm-table-cell">
                          <span class="font-size-sm text-muted">October 3, 2017 12:16</span>
                      </td> -->
                    </tr>
                  @endforeach
                </tbody>
              @endforeach
            </table>
            </div>
          </div>
        </div>
      </div>
    </div>
      @endif
          <!-- Revision table End -->
      </div>
<div id="product_dp" style="display: none;">
  <select  name="product_id[]" class="form-control">
    @foreach ($products as $key=>$product)
    <option value="{{$key}}">
        {{$product}}
    </option>
    @endforeach
  </select>
</div>
<div id="foreign_agent_dp" style="display: none;">
 <select  name="foreigner_id[]" class="form-control">
 @foreach($foreign_agents as $key => $foreign_agent)
  <option value="{{$key}}" {{isset($item->foreigner_id ) && $item->foreigner_id == $key ? 'selected="selected"' : ''}}>
     {{$foreign_agent}}
 </option>
 @endforeach
</select>
</div>


@section('script')

@if(!isset($order))
<script>
 $(document).ready(function() {
     addNewItemRow();
  });
</script>
@endif

@if(isset($order))
<script>
 $(document).ready(function() {
     calculateVlues();
  });
</script>
@endif

<script>
    function addNewItemRow() {
      const dp = $('#product_dp').html();
      const df = $('#foreign_agent_dp').html();
      
      var html = `
        <tr class="tr-row">
        
        <td>
          
        
            <button class="remove btn btn-danger" type="button" title="Remove Row" onclick="removeOldItemRow(this, )">&#10007;</button>
        </td>
        
          <td>
            <input type="hidden" name="order_item_id[]" value="new"/>
              <div class="mb-1">${dp}</div>
              <div>
                <textarea class="form-control" name="description[] placeholder="Description""></textarea>
              </div>
          </td>
          <td class="px-0" >
            <input  type="number"  step="1"  class="form-control "onblur="calculateVlues()" name="qty[]"/> 
          </td>
          <td class="px-0">
            <div>
            
              <input type="number" step="0.01" class="form-control" onblur="calculateVlues()" name="rate[]"  placeholder="Rate" />
            </div>
            <div>
              <input type="text"  class="form-control" name="exchange_rate[]"  placeholder="Exchange Rate"/>
            </div>
            <div>
                 <select name="currency[]"  class="form-control" >
                    <option value="USD">USD</option>
                     <option value="EUR">EUR</option>
                 </select>
             </div> 
          </td>
          <td class="px-0">
              <input type="text" name="commission[]" onblur="calculateVlues()" class="form-control">
          </td>
          <td class="px-0">
              <div class="mb-1">${df}</div>
              <input type="text" name="foreigner_commission[]" onblur="calculateVlues()" class="form-control" >
          </td>
          <td>
              <input type="text" name="packing[]" class="form-control">
          </td>
          <td class="px-0">
              <input type="text" name="lc_days[]"   class="form-control">
          </td>
          <td>
              <input type="text" name="piece_length[]"  class="form-control">
          </td>
          <td>
            <select class="form-control" name="status[]">
              <option value="Contract">Contract</option>
              <option value="In Production">In Production</option>
              <option value="Sample Ref Production">Sample Ref Production</option>
              <option value="Shipment">Shipment</option>
              <option value="Maturity">Maturity</option>
              <option value="Close">Close</option>
            </select>
          </td>
          <td class="item-total">0</td>
         
        </tr>
      `
      // $('.tr-total').append()
      $('.table-order-item tbody').append(html)      
    }

    //Remove New added row
    function removeNewItemRow(obj) {
      $(obj).closest('tr').remove();
    }
    // delete row from database
    function removeOldItemRow(obj, id) {
        if (confirm("You are going to delete this row.")) {
            $(obj).closest('tr').remove();
            $('form').append(` <input type="hidden" name="del_row[]" value="${id}" />`)
        }
    }
function calculateVlues(){
  $(".tr-row")
  console.log(  $(".tr-row"));
  var subTotal = 0, comm = 0, fcomm = 0, nettotal=0; 
  $.each($(".tr-row"), function(i, tr) {
  
    var qty=$(tr).find('input[name="qty[]"]').val()
    var rate=$(tr).find('input[name="rate[]"]').val()
    var commission=$(tr).find('input[name="commission[]"]').val()
    var foreignerCommission=$(tr).find('input[name="foreigner_commission[]"]').val()
    const total = qty*rate 
    
    console.log(
      total,
      commission, 
      total*(commission/100),  
      foreignerCommission
    );
    
    $(tr).find('.item-total').html(total.toFixed(2))
    comm += total*(commission/100)
    fcomm+= total*(foreignerCommission/100)
    nettotal+= total
  });

  $('.commission').html(comm.toFixed(2))
  $('.fcommission').html(fcomm.toFixed(2))
  $('.net-total').html(nettotal.toFixed(2))
  

}
 
</script>
@endsection
@endsection
