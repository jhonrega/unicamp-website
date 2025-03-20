@extends('layouts.app')

@section('title', 'Servicios')

@section('content')
    <!-- Contenedor con margen superior -->
    <div class="container" style="margin-top: 80px; padding-top: 50px;">
        <!-- Título con animación -->
        <h1 class="section-title text-center" data-aos="fade-up">
            NUESTROS SERVICIOS
        </h1>
        
        @php
            use App\Models\Service;
            $services = Service::all();
        @endphp

        @foreach($services as $key => $service)
            <div class="row align-items-center g-5 service-item {{ $key % 2 == 0 ? '' : 'flex-row-reverse' }}"
                 data-aos="fade-up"
                 data-aos-delay="{{ $key * 100 }}">

                <div class="col-md-6 text-md-start text-center" data-aos="fade-right">
                    <h3 class="service-title">{{ $service->title }}</h3>
                    <p class="service-description">{{ $service->description }}</p>
                    <a href="/contacto" class="btn-custom">Cotiza Aquí</a>
                </div>

                <div class="col-md-6 text-center" data-aos="fade-left">
                    <img src="{{ asset('storage/' . $service->image) }}"
                         class="img-fluid modern-img"
                         alt="{{ $service->title }}">
                </div>
            </div>
        @endforeach
    </div>
@endsection
