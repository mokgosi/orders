<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Resources\OrderResource;
use Validator;
use App\Rules\PhoneNumber;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return $this->sendResponse(OrderResource::collection($orders), 'Orders fetched.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        
        $validator = Validator::make($input, [
            'description' => 'required|min:3|max:255',
            'quantity' => 'required|integer',
            'tracking_code' => 'required',
            'contact_number' => ['required', new PhoneNumber],

        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }

        $order = Order::create($input);

        return $this->sendResponse(new OrderResource($order), 'Order created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        if (is_null($order)) {
            return $this->sendError('Order does not exist.');
        }
        return $this->sendResponse(new OrderResource($order), 'Order fetched.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'description' => 'required|min:3|max:255',
            'quantity' => 'required|integer',
            'tracking_code' => 'required',
            'contact_number' => ['required', new PhoneNumber],
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }

        $order->description = $input['description'];
        $order->quantity = $input['quantity'];
        $order->status = $input['status'];
        $order->tracking_code = $input['tracking_code'];
        $order->contact_number = $input['contact_number'];
        $order->address = $input['address'];
        $order->save();
        
        return $this->sendResponse(new OrderResource($order), 'Order updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::destroy($id);
        return $this->sendResponse([], 'Order deleted.');
    }
}















