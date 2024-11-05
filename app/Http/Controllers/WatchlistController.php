<?php

namespace App\Http\Controllers;

use App\Models\Watchlist;
use Illuminate\Http\Request;

class WatchlistController extends Controller
{
    public function watchlist_toggle(string $offer_id){
        if(Watchlist::where('offer_id', $offer_id)->where('user_id', auth()->user()->id)->first()){
            Watchlist::where('offer_id', $offer_id)->where('user_id', auth()->user()->id)->delete();
            return back();
        }

        Watchlist::create([
            "user_id" => auth()->user()->id,
            "offer_id" => $offer_id
        ]);

        return back();

    }
}
