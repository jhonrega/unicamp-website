<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nosotros - UNICAMP SAS</title>

    <!-- Estilos -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
</head>
<body>

    @include('layouts.header')

    <main class="container my-5">
        
        <!-- Sección sobre la empresa -->
        <section class="container my-5">
            <div class="row">
                <div class="col-md-8" data-aos="fade-right" data-aos-duration="1000">
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
                <div class="col-md-4 text-center" data-aos="fade-left" data-aos-duration="1000">
                    <img src="{{ asset('images/sobre-nosotros.jpg') }}" class="img-fluid rounded shadow" alt="Proyecto de contenedor">
                    <a href="https://wa.me/57XXXXXXXXX" target="_blank">
                        <img src="{{ asset('images/whatsapp-icon.png') }}" class="position-absolute" style="width: 50px; right: 20px; bottom: 20px;" alt="WhatsApp">
                    </a>
                </div>
            </div>
        </section>

        <!-- Sección de clientes (SIN ANIMACIÓN) -->
        <section class="container my-5">
            <h3 class="fw-bold text-center mb-4">Nuestros Clientes</h3>

            <div id="clientsCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($clients->chunk(3) as $key => $chunk)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <div class="d-flex justify-content-center align-items-center">
                                @foreach ($chunk as $client)
                                    <img src="{{ asset('storage/' . $client->logo) }}" 
                                        class="img-fluid mx-3" 
                                        alt="{{ $client->name }}" 
                                        style="max-height: 100px;">
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Controles del carrusel -->
                <button class="carousel-control-prev" type="button" data-bs-target="#clientsCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#clientsCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>
        </section>

    </main>

    @include('layouts.footer')

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init({
            once: true,  // Evita que los elementos desaparezcan al hacer scroll
            duration: 1000
        });
    </script>

</body>
</html>
