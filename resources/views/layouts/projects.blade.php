<!-- Agrega la librería Slick en el head de tu layout si aún no lo has hecho -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css"/>

<div class="container my-3" data-aos="fade-up">
    <h2 class="text-center mb-4">Últimos proyectos realizados</h2>

    @if ($projects->count() > 0) 
        <div class="project-carousel">
            @foreach ($projects as $project)
                <div class="project-item">
                    <div class="card project-card text-center" data-aos="zoom-in">
                        <img src="{{ asset('storage/' . $project->image) }}" 
                            alt="{{ $project->title ?? 'Imagen del proyecto' }}" 
                            class="card-img-top img-fluid">

                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $project->title }}</h5>
                            <p class="card-text">{{ $project->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Botón Cotiza Aquí alineado -->
        <div class="text-center mt-4">
            <a href="#" class="btn btn-cotizar">Cotiza Aquí</a>
        </div>
    @else
        <p class="text-center">No hay proyectos disponibles.</p>
    @endif
</div>

<!-- Agrega los scripts de Slick.js al final -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>

<script>
    $(document).ready(function(){
        $('.project-carousel').slick({
            slidesToShow: 3, // Número de tarjetas visibles
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            dots: true, // Activa los indicadores
            arrows: false, // Oculta los controles adicionales
            responsive: [
                {
                    breakpoint: 1024,
                    settings: { slidesToShow: 2 }
                },
                {
                    breakpoint: 768,
                    settings: { slidesToShow: 1 }
                }
            ]
        });
    });
</script>
