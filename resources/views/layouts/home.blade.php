<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITE</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Carga de fuentes locales -->
    <style>
        @font-face {
            font-family: 'GlyphaLTStd-Bold';
            src: url('homeprincipal/fonts/GlyphaLTStd-Bold.otf') format('opentype');
            font-weight: bold;
            font-style: normal;
            font-display: swap;
        }
        
        @font-face {
            font-family: 'Montserrat-Medium';
            src: url('homeprincipal/fonts/Montserrat-Medium.otf') format('opentype');
            font-weight: 500;
            font-style: normal;
            font-display: swap;
        }
        
        @font-face {
            font-family: 'Montserrat-Light';
            src: url('homeprincipal/fonts/Montserrat-Light.otf') format('opentype');
            font-weight: 300;
            font-style: normal;
            font-display: swap;
        }
        
        @font-face {
            font-family: 'Montserrat-SemiBold';
            src: url('homeprincipal/fonts/Montserrat-SemiBold.otf') format('opentype');
            font-weight: 600;
            font-style: normal;
            font-display: swap;
        }
        
        @font-face {
            font-family: 'Montserrat-Bold';
            src: url('homeprincipal/fonts/Montserrat-Bold.otf') format('opentype');
            font-weight: 700;
            font-style: normal;
            font-display: swap;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('homeprincipal/css/hero.css') }}">
    <link rel="stylesheet" href="{{ asset('homeprincipal/css/services.css') }}">
    <link rel="stylesheet" href="{{ asset('homeprincipal/css/sobresaliente.css') }}">
    <link rel="stylesheet" href="{{ asset('homeprincipal/css/eventos.css') }}">
    <link rel="stylesheet" href="{{ asset('homeprincipal/css/contactos.css') }}">
    <link rel="stylesheet" href="{{ asset('homeprincipal/css/footer.css') }}">
</head>
<body>
    <!-- Navbar -->
    <header class="navbar">
        <div class="container">
          <div class="logo">
              <a href="/">
                  <!-- Reemplazamos el texto por una imagen con clase para animación -->
                  <img src="{{ asset('welcome/images/logo.png') }}" alt="Logo ITE" class="logo-image pulse-animation">
              </a>
          </div>
            
            <!-- Menú de navegación para escritorio -->
            <nav class="nav-menu">
                <a href="#" class="nav-link">Inicio</a>
                <a href="#" class="nav-link">Cursos</a>
                <a href="#" class="nav-link">Nosotros</a>
                <a href="#" class="nav-link">Contacto</a>
                <a href="#" class="btn btn-primary">Login</a>
            </nav>
            
            <!-- Botón de menú para móvil -->
            <button class="menu-toggle" id="menuToggle">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>
        </div>
        
        <!-- Menú móvil -->
        <div class="mobile-menu" id="mobileMenu">
            <a href="#" class="nav-link">Inicio</a>
            <a href="#" class="nav-link">Cursos</a>
            <a href="#" class="nav-link">Nosotros</a>
            <a href="#" class="nav-link">Contacto</a>
            <a href="#" class="btn btn-primary">Login</a>
        </div>
    </header>
    
    <!-- Sección Hero -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text fade-in">
                    <h1>Educación innovadora con <span class="ite-text">ite</span></h1>
                    <p>Ofrecemos clases de apoyo escolar, cursos de programación, robótica, ajedrez, 
                    cubo rubik, computación, oratoria, inglés, lectura, escritura y caligrafía.</p>
                    <div class="hero-buttons">
                        <a href="#" class="btn btn-primary">Explorar cursos</a>
                        <a href="#" class="btn btn-outline">Conocer más</a>
                    </div>
                </div>
                <div class="hero-image fade-in delay">
                    <img src="https://placehold.co/600x400" alt="Estudiantes de ITE aprendiendo">
                </div>
            </div>
        </div>
    </section>

    {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  SERVICIOS %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
    <section class="services-section">
      <div class="container">
          <div class="section-header">
              <h2>Nuestros <span class="highlight">Servicios</span></h2>
              <p>Ofrecemos una amplia variedad de cursos y actividades educativas para desarrollar habilidades del siglo XXI</p>
          </div>
          
          <div class="services-grid">
              <!-- Servicio 1 -->
              <div class="service-card fade-in-scroll">
                  <div class="service-icon">
                      <img src="{{ asset('homeprincipal/icons/apoyoescolar.gif') }}" alt="Apoyo Escolar">
                  </div>
                  <h3>Apoyo Escolar</h3>
                  <p>Refuerzo académico personalizado para mejorar el rendimiento escolar en todas las materias.</p>
              </div>
              
              <!-- Servicio 2 -->
              <div class="service-card fade-in-scroll">
                  <div class="service-icon">
                      <img src="{{ asset('homeprincipal/icons/programacion.gif') }}" alt="Programación">
                  </div>
                  <h3>Programación</h3>
                  <p>Aprende a crear aplicaciones, sitios web y soluciones digitales con diferentes lenguajes de programación.</p>
              </div>
              
              <!-- Servicio 3 -->
              <div class="service-card fade-in-scroll">
                  <div class="service-icon">
                      <img src="{{ asset('homeprincipal/icons/robotica.gif') }}" alt="Robótica">
                  </div>
                  <h3>Robótica</h3>
                  <p>Diseña, construye y programa robots mientras desarrollas habilidades de resolución de problemas.</p>
              </div>
              
              <!-- Servicio 4 -->
              <div class="service-card fade-in-scroll">
                  <div class="service-icon">
                      <img src="{{ asset('homeprincipal/icons/ajedrez.gif') }}" alt="Ajedrez">
                  </div>
                  <h3>Ajedrez</h3>
                  <p>Desarrolla pensamiento estratégico y concentración a través del juego ciencia.</p>
              </div>
              
              <!-- Servicio 5 -->
              <div class="service-card fade-in-scroll">
                  <div class="service-icon">
                      <img src="{{ asset('homeprincipal/icons/cubo.gif') }}" alt="Cubo Rubik">
                  </div>
                  <h3>Cubo Rubik</h3>
                  <p>Aprende técnicas para resolver el cubo de Rubik y mejora tu capacidad de resolución de problemas.</p>
              </div>
              
              <!-- Servicio 6 -->
              <div class="service-card fade-in-scroll">
                  <div class="service-icon">
                      <img src="{{ asset('homeprincipal/icons/computacion.gif') }}" alt="Computación">
                  </div>
                  <h3>Computación</h3>
                  <p>Domina las herramientas informáticas esenciales para el estudio y el trabajo.</p>
              </div>
              
              <!-- Servicio 7 -->
              <div class="service-card fade-in-scroll">
                  <div class="service-icon">
                      <img src="{{ asset('homeprincipal/icons/oratoria.gif') }}" alt="Oratoria">
                  </div>
                  <h3>Oratoria</h3>
                  <p>Desarrolla habilidades de comunicación efectiva y habla en público con confianza.</p>
              </div>
              
              <!-- Servicio 8 -->
              <div class="service-card fade-in-scroll">
                  <div class="service-icon">
                      <img src="{{ asset('homeprincipal/icons/ingles.gif') }}" alt="Inglés">
                  </div>
                  <h3>Inglés</h3>
                  <p>Aprende inglés con metodologías dinámicas y enfocadas en la comunicación real.</p>
              </div>
              
              <!-- Servicio 9 -->
              <div class="service-card fade-in-scroll">
                  <div class="service-icon">
                      <img src="{{ asset('homeprincipal/icons/lectura.gif') }}" alt="Lectura y Escritura">
                  </div>
                  <h3>Lectura y Escritura</h3>
                  <p>Mejora tus habilidades de comprensión lectora y expresión escrita.</p>
              </div>
              
              <!-- Servicio 10 -->
              <div class="service-card fade-in-scroll">
                  <div class="service-icon">
                      <img src="{{ asset('homeprincipal/icons/caligrafia.gif') }}" alt="Caligrafía">
                  </div>
                  <h3>Caligrafía</h3>
                  <p>Aprende el arte de la escritura elegante y mejora tu presentación escrita.</p>
              </div>
              
              <!-- Servicio 11 -->
              <div class="service-card fade-in-scroll">
                  <div class="service-icon">
                      <img src="{{ asset('homeprincipal/icons/apoyoescolar.gif') }}" alt="Juegos del Calamar">
                  </div>
                  <h3>Juegos del Calamar</h3>
                  <p>Participa en actividades recreativas inspiradas en juegos tradicionales.</p>
              </div>
          </div>
      </div>
  </section>

    {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  tik tok  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
  
<!-- Nueva Sección de TikToks Virales -->
<section class="tiktok-section">
  <div class="container">
      <div class="section-header">
          <h2>Nuestros <span class="highlight">TikTok</span> más viral</h2>
          <p>Descubre nuestro contenido educativo más popular y divertido</p>
      </div>
      <div class="tiktok-grid">
          <!-- TikTok 1 -->
          <div class="tiktok-container fade-in-scroll">
              <blockquote class="tiktok-embed" cite="https://www.tiktok.com/@ite_educabol/video/7471792591114226950" data-video-id="7471792591114226950">
                  <section></section>
              </blockquote>
          </div>
      </div>
  </div>
</section>



    {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  cursos sobresalientes  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
    <section class="featured-courses-section">
      <div class="container">
          <div class="section-header">
              <h2>Cursos <span class="highlight">Destacados</span></h2>
              <p>Descubre nuestros cursos más populares y comienza tu aprendizaje hoy</p>
          </div>
          
          <div class="courses-slider-container">
              <button class="slider-arrow prev-arrow" id="prevCourse" aria-label="Curso anterior">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
              </button>
              
              <div class="courses-slider" id="coursesSlider">
                  <!-- Curso 1 -->
                  <div class="course-card">
                      <div class="course-image">
                          <img src="{{ asset('homeprincipal/imagen/tabla.png') }}" alt="Tabla de multiplicar">
                      </div>
                      <div class="course-content">
                          <h3>Tabla de multiplicar</h3>
                          <p>Aprende las tablas de multiplicar de forma divertida y efectiva con técnicas de memorización.</p>
                          <a href="#" class="btn btn-primary">Más información</a>
                      </div>
                  </div>
                  
                  <!-- Curso 2 -->
                  <div class="course-card">
                      <div class="course-image">
                          <img src="{{ asset('homeprincipal/imagen/programacion.png') }}" alt="Programación para niños">
                      </div>
                      <div class="course-content">
                          <h3>Programación para niños</h3>
                          <p>Introducción a la programación con bloques visuales para desarrollar pensamiento lógico.</p>
                          <a href="#" class="btn btn-primary">Más información</a>
                      </div>
                  </div>
                  
                  <!-- Curso 3 -->
                  <div class="course-card">
                      <div class="course-image">
                          <img src="{{ asset('homeprincipal/imagen/robotica.png') }}" alt="Robótica básica">
                      </div>
                      <div class="course-content">
                          <h3>Robótica básica</h3>
                          <p>Construye y programa robots sencillos mientras aprendes conceptos de electrónica y mecánica.</p>
                          <a href="#" class="btn btn-primary">Más información</a>
                      </div>
                  </div>
                  
                  <!-- Curso 6 -->
                  <div class="course-card">
                      <div class="course-image">
                          <img src="{{ asset('homeprincipal/imagen/cubo.png') }}" alt="Domina el cubo Rubik">
                      </div>
                      <div class="course-content">
                          <h3>Domina el cubo Rubik</h3>
                          <p>Aprende paso a paso cómo resolver el cubo de Rubik con métodos sencillos y efectivos.</p>
                          <a href="#" class="btn btn-primary">Más información</a>
                      </div>
                  </div>
              </div>
              
              <button class="slider-arrow next-arrow" id="nextCourse" aria-label="Curso siguiente">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
              </button>
          </div>
          
          <div class="slider-dots" id="coursesDots">
              <!-- Los dots se generarán con JavaScript -->
          </div>
      </div>
  </section>
    {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  EVENTOS %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
    <section class="events-section">
      <div class="container">
          <div class="section-header">
              <h2>Eventos y <span class="highlight">Actividades</span></h2>
              <p>Participa en nuestros eventos especiales y actividades recreativas</p>
          </div>
          
          <div class="events-filter">
              <button class="filter-btn active" data-filter="all">Todos</button>
              <button class="filter-btn" data-filter="torneos">Torneos</button>
              <button class="filter-btn" data-filter="talleres">Talleres</button>
              <button class="filter-btn" data-filter="competencias">Competencias</button>
          </div>
          
          <div class="events-grid">
              <!-- Evento 1 -->
              <div class="event-card fade-in-scroll" data-category="competencias">
                  <div class="event-image">
                      <img src="{{ asset('homeprincipal/imagen/calamar.jpg') }}" alt="Juegos del Calamar">
                      <div class="event-date">
                          <span class="day">15</span>
                          <span class="month">JUN</span>
                      </div>
                  </div>
                  <div class="event-content">
                      <div class="event-meta">
                          <span class="event-time">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                              09:00 - 12:00
                          </span>
                          <span class="event-location">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                              Por Definir
                          </span>
                      </div>
                      <h3>Juegos del Calamar: Cuarta Edición</h3>
                      <p>Participa en esta divertida competencia inspirada en juegos tradicionales. Premios para los ganadores.</p>
                      <a href="#" class="btn btn-secondary">Inscribirme</a>
                  </div>
              </div>
              
             
              <!-- Evento 6 -->
              <div class="event-card fade-in-scroll" data-category="competencias">
                  <div class="event-image">
                      <img src="{{ asset('homeprincipal/imagen/taller.png') }}" alt="Taller herramientas digitales">
                      <div class="event-date">
                          <span class="day">22</span>
                          <span class="month">MAR</span>
                      </div>
                  </div>
                  <div class="event-content">
                      <div class="event-meta">
                          <span class="event-time">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                              09:00 - 11:30
                          </span>
                          <span class="event-location">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                              Sede Central
                          </span>
                      </div>
                      <h3>Taller de Herramientas Digitales</h3>
                      <p>Taller desde cero de como aplicar herramientas digitales al aprendizaje</p>
                      <a href="#" class="btn btn-secondary">Inscribirme</a>
                  </div>
              </div>
          </div>
          
          <div class="events-cta">
              <a href="#" class="btn btn-primary">Ver todos los eventos</a>
          </div>
      </div>
  </section>
  
    {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  contactos %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
    <section class="contact-section" id="contacto">
      <div class="container">
          <div class="section-header">
              <h2>Ponte en <span class="highlight">Contacto</span></h2>
              <p>Estamos aquí para responder tus preguntas y ayudarte en lo que necesites</p>
          </div>
          
          <div class="contact-container">
              <div class="contact-info">
                  <h3>Información de Contacto</h3>
                  
                  <div class="info-item">
                      <div class="info-icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                      </div>
                      <div class="info-content">
                          <h4>Dirección</h4>
                          <p>Villa 1 de mayo calle 16 oeste #9</p>
                      </div>
                  </div>
                  
                  <div class="info-item">
                      <div class="info-icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                      </div>
                      <div class="info-content">
                          <h4>Teléfono</h4>
                          <p>71039910</p>
                      </div>
                  </div>
                  
                  <div class="info-item">
                      <div class="info-icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                      </div>
                      <div class="info-content">
                          <h4>Telefono</h4>
                          <p>71324941</p>
                      </div>
                  </div>
                  
                  <div class="info-item">
                      <div class="info-icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                      </div>
                      <div class="info-content">
                          <h4>Horario de Atención</h4>
                          <p>Lunes a Viernes: 07:30 - 18:30<br>Sábados: 07:30 - 18:30</p>
                      </div>
                  </div>
                  
                  <div class="social-links">
                      <a href="https://www.facebook.com/ite.educabol" class="social-link" aria-label="Facebook">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                      </a>
                      <a href="https://www.instagram.com/ite.educabol" class="social-link" aria-label="Instagram">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
                      </a>
                      <a href="https://www.tiktok.com/@ite_educabol" class="social-link" aria-label="TikTok">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 12a4 4 0 1 0 0 8 4 4 0 0 0 0-8z"/><path d="M15 8a4 4 0 1 0 0-8 4 4 0 0 0 0 8z"/><path d="M15 2v20"/><path d="M9 16v6"/><path d="M9 10V4"/></svg>
                      </a>
                  </div>
              </div>
              
              <div class="contact-form-container">
                  <form id="contactForm" class="contact-form">
                      <div class="form-group">
                          <label for="name">Nombre completo</label>
                          <input type="text" id="name" name="name" required>
                      </div>
                      <div class="form-group">
                          <label for="phone">Teléfono</label>
                          <input type="tel" id="phone" name="phone">
                      </div>
                      <div class="form-group">
                          <label for="message">Mensaje</label>
                          <textarea id="message" name="message" rows="5" required></textarea>
                      </div>
                      
                      <button type="submit" class="btn btn-primary">Enviar mensaje</button>
                  </form>
              </div>
          </div>
          
          <div class="map-container fade-in-scroll">
              <iframe 
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3823.978518546554!2d-63.1388413!3d-17.8020169!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93f1e9948f88a431%3A0x448c1b5adb32a0f0!2site+(central)!5e0!3m2!1ses!2sbo!4v1696938145610!5m2!1ses!2sbo" 
                  width="100%" 
                  height="450" 
                  style="border:0;" 
                  allowfullscreen="" 
                  loading="lazy"
                  title="Ubicación de ITE">
              </iframe>
          </div>
      </div>
  </section>
    {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  footer %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
    <footer class="footer">
      <div class="container">
          <div class="footer-content">
              <div class="footer-column">
                  <div class="footer-logo">
                      <span class="ite-text">ite</span>
                      <p>Instituto de Tecnología Educativa</p>
                  </div>
                  <p class="footer-description">
                      Ofrecemos clases de apoyo escolar, cursos de programación, robótica, ajedrez, 
                      cubo rubik, computación, oratoria, inglés, lectura, escritura y caligrafía.
                  </p>
              </div>
              
              <div class="footer-column">
                  <h3 class="footer-title">Enlaces Rápidos</h3>
                  <ul class="footer-links">
                      <li><a href="https://ite.com.bo/">Página web</a></li>
                      <li><a href="https://services.ite.com.bo/">Servicios</a></li>
                      <li><a href="https://redes.ite.com.bo">Redes</a></li>
                      <li><a href="#cursos">Cursos</a></li>
                      <li><a href="#eventos">Eventos</a></li>
                      <li><a href="#contacto">Contacto</a></li>
                  </ul>
              </div>
              
              <div class="footer-column">
                  <h3 class="footer-title">Síguenos</h3>
                  <ul class="footer-social-links">
                      <li>
                          <a href="https://www.facebook.com/ite.educabol" target="_blank" rel="noopener noreferrer">
                              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                              Facebook
                          </a>
                      </li>
                      <li>
                          <a href="https://www.tiktok.com/@ite_educabol" target="_blank" rel="noopener noreferrer">
                              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 12a4 4 0 1 0 0 8 4 4 0 0 0 0-8z"/><path d="M15 8a4 4 0 1 0 0-8 4 4 0 0 0 0 8z"/><path d="M15 2v20"/><path d="M9 16v6"/><path d="M9 10V4"/></svg>
                              TikTok
                          </a>
                      </li>
                      <li>
                          <a href="https://www.instagram.com/ite.educabol/" target="_blank" rel="noopener noreferrer">
                              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
                              Instagram
                          </a>
                      </li>
                      <li>
                          <a href="https://api.whatsapp.com/send/?phone=59171039910" target="_blank" rel="noopener noreferrer">
                              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                              WhatsApp
                          </a>
                      </li>
                  </ul>
              </div>
              
              <div class="footer-column">
                  <h3 class="footer-title">Contáctanos</h3>
                  <ul class="footer-contact-info">
                      <li>
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                          <span>Villa 1 de mayo calle 16 oeste #9, Santa Cruz de la Sierra</span>
                      </li>
                      <li>
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                          <span>75553338</span>
                      </li>
                      <li>
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                          <span>info@ite.com.bo</span>
                      </li>
                  </ul>
              </div>
          </div>
          
          <div class="footer-bottom">
              <div class="footer-legal">
                  <a href="#">Política de Privacidad</a>
                  <span class="separator">|</span>
                  <a href="#">Términos y Condiciones</a>
              </div>
              <div class="footer-copyright">
                  <p>&copy; 2024 ITE Todos los derechos reservados.|Desarrollado David Flores </p>
              </div>
          </div>
      </div>
  </footer>
    {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  SERVICIOS %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}

    <script src="{{ asset('homeprincipal/js/hero.js') }}"></script>
    <script src="{{ asset('homeprincipal/js/services.js') }}"></script>
    <script src="{{ asset('homeprincipal/js/sobresaliente.js') }}"></script>
    <script src="{{ asset('homeprincipal/js/eventos.js') }}"></script>
    <script src="{{ asset('homeprincipal/js/contactos.js') }}"></script>
    <script async src="https://www.tiktok.com/embed.js"></script>
   
</body>
</html>

{{-- <!DOCTYPE html>
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
    


{{-- 
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
      .grecaptcha-badge { visibility: hidden !important; }
    </style>
</head>
<body>  --}}
  {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% SECCION ENCABEZADO  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
  {{-- <header class="header">
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
  </header> --}}

  {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% SECCION HERO  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
    

   

    {{-- <section class="hero" id="hero-section">
      <div class="hero-content">
          <h1 class="hero-title animate-on-scroll">Transforma tus ideas en realidad</h1>
          <p class="hero-subtitle animate-on-scroll">Creamos soluciones innovadoras que impulsan tu crecimiento.</p>
          <a href="#services" class="btn-cta animate-on-scroll">Descubre Más</a>
      </div>
  
    </section>
   --}}

  
  {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% SECCION METRICAS DATOS %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
  {{-- <div class="impact-metrics">
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
   --}}
  {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% SECCION  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}


  
  {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% S E C C I O N   E X P L O R A R   N U E S T R A   C O M U N I D A D %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
  {{-- <section class="community-highlights">
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
    </div> --}}
  </section>
  
  {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% SECCION proyectos disruptivos  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
  {{-- <section class="innovation-showcase">
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
  </section> --}}
  
  
  {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% S E C C I O N   C O  M E N T A R I O S  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}

  {{-- <div class="form-container">
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
</div> --}}

  {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% SECCION ITENAUTAS  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
  {{-- <section id="itenautas" class="itenautas">
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
  </section> --}}
  
  
  {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% SECCION PIE DE PAGINA  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
  {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% SECCION PIE DE PAGINA  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
  {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% SECCION PIE DE PAGINA  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
  {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% SECCION PIE DE PAGINA  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
  {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% SECCION PIE DE PAGINA  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
  {{-- <footer class="footer">
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
  </footer> --}}
  
  {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% SECCION  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
  {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% SECCION  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
  {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% SECCION  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}



    {{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
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
 --}}
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
