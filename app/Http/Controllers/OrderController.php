<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Events\OrderCreated;

class OrderController extends Controller
{
    public function createOrder(Request $request)
    {
        try {
            $order = Order::create([
                'pickup_location' => $request->pickup_location,
                'dropoff_location' => $request->dropoff_location,
                'pickup_time' => $request->pickup_time,
                'dropoff_time' => $request->dropoff_time,
                'fare' => $request->fare,
            ]);

            event(new OrderCreated($order));

            return response()->json(['message' => 'Order created successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al crear la orden: ' . $e->getMessage()], 500);
        }
    }
}
