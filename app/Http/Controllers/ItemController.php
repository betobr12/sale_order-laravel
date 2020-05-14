<?php

namespace App\Http\Controllers;

use App\Item;
use App\Product;
use App\Sale;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()   {

        $productList = Product::select('id','name')->get();

        return view('dashboard.item.create',compact(['productList']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'product_id' => 'required',
            'sale_id' => 'required',
            'sale_value' => 'required',
            'sale_amount' => 'required'

           ]);

           $item = new Item();
           $item->product_id = $request->product_id;
           $item->sale_id = $request->sale_id;
           $item->sale_value = $request->sale_value;
           $item->sale_amount = $request->sale_amount;
           $item->save();

          $idsale = $item->sale_id;
          $sale = Sale::find($idsale);
          $items =  $sale->items()->get();
          $productList = Product::select('id','name')->get();

           return view('dashboard.item.create',compact('sale','idsale','items',['productList']));


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
        $item = Item::find($id);
        return view('dashboard.item.edit', compact('item'));
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
        $item = Item::find($id);
        $item->product_id = $request->product_id;
        $item->sale_id = $request->sale_id;
        $item->sale_value = $request->sale_value;
        $item->sale_amount = $request->sale_amount;
        $item->save();

        return redirect()->back();
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
    }
}
