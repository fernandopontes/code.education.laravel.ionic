<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Models\Product;
use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Repositories\OrderItemRepository;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Http\Requests\AdminOrderRequest;
use CodeDelivery\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    private $repository;
    private $itemOrderRepository;
    private $userRepository;
    private $clientRepository;

    public function __construct(OrderRepository $repository, OrderItemRepository $itemOrderRepository, ClientRepository $clientRepository, UserRepository $userRepository)
    {
        $this->repository = $repository;
        $this->itemOrderRepository = $itemOrderRepository;
        $this->userRepository = $userRepository;
        $this->clientRepository = $clientRepository;
    }

    public function index()
    {
        $orders = $this->repository->paginate(5);

        return view('admin.orders.index', compact('orders'));
    }

    public function create()
    {
        $clients = $this->clientRepository->lists();
        $deliverymans = $this->userRepository->lists();

        return view('admin.orders.create', compact('clients', 'deliverymans'));
    }

    public function store(AdminOrderRequest $request)
    {
        $order_created = $this->repository->create([
                            'client_id' => Input::get('client_id'),
                            'user_id' => Input::get('user_id'),
                            'total' => Input::get('total'),
                            'status' => Input::get('status')
                        ]);

        if($order_created->wasRecentlyCreated);
        {
            if(Input::get('quant-product-item') > 0)
            {
                for($i = 0; $i < Input::get('quant-product-item'); $i++)
                {
                    $product = Input::get('products');
                    $price = Input::get('price');
                    $quant = Input::get('quant');

                    $this->itemOrderRepository->create([
                        'product_id' => $product[$i],
                        'order_id' => $order_created->id,
                        'price' => $price[$i],
                        'qtd' => $quant[$i],
                    ]);
                }
            }
        }

        return redirect()->route('admin.orders.index');
    }

    public function edit($id)
    {
        $order = $this->repository->find($id);
        $client = $this->clientRepository->findWhere(['id' => $order->client_id]);
        $deliveryman = $this->userRepository->findWhere(['id' => $order->user_id]);
        $clients = $this->clientRepository->lists();
        $deliverymans = $this->userRepository->lists();
        $orderItens = $this->itemOrderRepository->findWhere(['order_id' => $order->id]);
        $products = Product::all();

        return view('admin.orders.edit', compact('order', 'client', 'deliveryman', 'clients', 'deliverymans', 'orderItens', 'products'));
    }

    public function update(AdminOrderRequest $request, $id)
    {
        $order_update = $this->repository->update([
                                'client_id' => Input::get('client_id'),
                                'user_id' => Input::get('user_id'),
                                'total' => Input::get('total'),
                                'status' => Input::get('status')
                                ]
                                , $id);

        DB::table('order_items')->where('order_id', '=', $id)->delete();

        if(Input::get('quant-product-item') > 0)
        {
            for($i = 0; $i < Input::get('quant-product-item'); $i++)
            {
                $product = Input::get('products');
                $price = Input::get('price');
                $quant = Input::get('quant');

                $this->itemOrderRepository->create([
                    'product_id' => $product[$i],
                    'order_id' => $id,
                    'price' => $price[$i],
                    'qtd' => $quant[$i],
                ]);
            }
        }

        return redirect()->route('admin.orders.index');
    }

    public function destroy($id)
    {
        DB::table('order_items')->where('order_id', '=', $id)->delete();
        $this->repository->delete($id);

        return redirect()->route(('admin.orders.index'));
    }
}
