<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Velo;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;
use PhpParser\Node\Stmt\Catch_;

class VeloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $velos = Velo::where('category_id', $id)->orderBy('id','desc')->paginate(10)->setPath('velos');
        return view ('velos.index',compact('id'))->with('velos', $velos);
       # $data = Velo::orderBy('id','desc')->paginate(10)->setPath('velos');
      #  return view('velos.index',compact(['data']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
      $categories=Category::find($id);
        return view('velos.create')->with('categories', $categories);

    }

   
    public function store(Request $request)
    {
    $request->validate([
        'marque' => 'required',
        'description' => 'required|min:5',
        'photo' => 'mimes:jpg,png,jpeg|max:5048'
        ]);
        $fileName=time().$request->file('photo')->getClientOriginalName();
        $path=$request->file('photo')->storeAs('images',$fileName,'public');
        $requestData["photo"]='/storage'.$path;
        $velo=new Velo();
        $velo->marque=$request->marque;
        $velo->description=$request->description;
        $velo->photo=$path;
        $velo->category_id=$request->category_id;
        $velo->save();
       

           # $requestData=$request->all();
          
          #  Velo::create($requestData);
            
       
       
            return redirect('/category/velos/'.$request->category_id)->with('message','Added');
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
       return view('velos.edit')->with('velos',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
    
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {$data=Velo::find($id);
        $velo = ['marque'=>$request->marque,'description'=>$request->description,
            ];
        Velo::whereId($id)->update($velo) ;
        return  redirect('/category/velos/'.$request->category_id)
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
