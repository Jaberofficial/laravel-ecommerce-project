<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    public function showOrders(Request $request, $status)
    {
        if(isset($request->search)){
            if($status == 'all')
            {
                 $orders = Order::where('invoice_number', $request->search)->orWhere('phone','Like','%'.$request->search.'%')->orderBy('id', 'desc')->with('orderDetails')->paginate(20);
            }
            else
                {
                    $orders = Order::where('invoice_number', $request->search)->orWhere('phone','Like','%'.$request->search.'%')->orderBy('id', 'desc')->with('orderDetails')->where('status', $status)->paginate(20);
                }

        }
        else{
            if($status == 'all')
            {
                 $orders = Order::orderBy('id', 'desc')->with('orderDetails')->paginate(20);
            }
            else
                {
                    $orders = Order::orderBy('id', 'desc')->with('orderDetails')->where('status', $status)->paginate(20);
                }
        }
        
        return view('admin.order.list',compact('orders','status'));
    }

    public function detailOrders($id)
    {
        $order = Order::with('orderDetails')->where('id',$id )->first();
        return view('admin.order.edit',compact('order'));
    }

    public function updateOrders(Request $request, $id)
    {
        $order = Order::find($id);

        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->charge = $request->charge;
        $order->address = $request->address;
        $order->courier_name = $request->courier_name;
        $order->price = $request->price;

        $order->save();

        toastr()->success('Order Updated Successfully.');
        return redirect()->back();

        
    }

    public function updateOrderDetails(Request $request, $id)
    {
        $orderDetails = OrderDetails::find($id);

        $orderDetails->qty = $request->qty;
        $orderDetails->color = $request->color;
        $orderDetails->size = $request->size;


        $orderDetails->save();
        // return redirect()->back();
        return response()->json('Updated Successfully.');

    }

    public function updateOrderStatus(Request $request, $id)
    {
        $order = Order::find($id);

        $order->status = $request->status;
        $order->save();

        return redirect()->back();


    }
    public function courierEntry($order_id)
    {
        $order = Order::find($order_id);

        if($order->courier_name == 'steadfast')
            {
                $apiEndpoint = "https://portal.packzy.com/api/v1/create_order";

                $header = [
                    'Api-Key' => "ezmqhuxzzk3c4xhn7op1hvon8tediut5",
                    'Secret-Key' => "akgxymfmjfvxjv82jwhcibdu",
                    'Content-Type' => "application/json"

                ];

                //Body Parameters
                $invoiceNumber = $order->invoice_number;
                $customerName = $order->name;
                $customerPhone = $order->phone;
                $customerAddress = $order->address;
                $price = $order->price;

                $payLoad = [
                    "invoice" => $invoiceNumber,
                    "recipient_name" => $customerName,
                    "recipient_phone" => $customerPhone,
                    "recipient_address" => $customerAddress,
                    "cod_amount" => $price
                ];

                $response = Http::withHeaders($header)->post($apiEndpoint, $payLoad);
                $jsonData = $response->json();

                if(isset($jsonData['consignment']))
                    {
                        $order->status = 'delivered';
                        $order->consignment_id = $jsonData['consignment']['consignment_id'];
                        $order->tracking_code = $jsonData['consignment']['tracking_link'];

                        $order->save();
                    }
            }

        elseif($order->courier_name == 'pathao')
            {

            }

        else
            {
                toastr()->error('Select a Courier.');
                return redirect()->back();
            }    

            toastr()->success('Courier Entry is Successful');

            return redirect()->back();

    
    }
    public function deleteOrder($id)
{
    $order = Order::find($id);
    $order->delete();

    toastr()->success('Order Deleted Successfully!');
    return redirect()->back();
}

public function printBulkInvoice(Request $request)
{
    $orders = Order::with('orderDetails')->whereIn('id', $request->order_id)->get();
    foreach($orders as $order){
        $order->is_printed = true;
        $order->save();
    }
    return view('admin.order.invoice',compact('orders'));
}

}
