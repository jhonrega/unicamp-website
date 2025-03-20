<!-- Contenedor del carrusel y sus controles -->
<div class="project-carousel-container" data-aos="fade-up">
    <h2 class="text-center" data-aos="fade-down">Últimos proyectos realizados</h2>

    @if ($projects->count() > 0)
        <div class="project-carousel">
            @foreach ($projects as $project)
                <div class="project-item" data-aos="zoom-in">
                    <div class="project-card" data-aos="flip-left">
                        <img src="{{ asset('storage/' . $project->image) }}" 
                            alt="{{ $project->title ?? 'Imagen del proyecto' }}" 
                            class="project-img" data-aos="fade-in">
                        <h5 class="project-title">{{ $project->title }}</h5>
                        <p class="project-description">{{ $project->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Contenedor para alinear los puntos y el botón -->
        <div class="carousel-controls">
            <a href="/contacto" class="btn-cotizar" data-aos="fade-up">Cotiza Aquí</a>
        </div>
    @else
        <p class="text-center" data-aos="fade-right">No hay proyectos disponibles.</p>
    @endif
</div>

<!-- Agrega los scripts de Slick.js -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>

<script>
    $(document).ready(function(){
        $('.project-carousel').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: false,
            infinite: true,
            centerMode: false,
            variableWidth: false,
            initialSlide: 0,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: { slidesToShow: 2 }
                },
                {
                    breakpoint: 768,
                    settings: { 
                        slidesToShow: 1, 
                        centerMode: true,  /* 🔹 Activa centrado en móviles */
                        variableWidth: false 
                    }
                }
            ]
        });
    });
</script>
