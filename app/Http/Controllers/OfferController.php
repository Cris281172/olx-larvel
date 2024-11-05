<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOfferRequest;
use App\Http\Requests\EditOfferRequest;
use App\Models\Category;
use App\Models\Offer;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Notifications\OfferCreated;

class OfferController extends Controller
{
    public function offer_create_view(){
        $categories = Category::get();
        $types = Type::get();
        return view('offers.create', compact('categories', 'types'));
    }
    public function offer_create(CreateOfferRequest $request){
        $offer = Offer::create([
            "title" => $request->title,
            "description" => $request->description,
            "price" => $request->price,
            "location" => $request->location,
            "type_id" => $request->type_id,
            "category_id" => $request->category_id,
            "user_id" => auth()->user()->id
        ]);
        auth()->user()->notify(new OfferCreated($offer));
        return redirect()->to('');
    }
    public function offer_get_all(){
        $offers = Offer::with('categories')->get();
        return view('offers.offers', compact('offers'));
    }
    public function offer_get(string $id){
        $offer = Offer::where('id', $id)->with('categories')->with('user_details')->first();
        return view('offers.offer', compact('offer'));
    }
    public function offer_delete(string $id){
        Offer::where('id', $id)->delete();
        return redirect()->to(route('offer_get_all'));
    }
    public function offer_edit_view(string $id){
        $categories = Category::get();
        $offer = Offer::where('id', $id)->first();
        return view('offers.edit', compact('offer', 'categories'));
    }
    public function offer_edit(EditOfferRequest $request, string $id){
        Offer::where('id', $id)->update([
            "title" => $request->title,
            "description" => $request->description,
            "price" => $request->price,
            "location" => $request->location,
            "type_id" => $request->type,
            "category_id" => $request->category_id
        ]);
        return redirect()->to(route('offer_get', $id));
    }
}
