<?php

namespace App\Http\Controllers;
use App\Shop;
use Validator;
use Carbon\Carbon;
use Session;
//use App\Http\Requests\Request;

class ShopsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $shops=Shop::orderBy('id', 'desc')->get();
        //return  $shops;
       //dump($shops);
       //$now = Carbon::now();
       $date=Carbon::setTestNow(Carbon::parse('first day of March 2000')); 

       return view('shops.index',compact('shops','date'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('shops.create');        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data=request()->all();
        $validator=Validator::make($data, [
            'title' => 'required|unique:shops|max:100',
            ]);

        if ($validator->fails())
        {
            return redirect()
                ->route('shops.create')
                ->withErrors($validator)
               ->withInput($data);
        }
        $shops=Shop::create($data);
        if($shops){
            Session::flash('success', 'This post was successfully saved.');
            return redirect()->route('shops.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $post = Shop::find($id);
       return view('shops.update')->withPost($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 
    public function update($id)
    {
        // Validate the data
       $data=request()->except('_method','_token');
       $validator=Validator::make($data,[
            'title'=> 'required|max:50|unique:shops,id,'.$id
        ]);
       if($validator->fails()){
            return redirect()
                ->route('shops.edit',$id)
                ->withErrors($validator)
                ->withInput($data);
       }
       $post=Shop::where('id',$id)->update($data);
       if($post){
             // set flash data with success message
             Session::flash('success', 'This post was successfully Updated.');
             return redirect()->route('shops.index');
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $post = Shop::find($id);
         $post->delete();

         Session::flash('success', 'This post was successfully Deleted.');
         return redirect()->route('shops.index', $post->id);
    }   


}
