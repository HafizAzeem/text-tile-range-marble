<?php

namespace App\Http\Controllers;
use App\OrderItem;
use App\Order;
use App\Product;
use App\Customer;
use App\Vendor;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function report()
    {
        // $items = OrderItem::groupBy('net_total')->get(['net_total']);
        // ->where('due_date', '<', '2019-12-20 ')
        // ->count();
       // dd($orders);
    }
    public function byproduct(Request $request)
    {   
       // dd($request);
        $startdate=$request->input('start_date');
        $enddate=$request->input('end_date');
        $product_id=$request->input('product_id');
        $products = Product::pluck('name','id');
        $list = null;    
        if($product_id) { 
            $qry = OrderItem::where('product_id', $product_id);

            if($startdate) {
                $qry->where('created_at' ,'>=', $startdate);
            }
            if($enddate) {
             $qry->where('created_at', '<=', $enddate);
            }
          
           $list = $qry->paginate(15);
         
       }
      // dd($list);
        return view('reports.by-product',compact('products','list'));
    }
    public function bycustomer(Request $request)
    {
         $startdate=$request->input('start_date');
         $enddate=$request->input('end_date');
         $customer_id=$request->input('customer_id');
         //get name ,id of customer from db;
         $customers= Customer::pluck('name','id');
         $list=null;
         if($customer_id){
             $qry=Order::where('customer_id',$customer_id);
         if($startdate)
         {
             $qry->where('order_date', '>=',$startdate);
         }
         if($enddate)
         {
            $qry->where('due_date', '<=', $enddate);
         }

         $list=$qry->paginate(10);
       }
         return view('reports.by-customer',compact('customers','list'));
    }
    public function byvendor(Request $request)
    {
        $startdate=$request->input('start_date');
        $enddate=$request->input('end_date');
        $vendor_id=$request->input('vendor_id');
        //get name ,id of vendor from db;
        $vendors= Vendor::pluck('name','id');
        $list=null;
        if($vendor_id){
            $qry=Order::where('vendor_id',$vendor_id);
        if($startdate)
        {
            $qry->where('order_date', '>=',$startdate);
        }
        if($enddate)
        {
           $qry->where('due_date', '<=', $enddate);
        }

        $list=$qry->paginate(10);
      }
        return view('reports.by-vendor',compact('vendors','list'));
    } 
}
