
@extends('layouts.app')
  @section('content')

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                  <div class="card-title">
                    <h4>Report By Customer</h4></div>
                    <form method="get" action="{{route('by.customer')}}" class="form-inline">
                            <div>
                            <select  name="customer_id" class="form-control">  
                                @foreach($customers as $key => $customer)             
                                <option value="{{$key}}">
                                    {{$customer}}              
                                </option>   
                                @endforeach           
                            </select>
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <label  class="sr-only">Start Date</label>
                                <input name="start_date" type="date" class="form-control" id="inputPassword2" >
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <label  class="sr-only">End Date</label>
                                <input name="end_date" type="date" class="form-control" id="inputPassword2" >
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Submit</button>
                        </form>      
                    </div>  
                </div>
            </div> 
        </div>
            <!-- table data  -->
                @if(isset($list))
            
                    
                        <div class="card">
                            <div class="card-body">
                            
                                <div class="card-title d-flex justify-content-between">
                                    <h4>Report By Customer </h4>
                                </div>
                                        <!-- <p class="card-description">Add class <code></code> </p> -->
                               <div class="table-responsive">            
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Order-No</th>
                                            <th>Invoice-No</th>
                                            <th>Customer-Po-No</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($list as  $key)
                                        <tr>
                                        <td>{{$key->order_no}}</td>
                                        <td>{{$key->invoice_no}}</td>
                                        <td>{{$key->customer_po_no}}</td>
                                        <td>{{$key->order_date}}</td>
                                        <td>{{$key->due_date}}</td>
                                        <td>{{$key->net_total}}</td>   
                                        </tr>
                                    @endforeach   
                                    </tbody>
                                </table>
                            </div>    
                                <div class="p-4">
                                   {{ $list->links() }}
                                </div>
                            </div>              
                        </div> 
            
                   
                 @endif
                 <!-- table close -->
        
        
     @endsection               