<header style="width: 100vw; position: relative;">
  <!-- Menú de navegación -->
  <nav style="
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 20px;
    background-color: rgba(255, 255, 255, 0.95);
    position: fixed;
    width: 100%;
    top: 0;
    left: 0;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    z-index: 1000;
  ">
    <!-- Logo -->
    <div style="flex-shrink: 0;">
      <a href="{{ url('/') }}">
        <img src="{{ asset('images/logo-unicamp.png') }}" alt="Logo UNICAMP" style="height: 60px;">
      </a>
    </div>

    <!-- Menú hamburguesa (solo en móviles) -->
    <div class="menu-toggle" onclick="toggleMenu()">
      <span></span>
      <span></span>
      <span></span>
    </div>

    <!-- Opciones de menú -->
    <div id="nav-links" class="nav-links">
      <a href="{{ url('/about') }}" class="menu-btn">Sobre Nosotros</a>
      <a href="#products" class="menu-btn">Productos</a>
      <a href="{{ url('/services') }}" class="menu-btn">Servicios</a>
      <a href="#contact" class="menu-btn">Contáctanos</a>
    </div>
  </nav>

  <!-- Imagen de fondo y palabras -->
  @if(Request::is('/'))
  <div class="hero-section">
    <div class="overlay"></div>
    <div class="hero-text">
      <span data-aos="fade-right" data-aos-duration="1000">INNOVACIÓN</span>
      <span data-aos="fade-right" data-aos-duration="1200">CALIDAD</span>
      <span data-aos="fade-right" data-aos-duration="1400">SEGURIDAD</span>
      <span data-aos="fade-right" data-aos-duration="1600">PORTABILIDAD</span>
    </div>

    <!-- Curva animada -->
    <div class="wave-container">
      <svg viewBox="0 0 1440 320" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
        <path class="wave-path" fill="#ffffff" fill-opacity="1" 
          d="M0,160L80,170.7C160,181,320,203,480,197.3C640,192,800,160,960,144C1120,128,1280,128,1360,128L1440,128V320H0Z">
        </path>
      </svg>
    </div>
  </div>
  @endif
</header>

<!-- Estilos -->
<style>
  /* Ajustar margen para que el menú no cubra la imagen */
  .hero-section {
    margin-top: 90px;
    width: 100%;
    height: calc(100vw * (480 / 1280));
    background-image: url('{{ asset('images/fondo.jpg') }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    position: relative;
    display: flex;
    justify-content: flex-end;
    align-items: center;
    padding-right: 5%;
    overflow: hidden;
  }

  .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100%;
  }

  /* Ajuste del tamaño del texto dinámicamente */
  .hero-text {
      position: relative;
      z-index: 2;
      text-align: center;
      font-family: 'Arial', sans-serif;
      font-size: 2.5vw; /* Se ajusta mejor en todas las pantallas */
      font-weight: bold;
      color: #ffffff;
      display: flex;
      flex-direction: column;
      gap: 10px;
      padding: 20px;
      border-radius: 10px;
      background: rgba(0, 0, 0, 0.4);
      max-width: 80%;
  }

  /* Ajustes para pantallas más pequeñas */
  @media (max-width: 1024px) {
      .hero-text {
          font-size: 2vw;
      }
  }

  @media (max-width: 768px) {
      .hero-text {
          font-size: 4vw;
      }
  }

  @media (max-width: 480px) {
      .hero-text {
          font-size: 5vw;
      }
  }

  /* Contenedor de la curva */
  .wave-container {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 120px;
      overflow: hidden;
  }

  /* SVG de la onda */
  .wave-container svg {
      width: 100%;
      height: 100%;
  }

  /* Animación de la curva */
  .wave-path {
      animation: wave-move 3s infinite ease-in-out;
  }

  @keyframes wave-move {
      0% { transform: translateY(0); }
      50% { transform: translateY(25px); }
      100% { transform: translateY(0); }
  }

  /* Estilos del menú */
  .nav-links {
    display: flex;
    gap: 20px;
    align-items: center;
  }

  .menu-btn {
    font-family: Arial, sans-serif;
    font-size: 16px;
    font-weight: bold;
    text-decoration: none;
    color: #333;
    padding: 10px 16px;
    border-radius: 25px;
    background-color: transparent;
    transition: all 0.3s ease;
  }

  .menu-btn:hover {
    background-color: #1c1937;
    color: white;
  }

  /* Botón hamburguesa */
  .menu-toggle {
    display: none;
    flex-direction: column;
    cursor: pointer;
    gap: 5px;
  }

  .menu-toggle span {
    width: 25px;
    height: 3px;
    background: #333;
    border-radius: 3px;
  }

  /* Ajuste para pantallas pequeñas */
  @media (max-width: 768px) {
    .menu-toggle {
      display: flex;
    }

    .nav-links {
      display: none;
      flex-direction: column;
      gap: 10px;
      width: 100%;
      position: absolute;
      top: 60px;
      left: 0;
      background: white;
      padding: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .nav-links.show {
      display: flex;
    }
  }

  /* Ajuste de la curva en dispositivos pequeños */
  @media (max-width: 768px) {
      .wave-container {
          height: 80px;
      }
  }

  @media (max-width: 480px) {
      .wave-container {
          height: 60px;
      }
  }
</style>

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
  AOS.init();

  function toggleMenu() {
    var navLinks = document.getElementById("nav-links");
    navLinks.classList.toggle("show");
  }
</script>
