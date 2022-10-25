<?php

namespace App\Http\Controllers;

use App\Models\Velo;
use Illuminate\Http\Request;

class VeloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Velo::orderBy('id','desc')->paginate(10)->setPath('velos');
        return view('velos.index',compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('velos.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $request->validate([
        'marque' => 'required',
        'modele' => 'required',
        'photo' => 'mimes:jpg,png,jpeg|max:5048'
        ]);
       

            $requestData=$request->all();
           $fileName=time().$request->file('photo')->getClientOriginalName();
            $path=$request->file('photo')->storeAs('images',$fileName,'public');
            $requestData["photo"]='/storage'.$path;
            Velo::create($requestData);
            
       
       
            return redirect()->back()->with('flash_message','Create Successfully');
       # return redirect('velos.index')->with('flash_message', 'Velo Addedd!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Velo  $velo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data =  Velo::find($id);
       return view('velos.show',compact(['data']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
       $data = Velo::find($id);
       return view('velos.edit',compact(['data']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
    
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $velo = ['marque'=>$request->marque,'modele'=>$request->modele,
            ];
        Velo::whereId($id)->update($velo) ;
        return  redirect()->route('velos.index')
            ->with('info','Velo updated successfully.');}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Velo  $velo
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        Velo::where('id',$id)->delete();
        return redirect()->back()->with('success','Delete Successfully');
    }
}
