<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FiscalYear;
use App\FinanceDivisionDistribution;

class FinancialDivisionDistributionController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $commonclass;

    public function __construct() {
        $this->commonclass = app('CommonClass');
    }

    public function index() {
        $financeDivisionDistributions = FinanceDivisionDistribution::with('financeyear')->orderBy('id')->get();
        $fiscalyears = Fiscalyear::get(['start_date', 'end_date', 'id']);

        return view('finacialDivisionDistribution.index', compact('fiscalyears', 'financeDivisionDistributions'));
    }

    public function create() {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
        if (!$this->commonclass->check_privilege(0)) {
            return back()->withErrors([config('messages.4')]);
        }
        
        if (FinanceDivisionDistribution::where('ceiling_for', '=', $request->ceiling_for)->where('financial_year', '=', $request->financial_year)->exists()) {
            return back()->withErrors(['This Financial Year Celling already exist.']);
        }

        $validate_data = $request->validate([
            'ceiling_for' => "required",
            "financial_year" => 'required',
            "ceiling_amount" => 'required'
        ]);

        if ($this->commonclass->create_custom('FinanceDivisionDistribution', $validate_data)) {
            return redirect('financial-division-distributon')->with('success', config('messages.1'));
        }
        return redirect('financial-division-distributon')->with(['errors', config('messages.5')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
        return $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        if (FinanceDivisionDistribution::where('ceiling_for', '=', $request->ceiling_for)->where('financial_year', '=', $request->financial_year)->where('id', '!=', $id)->exists()) {
            return back()->withErrors(['This Financial Year Celling already exist.']);
        }


        if (FinanceDivisionDistribution::find($id)->update($request->all())) {
            $request->session()->flash('success', config('messages.2'));
        } else {
            $request->session()->flash('errors', config('messages.7'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
