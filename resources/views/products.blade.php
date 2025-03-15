@extends('layouts.app')

@section('title', 'Productos')

@section('content')
<div class="container my-5" data-aos="zoom-in" data-aos-duration="1200">
    <h1 class="section-title text-start mb-5 fs-2 fw-bold" style="margin-top:30px">Catálogo de Contenedores:</h1>

    <div class="row row-cols-1 gy-4" data-aos="fade-up" data-aos-delay="200">
        @foreach($products as $product)
            <div class="col" data-aos="fade-up" data-aos-delay="300">
                <div class="card-products h-100 shadow-sm">
                    <div class="card-body-products">
                        <h3 class="text-center fw-bold mb-4 card-title-products">{{ $product->nombre }}</h3>

                        <div class="row align-items-center g-3">
                            {{-- Imágenes del Producto --}}
                            <div class="col-md-6 d-flex justify-content-center" data-aos="fade-right" data-aos-delay="400">
                                @php
                                    $imgs = $product->imagenes;
                                    $imgs = is_string($imgs) ? json_decode($imgs, true) : $imgs;
                                    $imgs = is_array($imgs) ? $imgs : [];
                                @endphp

                                @if(count($imgs) > 0)
                                    <div id="productCarousel{{ $product->id }}" 
                                         class="carousel slide" 
                                         data-bs-ride="carousel"
                                         style="width: 80%;">
                                        <div class="carousel-inner rounded shadow">
                                            @foreach($imgs as $index => $img)
                                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                    <img src="{{ asset('storage/' . $img) }}"
                                                         alt="Imagen de {{ $product->nombre }}"
                                                         class="d-block w-100 img-fluid"
                                                         style="height: 250px; object-fit: cover;">
                                                </div>
                                            @endforeach
                                        </div>
                                        <button class="carousel-control-prev" type="button"
                                                data-bs-target="#productCarousel{{ $product->id }}"
                                                data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Anterior</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                                data-bs-target="#productCarousel{{ $product->id }}"
                                                data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Siguiente</span>
                                        </button>
                                    </div>
                                @else
                                    <p class="text-muted">Sin imágenes</p>
                                @endif
                            </div>

                            {{-- Descripción y Especificaciones --}}
                            <div class="col-md-6 d-flex flex-column justify-content-center text-start" data-aos="fade-left" data-aos-delay="500">
                                <h5 class="fw-bold">Descripción:</h5>
                                <p class="fs-5 card-text-products" style="text-align: justify;">
                                    {{ $product->descripcion }}
                                </p>

                                {{-- Especificaciones Técnicas --}}
                                @php
                                    $spec = is_string($product->especificaciones) ? json_decode($product->especificaciones, true) : $product->especificaciones;
                                    $spec = is_array($spec) ? $spec : [];
                                @endphp

                                @if(!empty($spec))
                                    <h5 class="fw-bold">Especificaciones:</h5>
                                    <ul class="list-group list-group-flush mb-3">
                                        @foreach($spec as $item)
                                            <li class="list-group-item-products">
                                                {{ ucfirst($item['caracteristica'] ?? 'Desconocido') }}
                                                @if(!empty($item['medidas']))
                                                    <br> {{ $item['medidas'] }}
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif

                                {{-- Enlace de descarga del PDF --}}
                                @if(!empty($product->pdf))
                                    <div class="text-start mt-1">
                                        <a href="{{ asset('storage/' . $product->pdf) }}" class="btn-custom" download>
                                            Descarga <i class="fas fa-file-pdf"></i>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div> {{-- Fin de row --}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
