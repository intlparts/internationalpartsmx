@extends('layouts.app')
@section('section__banner_right')
    <div class="privacy about">
        <h3>Quiénes somos</h3>
        <p class="animi">Somos una empresa comprometida con atender las necesidades de nuestros clientes. Proveemos la solución en cuestiones de suministro de refacciones, piezas de máquinas, motores, válvulas, equipos pesados, componentes electrónicos, equipos de cómputo o cualquier otro equipamiento que usted necesite. Somos especialistas en proveer piezas difíciles de encontrar, obsoletas y piezas urgentes trabajando con importaciones y exportaciones a todo el mundo. Tenemos un equipo de trabajo altamente calificado para brindar productos de alta calidad y con un tiempo de entrega optimizado. Somos una empresa internacional con sede en los Estados Unidos y oficina en México. Somos la solución en la compra de cualquier producto que su empresa necesite. Ofrecemos productos de gran calidad y un excelente servicio. Estamos enterados que nuestros clientes son la razón de nuestra existencia, gracias por confiar en nosotros.</p>
        <div class="agile_about_grids">
            <div class="col-md-6 agile_about_grid_right">
                <img src="{{ asset('images/parts.png') }}" alt=" " class="img-responsive">
            </div>
            <div class="col-md-6 agile_about_grid_left">
                <h4 style="margin-bottom: 20px;">Visión</h4>
                <ol>
                    <li>Ser el aliado estratégico de nuestros clientes, apoyando con soluciones en logística, abastecimiento, importación de productos de MRO (Mantenimiento, Reparaciones y Operaciones).</li>
                    <li>Atender a todos nuestros clientes para que estén satisfechos con la calidad de nuestros servicios.</li>
                    <li>Ser motivación para el desarrollo de las personas que colaboran con nuestra compañía.</li>
                    <li>Ser la empresa numero uno en distribución de piezas de MRO en México.</li>
                </ol>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="agile_about_grids">
            <div class="col-md-6 agile_about_grid_left">
                <h4 style="margin-bottom: 20px;">Misión</h4>
                <ol>
                    <li>Ser la empresa con mejores profesionales para proveer piezas de MRO.</li>
                    <li>Abastecer a la industria de partes industriales para mantenimiento, reparaciones y operaciones que la misma pueda necesitar.</li>
                    <li>Hacer llegar las piezas solicitadas por nuestros en la mejor optimización del tiempo.</li>
                    <li>Superar las expectativas de nuestros clientes en cuanto a producto y servicio.</li>
                    <li>Estas son las razones por las que todos nuestros clientes permanecen con nosotros.</li>
                </ol>
            </div>
            <div class="col-md-6 agile_about_grid_right">
                <img src="{{ asset('images/map.png') }}" alt=" " class="img-responsive">
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
@endsection
