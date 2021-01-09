@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
           @if (session('success'))
              <div class="alert alert-success alert-dismissable custom-success-box" style="margin: 15px;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong> {{ session('success') }} </strong>
              </div>
            @endif
            @if (session('update'))
              <div class="alert alert-success alert-dismissable custom-success-box" style="margin: 15px;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong> {{ session('update') }} </strong>
              </div>
            @endif
        <div class="card-title d-flex flex-column justify-content-between">
          <div class="card-title d-flex justify-content-between">
            <h4>Orders</h4>
            <a href="{{route('orders.create')}}" class="btn btn-success btn-fw">Add New</a>
          </div>

          <div class="table-responsive">
          <table class="js-table-sections table table-hover">
            <thead>
                <tr>
                    <th style="width: 30px;"></th>
                    <th>Client</th>
                    <th>Order #</th>
                    <th>Invoice #</th>
                    <th>Client PO #</th>
                    <th>Vendor</th>
                    <th>Order Date</th>
                    <th>Due Date</th>
                    <!-- <th>Currency</th> -->
                    <th>Total</th>
                    <th>Commision</th>
                    <th>F. Commision</th>
                    <th style="width:100px;">Action</th>
                    <!-- <th style="width: 15%;">Access</th>
                    <th class="d-none d-sm-table-cell" style="width: 20%;">Date</th> -->
                </tr>
            </thead>
            @foreach($list as $idx => $row) 
              <tbody class="js-table-sections-header {{$idx==0 ? 'show table-active' : ''}}">
                  <tr>
                      <td class="text-center">
                        <i class=" typcn typcn typcn-chevron-right"></i>
                      </td>
                      <td class="font-w500">{{$row->cname}}</td>
                      <!-- <td class="">{{$row->vname}}</td> -->
                      <td class="">{{$row->order_no}}</td>
                      <td class="">{{$row->invoice_no}}</td>
                      <td class="">{{$row->customer_po_no}}</td>
                      <td class="">{{$row->vname}}</td>
                      <td class="">{{$row->order_date}}</td>
                      <!-- <td class="">{{$row->order_date}}</td> -->
                      <td class="">{{$row->due_date}}</td>
                      <td class="">{{$row->net_total}}</td>
                      <td class="">{{$row->com_total}}</td>
                      <td class="">{{$row->com_total}}</td>
                      <td >
                        <a href = "{{route('orders.edit',$row->id)}}" class="btn btn-icons btn-rounded btn-outline-primary">
                           <i class="mdi mdi-pencil"></i>
                        </a>
                         <a href = "{{route('order.download',$row->id)}}" class="btn btn-icons btn-rounded btn-outline-primary">
                         <i class="mdi mdi-printer"></i>
                         </a>
                      </td>
                      <!-- <td class="font-w500">{{$row->vname}}</td> -->
                      <!-- <td>
                          <span class="badge badge-success">VIP</span>
                      </td>
                      <td class="d-none d-sm-table-cell">
                          <em class="text-muted">{{$row->created_at}}</em>
                      </td> -->
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
                @foreach($row->items as $item) 
                  <tr>
                    <td class="text-center"></td>
                    <!-- text-success -->
                    <td class="font-w600">
                      {{$item->pname}} <br/>
                      {{$item->description}}
                    </td>
                    <td>{{$item->qty}}</td>
                    <td>{{$item->rate}}</td>
                    <td>{{$item->rate * $item->qty}}</td>
                    <td>{{$item->commission}}% ={{ $item->commission ? ($item->rate * $item->qty)*($item->commission/100) : 0 }}</td>
                    <td>{{$item->foreigner_commission}}% ={{ $item->foreigner_commission ? ($item->rate * $item->qty)*($item->foreigner_commission/100) : 0 }}</td>
                    <td>{{$item->packing}}</td>
                    <td>{{$item->lc_days}}</td>
                    <td>{{$item->piece_length}}</td>
                    <td>{{$item->status}}</td>
                   
                    
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
      <!-- card body -->
      <div class="card-footer">
        {{$list->links()}}
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  $(document).ready(function() {
    uiHelperTableToolsSections();
  })
// Table sections functionality
var uiHelperTableToolsSections = function(){
  // For each table
  $('.js-table-sections:not(.js-table-sections-enabled)').each(function(){
    var table = $(this);

    // Add .js-table-sections-enabled class to tag it as activated
    table.addClass('js-table-sections-enabled');

    // When a row is clicked in tbody.js-table-sections-header
    $('.js-table-sections-header > tr', table).on('click.cb.helpers', function(e) {
      if (e.target.type !== 'checkbox'
              && e.target.type !== 'button'
              && e.target.tagName.toLowerCase() !== 'a'
              && !$(e.target).parent('label').length) {
        var row    = $(this);
        var tbody  = row.parent('tbody');

        if ( ! tbody.hasClass('show')) {
          $('tbody', table).removeClass('show table-active');
        }

        tbody.toggleClass('show table-active');
      }
    });
  });
};
</script>

@endpush