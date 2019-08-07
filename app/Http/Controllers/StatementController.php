<?php

namespace App\Http\Controllers;

use App\Statement;
use App\OrderBooker;
use Illuminate\Http\Request;

class StatementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        // $filter = filter($request);
        // $req->orderbooker = 1;

        if($req->ajax()){

            if($req->has('orderbooker'))
            {
                $orderbooker = OrderBooker::find($req->orderbooker);
                $statements = $orderbooker->statements($req);
                // die($statements);
            }else{
                
                $statements = Statement::join('customers','customers.id','customer_id')->paginate();
            }


            // $statements = Statement::join('customers','customers.id','customer_id')->select('statements.*','name')->where($filter)->paginate(40);

            return view('ajax_tables.statements',compact('statements'));
        }
        else
            return view('accounts.statement_list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Statement  $statement
     * @return \Illuminate\Http\Response
     */
    public function show(Statement $statement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Statement  $statement
     * @return \Illuminate\Http\Response
     */
    public function edit(Statement $statement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Statement  $statement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Statement $statement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Statement  $statement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statement $statement)
    {
        //
    }
}
