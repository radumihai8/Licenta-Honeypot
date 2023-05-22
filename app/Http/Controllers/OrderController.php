<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    public function userOrders()
    {
        $user = auth()->user();
        $orders = Order::with('orderProducts.product')->where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        return view('user-orders', compact('orders'));
    }

    public function show($orderId)
    {
        $user = auth()->user();
        $order = Order::with('orderProducts.product')->where('id', $orderId)->where('user_id', $user->id)->firstOrFail();

        return view('order-details', compact('order'));
    }

    public function generateBill($orderId)
    {
        $user = auth()->user();
        $order = Order::with('orderProducts.product')->where('id', $orderId)->where('user_id', $user->id)->firstOrFail();

        // Share data with the view which will be the PDF content
        $data = ['order' => $order];
        $pdf = PDF::loadView('bill', $data);

        if (!Storage::exists('public/bills')) {
            Storage::makeDirectory('public/bills', 0775, true); // creates directory
        }

        // Save the PDF to a file on the server
        $fileName = 'bill_'.$order->id.'.pdf';
        $filePath = storage_path('app/public/bills/'.$fileName);
        $pdf->save($filePath);

    }

    public function getBill(Request $request)
    {
        $billName = $request->input('name');
        #ddd($billName);
        $filePath = storage_path('app/public/bills/'.$billName);

        if (file_exists($filePath)) {
            return response()->file($filePath);
        } else {
            return response()->json(['message' => 'File not found.'.$billName], 404);
        }
    }


}
