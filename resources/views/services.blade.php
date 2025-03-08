<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios - UNICAMP SAS</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    @include('layouts.header')
    
    <!-- Se agrega estilo en línea para aumentar el margen superior -->
    <main class="container" style="margin-top: 100px;">
        <h1 class="text-center mb-4">NUESTROS SERVICIOS</h1>
        
        @php
            use App\Models\Service;
            $services = Service::all();
        @endphp

        @foreach($services as $key => $service)
            <div class="row mb-5 align-items-center {{ $key % 2 == 0 ? '' : 'flex-row-reverse' }}">
                <div class="col-md-6">
                    <h3>{{ $service->title }}</h3>
                    <p>{{ $service->description }}</p>
                    <a href="#" class="btn btn-dark">Cotiza Aquí</a>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('storage/' . $service->image) }}" class="img-fluid" alt="{{ $service->title }}">
                </div>
            </div>
        @endforeach
    </main>
    
    @include('layouts.footer')
</body>
</html>
