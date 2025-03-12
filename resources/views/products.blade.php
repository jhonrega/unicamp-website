@extends('layouts.app')

@section('title', 'Productos')

@section('content')
<div class="container my-5" data-aos="zoom-in" data-aos-duration="1200">
    <h1 class="section-title text-center mb-5 fs-2 fw-bold" style="margin-top:30px">Catálogo de Productos</h1>

    <div class="row row-cols-1 gy-4" data-aos="fade-up" data-aos-delay="200">
        @foreach($products as $product)
            <div class="col" data-aos="fade-up" data-aos-delay="300">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h3 class="text-center fw-bold mb-4">{{ $product->nombre }}</h3>

                        <div class="row align-items-center g-3">
                            <div class="col-md-6 d-flex justify-content-center" data-aos="fade-right" data-aos-delay="400">
                                @php
                                    $imgs = $product->imagenes;
                                    if (is_string($imgs) && !empty($imgs)) {
                                        $imgs = [$imgs];
                                    } elseif (!is_array($imgs)) {
                                        $imgs = [];
                                    }
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
                                                         style="height: 250px; object-fit: cover; cursor: pointer;"
                                                         onclick="openModal('{{ asset('storage/' . $img) }}', {{ $product->id }})">
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

                                    <!-- Modal para mostrar la imagen completa -->
                                    <div class="modal fade" id="imageModal{{ $product->id }}" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">{{ $product->nombre }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <img id="modalImage{{ $product->id }}" src="" class="img-fluid rounded shadow">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <p class="text-muted">Sin imágenes</p>
                                @endif
                            </div>

                            <div class="col-md-6 d-flex flex-column justify-content-center text-start" data-aos="fade-left" data-aos-delay="500">
                                <h5 class="fw-bold">Descripción:</h5>
                                <p class="fs-5" style="text-align: justify;">
                                    {{ $product->descripcion }}
                                </p>

                                @php
                                    $spec = $product->especificaciones;
                                @endphp

                                @if(!empty($spec))
                                    <h5 class="fw-bold">Especificaciones:</h5>

                                    @if(is_array($spec))
                                        @if(array_key_exists(0, $spec) && is_array($spec[0]))
                                            @php
                                                $subArray = $spec[0];
                                            @endphp
                                            <ul class="list-group list-group-flush mb-3">
                                                @foreach($subArray as $clave => $valor)
                                                    @php
                                                        if($clave === 'clave') {
                                                            $items = preg_split('/(?=[A-Z][a-z]+:)/', $valor);
                                                        } else {
                                                            $items = [$clave . ': ' . $valor];
                                                            $clave = ''; 
                                                        }
                                                    @endphp

                                                    @foreach($items as $line)
                                                        @php
                                                            $line = trim($line);
                                                        @endphp
                                                        @if(!empty($line))
                                                            <li class="list-group-item" style="text-align: justify;">
                                                                {{ $line }}
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </ul>
                                        @else
                                            <ul class="list-group list-group-flush mb-3">
                                                @foreach($spec as $clave => $valor)
                                                    <li class="list-group-item">
                                                        <strong>{{ ucfirst($clave) }}:</strong> {{ $valor }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    @else
                                        @php
                                            $items = preg_split('/(?=[A-Z][a-z]+:)/', $spec);
                                        @endphp
                                        <ul class="list-group list-group-flush mb-3">
                                            @foreach($items as $item)
                                                @php
                                                    $item = trim($item);
                                                @endphp
                                                @if(!empty($item))
                                                    <li class="list-group-item" style="text-align: justify;">
                                                        {{ $item }}
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    @endif
                                @endif

                                @if(!empty($product->medidas))
                                    <p class="fs-5" style="text-align: justify;">
                                        {{ $product->medidas }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Script para manejar el modal -->
<script>
    function openModal(imageSrc, productId) {
        let modalElement = document.getElementById("imageModal" + productId);
        let modalImage = document.getElementById("modalImage" + productId);

        if (modalImage && modalElement) {
            modalImage.src = imageSrc;

            let modalInstance = bootstrap.Modal.getInstance(modalElement);
            if (!modalInstance) {
                modalInstance = new bootstrap.Modal(modalElement);
            }

            modalInstance.show();
        }
    }
</script>

@endsection