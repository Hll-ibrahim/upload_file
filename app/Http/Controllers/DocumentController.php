<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function upload(){
        return view('index');
    }
    public function uploadPost(Request $request) {
        $request->validate([
            'file'=>'required'
        ],[
            'file.required'=>'Dosya alanı gereklidir'
        ]);
        $file = $request->file("file");
        $filePath = "documents";
        if($file->move($filePath,$file->getClientOriginalName())){
            return response()->json(['Success'=>'Document uploaded successfuly!']);
        }
        else {
            return response()->json(['Error'=>'Something wrong']);
        }
        dd($file->getClientOriginalName());
    }
}
