<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Lead;
use App\Mail\SendNewMail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request) {

        $data = $request->all();

        $validator = Validator::make($data, [

            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);

        } else {

            //salvo i dati nel database
            $lead = new Lead();
            $lead->fill($data);
            $lead->save();

            //invio la mail all'amministratore
            Mail::to('info@boolpress.com')->send(new SendNewMail($lead));

            return response()->json([
                'success' => true,
            ]);
        }

    }
}
