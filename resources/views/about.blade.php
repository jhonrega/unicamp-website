<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nosotros - UNICAMP SAS</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    @include('layouts.header')
    <main class="container my-5">
        <section class="container my-5">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="fw-bold">Nuestra empresa</h2>
                    <p>
                        Somos una empresa Santandereana con más de 15 años de experiencia en fabricación de contenedores para diversos tipos de uso, 
                        fundada por una familia de emprendedores y liderada por personas con amplia experiencia en el sector.
                    </p>
                    <p>
                        Nuestra pasión nos ha llevado a desarrollar proyectos de gran capacidad, brindándole a nuestros clientes 
                        las mejores soluciones en cuanto a diseño, calidad y comodidad.
                    </p>
                    <p>
                        La satisfacción de nuestros clientes nos motiva siempre a estar innovando constantemente y prestando el mejor servicio.
                    </p>
                </div>
                <div class="col-md-4 text-center">
                    <img src="{{ asset('images/sobre-nosotros.jpg') }}" class="img-fluid rounded shadow" alt="Proyecto de contenedor">
                    <a href="https://wa.me/57XXXXXXXXX" target="_blank">
                        <img src="{{ asset('images/whatsapp-icon.png') }}" class="position-absolute" style="width: 50px; right: 20px; bottom: 20px;" alt="WhatsApp">
                    </a>
                </div>
            </div>
        </section>

        <section class="container my-5">
            <h3 class="fw-bold">Algunos de nuestros clientes:</h3>
            <div class="d-flex align-items-center justify-content-between">
                <button class="btn btn-light"><i class="fas fa-chevron-left"></i></button>
                <img src="{{ asset('images/clientes/drummond.png') }}" class="img-fluid mx-2" alt="Drummond">
                <img src="{{ asset('images/clientes/parko-services.png') }}" class="img-fluid mx-2" alt="Parko Services">
                <img src="{{ asset('images/clientes/drummond-energy.png') }}" class="img-fluid mx-2" alt="Drummond Energy">
                <button class="btn btn-light"><i class="fas fa-chevron-right"></i></button>
            </div>
        </section>
    </main>

  
    @include('layouts.footer')
</body>
</html>
