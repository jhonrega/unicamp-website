<div class="container mt-3">
    <h2 class="text-center" style="margin-bottom: 2rem;">Últimos proyectos realizados</h2>

    <div id="projectsCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($projects->chunk(3) as $key => $projectChunk)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <div class="row justify-content-center">
                        @foreach ($projectChunk as $project)
                            <div class="col-md-4 d-flex justify-content-center">
                                <!-- Aumentamos el tamaño de la tarjeta -->
                                <div class="card project-card text-center shadow-lg" style="width: 22rem;">
                                    <img src="{{ asset($project->image) }}" class="card-img-top" alt="{{ $project->title }}">
                                    <div class="card-body">
                                        <h6 class="card-title fw-bold">{{ $project->title }}</h6>
                                        <p class="card-text">Especificaciones técnicas</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Flechas de navegación -->
        <button class="carousel-control-prev" type="button" data-bs-target="#projectsCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#projectsCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>

    <!-- Botón Cotizar -->
    <div class="text-center mt-3">
        <a href="#" class="btn btn-cotizar px-4 py-2">Cotiza Aquí</a>
    </div>
</div>
