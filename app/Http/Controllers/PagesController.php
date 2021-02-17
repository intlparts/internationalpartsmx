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
                ->select('manufacturers.name as manufacturer', 'manufacturers.slug as manufacturer_slug', 'supplies.number', 'supplies.slug as number_slug')
                ->leftJoin('manufacturers', 'supplies.manufacturers_id', 'manufacturers.id')
                ->where('number', 'like', "%$pieza%")
                ->where('supplies.slug', '<>', '')
                ->distinct()
                ->paginate(15)
            : DB::table('supplies')
                ->select('manufacturers.name as manufacturer', 'manufacturers.slug as manufacturer_slug', 'supplies.number', 'supplies.slug as number_slug')
                ->leftJoin('manufacturers', 'supplies.manufacturers_id', 'manufacturers.id')
                ->where('manufacturers.slug', '<>', '')
                ->where('supplies.slug', '<>', '')
                ->paginate(15);

        
        SEO::setTitle('INTL - piezas de refacción');
        SEO::setDescription('piezas de refacción en Mexico con los mejores planes de pago');
        return view('index', compact('productos'));
    }

    public function fabricantes(){
        $fabricantes = DB::table('manufacturers')
        ->whereNotIn('name', ['GENERICO', 'generico', 'Fabricante', 'fabricante', ''])
        ->paginate(20);

        SEO::setTitle('INTL - piezas de refacción');
        SEO::setDescription('piezas de refacción en Mexico con los mejores planes de pago');

        return view('fabricantes', compact('fabricantes'));
    }

    public function fabricante($name){
        $fabricante = Manufacturer::where('name', $name)->first();

        $piezas = DB::table('supplies')->select('manufacturers.name as manufacturer', 'manufacturers.slug as manufacturer_slug', 'supplies.number', 'supplies.slug as number_slug')
        ->leftJoin('manufacturers', 'supplies.manufacturers_id', 'manufacturers.id')
        ->where('manufacturers_id', $fabricante->id)
        ->where('manufacturers.slug', '<>', '')
        ->where('supplies.slug', '<>', '')
        ->distinct()
        ->paginate(20);

        SEO::setTitle("INTL - $fabricante->name");
        SEO::setDescription('piezas de refacción en Mexico con los mejores planes de pago');

        return view('fabricante', compact('name', 'piezas'));
    }

    public function producto($manufacturer , $number){
        $pieza = DB::table('supplies')
            ->select('number', 'short_description', 'large_description', 'supplies.slug as number_slug', 'manufacturers.slug as manufacturer_slug', 'name')
            ->leftJoin('manufacturers', 'supplies.manufacturers_id', 'manufacturers.id')
            ->where('supplies.slug', $number)
            ->where('sync_connection_id', 2)
            ->where('manufacturers.slug', '<>', '')
            ->where('supplies.slug', '<>', '')
            ->first();

        if(!$pieza)
            $pieza = DB::table('supplies')
            ->select('number', 'short_description', 'large_description', 'supplies.slug as number_slug', 'manufacturers.slug as manufacturer_slug', 'name')
            ->leftJoin('manufacturers', 'supplies.manufacturers_id', 'manufacturers.id')
            ->where('supplies.slug', $number)
            ->where('manufacturers.slug', '<>', '')
            ->where('supplies.slug', '<>', '')
            ->first();

        SEO::setTitle("INTL - $pieza->number");
        SEO::setDescription($pieza->large_description);

        return view('producto', compact('pieza'));
    }

    public function quienesSomos(){

        SEO::setTitle('INTL - Quienes Somos');
        SEO::setDescription('piezas de refacción en Mexico con los mejores planes de pago');

        return view('quienes-somos');
    }

    public function contacto(){
        
        SEO::setTitle('INTL - Contacto');
        SEO::setDescription('piezas de refacción en Mexico con los mejores planes de pago');

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
