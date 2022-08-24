<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFaqRequest;
use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('index','faq');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //SELECT * FROM NEWS ordered by date it was created
        $faqs = Faq::orderBy('updated_at', 'DESC')->get();
        return view('faq.faq', ['faqs' => $faqs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('faq.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFaqRequest $request)
    {
        $request->validated();

        Faq::create([
            'question' => $request->input('question'),
            'answer' => $request->input('answer'),
        ]);

        return redirect('/faq');
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
        $faq = Faq::find($id);
        return view('faq.edit', ['faq' => $faq]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateFaqRequest $request, $id)
    {
        $request->validated();
        
        $faq = Faq::find($id);

        $faq->update([
            'question' => $request->input('question'),
            'answer' => $request->input('answer'),
        ]);

        return redirect('/faq');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faq = Faq::find($id);
        $faq->delete();
        return redirect('/faq');
    }
}
