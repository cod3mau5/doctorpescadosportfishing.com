<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fishing_report_cabos= Article::orderBy('id','desc')->paginate(6);

        return view('fishing-report.index',compact('fishing_report_cabos'));
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $fishing_report_cabo)
    {
        // dd($article);
        return view('fishing-report.show',compact('fishing_report_cabo'));
    }

//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  \App\Article  $article
//      * @return \Illuminate\Http\Response
//      */
//     public function edit(Article $article)
//     {
//         //
//     }

//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \App\Article  $article
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request, Article $article)
//     {
//         //
//     }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Article  $article
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Article $article)
    // {
    //     return 'destroyed :)';
    // }
}
