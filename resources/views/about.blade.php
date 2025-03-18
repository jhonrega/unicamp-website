@extends('layouts.app')

@section('title', 'Sobre Nosotros')

@section('content')
    <div class="container my-5">
        <!-- Sección Sobre Nosotros -->
        <section class="my-5">
            <div class="row align-items-center flex-column-reverse flex-md-row">
                <div class="col-12 col-md-7">
                    <div class="card shadow-sm p-4 about-card" data-aos="fade-right">
                        <h2 class="fw-bold">Nuestra Empresa</h2>
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
                </div>
                <div class="col-12 col-md-5 text-center" data-aos="fade-left">
                    <img src="{{ asset('images/sobre-nosotros.webp') }}" class="img-fluid about-img w-100" alt="Nuestra empresa">
                </div>
            </div>
        </section>

        <!-- Separador -->
        <hr class="custom-separator">

        <!-- Sección Misión -->
        <section class="my-5">
            <div class="row align-items-center flex-column flex-md-row">
                <div class="col-12 col-md-5 text-center" data-aos="fade-right">
                    <img src="{{ asset('images/mision.webp') }}" class="img-fluid about-img w-100" alt="Nuestra Misión">
                </div>
                <div class="col-12 col-md-7">
                    <div class="card shadow-sm p-4 about-card" data-aos="fade-left">
                        <h2 class="fw-bold">Nuestra Misión</h2>
                        <p>
                            Diseñar y fabricar contenedores modulares que transforman espacios en soluciones prácticas, 
                            innovadoras y adaptadas a las necesidades de nuestros clientes. Ofrecemos productos de alta calidad 
                            para vivienda, baños y otros usos, combinando funcionalidad, seguridad y sostenibilidad.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Separador -->
        <hr class="custom-separator">

        <!-- Sección Visión -->
        <section class="my-5">
            <div class="row align-items-center flex-column-reverse flex-md-row">
                <div class="col-12 col-md-7">
                    <div class="card shadow-sm p-4 about-card" data-aos="fade-right">
                        <h2 class="fw-bold">Nuestra Visión</h2>
                        <p>
                            Nos proyectamos como un referente en la transformación de espacios funcionales y sostenibles, 
                            ofreciendo alternativas eficientes para vivienda, sanitarios y usos comerciales. 
                        </p>
                    </div>
                </div>
                <div class="col-12 col-md-5 text-center" data-aos="fade-left">
                    <img src="{{ asset('images/vision.webp') }}" class="img-fluid about-img w-100" alt="Nuestra Visión">
                </div>
            </div>
        </section>
    </div>



        </section>

        <!-- Sección de clientes -->
        <section class="my-5">
            <h3 class="fw-bold text-center mb-4" data-aos="fade-up">Nuestros Clientes</h3>
            <div id="clientsCarousel" class="slide carousel-fade" data-bs-ride="carousel" data-aos="fade-up">
                <div class="carousel-inner">
                    @foreach ($clients->chunk(3) as $key => $chunk)
                    <div class="carousel-item-clients {{ $key == 0 ? 'active' : '' }}" data-aos="fade-up" data-aos-delay="100">
                            <div class="d-flex justify-content-center align-items-center text-center w-100">
                                @foreach ($chunk as $client)
                                    <div class="mx-3">
                                        <img src="{{ asset('storage/' . $client->logo) }}" 
                                            class="img-fluid" 
                                            alt="{{ $client->name }}" 
                                            style="max-height: 100px; object-fit: contain;">
                                    </div>
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
    </div>
@endsection
