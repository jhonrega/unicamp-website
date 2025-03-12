@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="text-center fw-bold mb-4" data-aos="fade-down" style="margin-top:30px">Contáctanos</h1>

    @if(session('success'))
        <div class="alert alert-success text-center" data-aos="fade-up">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('contacto.enviar') }}" method="POST" class="p-4 shadow rounded bg-white" data-aos="zoom-in">
        @csrf

        <h3 class="fw-bold">Datos</h3>
        <div class="row g-3">
            <div class="col-md-6" data-aos="fade-right">
                <label class="form-label">Nombre:</label>
                <input type="text" name="nombre" class="form-control rounded shadow-sm" required>
            </div>
            <div class="col-md-6" data-aos="fade-left">
                <label class="form-label">Email:</label>
                <input type="email" name="email" class="form-control rounded shadow-sm" required>
            </div>
            <div class="col-md-6" data-aos="fade-right">
                <label class="form-label">WhatsApp:</label>
                <input type="text" name="whatsapp" class="form-control rounded shadow-sm" required>
            </div>
            <div class="col-md-6" data-aos="fade-left">
                <label class="form-label">Ciudad:</label>
                <input type="text" name="ciudad" class="form-control rounded shadow-sm" required>
            </div>
        </div>

        <h3 class="fw-bold mt-4" data-aos="fade-up">Cotización</h3>

        <div class="mb-3" data-aos="zoom-in">
            <label class="form-label">¿Requiere cotización?</label>
            <div class="form-check form-check-inline">
                <input type="radio" name="cotizacion" value="Sí" class="form-check-input" id="cotizacion_si" required>
                <label class="form-check-label" for="cotizacion_si">Sí</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" name="cotizacion" value="No" class="form-check-input" id="cotizacion_no" required>
                <label class="form-check-label" for="cotizacion_no">No</label>
            </div>
        </div>

        <div id="cotizacion_campos" class="cotizacion-seccion">
            <div class="row g-3">
                <div class="col-md-6" data-aos="fade-right">
                    <label class="form-label">Tamaño/Capacidad:</label>
                    <select name="tamano" id="tamano" class="form-select rounded shadow-sm">
                        <option value="20 pies">20 pies</option>
                        <option value="40 pies">40 pies</option>
                        <option value="Personalizado">Personalizado</option>
                    </select>
                </div>
                <div class="col-md-6" data-aos="fade-left">
                    <label class="form-label">Cantidad:</label>
                    <input type="number" name="cantidad" id="cantidad" class="form-control rounded shadow-sm" min="1">
                </div>
            </div>

            <div class="row g-3">
                <div class="col-md-6" data-aos="fade-right">
                    <label class="form-label">Tipo:</label>
                    <select name="tipo" id="tipo" class="form-select rounded shadow-sm">
                        <option value="Comedor">Comedor</option>
                        <option value="Habitacional">Habitacional</option>
                        <option value="Baños">Baños</option>
                        <option value="Gimnasio">Gimnasio</option>
                        <option value="Cocina">Cocina</option>
                        <option value="Oficinas">Oficinas</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>
                <div class="col-md-6" data-aos="fade-left">
                    <label class="form-label">Material:</label>
                    <select name="material" id="material" class="form-select rounded shadow-sm">
                        <option value="Paredes en acero">Paredes en acero</option>
                        <option value="Paredes en Isopanel">Paredes en Isopanel</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="mb-3" data-aos="fade-up">
            <label class="form-label">Información adicional:</label>
            <textarea name="informacion_adicional" class="form-control rounded shadow-sm"></textarea>
        </div>

        <div class="mb-3 form-check" data-aos="fade-up">
            <input type="checkbox" name="noticias" value="1" class="form-check-input">
            <label class="form-check-label">Quiero recibir noticias y actualizaciones</label>
        </div>

        <button type="submit" class="btn btn-primary btn-sm rounded-pill px-4 py-2 d-block mx-auto shadow-sm" data-aos="zoom-in-up">
            Enviar
        </button>
    </form>
</div>

<div class="container my-5">
    <div class="row align-items-center">
        <div class="col-md-6 text-center p-4" data-aos="fade-right">
            <h2 class="fw-bold text-primary mb-3">Visítanos</h2>
            <p class="text-muted fs-5">
                Puedes encontrar nuestra sede principal en la siguiente ubicación.  
                ¡Estaremos encantados de recibirte!
            </p>
        </div>

        <div class="col-md-6 d-flex justify-content-center" data-aos="fade-left">
            <div class="shadow-lg rounded-4 overflow-hidden" style="max-width: 100%;">
                <iframe class="w-100 rounded-4" style="height: 350px;"
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d657.0878943192856!2d-73.13142418598731!3d7.1479755754781475!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e6815097a1e8ea7%3A0x44af852034b44953!2sParqueadero%20Chinchilla!5e0!3m2!1ses!2sco!4v1741790366807!5m2!1ses!2sco"
                    allowfullscreen="" loading="lazy">
                </iframe>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const cotizacionSi = document.getElementById("cotizacion_si");
    const cotizacionNo = document.getElementById("cotizacion_no");
    const cotizacionCampos = document.getElementById("cotizacion_campos");

    function toggleCotizacion() {
        cotizacionCampos.style.display = cotizacionNo.checked ? "none" : "block";
    }

    cotizacionSi.addEventListener("change", toggleCotizacion);
    cotizacionNo.addEventListener("change", toggleCotizacion);
    toggleCotizacion();
});
</script>

@endsection
