<?php

namespace App\Http\Controllers\Logic;

use App\Http\Controllers\Controller;
use App\Models\Rooms;
use App\Models\Table;
use Illuminate\Http\Request;
use App\Enums\TableStatusEnum;
use Illuminate\Validation\Rules\Enum;


class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tables = Table::all();
        return view('backend.tables.index')->with('tables',$tables);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $rooms = Rooms::all();
        return view('backend.tables.create')->with('rooms',$rooms);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=>'required|unique:tables|max:255',
            'room_id'=>'required|numeric']);


            //default imagename
        $imageName="table2.png";

        //Image validation and naming if uploaded
        if($request->image){
            $request->validate([
                'image'=>'nullable|file|image|mimes:jpeg,png,jpg|max:5000'
            ]);
            $imageName = date('mdYHis').uniqid().'.'.$request->image->extension();
            $request->image->move(public_path('table_images'),$imageName);
        }

        $table = new Table();
        $table->name = $request->name;
        $table->status = $request->status;
        $table->chair = $request->chair;
        $table->couvert = $request->couvert;
        $table->image = '/table_images/'.$imageName;
        $table->room_id = $request->room_id;
        $table->save();

        $request->session()->flash('status','Table '.$request->name.' has been created successfully');

        return redirect('/tables');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $table = Table::find($id);
        $room = Rooms::find($table->room_id);
        return view('backend.tables.show')->with('table',$table)->with('room',$room);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $table = Table::find($id);
        $rooms = Rooms::all();

        return view('backend.tables.edit')->with('table',$table)->with('rooms',$rooms);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name'=>'required|unique:tables|max:255',
            'room_id'=>'required|numeric',
            'status' => [new Enum(TableStatusEnum::class)],
    ]);

        $table = Table::find($id);
        //Image validation and naming if uploaded
        if($request->image){
            $request->validate([
                'image'=>'nullable|file|image|mimes:jpeg,png,jpg|max:5000'
            ]);
            if($table->image != 'noimage.png'){
                $imageName = $table->image;
                unlink(public_path('table_images').'/'.$imageName);
            }
            $imageName = date('mdYHis').uniqid().'.'.$request->image->extension();
            $request->image->move(public_path('table_images'),$imageName);
        }else{
            $imageName = $table->image;
        }

        //save info to DB
        $table->name = $request->name;
        $table->status = $request->status;
        $table->chair = $request->chair;
        $table->couvert = $request->couvert;
        $table->image = $imageName;
        $table->room_id = $request->room_id;
        $table->save();

        $request->session()->flash('status','Table '.$request->name.' has been updated successfully');

        return redirect('/tables');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $table = Table::find($id);
        if($table->image != 'table2.png'){
            unlink(public_path().'/'.$table->image);
        }
        $tableName = $table->name;
        $table->delete();
        Session()->flash('status',$tableName." has been deleted");
        return(redirect('/tables'));
    }
}
