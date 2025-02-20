<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ite educabol</title>
    <link rel="stylesheet" href="{{ asset('welcome/css/encabezado.css')}}">
    <link rel="stylesheet" href="{{ asset('welcome/css/hero.css')}}">
    <link rel="stylesheet" href="{{ asset('welcome/css/lineatiempo.css')}}">
    <link rel="stylesheet" href="{{ asset('welcome/css/datosimportantes.css')}}">
    <link rel="stylesheet" href="{{ asset('welcome/css/interactive-map.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="{{ asset('welcome/css/comunity.css')}}">
    <link rel="stylesheet" href="{{ asset('welcome/css/comentario.css')}}">
    <link rel="stylesheet" href="{{ asset('welcome/css/foot.css')}}">
    <link rel="stylesheet" href="{{ asset('welcome/css/itenautas.css')}}">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('welcome/css/disruptivos.css')}}">

    <link rel="stylesheet" href="assets/vendors/owl/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl/assets/owl.theme.default.min.css">
    
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="{{asset('assets/vendors/bootstrap/bootstrap.css')}}"> --}}



    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
      .grecaptcha-badge { visibility: hidden !important; }
    </style>
</head>
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
            <li><a href="https://services.ite.com.bo">Servicios</a></li>
        </ul>
        <div id="auth-options" class="auth-options">
            @auth
                <!-- Si el usuario está autenticado -->
                <a href="{{ route('home') }}" class="cta-button">Sistema</a>
                <a href="{{ route('logout') }}" class="cta-button" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Salir</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endauth
    
            @guest
                <!-- Si el usuario NO está autenticado -->
                <a href="{{ route('login') }}" class="cta-button">Login</a>
            @endguest
        </div>
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
  

  {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% S E C C I O N  L I N E A   D E   T I E M P O   %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
  {{-- <section id= "timeline">
    <ul class= "line">
      <li>
        <div class="cont">
          <h3>PENSAMIENTO</h3>
          <p>
            En el la escuela villa San Antonio el fundador de ite realizaba trabajos en primaria que constia en realizar tareas a cambio de pirulo y pan
          </p>
          <time> AÑO 1991
          </time>
        </div>
      </li>
      
      <li>
        <div class="cont">
          <h3>DOMICILIO</h3>
          <p>
            Dictaba clases a domicilio a estudiantes de diferentes colegios.
          </p>
          <time>MARZO 2002</time>
        </div>
      </li>
      <li>
        <div class="cont">
          <h3>FUNDACION DE ITE</h3>
          <p>
            Fundó, la institucion ite con fin de apoyar a estudiantes de diferentes grados, colegios, instituto y universidades. 
          </p>
          <time>15 Abril 2009</time>
        </div>
      </li>
      <li>
        <div class="cont">
          <h3>PRIMERA SUCURSAL</h3>
          <p>
            Inauguracion de la primer sucursal, actualmente ofina central. 
          </p>
          <time>SEP. 2017</time>
        </div>
      </li>
      <li>
        <div class="cont">
          <h3>SUCURSAL PLAN 3000</h3>
          <p>
            Inauguracion de la sucursal del plan 3000 . 
          </p>
          <time>22 Ene. 2024</time>
        </div>
      </li>
    </ul>
    
  </section> --}}
  <!-- End Timeline -->
  
  {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% SECCION METRICAS DATOS %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
  <div class="impact-metrics">
    <h2>Cifras Impactantes</h2>
    <div class="metrics-container">
      <div class="metric">
        <h3 class="number" data-target="16500">0</h3>
        <p>Clientes</p>
      </div>
      <div class="metric">
        <h3 class="number" data-target="17">0</h3>
        <p>Años de experiencia</p>
      </div>
      <div class="metric">
        <h3 class="number" data-target="21700">0</h3>
        <p>Seguidores en tik tok</p>
      </div>
      <div class="metric">
        <h3 class="number" data-target="150">0</h3>
        <p>Equipos Formados</p>
      </div>
    </div>
  </div>
  
  {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% SECCION  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}


  
  {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% S E C C I O N   E X P L O R A R   N U E S T R A   C O M U N I D A D %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
  <section class="community-highlights">
    <h2>Explora Nuestra Comunidad</h2>
    <p>Conoce a las personas que hacen posible nuestro proyecto.</p>
    <div class="swiper">
      <!-- Wrapper necesario -->
      <div class="swiper-wrapper">
        <!-- Slides -->
        <div class="swiper-slide card">
          <img src="{{ asset('welcome/images/persona1.png') }}" alt="Foto de persona 1">
          <h3>Juan Pérez</h3>
          <p>Voluntario desde 2019, contribuyendo con talleres educativos para jóvenes.</p>
        </div>
        <div class="swiper-slide card">
          <img src="{{ asset('welcome/images/persona2.png') }}" alt="Foto de persona 2">
          <h3>María Gómez</h3>
          <p>Especialista en tecnología, impulsando innovaciones dentro del proyecto.</p>
        </div>
        <div class="swiper-slide card">
          <img src="{{ asset('welcome/images/persona3.png') }}" alt="Foto de persona 3">
          <h3>Carlos Sánchez</h3>
          <p>Director del programa de capacitación, liderando equipos desde 2020.</p>
        </div>
        <div class="swiper-slide card">
          <img src="{{ asset('welcome/images/persona4.png') }}" alt="Foto de persona 4">
          <h3>Ana López</h3>
          <p>Coordinadora de logística, asegurando la eficiencia de nuestros eventos.</p>
        </div>
      </div>
      <!-- Paginación -->
      <div class="swiper-pagination"></div>
      <!-- Botones de navegación -->
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
      <!-- Scrollbar (opcional) -->
      <div class="swiper-scrollbar"></div>
    </div>
  </section>
  
  {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% SECCION proyectos disruptivos  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
  <section class="innovation-showcase">
    <h2>Zona de Innovación</h2>
    <p>Descubre las tecnologías y herramientas que impulsan nuestro proyecto.</p>
    <div class="innovation-grid">
      <div class="innovation-card" data-aos="fade-up" data-aos-duration="800">
        <img src="{{ asset('welcome/images/persona1.png') }}" alt="Tecnología 1">
        <h3>Inteligencia Artificial</h3>
        <p>Implementamos IA para optimizar procesos y crear experiencias personalizadas.</p>
      </div>
      <div class="innovation-card" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
        <img src="{{ asset('welcome/images/persona2.png') }}" alt="Tecnología 2">
        <h3>Realidad Aumentada</h3>
        <p>Explora nuevas dimensiones con experiencias inmersivas en tiempo real.</p>
      </div>
      <div class="innovation-card" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
        <img src="{{ asset('welcome/images/persona3.png') }}" alt="Tecnología 3">
        <h3>Blockchain</h3>
        <p>Seguridad y transparencia en cada transacción, revolucionando el futuro.</p>
      </div>
      <div class="innovation-card" data-aos="fade-up" data-aos-duration="800" data-aos-delay="600">
        <img src="{{ asset('welcome/images/persona4.png') }}" alt="Tecnología 4">
        <h3>Automatización</h3>
        <p>Soluciones automatizadas que aumentan la eficiencia y reducen costos.</p>
      </div>
    </div>
  </section>
  
  
  {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% S E C C I O N   C O  M E N T A R I O S  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}

  <div class="form-container">
    <form id="contactForm">
        <h2>Dejanos un comentario</h2>
        @csrf
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" placeholder="Ingresa tu teléfono" required>

        <label for="comentario">Comentario:</label>
        <textarea id="comentario" name="comentario" placeholder="Ingresa tu comentario" required></textarea>

        <div class="g-recaptcha" data-sitekey="6LeTgu4hAAAAAJap9DHePvq0wM93VXz2HJmLPZIy"></div>

        <button type="submit">Enviar</button>
    </form>
</div>

  {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% SECCION ITENAUTAS  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
  <section id="itenautas" class="itenautas">
    <div class="itenautas-container">
      <h2 class="itenautas-title">¡Forma parte de la comunidad Itenauta!</h2>
      <p class="itenautas-description">
        Participa, comparte y gana <strong>ITECOINS</strong>. ¡Cambia tu participación por increíbles premios y beneficios!
      </p>
  
      <div class="itenautas-grid">
        <div class="itenauta-item">
          <i class="fas fa-share-alt"></i>
          <h3>Comparte en Redes</h3>
          <p>Publica contenido de ITE y gana hasta <strong>50 ITECOINS</strong>.</p>
        </div>
        <div class="itenauta-item">
          <i class="fas fa-heart"></i>
          <h3>Dale Me Gusta</h3>
          <p>Cada 'like' suma <strong>10 ITECOINS</strong>. ¡Apóyanos!</p>
        </div>
        <div class="itenauta-item">
          <i class="fas fa-video"></i>
          <h3>Crea Videos</h3>
          <p>Graba contenido sobre ITE y obtén <strong>100 ITECOINS</strong>.</p>
        </div>
        <div class="itenauta-item">
          <i class="fas fa-user-friends"></i>
          <h3>Invita Amigos</h3>
          <p>Por cada referido activo, gana <strong>80 ITECOINS</strong>.</p>
        </div>
      </div>
  
      <div class="itenautas-cta">
        <a href="{{ route('itenautas.itecoins') }}" class="btn-action">Más información </a>
      </div>
    </div>
  </section>
  
  
  {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% SECCION PIE DE PAGINA  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
  {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% SECCION PIE DE PAGINA  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
  {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% SECCION PIE DE PAGINA  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
  {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% SECCION PIE DE PAGINA  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
  {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% SECCION PIE DE PAGINA  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
  <footer class="footer">
    <div class="footer-container">
      <!-- Información de la empresa -->
      <div class="footer-section">
        <h3>ITE - Innovación y Tecnología Educativa</h3>
        <p>Dirección: Calle Ejemplo #123, Santa Cruz, Bolivia</p>
        <p>Teléfono: +591 71324941</p>
        <p>Email: info@ite.com.bo</p>
      </div>
  
      <!-- Enlaces rápidos -->
      <div class="footer-section">
        <h4>Enlaces Rápidos</h4>
        <ul>
          <li><a href="#inicio">Inicio</a></li>
          <li><a href="#nosotros">Nosotros</a></li>
          <li><a href="#servicios">Servicios</a></li>
          <li><a href="#contacto">Contacto</a></li>
        </ul>
      </div>
  
      <!-- Redes sociales -->
      <div class="footer-section">
        <h4>Síguenos en</h4>
        <div class="social-links">
          <a href="https://www.facebook.com/ite" target="_blank">Facebook</a>
          <a href="https://www.instagram.com/ite" target="_blank">Instagram</a>
          <a href="https://www.twitter.com/ite" target="_blank">Twitter</a>
        </div>
      </div>
    </div>
  
    <div class="footer-bottom">
      <p>&copy; 2024 ITE. Todos los derechos reservados.</p>
    </div>
  </footer>
  
  {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% SECCION  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
  {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% SECCION  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
  {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% SECCION  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}



    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{asset('dist/js/booth/jquery-1.9.1.min.js')}}"></script> 
	  <script src="{{asset('dist/js/booth/owl.carousel.js')}}"></script>


    <script src="{{ asset('welcome/js/encabezado.js') }}"></script>
    <script src="{{ asset('welcome/js/hero.js') }}"></script>
    <script src="{{ asset('welcome/js/lineatiempo.js') }}"></script>
    <script src="{{ asset('welcome/js/datosimportantes.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="{{ asset('welcome/js/comunity.js') }}"></script>
    <script src="{{ asset('welcome/js/disruptivos.js') }}"></script>
    <script src="{{ asset('welcome/js/comentario.js') }}"></script>
    <script src="{{ asset('welcome/js/itenauta.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</body>
</html>

{{-- 

Encabezado (Header): Ya trabajado.
Sección de Hero (Portada Principal): Ya trabajada.
Nuestro Viaje en Tiempos (Interactive Timeline): Una línea del tiempo interactiva que muestra la evolución o hitos importantes.
Cifras Impactantes (Impact Metrics): Presentar estadísticas llamativas con animaciones para atraer la atención.
Explora Nuestra Comunidad (Community Highlights): Una sección con fotos y breves historias de personas relacionadas con el proyecto.

Zona de Innovación (Innovation Showcase): Espacio para destacar tecnologías, herramientas o proyectos disruptivos.

Detrás de Escena (Behind the Scenes): Mostrar contenido exclusivo sobre cómo trabajan o crean lo que ofrecen.
Mapa Interactivo (Interactive Map): Un mapa donde los usuarios puedan explorar ubicaciones relacionadas con el proyecto o servicios.
Historias Inspiradoras (Inspiring Stories): Testimonios o historias contadas en formato de carrusel o video.
Explora el Futuro (Future Vision): Una sección animada que explique planes a futuro con gráficos llamativos.

Eventos y Talleres (Events & Workshops): Calendario interactivo de próximos eventos o talleres.

Zona de Feedback (Your Voice Matters): Espacio para que los visitantes dejen sus opiniones con encuestas o mensajes.

Redes Sociales en Vivo (Social Media Live Feed): Panel dinámico mostrando contenido en tiempo real desde redes sociales.
Zona de Juegos o Retos (Interactive Challenges): Pequeñas dinámicas interactivas, como trivias relacionadas con el proyecto.
Colaboradores Clave (Key Collaborators): Destacar aliados estratégicos o marcas asociadas, pero de forma creativa (ejemplo: con animaciones).
Experiencia Virtual (Virtual Experience): Una galería inmersiva con realidad aumentada o un video 360°.
CTA de Video Personalizado (Personalized Video CTA): Un video que anime al usuario a tomar acción (inscribirse, contactar, etc.).
Reconocimientos y Logros (Awards & Achievements): Trofeos o certificados destacados en un formato atractivo.
Galería de Inspiración (Inspiration Gallery): Un muro interactivo con imágenes o videos inspiradores que reflejen la misión de la página.
¿Te interesa trabajar en alguna de estas nuevas ideas o tienes otra sección en mente que quieras desarrollar primero? 😊

--}}
