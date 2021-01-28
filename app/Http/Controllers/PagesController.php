<?php

namespace App\Http\Controllers;

use SEO;
use Mail;
use Illuminate\Http\Request;
use App\Mail\MailContactanos;
use App\Mail\MessageReceived;
use App\Mail\MessageReceivedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Manufacturer;

class PagesController extends Controller
{
    public function index(Request $request){
        $pieza = $request->input('pieza');
        $productos = $pieza ? 
            DB::table('supplies')
                ->select('number')
                ->where('number', 'like', "%$pieza%")
                ->orWhere('short_description', 'like', "%$pieza%")
                ->distinct('number')
                ->paginate(15)
            : DB::table('supplies')->select('number')->distinct('number')->paginate(15);

        
        SEO::setTitle('INTL - piezas de refacción');
        SEO::setDescription('piezas de refacción en Mexico con los mejores planes de pago');
        SEO::opengraph()->setUrl('https://internationalparts.mx');

        return view('index', compact('productos'));
    }

    public function fabricantes(){
        $fabricantes = DB::table('manufacturers')
        ->whereNotIn('name', ['GENERICO', 'generico', 'Fabricante', 'fabricante', ''])
        ->paginate(20);

        SEO::setTitle('INTL - piezas de refacción');
        SEO::setDescription('piezas de refacción en Mexico con los mejores planes de pago');
        SEO::opengraph()->setUrl('https://internationalparts.mx/frabicantes');

        return view('fabricantes', compact('fabricantes'));
    }

    public function fabricante($name){
        $fabricante = Manufacturer::where('name', $name)->first();
        $piezas = DB::table('supplies')->select('number')->where('manufacturers_id', $fabricante->id)->distinct('number')->paginate(20);
        SEO::setTitle("INTL - $fabricante->name");
        SEO::setDescription('piezas de refacción en Mexico con los mejores planes de pago');
        SEO::opengraph()->setUrl("https://internationalparts.mx/frabicante/$fabricante->name");
        return view('fabricante', compact('name', 'piezas'));
    }

    public function producto($number){
        $number = str_replace('\\', '/', $number);
        $pieza = DB::table('supplies')
            ->where('number', $number)
            ->where('sync_connection_id', '2')
            ->first();

        if(!$pieza)
            $pieza = DB::table('supplies')->where('number', $number)->first();

        SEO::setTitle("INTL - $pieza->number");
        SEO::setDescription($pieza->large_description);
        SEO::opengraph()->setUrl("https://internationalparts.mx/producto/$pieza->number");
        return view('producto', compact('pieza'));
    }

    public function quienesSomos(){
        SEO::setTitle('INTL - Quienes Somos');
        SEO::setDescription('piezas de refacción en Mexico con los mejores planes de pago');
        SEO::opengraph()->setUrl('https://internationalparts.mx/quienes-somos');
        return view('quienes-somos');
    }

    public function contacto(){
        SEO::setTitle('INTL - Contacto');
        SEO::setDescription('piezas de refacción en Mexico con los mejores planes de pago');
        SEO::opengraph()->setUrl('https://internationalparts.mx/contacto');
        return view('contacto');
    }

    public function contactanosMail(Request $request)
    {
        $file = $request->file('file');
        if ($file != '') {
            $fileName = $file->getClientOriginalName()."".time();
            $mime = $file->getMimeType();
            \Storage::disk('public')->put($fileName,  \File::get($file));
        } else {
            $fileName = 'Sin Archivo';
            $mime = '';
        }

        $data = [
            'name' => $request['name'],
            'email' => $request['email'],
            'message' => $request['message'],
            'file' => $fileName,
            'mime' => $mime,
        ];

        $to = env('MAIL_FROM_RECIVED');

        try {
            if ($file != '') {
                Mail::to([$to])->send(new MessageReceivedFile($data));
            } else {
                Mail::to([$to])->send(new MessageReceived($data));
            }
            $mensaje = "correo enviado";
            $class = "success";
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            $mensaje = "Error al enviar el correo";
            $class = "danger";
        }

        return back()->with('mensaje', $mensaje)->with('class', $class);
    }
}
