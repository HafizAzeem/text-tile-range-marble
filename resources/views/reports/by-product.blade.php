
  @extends('layouts.app')
  @section('content')


    <div class="row">
     <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
          <div class="card-title">
             <h4>Report By Product</h4></div>
             <form method="get" action="{{route('by.product')}}" class="form-inline">
                    <div>
                      <select  name="product_id" class="form-control">  
                        @foreach($products as $key => $product)             
                          <option value="{{$key}}">
                             {{$product}}              
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
            @if(isset($list))
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="card-title d-flex flex-column justify-content-between">
                    <div class="d-flex align-items-center">
                      <h4>Reports Data</h4>
                    
                    </div>

                    <div class="table-responsive">
                    <table class="js-table-sections table table-hover">
                      <thead>
                          <tr>
                              <th style="width: 30px;"></th>
                              <th>Qty</th>
                              <th>Rate</th>
                              <th>Commission</th>
                              <th>Foreigner Commission</th>
                              <th>Net Total</th>
                              <th>Start Date</th>
                              <th>End Date</th>
                          </tr>
                      </thead>
                  
                        <tbody class="js-table-sections-header">
                        @foreach($list as  $item)
                        <tr>
                          <td class="text-center"></td>
                        <td>{{$item->qty}}</td>
                        <td>{{$item->rate}}</td>
                        <td>{{$item->commission}}% ={{ $item->commission ? ($item->rate * $item->qty)*($item->commission/100) : 0 }}</td>
                        <td>{{$item->foreigner_commission}}% ={{ $item->foreigner_commission ? ($item->rate * $item->qty)*($item->foreigner_commission/100) : 0 }}</td>
                        <td>{{$item->currency}}{{$item->rate * $item->qty}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>{{$item->updated_at}}</td>
                        </tr>
                        @endforeach   
                        </tbody> 
                      </table> 
                        <div class="p-4">
                          {{ $list->links() }}
                        </div>
                      
                    </div>
                  </div>
                  </div>
                            </div>
          </div>   
          @endif
        </div>
 @endsection




















  
     