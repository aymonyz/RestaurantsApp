@extends('layouts.master2')

@section('title')
تسجيل الدخول - مغاسل الخير
@stop


@section('css')
<!-- Sidemenu-respoansive-tabs css -->
<link href="{{URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection
@section('content')
<style>.loader {
	width: 240px; /* تم ضبط العرض إلى ضعف القيمة الأصلية */
	height: 300px; /* تم ضبط الارتفاع إلى ضعف القيمة الأصلية */
	background-color: #fff;
	background-repeat: no-repeat;
	background-image: linear-gradient(#ddd 50%, #bbb 51%),
	  linear-gradient(#ddd, #ddd), linear-gradient(#ddd, #ddd),
	  radial-gradient(ellipse at center, #aaa 25%, #eee 26%, #eee 50%, #0000 55%),
	  radial-gradient(ellipse at center, #aaa 25%, #eee 26%, #eee 50%, #0000 55%),
	  radial-gradient(ellipse at center, #aaa 25%, #eee 26%, #eee 50%, #0000 55%);
	background-position: 0 40px, 90px 0, 16px 12px, 110px 6px, 150px 6px, 190px 6px; /* ضعف المسافات */
	background-size: 100% 8px, 2px 46px, 60px 16px, 30px 30px, 30px 30px, 30px 30px; /* ضعف أحجام الخلفيات */
	position: relative;
	border-radius: 6%;
	animation: shake 3s ease-in-out infinite;
	transform-origin: 120px 360px; /* ضعف نقطة الأصل للتحويل */
  }
  
  .loader:before {
	content: "";
	position: absolute;
	left: 10px; /* ضعف المسافة من اليسار */
	top: 100%;
	width: 14px; /* ضعف العرض */
	height: 10px; /* ضعف الارتفاع */
	background: #aaa;
	border-radius: 0 0 8px 8px; /* ضعف نصف قطر الحدود */
	box-shadow: 204px 0 #aaa; /* ضعف المسافة للظل */
  }
  
  .loader:after {
	content: "";
	position: absolute;
	width: 190px; /* ضعف العرض */
	height: 190px; /* ضعف الارتفاع */
	left: 0;
	right: 0;
	margin: auto;
	bottom: 40px; /* ضعف المسافة من الأسفل */
	background-color: #bbdefb;
	background-image: linear-gradient(to right, #0004 0%, #0004 49%, #0000 50%, #0000 100%),
	  linear-gradient(135deg, #64b5f6 50%, #607d8b 51%);
	background-size: 60px 100%, 180px 160px; /* ضعف أحجام الخلفيات */
	border-radius: 50%;
	background-repeat: repeat, no-repeat;
	background-position: 0 0;
	box-sizing: border-box;
	border: 20px solid #DDD; /* ضعف عرض الحدود */
	box-shadow: 0 0 0 8px #999 inset, 0 0 12px 12px #0004 inset; /* ضعف الظل */
	animation: spin 3s ease-in-out infinite;
  }
  
  @keyframes spin {
	0% {
	  transform: rotate(0deg)
	}
  
	50% {
	  transform: rotate(360deg)
	}
  
	75% {
	  transform: rotate(750deg)
	}
  
	100% {
	  transform: rotate(1800deg)
	}
  }
  
  @keyframes shake {
	65%, 80%, 88%, 96% {
	  transform: rotate(0.5deg)
	}
  
	50%, 75%, 84%, 92% {
	  transform: rotate(-0.5deg)
	}
  
	0%, 50%, 100% {
	  transform: rotate(0)
	}
  }
  











</style>
<style>
	.bubble {
  position: absolute;
  width: 200px;
  height: 200px;
  border-radius: 50%;
  box-shadow: inset 0 0 25px rgba (255, 255, 255, 0.25);
  animation: animate_4010 8s ease-in-out infinite;
}

.bubble:nth-child(2) {
  position: relative;
  zoom: 0.45;
  left: -10px;
  top: -100px;
  animation-delay: -4s;
}

.bubble:nth-child(3) {
  position: relative;
  zoom: 0.45;
  right: -80px;
  top: -300px;
  animation-delay: -6s;
}

.bubble:nth-child(4) {
  position: relative;
  zoom: 0.35;
  left: -120px;
  bottom: -200px;
  animation-delay: -3s;
}

.bubble:nth-child(5) {
  position: relative;
  zoom: 0.5;
  left: 0px;
  top: 200px;
  animation-delay: -5s;
}

@keyframes animate_4010 {
  0%,100% {
    transform: translateY(-20px);
  }

  50% {
    transform: translateY(20px);
  }
}

.bubble::before {
  content: '';
  position: absolute;
  top: 50px;
  left: 45px;
  width: 30px;
  height: 30px;
  border-radius: 50%;
  background: #fff;
  z-index: 10;
  filter: blur(2px);
}

.bubble::after {
  content: '';
  position: absolute;
  top: 80px;
  left: 80px;
  width: 20px;
  height: 20px;
  border-radius: 50%;
  background: #fff;
  z-index: 10;
  filter: blur(2px);
}

.bubble span {
  position: absolute;
  border-radius: 50%;
}

.bubble span:nth-child(1) {
  inset: 10px;
  border-left: 15px solid #0fb4ff;
  filter: blur(8px);
}

.bubble span:nth-child(2) {
  inset: 10px;
  border-right: 15px solid #ff4484;
  filter: blur(8px);
}

.bubble span:nth-child(3) {
  inset: 10px;
  border-top: 15px solid #ffeb3b;
  filter: blur(8px);
}

.bubble span:nth-child(4) {
  inset: 30px;
  border-left: 15px solid #ff4484;
  filter: blur(12px);
}

.bubble span:nth-child(5) {
  inset: 10px;
  border-bottom: 10px solid #fff;
  filter: blur(8px);
  transform: rotate(330deg);
}

/* إضافة حدود لمربعات الإدخال والزر */
.input, .btn {
  border: 1px solid blue; /* حدود زرقاء */
}

/* تأثير انتقالي للون الحدود عند التركيز */
.input:focus, .btn:focus {
  border-color: rgb(70, 161, 235);
  transition: border-color 0.3s ease;
}
</style>
		<div class="container-fluid">
			<div class="row no-gutter">
				<!-- The image half -->
				<!-- The content half -->
				<div class="col-md-6 col-lg-6 col-xl-5 bg-white">
					<div class="login d-flex align-items-center py-2">
						<!-- Demo content-->
						<div class="container p-0">
							<div class="row">
								
								<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
									<div class="card-sigin">
										<div class="bubble">
											<span></span>
											<span></span>
											<span></span>
											<span></span>
											<span></span>
										</div>
										<div class="bubble">
											<span></span>
											<span></span>
											<span></span>
											<span></span>
											<span></span>
										</div>
										<div class="mb-5 d-flex"> <a href="{{ url('/' . $page='Home') }}"><img src="{{URL::asset('assets/img/brand/logo.png')}}" class="sign-favicon ht-40" alt="logo"></a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">برنامج إدارة المغسله المتكامل </h1></div>
										<div class="card-sigin">
											<div class="main-signup-header">
												<h2>مرحبا بك</h2>
												<h5 class="font-weight-semibold mb-4"> تسجيل الدخول</h5>
                                                <form method="POST" action="{{ route('login') }}">
                                                 @csrf
													<div class="form-group">
													<label>البريد الالكتروني</label>
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                     @error('email')
                                                     <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                     </span>
                                                     @enderror
													</div>

												 <div class="form-group">
											 	 <label>كلمة المرور</label> 
                                                
                                                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                  @error('password')
                                                  <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                                  </span>
												  @enderror
                                                  <div class="form-group row">
                                                      <div class="col-md-6 offset-md-4">
                                                           <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <label class="form-check-label" for="remember">
                                                                       {{ __('تذكرني') }}
                                                                </label>
                                                           </div>
                                                       </div>
                                                   </div>
												  </div>
                                                    <button type="submit" class="btn btn-main-primary btn-block">
                                                    {{ __('تسجيل الدخول') }}
                                                    </button>
												</form>
											</div>
										</div>
									</div>
								</div>
								
							</div>
						</div><!-- End -->
					</div>
				</div><!-- End -->

                <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
					<div class="bubble">
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
					</div>
					<div class="bubble">
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
					</div>
					<div class="row wd-100p mx-auto text-center">
						<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
							<div class="container">
								<div class="bubble">
									<span></span>
									<span></span>
									<span></span>
									<span></span>
									<span></span>
								</div>
								<div class="bubble">
									<span></span>
									<span></span>
									<span></span>
									<span></span>
									<span></span>
								</div>
								<div class="bubble">
									<span></span>
									<span></span>
									<span></span>
									<span></span>
									<span></span>
								</div>
								<div class="bubble">
									<span></span>
									<span></span>
									<span></span>
									<span></span>
									<span></span>
								</div>
								<div class="bubble">
									<span></span>
									<span></span>
									<span></span>
									<span></span>
									<span></span>
								</div>
							 </div>
							<div class="loader"></div>
						</div>
					</div>
				</div>

			</div>
		</div>
@endsection
@section('js')
@endsection