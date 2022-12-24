<?php

namespace App\Http\Controllers\Logic;

use App\Http\Controllers\Controller;
use App\Http\Response\PresenterDispatcher;
use App\Interfaces\Repositories\RoomsRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class RoomsController extends Controller
{
    public function __construct(RoomsRepositoryInterface $repository, PresenterDispatcher $presnter)
    {
        $this->Repository = $repository;
        $this->presenter = $presnter;
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
        return $this->presenter->handle(['name' => 'backend.rooms.index', 'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return $this->presenter->handle(['name' => 'backend.rooms.create', 'data' => []]);
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
        
        $pictureName = Storage::disk('public')->put('rooms_images', $request->photo);
        $this->Repository->create($dto,$pictureName);

        return redirect('/rooms');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data =  $this->Repository->getById($id);
        return $this->presenter->handle(['name' => 'backend.rooms.show', 'data' => $data]);
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

        return $this->presenter->handle(['name' => 'backend.rooms.edit', 'data' => $data]);
    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $record = $request->all();

        $this->Repository->update($id, $record);
        return redirect('/rooms');
    }

    public function destroy($id,Request $request)
    {
        //$id = $request->route('id');
        $this->Repository->delete($id);

        return redirect('/rooms');
    }
}
