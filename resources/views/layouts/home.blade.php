<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ite educabol</title>
</head>
<link rel="stylesheet" href="{{ asset('welcome/css/encabezado.css')}}">
<link rel="stylesheet" href="{{ asset('welcome/css/hero.css')}}">
<body>
  {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% SECCION ENCABEZADO  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
  <header class="header">
    <div class="container">
      <div class="logo-container">
        <img src="{{ asset('welcome/images/logo.png') }}" alt="Logo" class="logo">
      </div>
      <nav class="nav">
        <ul class="nav-list">
          <li><a href="#about">Nosotros</a></li>
          <li><a href="#services">Servicios</a></li>
        </ul>
        <a href="#cta" class="cta-button">¡Contáctanos!</a>
      </nav>
      <div class="menu-toggle">
          <span></span>
          <span></span>
          <span></span>
      </div>
    </div>
  </header>

  {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% SECCION HERO  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
    

    {{-- <section class="hero" style="background-image: linear-gradient(to right, rgba(38, 186, 165, 0.8), rgba(55, 95, 122, 0.8)), url('{{ asset('welcome/images/hero-bg.jpg') }}');">
        <div class="hero-content">
            <h1 class="hero-title">Transforma tus ideas en realidad</h1>
            <p class="hero-subtitle">Creamos soluciones innovadoras que impulsan tu crecimiento.</p>
            <a href="#services" class="btn-cta">Descubre Más</a>
        </div>
    </section> --}}

    <section class="hero" id="hero-section">
      <div class="hero-content">
          <h1 class="hero-title animate-on-scroll">Transforma tus ideas en realidad</h1>
          <p class="hero-subtitle animate-on-scroll">Creamos soluciones innovadoras que impulsan tu crecimiento.</p>
          <a href="#services" class="btn-cta animate-on-scroll">Descubre Más</a>
      </div>
      {{-- <div class="hero-image animate-on-scroll">
          <img src="{{ asset('welcome/images/hero-bg.jpg') }}" alt="Hero Image">
      </div> --}}
  </section>
  

  {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% SECCION  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
  {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% SECCION  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
  {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% SECCION  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
  {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% SECCION  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
  {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% SECCION  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
  {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% SECCION  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
  {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% SECCION  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
  {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% SECCION  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
  {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% SECCION  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
  {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% SECCION  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
  {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% SECCION  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}



    
    <script src="{{ asset('welcome/js/encabezado.js') }}"></script>
    <script src="{{ asset('welcome/js/hero.js') }}"></script>
</body>
</html>
