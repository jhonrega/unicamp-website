<header style="
  width: 100vw;
  @if(Request::is('/')) 
    height: calc(100vw * (480 / 1280)); /* Mostrar imagen solo en inicio */
    background-image: url('{{ asset('images/fondo.jpg') }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
  @else
    height: auto; /* Altura automática en otras páginas */
    background-color: #fff; /* Color de fondo sin imagen */
  @endif
  position: relative;
">
  <!-- Menú de navegación superior -->
  <nav style="
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 20px; /* Ajuste de padding */
    background-color: rgba(255, 255, 255, 0.9);
    position: fixed;
    width: 100%;
    top: 0;
    left: 0;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    z-index: 1000;
    height: auto; /* Altura automática para adaptarse al contenido */
    flex-wrap: wrap; /* Permitir ajuste en pantallas pequeñas */
  ">
    <!-- Logo de la empresa -->
    <div style="flex-shrink: 0;">
        <a href="{{ url('/') }}"><img src="{{ asset('images/logo-unicamp.png') }}" alt="Logo UNICAMP" style="height: 60px;"></a>
    </div>

    <!-- Opciones de menú -->
    <div style="
      display: flex;
      flex-wrap: wrap; /* Permitir ajuste de elementos */
      gap: 20px;
      align-items: center;
    ">
      <a href="{{ url('/about') }}" class="menu-btn">Sobre Nosotros</a>
      <a href="#products" class="menu-btn">Productos</a>
      <a href="#services" class="menu-btn">Servicios</a>
      <a href="#contact" class="menu-btn">Contáctanos</a>
    </div>
  </nav>
</header>

<!-- Estilos de los botones -->
<style>
  body {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
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

  /* Responsividad para pantallas pequeñas */
  @media (max-width: 768px) {
    nav {
      flex-direction: column;
      align-items: flex-start;
      padding: 10px 10px;
    }

    .menu-btn {
      padding: 8px 12px;
      font-size: 14px;
    }

    img {
      height: 40px; /* Reducir tamaño del logo */
    }
  }
</style>
