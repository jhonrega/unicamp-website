@extends('layouts.app')

@section('title', 'Servicios')

@section('content')
    <!-- Ajusta margin-top y padding-top para separar el contenido del header -->
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
            <div class="row g-5 mb-5 {{ $key % 2 == 0 ? '' : 'flex-row-reverse' }}"
                 data-aos="fade-up"
                 data-aos-delay="{{ $key * 100 }}">

                <div class="col-md-6" data-aos="fade-right">
                    <h3>{{ $service->title }}</h3>
                    <p>{{ $service->description }}</p>
                    <a href="#" class="btn btn-dark">Cotiza Aquí</a>
                </div>

                <div class="col-md-6" data-aos="fade-left">
                    <img src="{{ asset('storage/' . $service->image) }}"
                         class="img-fluid modern-img"
                         alt="{{ $service->title }}">
                </div>
            </div>
        @endforeach
    </div>
@endsection
