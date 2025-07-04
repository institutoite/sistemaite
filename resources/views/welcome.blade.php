@extends('layouts.home')
@section('title', __('Welcome'))
@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><h5><span class="text-center fa fa-home"></span> @yield('title')</h5></div>
            <div class="card-body">
              <h5>  
            @guest
                hola
				{{ __('Welcome to') }} {{ config('app.name', 'Laravel') }} !!! </br>
				Please contact admin to get your Login Credentials or click "Login" to go to your Dashboard.
                hola comoe stas 
			@else
					Hi {{ Auth::user()->name }}, Welcome back to {{ config('app.name', 'Laravel') }}.
            @endif	
				</h5>
            </div>
        </div>
    </div>
</div>
</div>

<section class="services-section">
    <div class="container">
        <div class="section-header">
            <h2>Nuestros <span class="highlight">Servicios</span></h2>
            <p>Ofrecemos una amplia variedad de cursos y actividades educativas para desarrollar habilidades del siglo XXI</p>
        </div>
        <div class="services-grid">
            <!-- Servicio 1 -->
            <div class="service-card fade-in-scroll">
                <img class="service-image" src="{{ asset('homeprincipal/images/servicios/apoyo-escolar.jpg') }}" alt="Apoyo Escolar">
                <div class="service-content">
                    <h3>Apoyo Escolar</h3>
                    <p>Refuerzo académico personalizado para mejorar el rendimiento escolar en todas las materias.</p>
                    <a href="https://wa.me/59171324941?text=Quiero%20m%C3%A1s%20informaci%C3%B3n%20del%20curso%20de%20Apoyo%20Escolar" class="btn-consultar" target="_blank">Consultar</a>
                </div>
            </div>
            <!-- Servicio 2 -->
            <div class="service-card fade-in-scroll">
                <img class="service-image" src="{{ asset('homeprincipal/images/servicios/programacion.jpg') }}" alt="Programación">
                <div class="service-content">
                    <h3>Programación</h3>
                    <p>Aprende a crear aplicaciones, sitios web y soluciones digitales con diferentes lenguajes.</p>
                    <a href="https://wa.me/59171324941?text=Quiero%20m%C3%A1s%20informaci%C3%B3n%20del%20curso%20de%20Programaci%C3%B3n" class="btn-consultar" target="_blank">Consultar</a>
                </div>
            </div>
            <!-- Servicio 3 -->
            <div class="service-card fade-in-scroll">
                <img class="service-image" src="{{ asset('homeprincipal/images/servicios/robotica.jpg') }}" alt="Robótica">
                <div class="service-content">
                    <h3>Robótica</h3>
                    <p>Diseña, construye y programa robots mientras desarrollas habilidades de resolución de problemas.</p>
                    <a href="https://wa.me/59171324941?text=Quiero%20m%C3%A1s%20informaci%C3%B3n%20del%20curso%20de%20Rob%C3%B3tica" class="btn-consultar" target="_blank">Consultar</a>
                </div>
            </div>
            <!-- Servicio 4 -->
            <div class="service-card fade-in-scroll">
                <img class="service-image" src="{{ asset('homeprincipal/images/servicios/ajedrez.jpg') }}" alt="Ajedrez">
                <div class="service-content">
                    <h3>Ajedrez</h3>
                    <p>Desarrolla pensamiento estratégico y concentración a través del juego ciencia.</p>
                    <a href="https://wa.me/59171324941?text=Quiero%20m%C3%A1s%20informaci%C3%B3n%20del%20curso%20de%20Ajedrez" class="btn-consultar" target="_blank">Consultar</a>
                </div>
            </div>
            <!-- Servicio 5 -->
            <div class="service-card fade-in-scroll">
                <img class="service-image" src="{{ asset('homeprincipal/images/servicios/cubo-rubik.jpg') }}" alt="Cubo Rubik">
                <div class="service-content">
                    <h3>Cubo Rubik</h3>
                    <p>Aprende técnicas para resolver el cubo de Rubik y mejora tu capacidad de resolución de problemas.</p>
                    <a href="https://wa.me/59171324941?text=Quiero%20m%C3%A1s%20informaci%C3%B3n%20del%20curso%20de%20Cubo%20Rubik" class="btn-consultar" target="_blank">Consultar</a>
                </div>
            </div>
            <!-- Servicio 6 -->
            <div class="service-card fade-in-scroll">
                <img class="service-image" src="{{ asset('homeprincipal/images/servicios/computacion.jpg') }}" alt="Computación">
                <div class="service-content">
                    <h3>Computación</h3>
                    <p>Domina las herramientas informáticas esenciales para el estudio y el trabajo.</p>
                    <a href="https://wa.me/59171324941?text=Quiero%20m%C3%A1s%20informaci%C3%B3n%20del%20curso%20de%20Computaci%C3%B3n" class="btn-consultar" target="_blank">Consultar</a>
                </div>
            </div>
            <!-- Servicio 7 -->
            <div class="service-card fade-in-scroll">
                <img class="service-image" src="{{ asset('homeprincipal/images/servicios/oratoria.jpg') }}" alt="Oratoria">
                <div class="service-content">
                    <h3>Oratoria</h3>
                    <p>Desarrolla habilidades de comunicación efectiva y habla en público con confianza.</p>
                    <a href="https://wa.me/59171324941?text=Quiero%20m%C3%A1s%20informaci%C3%B3n%20del%20curso%20de%20Oratoria" class="btn-consultar" target="_blank">Consultar</a>
                </div>
            </div>
            <!-- Servicio 8 -->
            <div class="service-card fade-in-scroll">
                <img class="service-image" src="{{ asset('homeprincipal/images/servicios/ingles.jpg') }}" alt="Inglés">
                <div class="service-content">
                    <h3>Inglés</h3>
                    <p>Aprende inglés con metodologías dinámicas y enfocadas en la comunicación real.</p>
                    <a href="https://wa.me/59171324941?text=Quiero%20m%C3%A1s%20informaci%C3%B3n%20del%20curso%20de%20Ingl%C3%A9s" class="btn-consultar" target="_blank">Consultar</a>
                </div>
            </div>
            <!-- Servicio 9 -->
            <div class="service-card fade-in-scroll">
                <img class="service-image" src="{{ asset('homeprincipal/images/servicios/lectura-escritura.jpg') }}" alt="Lectura y Escritura">
                <div class="service-content">
                    <h3>Lectura y Escritura</h3>
                    <p>Mejora tus habilidades de comprensión lectora y expresión escrita.</p>
                    <a href="https://wa.me/59171324941?text=Quiero%20m%C3%A1s%20informaci%C3%B3n%20del%20curso%20de%20Lectura%20y%20Escritura" class="btn-consultar" target="_blank">Consultar</a>
                </div>
            </div>
            <!-- Servicio 10 -->
            <div class="service-card fade-in-scroll">
                <img class="service-image" src="{{ asset('homeprincipal/images/servicios/caligrafia.jpg') }}" alt="Caligrafía">
                <div class="service-content">
                    <h3>Caligrafía</h3>
                    <p>Aprende el arte de la escritura elegante y mejora tu presentación escrita.</p>
                    <a href="https://wa.me/59171324941?text=Quiero%20m%C3%A1s%20informaci%C3%B3n%20del%20curso%20de%20Caligraf%C3%ADa" class="btn-consultar" target="_blank">Consultar</a>
                </div>
            </div>
            <!-- Servicio 11 -->
            <div class="service-card fade-in-scroll">
                <img class="service-image" src="{{ asset('homeprincipal/images/servicios/actividades-ludicas.jpg') }}" alt="Actividades Lúdicas">
                <div class="service-content">
                    <h3>Actividades Lúdicas</h3>
                    <p>Participa en actividades recreativas inspiradas en juegos tradicionales para fomentar el trabajo en equipo.</p>
                    <a href="https://wa.me/59171324941?text=Quiero%20m%C3%A1s%20informaci%C3%B3n%20sobre%20las%20Actividades%20L%C3%BAdicas" class="btn-consultar" target="_blank">Consultar</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection