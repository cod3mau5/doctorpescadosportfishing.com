<?php

namespace App\Observers;

use Illuminate\Support\Str;
use App\Article;
use Carbon\Carbon;

class ArticleObserver
{
    /**
     * Handle the article "created" event.
     *
     * @param  \App\Article  $article
     * @return void
     */
    // public function created(Article $article)
    // {
    //     //
    // }

    public function saving(Article $fishing_report_cabo)
    {
        $dt = Carbon::now();
        $slug= Str::slug($fishing_report_cabo->title,'-');
        $slug= $slug.'-'.$dt->year.'-'.Carbon::now()->format('M').'-'.$dt->day;

        if(Article::where('slug', $slug)->exists()){
            $slug= $slug. uniqid();
        }

        $fishing_report_cabo->slug= strtolower($slug);
    }

//     /**
//      * Handle the article "updated" event.
//      *
//      * @param  \App\Article  $article
//      * @return void
//      */
//     public function updated(Article $article)
//     {
//         //
//     }

//     /**
//      * Handle the article "deleted" event.
//      *
//      * @param  \App\Article  $article
//      * @return void
//      */
//     public function deleted(Article $article)
//     {
//         //
//     }

//     /**
//      * Handle the article "restored" event.
//      *
//      * @param  \App\Article  $article
//      * @return void
//      */
//     public function restored(Article $article)
//     {
//         //
//     }

//     /**
//      * Handle the article "force deleted" event.
//      *
//      * @param  \App\Article  $article
//      * @return void
//      */
//     public function forceDeleted(Article $article)
//     {
//         //
//     }
}
