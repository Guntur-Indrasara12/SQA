<?php

namespace App\Http\Controllers;

use App\Exceptions\Order\OrderNotFoundException;
use App\Services\OrderService;
use App\Services\ProductService;
use App\Http\Requests\StoreOrderRequest;
use App\Notifications\OrderRequestedNotification;

class OrderController extends Controller
{
    protected $OrderService;
    protected $ProductService;

    public function __construct(OrderService $OrderService, ProductService $ProductService)
    {
        $this->OrderService = $OrderService;
        $this->ProductService = $ProductService;

    }

    public function index()
    {
        $Orders = $this->OrderService->getAllOrders();
        return view('order.index', compact('Orders'));
    }

    public function create()
    {
        $products = $this->ProductService->getAllProducts();
        return view('order.create', compact('products'));
    }

    public function store(StoreOrderRequest $request)
    {
        $this->OrderService->create($request->validated());
        return redirect()->route('order.index')->with('success', 'Order stored successfully');
    }
    public function edit($id)
    {
        try {
            $Order = $this->OrderService->getOrderById($id);
            $products = $this->ProductService->getAllProducts();
            return view('order.edit', compact('Order', 'products'));
        } catch (OrderNotFoundException $e) {
            return redirect()->route('order.index')->with('error', $e->getMessage());
        }
    }

    public function update(StoreOrderRequest $request, $id)
    {
        try {
            $Order = $this->OrderService->getOrderById($id);
            $this->OrderService->update($Order, $request->validated());
            return redirect()->route('order.index')->with('update', 'Order updated successfully');
        } catch (OrderNotFoundException $e) {
            return redirect()->route('order.index')->with('error', $e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $Order = $this->OrderService->getOrderById($id);
            return view('order.show', compact('Order'));
        } catch (OrderNotFoundException $e) {
            return redirect()->route('order.index')->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $this->OrderService->delete($id);
        return redirect()->route('order.index')->with('success', 'Order deleted successfully');
    }

}
