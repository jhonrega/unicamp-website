<header style="width: 100vw; position: relative;">
  <!-- Menú de navegación -->
  <nav id="navbar">
    <!-- Logo -->
    <div class="logo">
      <a href="{{ url('/') }}">
        <img src="{{ asset('images/logo-unicamp.webp') }}" alt="Logo UNICAMP">
      </a>
    </div>

    <!-- Menú hamburguesa -->
    <div class="menu-toggle" onclick="toggleMenu()">
      <span></span>
      <span></span>
      <span></span>
    </div>

    <!-- Opciones de menú -->
    <div id="nav-links" class="nav-links">
      <a href="{{ url('/about') }}" class="menu-btn {{ Request::is('about') ? 'active' : '' }}">Sobre Nosotros</a>
      <a href="{{ url('/products') }}" class="menu-btn {{ Request::is('products') ? 'active' : '' }}">Productos</a>
      <a href="{{ url('/services') }}" class="menu-btn {{ Request::is('services') ? 'active' : '' }}">Servicios</a>
      <a href="{{ url('/contacto') }}" class="menu-btn {{ Request::is('contacto') ? 'active' : '' }}">Contáctanos</a>
    </div>
  </nav>

  <!-- Imagen de fondo con palabras -->
  @if(Request::is('/'))
    <div class="hero-section" data-aos="zoom-in" data-aos-duration="1000">
      <div class="overlay"></div>
      <div class="hero-text" data-aos="fade-up" data-aos-duration="1000">
        <span id="typewriter-text"></span>
      </div>
    </div>
  @endif
</header>

<!-- Estilos -->
<style>
/* HERO SECTION */
.hero-section {
    margin-top: 90px;
    width: 100vw; /* Asegura que solo ocupe el ancho del viewport */
    max-width: 100%;
    height: calc(100vw * (480 / 1280)); /* Mantiene la proporción */
    background-image: url('{{ asset('images/fondo.webp') }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

</style>

<!-- Scripts -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const navbar = document.getElementById("navbar");
    const navLinks = document.getElementById("nav-links");

    window.addEventListener('scroll', function () {
      navbar.classList.toggle("scrolled", window.scrollY > 50);
    });

    window.toggleMenu = function () {
      navLinks.classList.toggle("show");
    };

    // Animación de caída de letras
    const words = ["INNOVACIÓN", "CALIDAD", "SEGURIDAD", "MODULAR"];
    const textElement = document.getElementById("typewriter-text");
    let wordIndex = 0;

    function animateWord() {
      textElement.innerHTML = ""; // Limpiar el contenido antes de escribir la nueva palabra
      const currentWord = words[wordIndex].split("");

      currentWord.forEach((letter, index) => {
        let span = document.createElement("span");
        span.textContent = letter;
        span.style.animationDelay = `${index * 0.1}s`; // Retraso para cada letra
        textElement.appendChild(span);
      });

      wordIndex = (wordIndex + 1) % words.length;
      setTimeout(animateWord, 2500); // Pausa antes de la siguiente palabra
    }

    animateWord();
  });
</script>
