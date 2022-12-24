<?php

namespace App\Http\Controllers\Logic;

use App\Actions\StorePanelAction;
use App\Http\Controllers\Controller;
use App\Http\Response\PresenterDispatcher;
use App\Interfaces\Repositories\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UsersController extends Controller
{

    public function __construct(UserRepositoryInterface  $repository,PresenterDispatcher $presenter) 
    {
        $this->Repository = $repository;
        $this->presenter=$presenter;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return $request;
        $data= $this->Repository->getAll();
        return $this->presenter->handle(['name'=>'backend.users.index','data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return $this->presenter->handle(['name' => 'backend.users.create', 'data' => '']);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //call view store
        $dto = $request->all([]);
        $this->Repository->create($dto);
        return redirect('/users');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->Repository->getById($id);
        
        return $this->presenter->handle(['name' => 'backend.users.show', 'data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //call view edit
        $data = $this->Repository->getById($id);
        return $this->presenter->handle(['name' => 'backend.users.edit', 'data' => $data]);
    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $record = $request->all();

        $this->Repository->update($id, $record);
        return redirect('/users');
    }

    public function destroy($id,Request $request)
    {
        //$id = $request->route('id');
        $this->Repository->delete($id);
        return redirect('/users');

    }
}
