<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Http\Requests\AdminClientRequest;
use CodeDelivery\Http\Requests\AdminClientEditRequest;
use CodeDelivery\Http\Requests;
use Illuminate\Support\Facades\Input;

class ClientsController extends Controller
{
    private $repository;
    private $userRepository;

    public function __construct(ClientRepository $repository, UserRepository $userRepository)
    {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $clients = $this->userRepository->paginate(5);

        return view('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.clients.create', compact('users'));
    }

    public function store(AdminClientRequest $request)
    {
        $user_created = $this->userRepository->create([
                            'name' => Input::get('name'),
                            'email' => Input::get('email'),
                            'password' => bcrypt(Input::get('password'))
                        ]);

        if($user_created->wasRecentlyCreated);
        {
            $this->repository->create([
                'user_id' => $user_created->id,
                'phone' => Input::get('phone'),
                'address' => Input::get('address'),
                'city' => Input::get('city'),
                'state' => Input::get('state'),
                'zipcode' => Input::get('zipcode'),
            ]);
        }

        return redirect()->route('admin.clients.index');
    }

    public function edit($id)
    {
        $user = $this->userRepository->find($id);
        $client = $this->repository->findWhere(['user_id' => $id]);

        return view('admin.clients.edit', compact('client', 'user'));
    }

    public function update(AdminClientEditRequest $request, $id)
    {
        $dados =  [
            'name' => Input::get('name'),
            'email' => Input::get('email')
        ];

        if(Input::get('password'))
            $dados = array_merge(['password' => bcrypt(Input::get('password'))], $dados);

        $this->userRepository->update($dados, $id);

        $client = $this->repository->findWhere(['user_id' => $id]);

        $this->repository->update([
            'phone' => Input::get('phone'),
            'address' => Input::get('address'),
            'city' => Input::get('city'),
            'state' => Input::get('state'),
            'zipcode' => Input::get('zipcode'),
        ], $client[0]->id);

        return redirect()->route('admin.clients.index');
    }

    public function destroy($id)
    {
        $client = $this->repository->findWhere(['user_id' => $id]);
        $this->repository->delete($client[0]->id);
        $this->userRepository->delete($id);

        return redirect()->route(('admin.clients.index'));
    }
}
