<div class="project-carousel-container" data-aos="fade-up">
    <h2 class="text-center mb-4" data-aos="fade-down">Últimos proyectos realizados</h2>

    @if ($projects->count() > 0)
        <div class="carousel-wrapper">
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
        </div>

        <!-- Botón Cotiza Aquí -->
        <div class="text-center mt-4">
            <a href="#" class="btn-cotizar" data-aos="fade-up">Cotiza Aquí</a>
        </div>
    @else
        <p class="text-center" data-aos="fade-right">No hay proyectos disponibles.</p>
    @endif
</div>



<!-- Agrega también los estilos de Slick -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css"/>
<!-- Agrega los scripts de Slick.js -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>

<script>
    $(document).ready(function(){
        $('.project-carousel').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true, // Activa el autoplay
            autoplaySpeed: 3000, // Cambio cada 3 segundos
            speed: 800, // Velocidad suave
            cssEase: 'ease-in-out',
            infinite: true, // Permite el loop infinito
            arrows: true,
            dots: false,
            prevArrow: '<button class="slick-prev">&#10094;</button>',
            nextArrow: '<button class="slick-next">&#10095;</button>',
            pauseOnHover: false, // No se pausa cuando el mouse está encima
            pauseOnFocus: false, // No se pausa al hacer clic
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
