
	<section class="team-section-two">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<div class="title style-two">Nuestros Profes</div>
				<h2>Nuestro <span>Equipo</span> <br> </h2>
			</div>
			<div class="row clearfix">
				
				<!-- Team Block Two -->
        @foreach ($docentes as $docente)
          <div class="team-block-two col-lg-3 col-md-6 col-sm-12">
            <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
              <div class="color-layer-one"></div>
              <div class="color-layer-two"></div>
              <div class="image">
                <img src="{{URL::to('/')}}/storage/{{$docente->persona->foto}}" alt="" />
              </div>
              <h3><a href="#">{{$docente->persona->nombre}} {{$docente->persona->apellidop}}</a></h3>
              <div class="designation"></div>
              <!-- Social Box -->
              {{-- <ul class="social-box">
                <li><a href="https://www.twitter.com/" class="fa fa-twitter"></a></li>
                <li><a href="https://www.facebook.com/" class="fa fa-facebook"></a></li>
                <li><a href="https://www.instagram.com/" class="fa fa-instagram"></a></li>
                <li><a href="https://youtube.com/" class="fa fa-youtube"></a></li>
              </ul> --}}
            </div>
          </div>
         @endforeach
				
			</div>
		</div>
	</section>
	