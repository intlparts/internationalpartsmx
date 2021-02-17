<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactProductMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function contactProduct(Request $request)
    {
        $to = env('MAIL_FROM_RECIVED');
        $data = $request->all();
        try {
            Mail::to([$to])->send(new ContactProductMail($data));
            $mensaje = "correo enviado";
            $class = "success";
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            $mensaje = "error al enviar correo";
            $class = "danger";
        }
        return back()->with('mensaje', $mensaje)->with('class', $class);
    }
}
