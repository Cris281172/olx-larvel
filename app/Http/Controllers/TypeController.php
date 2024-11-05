<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTypeRequest;
use App\Http\Requests\EditTypeRequest;
use App\Models\Offer;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function type_create_view(){
        return view('types.create');
    }
    public function type_create(CreateTypeRequest $request){
        Type::create([
            "name" => $request->name
        ]);
        return redirect()->to(route('type_get_all'));
    }
    public function type_get_all(){
        $types = Type::get();
        return view('types.types', compact('types'));
    }
    public function type_delete(string $id){
        $offer = Offer::find($id);
        if(!$offer){
            Type::where('id', $id)->delete();
            return back();
        }
        return view('types.delete_error');
    }
    public function type_edit_view(string $id){
        $type = Type::find($id);
        return view('types.edit', compact('type'));
    }
    public function type_edit(EditTypeRequest $request, string $id){
        Type::where('id', $id)->update([
            "name" => $request->name
        ]);
        return redirect()->to(route('type_get_all'));
    }
}
