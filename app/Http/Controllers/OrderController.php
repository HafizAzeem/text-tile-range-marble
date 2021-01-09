<?php

namespace App\Http\Controllers;

use App\Order;
use App\Vendor;
use App\Product;
use App\ForeignerAgent;
use App\Customer;
use App\OrderItem;
use App\OrderRevision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use PDF;
// use DataTables;
// use Yajra\DataTables\DataTables;
// use Yajra\DataTables\Html\Builder;
use Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Builder $builder
    public function index()
    {
        $list = DB::table('orders as o')
            ->select('o.*', 'c.name as cname', 'v.name as vname')
            // ->join('order_items as oi', 'o.id', '=', 'oi.order_id')
            ->join('customers as c', 'c.id', '=', 'o.customer_id')
            ->join('vendors as v', 'v.id', '=', 'o.vendor_id')
            ->orderBy('o.created_at', 'desc')
            ->paginate(15);

        $searchText = '';
        $list->getCollection()->transform(function ($row) use ($searchText) { 
            $items = DB::table('order_items as oi')
                ->select('oi.*', 'p.name as pname')
                ->where('oi.order_id', $row->id)
                ->join('products as p', 'p.id', '=', 'oi.product_id')
                ->get();
            $row->items = $items; 
            return $row;
        });

        // if (request()->ajax()) {
        //     $products = Order::select('orders.*');
        //     return DataTables::of($products)
        //         // ->addColumn('action', 'admin.pages.merchandise-product._table_actions')
        //         ->make(true);
        // }

        // $html = $builder->columns([
        //     // ['data' => 'product_id', 'name' => 'product_id', 'title' => 'product_id', 'className' => 'text-right'],
        //     ['data' => 'name', 'name' => 'name', 'title' => 'Name'],
        //     ['data' => 'description', 'name' => 'description', 'title' => 'description', 'className' => 'text-right'],
        // ])->addAction(['className' => 'text-right']);

        // compact('html')
        // dd($list);
        return view('order.index', compact('list') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::pluck('name', 'id');
        $foreign_agents =ForeignerAgent::pluck('name', 'id');
        $vendors = Vendor::pluck('name', 'id');
        $clients = Customer::pluck('name', 'id');
        return view('order.form',compact('vendors', 'clients', 'products','foreign_agents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
       
        $user = Auth::user();
        // dd($user->id);
        $data = $request->all();
        
        $order = new Order();
        $order->customer_id = $data['customer_id'];
        $order->order_no = $data['order_no'];
        $order->invoice_no = $data['invoice_no'];
        $order->customer_po_no = $data['customer_po_no'];
        $order->vendor_id = $data['vendor_id'];
        $order->order_date = $data['order_date'];
        $order->due_date = $data['due_date'];
        $order->shipment_date = $data['shipment_date'];
        $order->notes = $data['notes'];
        $order->created_by = $user->id;
        $order_item_id = $data['order_item_id'];   
        $to_insert = [];
        $total = 0;
        
        foreach ($data['order_item_id'] as $idx => $value) {
            array_push(
                $to_insert,
                [
                    
                    'product_id' => $data['product_id'][$idx],
                    'foreigner_id' => $data['foreigner_id'][$idx],
                    'description' => $data['description'][$idx],
                    'qty' => $data['qty'][$idx],
                    'rate' => $data['rate'][$idx],
                    'currency' => $data['currency'][$idx],
                    'exchange_rate' => $data['exchange_rate'][$idx],
                    'commission' => $data['commission'][$idx],
                    'foreigner_commission' => $data['foreigner_commission'][$idx],
                    'packing' => $data['packing'][$idx],
                    'lc_days' => $data['lc_days'][$idx],
                    'piece_length' => $data['piece_length'][$idx],
                    'status' => $data['status'][$idx],
                     'net_total' => $data['qty'][$idx] * $data['rate'][$idx]
                ]
            );
            $total += $data['qty'][$idx]* $data['rate'][$idx];
           
        }
       
       
        
        $order->net_total = $total;
        $order->save();
        // dd(1);
        $order->orderItem()->createMany($to_insert);
        return redirect('orders')->with('success','Order Generate Sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $products = Product::pluck('name', 'id');
        $foreign_agents =ForeignerAgent::pluck('name', 'id');
        $vendors = Vendor::pluck('name', 'id');
        $clients = Customer::pluck('name', 'id');
        $order=Order::find($id);
        // $purchase=OrderItem::find($id);//
        
        $revision_data = OrderRevision::where('order_id', $id) ->get();
        // dd(
        //     json_decode($revision_data[1]->data, true)
        // );
        $revision = [];
        foreach ($revision_data as $key => $row) {
            $obj = json_decode($row->data, TRUE);
           // $obj['user_id'] = '1';
            $obj['created_by'] =$row->created_by ;
            $obj['revision_date'] = $row->created_at;
            array_push($revision, $obj);
        }
        // var_dump($revision_data);
    //  dd($revision);


        return view('order.form',compact('order','products','foreign_agents','vendors','clients','revision'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
       
        $user = Auth::user();
        $order=Order::find($id);
        $data = $request->all();
        $rev  = [
            'order'=> $order, // ->toArray(),
            'items'=> $order->orderItem // ->toArray()
        ];
        $to_insert_in_revision = [
            'order_id' => $id,
            'created_by' => $user->id,
            'action' => 'update',
            'data' => json_encode($order)
        ];
        // dd($to_insert_in_revision);
        $revision = new OrderRevision($to_insert_in_revision);
        // $json = json_encode($rev);
        // $revision->data = $json;
        $revision->save();

        // $order = new Order();
        $order->customer_id = $data['customer_id'];
        $order->order_no = $data['order_no'];
        $order->invoice_no = $data['invoice_no'];
        $order->customer_po_no = $data['customer_po_no'];
        $order->vendor_id = $data['vendor_id'];
        $order->order_date = $data['order_date'];
        $order->due_date = $data['due_date'];
        $order->shipment_date = $data['shipment_date'];
       // $order->currency = $data['currency'];
        $order->notes = $data['notes'];
        $order->created_by = $user->id;
        $order_item_id = $data['order_item_id'];
        //dd($order_item_id);
        $to_insert = [];
        $total = 0;
       
        foreach ($data['order_item_id'] as $idx => $value) {
            if($value=='new') {    
                array_push(
                    $to_insert,
                    [
                        'product_id' => $data['product_id'][$idx],
                        'foreigner_id' => $data['foreigner_id'][$idx],
                        //  'description' => $data['description'][$idx],
                        'qty' => $data['qty'][$idx],
                        'rate' => $data['rate'][$idx],
                        'currency' => $data['currency'][$idx],
                        'exchange_rate' => $data['exchange_rate'][$idx],
                        'commission' => $data['commission'][$idx],
                        'foreigner_commission' => $data['foreigner_commission'][$idx],
                        'packing' => $data['packing'][$idx],
                        'lc_days' => $data['lc_days'][$idx],
                        'piece_length' => $data['piece_length'][$idx],
                        'status' => $data['status'][$idx],
                        'net_total' => $data['qty'][$idx] * $data['rate'][$idx]
                    ]
                );
                $total += $data['qty'][$idx]* $data['rate'][$idx];                 
            } else  {
                // find 
                $item =  OrderItem::find($value);
                //update
                $item->rate = $data['rate'][$idx];
                $item->product_id=$data['product_id'][$idx];
                $item->foreigner_id=$data['foreigner_id'][$idx];
                $item->qty= $data['qty'][$idx];
                $item->currency= $data['currency'][$idx];
                $item->exchange_rate= $data['exchange_rate'][$idx];
                $item->commission= $data['commission'][$idx];
                $item->foreigner_commission= $data['foreigner_commission'][$idx];
                $item->packing= $data['packing'][$idx];
                $item->lc_days= $data['lc_days'][$idx];
                $item->piece_length= $data['piece_length'][$idx];
                $item->status= $data['status'][$idx];
                $item->qty= $data['qty'][$idx];
                $item->net_total= $data['qty'][$idx] * $data['rate'][$idx];

                //save
                $item->save();
                $total += $data['qty'][$idx]* $data['rate'][$idx];                 
            }
                
        }
        $order->net_total = $total;
        $order->save();
        if(sizeof($to_insert)) {
            $order->orderItem()->createMany($to_insert);
        }
        return redirect('orders')->with('update','Order Update Sucessfully');
           
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    //for PDF
    public function download(Request $request,$id)
    {
        $order=Order::find($id);
        $data=[
            'order'=>$order
        ];
         $pdf = PDF::loadView('order.download', $data);
         return $pdf->download('invoice.pdf');
        // return view ('order.download'); 
    }
}
