@extends('template')

@section('seccion')
    @if(session()->get('success'))
        <div class="alert alert-success" id="agregado">
            {{ session()->get('success') }}  
        </div>
    @endif
    <div class="container">
        <div class="spacing20"></div>
        <div class="row">
            <div class="col m9 s12">
                <h4 class="center text-color-corporativo font-corporativa">Formulario de Contacto</h4>
                <form class="col s12" action="{{ route('Contacto-Simpsa') }}" >
                    <div class="row">
                        <div class="input-field col m6 s12">
                            @csrf
                            <input placeholder="Nombre" type="text" class="validate" name="nombre" required>
                        </div>
                        <div class="input-field col m6 s12">
                            <input placeholder="Teléfono" id="tel" type="tel" class="validate" name="tel" required>
                        </div>
                        <div class="input-field col m6 s12">
                            <input placeholder="E-mail" type="email" class="validate" name="email" required>
                        </div>
                        <div class="input-field col m6 s12">
                            <select name="tema" required>
                                <option id="tema" value="" disabled selected>Tema a tratar (Requerido)</option>
                                <option value="Información general">Información general</option>
                                <option value="Información producto">Información producto</option>
                                <option value="Ventas">Ventas</option>
                                <option value="Otros temas">Otros temas</option>
                            </select>
                        </div>  
                        <div class="input-field col m12 s12">
                            <textarea placeholder="Mensaje" class="materialize-textarea" name="mensaje" required></textarea>
                        </div>  
                    </div>
                    <button class="btn waves-effect white-text background-corporativo hide-on-small-only">Enviar</button>
                    <div class="center hide-on-med-and-up">
                        <button class="btn waves-effect white-text background-corporativo">Enviar</button>
                    </div>
                </form>
            </div>
            <br>
            <div class="col m3">
                <br>
                <h4 class=" center text-color-corporativo font-corporativa">Mercado Libre</h4>
                <div class="container">
                    <img src="images/mercado.png" class="responsive-img" alt="">
                </div>
                <div class="spacing50"></div>
                <div class="center">
                    <a class="btn waves-effect white-text background-corporativo"> <i class="material-icons left">shopping_cart</i> Comprar</a>
                </div>
            </div>
        </div>
        <div class="spacing20"></div>
    </div>
    <!-- Top -->
    <div class="fixed-action-btn">
        <a href="#top" class="btn-floating btn-large background-corporativo btn">
            <i class="large material-icons">arrow_upward</i>
        </a>
    </div>
@endsection