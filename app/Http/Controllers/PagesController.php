<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\MailContactanos;
use Mail;
use Illuminate\Support\Facades\Storage;
use SEO;

class PagesController extends Controller
{
    public function index(Request $request){
        $query = DB::table('supplies');
        if($request->input('number')) 
            $productos = $query->where('number', 'like', "%".$request->input('number')."%")
            ->orWhere('short_description', 'like', "%".$request->input('number')."%")
            ->orWhere('large_description', 'like', "%".$request->input('number')."%");
        $productos = $query->paginate(20);

        SEO::setTitle('International Parts');
        SEO::setDescription('Tenemos la pieza que necesitas');
        SEO::opengraph()->setUrl('http://internationalparts.us');
        SEO::setCanonical('http://internationalparts.us');
        SEO::opengraph()->addProperty('type', 'articles');
        SEO::twitter()->setSite('@interparts5');

        return view('index', compact('productos'));
    }

    public function fabricantes(){
        $fabricantes = DB::table('manufacturers')
        ->whereNotIn('name', ['GENERICO', 'generico', 'Fabricante', 'fabricante', ''])
        ->paginate(20);

        SEO::setTitle('International Parts - Fabricantes');
        SEO::setDescription('Tenemos la pieza que necesitas');
        SEO::opengraph()->setUrl('http://internationalparts.us');
        SEO::setCanonical('http://internationalparts.us');
        SEO::opengraph()->addProperty('type', 'articles');
        SEO::twitter()->setSite('@interparts5');

        return view('fabricantes', compact('fabricantes'));
    }

    public function fabricante($name){
        $fabricante = DB::table('manufacturers')->where('name', $name)->first();
        $piezas = DB::table('supplies')->where('manufacturers_id', $fabricante->id)->paginate(20);

        SEO::setTitle('International Parts - '.$name);
        SEO::setDescription('Tenemos la pieza que necesitas');
        SEO::opengraph()->setUrl('http://internationalparts.us');
        SEO::setCanonical('http://internationalparts.us');
        SEO::opengraph()->addProperty('type', 'articles');
        SEO::twitter()->setSite('@interparts5');

        return view('fabricante', compact('name', 'piezas'));
    }

    public function producto($number){
        $number = str_replace('\\', '/', $number);
        $pieza = DB::table('supplies')
            ->where('number', $number)
            ->where('sync_connection_id', '=', '2')
            ->first();

        SEO::setTitle('International Parts - '.$pieza->number);
        SEO::setDescription('Tenemos la pieza que necesitas');
        SEO::opengraph()->setUrl('http://internationalparts.us');
        SEO::setCanonical('http://internationalparts.us');
        SEO::opengraph()->addProperty('type', 'articles');
        SEO::twitter()->setSite('@intlparts');

        return view('producto', compact('pieza'));
    }

    public function quienesSomos(){
        SEO::setTitle('International Parts - Quienes Somos');
        SEO::setDescription('Tenemos la pieza que necesitas');
        SEO::opengraph()->setUrl('http://internationalparts.us');
        SEO::setCanonical('http://internationalparts.us');
        SEO::opengraph()->addProperty('type', 'articles');
        SEO::twitter()->setSite('@interparts5');
        return view('quienes-somos');
    }

    public function contacto(){
        SEO::setTitle('International Parts - Contáctanos');
        SEO::setDescription('Tenemos la pieza que necesitas');
        SEO::opengraph()->setUrl('http://internationalparts.us');
        SEO::setCanonical('http://internationalparts.us');
        SEO::opengraph()->addProperty('type', 'articles');
        SEO::twitter()->setSite('@interparts5');
        return view('contacto');
    }

    public function contactanosMail(Request $request)
    {
        $adjunto = $request->file;
        //Storage::disk('local')->put($adjunto, 'Contents');
        Storage::disk('local')->put($adjunto, file_get_contents($adjunto));
        $location = storage_path("app/$adjunto");
        $contactanosCall = [
            'nombre' => $request->Name,
            'email' => $request->Email,
            'telefono' => $request->Telephone,
            'asunto' => $request->Subject,
            'mensaje' => $request->Message,
            'location' => $location
        ];

        Mail::to('ingacastro@gmail.com')->send(new MailContactanos($contactanosCall));
        //return "Email enviado";
        return back();
    }
}
