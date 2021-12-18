<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use formatImage;
use App\Events\MessageSent;
class FrontEndController extends Controller
{
    //
    public function send(){
        return view('client.sent');
    }

    public function revice(){
        return view('client.revice');
    }

    public function send_message(Request $request){
        // $id_from = $request->id_from;
        // $id_to = $request->id_to;


        if($request->hasFile('message')){
            $file = $request->file('message');
            $path = $file->hashName('profiles');
            $disk = Storage::disk('public');
            // $disk =   Storage::url($path);
            // $disk->put(
            //     $path, $this->formatImage($file)
            // );
            // $photo = request()->user()->create([
            //     'photo_url' => $disk->url($path),
            // ]);
            // dd($disk);
            echo '<img src = "http://localhost/storage/profiles/R2OA7AixCHwnPPojhjew23BE4hcqg4shdqXl8TM7.jpg">';
        }
        // else{
            // $message = $request->tin;
            // broadcast(new MessageSent($message, $id_from,  $id_to));
            // return redirect()->back();
        // }
        // event(new Notify( $message,$id_nd));


    }
}
