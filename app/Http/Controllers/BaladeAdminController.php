<?php

namespace App\Http\Controllers;

use App\Models\Balade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BaladeAdminController extends Controller
{

    //function to see if the user is logged in
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $balades = Balade::paginate(4);
        return view('baladesadmin.index')->with('balades', $balades);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('baladesadmin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'address' => 'required',
            'mobile' => 'required',
            'quantity' => 'required|numeric',
            'date'=>['required', 'after:' .  date('Y-m-d')],
            'Status' => 'required'
        ]);

        //if validation fails redirect to the same page with errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $input = $request->all();
        Balade::create($input);
        return redirect('baladesadmin')->with('flash_message', 'Balade has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Balade  $balade
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $balade = Balade::find($id);
        if (isset($balade)) {
            return view('baladesadmin.show')->with('balades', $balade);
        } else {
            return redirect('baladesadmin')->with('flash_message', 'Balade not found!');
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Balade  $balade
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $balade = Balade::find($id);
        //check if balade exists before redirecting to edit view else redirect to baladesadmin.index
        if (isset($balade)) {
            return view('baladesadmin.edit')->with('balades', $balade);
        } else {
            return redirect('baladesadmin')->with('flash_message', 'Balade not found!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Balade  $balade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $balade = Balade::find($id);

        if (isset($balade)) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:255',
                'address' => 'required',
                'mobile' => 'required',
                'quantity' => 'required|numeric',
                'Status' => 'required'
            ]);

            //if validation fails redirect to the same page with errors
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                $input = $request->all();
                $balade->update($input);
                return redirect('baladesadmin')->with('flash_message', 'Balade has been updated!');
            }
        }else{
            return redirect('baladesadmin')->with('flash_message', 'Balade not found!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Balade  $balade
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $balade = Balade::find($id);
        if (isset($balade)) {
            $balade->delete();
            return redirect('baladesadmin')->with('flash_message', 'Balade has been deleted!');
        } else {
            return redirect('baladesadmin')->with('flash_message', 'Balade not found!');
        }
        
    }
}
