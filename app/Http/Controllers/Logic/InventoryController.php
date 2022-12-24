<?php

namespace App\Http\Controllers\Logic;

use App\Actions\StorePanelAction;
use App\Http\Controllers\Controller;
use App\Http\Response\PresenterDispatcher;
use App\Interfaces\Repositories\InventoryRepositoryInterface;
use App\Models\User;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InventoryController extends Controller
{
    public function __construct(InventoryRepositoryInterface  $repository, PresenterDispatcher $presenter)
    {
        $this->Repository = $repository;
        $this->presenter = $presenter;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return $request;
        $data = $this->Repository->getAll();
        return $this->presenter->handle(['name' => 'backend.inventory.index', 'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $suppliers = Supplier::all();


        return $this->presenter->handle(['name' => 'backend.inventory.create', 'data' => ''])->with('suppliers',$suppliers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dto = $request->all([]);
        $this->Repository->create($dto);
        return redirect('/inventory');
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
        $supplier = Supplier::find($data->supplier_id);
        
        return $this->presenter->handle(['name' => 'backend.inventory.show', 'data' => $data])->with('supplier',$supplier);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->Repository->getById($id);
        $suppliers = Supplier::all();

        return $this->presenter->handle(['name' => 'backend.inventory.edit', 'data' => $data])->with('suppliers',$suppliers);
    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $record = $request->all();

         $this->Repository->update($id, $record);
         return redirect('/inventory');
    }

    public function destroy($id,Request $request)
    {
        //$id = $request->route('id');
        $this->Repository->deleteById($id);

        return redirect('/inventory');
    }
}
