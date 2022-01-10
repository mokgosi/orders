<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Resources\OrderResource;
use Validator;
use App\Rules\PhoneNumber;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Validation\Rule;
use App\Traits\ApiResponser;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    use ApiResponser;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();

        return $this->success([
            'data' => OrderResource::collection($orders)
        ], 'Orders fetched');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        $order = Order::create($request->validated());

        return $this->success([
            new OrderResource($order)
        ], 'Order created successfully.');
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
            return $this->error('Order not found.', 404);
        }
        return $this->success(
            new OrderResource($order)
        , 'Order fetched successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, $id)
    {
        $order = Order::find($id);

        if (is_null($order)) {
            return $this->error('Order not found.', 404);
        } else {
            $order->update($request->validated());
        }

        return $this->success([
            new OrderResource($order)
        ], 'Order updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        if (is_null($order)) {
            return $this->error('Order not found.', 404);
        } else {
            $order->delete();
        }
        return $this->success([
            new OrderResource($order)
        ], 'Order deleted successfully.');
    }
}
















