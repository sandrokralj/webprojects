<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deal;

class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deals = Deal::all();

        return view('deals.index', compact('deals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('deals.create');
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
        	'deal_name' => 'required',
        	'deal_price' => 'required|integer',
        	'deal_qty' => 'required|integer'
        ]);

        $deal = new Deal([
        	'deal_name' => $request->get('deal_name'),
        'deal_price'=> $request->get('deal_price'),
        'deal_qty'=> $request->get('deal_qty')
        ]);

        $deal->save();
        return redirect('/deals')->with('success', 'Deal has been added.');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $deal = Deal::find($id);
        return view ('deals.edit', compact('deal'));
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
        $request->validate([
        'deal_name'=>'required',
        'deal_price'=> 'required|integer',
        'deal_qty' => 'required|integer'
      ]);

      $deal = Deal::find($id);
      $deal->deal_name = $request->get('deal_name');
      $deal->deal_price = $request->get('deal_price');
      $deal->deal_qty = $request->get('deal_qty');
      $deal->save();

      return redirect('/deals')->with('success', 'Deal has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deal = Deal::find($id);
     	$deal->delete();

     return redirect('/deals')->with('success', 'Deal has been deleted Successfully');
    }
}
