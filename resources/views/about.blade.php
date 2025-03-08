@extends('layouts.app')

@section('title', 'Sobre Nosotros')

@section('content')
    <div class="container my-5">
        <!-- Sección sobre la empresa -->
        <section class="my-5">
            <div class="row">
                <!-- Texto descriptivo -->
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
                <!-- Imagen y enlace de WhatsApp -->
                <div class="col-md-4 position-relative text-center" data-aos="fade-left" data-aos-duration="1000">
                    <img src="{{ asset('images/sobre-nosotros.jpg') }}" class="img-fluid rounded shadow" alt="Proyecto de contenedor">
                    <a href="https://wa.me/57XXXXXXXXX" target="_blank">
                        <img src="{{ asset('images/whatsapp-icon.png') }}" class="position-absolute" style="width: 50px; right: 20px; bottom: 20px;" alt="WhatsApp">
                    </a>
                </div>
            </div>
        </section>

        <!-- Sección de clientes -->
        <section class="my-5">
            <h3 class="fw-bold text-center mb-4" data-aos="fade-up">Nuestros Clientes</h3>
            <div id="clientsCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-aos="fade-up">
                <div class="carousel-inner">
                    @foreach ($clients->chunk(3) as $key => $chunk)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" data-aos="fade-up" data-aos-delay="100">
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
    </div>
@endsection

@push('scripts')
    <!-- Si necesitas scripts específicos para About, agrégalos aquí -->
@endpush
