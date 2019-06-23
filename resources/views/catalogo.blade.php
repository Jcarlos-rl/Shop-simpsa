@extends('template')

@section('seccion')
    <div class="container">
        <h3 class="font-corporativa center text-color-corporativo">Las marcas que distribuimos</h3>
        <div class="row">
            <div class="col m6">
                <div class="background-bgs">
                    <div class="spacing70"></div>
                    <img src="images/Logo-BGStechnic.png" class="logo-bgs" alt="">
                    <div class="spacing50"></div>
                    <a class='btn background-corporativo' href='pdf/BGSESP.pdf'>Ver Catálogo</a>
                </div>
            </div>
            <div class="col m6">
                <div class="background-bgs">
                    <div class="spacing70"></div>
                    <img src="images/Loctite-Logo.png" class="logo-loctite" alt="">
                    <div class="spacing50"></div>
                    <a class='dropdown-trigger btn background-corporativo' href='#' data-target='loctite'>Ver Catálogo<i class="material-icons left">arrow_drop_down</i></a>
                    <ul id='loctite' class='dropdown-content'>
                        <li><a href="pdf/CatalogoGeneralLoctite.pdf">Catálogo General</a></li>
                        <li><a href="pdf/ReparacionMantenimientoVehiculos.pdf">Reparación y Mantenimiento de Vehículos</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col m6">
                <div class="background-bgs">
                    <div class="spacing70"></div>
                    <img src="images/kimberly.png" class="logo-kimberly" alt="">
                    <div class="spacing50"></div>
                    <a class='btn background-corporativo' href='pdf/Kimberly.pdf'>Ver Catálogo</a>
                </div>
            </div>
            <div class="col m6">
                <div class="background-bgs">
                    <div class="spacing70"></div>
                    <img src="images/Knipex.png" class="logo-knipex" alt="">
                    <div class="spacing50"></div>
                    <a class='dropdown-trigger btn background-corporativo' href='#' data-target='knipex'>Ver Catálogo<i class="material-icons left">arrow_drop_down</i></a>
                    <ul id='knipex' class='dropdown-content'>
                        <li><a href="pdf/CatalogoGeneral.pdf">Catálogo General</a></li>
                        <li><a href="pdf/SurtidoAutomovil.pdf">Surtido Automóvil</a></li>
                        <li><a href="pdf/HerramientasAisladas.pdf">Herramientas Aisladas</a></li>
                        <li><a href="pdf/SurtidoAgricultura.pdf">Surtido Agricultura</a></li>
                        <li><a href="pdf/SurtidoCalefaccion_Sanitario.pdf">Surtido Calefacción/Sanitario</a></li>
                        <li><a href="pdf/SurtidoCompleto.pdf">Surtido Completo</a></li>
                        <li><a href="pdf/SurtidoConstruccion.pdf">Surtido Construcción</a></li>
                        <li><a href="pdf/SurtidoIndustrial.pdf">Surtido Industrial</a></li>
                        <li><a href="pdf/SustidoElectrico.pdf">Surtido Eléctrico</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col m6">
                <div class="background-bgs">
                    <div class="spacing70"></div>
                    <img src="images/urrea.jpg" class="logo-kimberly" alt="">
                    <div class="spacing50"></div>
                    <a class='btn background-corporativo' href='pdf/URREA.pdf'>Ver Catálogo</a>
                </div>
            </div>
        </div>
    </div>    
    <!-- Top -->
    <div class="fixed-action-btn">
        <a href="#top" class="btn-floating btn-large background-corporativo btn">
            <i class="large material-icons">arrow_upward</i>
        </a>
    </div>
@endsection