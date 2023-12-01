<!DOCTYPE html>
<html lang="en">
<head>
  <title>Thrifting Shop</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{asset('assets/vendors/owl-carousel/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendors/owl-carousel/css/owl.theme.default.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendors/aos/css/aos.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/style.min.css')}}">
</head>
<body id="body" data-spy="scroll" data-target=".navbar" data-offset="100">
  <header id="header-section">
    <nav class="navbar navbar-expand-lg pl-3 pl-sm-0" id="navbar">
    <div class="container">
      <div class="navbar-brand-wrapper d-flex w-100">
        <img src="{{asset('assets/images/Group2.svg')}}" alt="">
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="mdi mdi-menu navbar-toggler-icon"></span>
        </button> 
      </div>
      <div class="collapse navbar-collapse navbar-menu-wrapper" id="navbarSupportedContent">
        <ul class="navbar-nav align-items-lg-center align-items-start ml-auto">
          <li class="d-flex align-items-center justify-content-between pl-4 pl-lg-0">
            <div class="navbar-collapse-logo">
              <img src="{{asset('assets/images/Group2.svg')}}" alt="">
            </div>
            <button class="navbar-toggler close-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="mdi mdi-close navbar-toggler-icon pl-5"></span>
            </button>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#header-section">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#features-section">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#products">Product</a>  
          </li>
          <li class="nav-item btn-contact-us pl-4 pl-lg-0">
            <a href="{{route('login')}}" class="btn btn-info">Login</a>
          </li>
        </ul>
      </div>
    </div> 
    </nav>   
  </header>
  <div class="banner" >
    <div class="container">
      <br>
      <h2 class="font-weight-semibold">Discover Unique Treasures<br>at Unbeatable Prices!</h2>
      <h6 class="font-weight-normal text-muted pb-3">Discover handpicked treasures that tell a story of elegance and individuality.</h6>
      <img src="{{asset('assets/images/wel.svg')}}" alt="" class="img-fluid">
    </div>
  </div>
  <div class="content-wrapper">
    <div class="container">
      <section class="features-overview" id="features-section" >
        <div class="content-header">
          <h2>Why Choose Us?</h2>
          <h6 class="section-subtitle text-muted">Giving you style, quality and affordability.</h6>
        </div>
        <div class="d-md-flex justify-content-between">
          <div class="grid-margin d-flex justify-content-start">
            <div class="features-width">
              <img src="{{asset('assets/images/Group12.svg')}}" alt="" class="img-icons">
              <h5 class="py-3">Affordable<br>Elegance</h5>
              <p class="text-muted">Elevate your style without breaking the bank. Our curated collection of pre-loved items offers you high-quality fashion at budget-friendly prices.</p>
            </div>
          </div>
          <div class="grid-margin d-flex justify-content-center">
            <div class="features-width">
              <img src="{{asset('assets/images/Group7.svg')}}" alt="" class="img-icons">
              <h5 class="py-3">Sustainable<br>Fashion</h5>
              <p class="text-muted">Join us in reducing fashion waste. Every purchase you make contributes to a more sustainable and eco-friendly future.</p>
            </div>
          </div>
          <div class="grid-margin d-flex justify-content-end">
            <div class="features-width">
              <img src="{{asset('assets/images/Group5.svg')}}" alt="" class="img-icons">
              <h5 class="py-3">A Treasure<br>Trove of Finds</h5>
              <p class="text-muted">Explore a diverse range of clothing, accessories, and home decor. From vintage gems to contemporary classics, there's something for every taste.</p>
            </div>
          </div>
        </div>
      </section>     

      <section class="case-studies" id="products">
        <div class="row grid-margin">
          <div class="col-12 text-center pb-5">
            <h2>Start Exploring Your Style Today!</h2>
          </div>
          <div class="col-12 col-md-6 col-lg-3 stretch-card mb-3 mb-lg-0" data-aos="zoom-in">
            <div class="card color-cards">
              <div class="card-body p-0">
                <div class="bg-primary text-center card-contents">
                  <div class="card-image">
                    <img src="{{asset('assets/images/coat.png')}}" class="case-studies-card-img" alt="">
                  </div>  
                </div>   
                <div class="card-details text-center pt-4">
                    <h6 class="m-0 pb-1">Jackets & Coats</h6>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3 stretch-card mb-3 mb-lg-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="card color-cards">
              <div class="card-body p-0">
                <div class="bg-warning text-center card-contents">
                  <div class="card-image">
                      <img src="{{asset('assets/images/pants.png')}}" class="case-studies-card-img" alt="">
                  </div>  
                </div>   
                <div class="card-details text-center pt-4">
                    <h6 class="m-0 pb-1">Jeans</h6>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3 stretch-card mb-3 mb-lg-0" data-aos="zoom-in" data-aos-delay="400">
            <div class="card color-cards">
              <div class="card-body p-0">
                <div class="bg-violet text-center card-contents">
                  <div class="card-image">
                      <img src="{{asset('assets/images/sneaker.png')}}" class="case-studies-card-img" alt="">
                  </div>  
                </div>   
                <div class="card-details text-center pt-4">
                    <h6 class="m-0 pb-1">Shoes</h6>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3 stretch-card" data-aos="zoom-in" data-aos-delay="600">
            <div class="card color-cards">
              <div class="card-body p-0">
                <div class="bg-success text-center card-contents">
                  <div class="card-image">
                      <img src="{{asset('assets/images/bag.png')}}" class="case-studies-card-img" alt="">
                  </div>  
                </div>   
                <div class="card-details text-center pt-4">
                    <h6 class="m-0 pb-1">Accessories</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>     

      <section class="contact-us" id="contact-section">
        <div class="contact-us-bgimage grid-margin" >
          <div class="pb-4">
            <h4 class="px-3 px-md-0 m-0" data-aos="fade-down">Join Our Thrifting Community</h4>
            <h4 class="pt-1" data-aos="fade-down">Contact us</h4>
          </div>
          <div data-aos="fade-up">
            <button class="btn btn-rounded btn-outline-danger" href="#contact">Contact us</button>
          </div>          
        </div>
      </section>
      <section class="contact-details" id="contact">
        <div class="row text-center text-md-left">
          <div class="col-12 col-md-6 col-lg-3 grid-margin">
            <img src="{{asset('assets/images/Group2.svg')}}" alt="" class="pb-2">
            <div class="pt-2">
              <p class="text-muted m-0">thriftingshop@gmail.com</p>
              <p class="text-muted m-0">906-179-8309</p>
            </div>         
          </div>
          <div class="col-12 col-md-6 col-lg-3 grid-margin">
            <h5 class="pb-2">Get in Touch</h5>
            <p class="text-muted">Don’t miss any updates of our products!</p>   
          </div>
          <div class="col-12 col-md-6 col-lg-3 grid-margin">
            <h5 class="pb-2">Our Guidelines</h5>
            <a href="#"><p class="m-0 pb-2">Terms</p></a>   
            <a href="#" ><p class="m-0 pt-1 pb-2">Privacy policy</p></a> 
            <a href="#"><p class="m-0 pt-1 pb-2">Cookie Policy</p></a> 
            <a href="#"><p class="m-0 pt-1">Discover</p></a> 
          </div>
          <div class="col-12 col-md-6 col-lg-3 grid-margin">
              <h5 class="pb-2">Our address</h5>
              <p class="text-muted">Medan<br>Indonesia</p>
              <div class="d-flex justify-content-center justify-content-md-start">
                <a href="#"><span class="mdi mdi-facebook"></span></a>
                <a href="#"><span class="mdi mdi-twitter"></span></a>
                <a href="#"><span class="mdi mdi-instagram"></span></a>
                <a href="#"><span class="mdi mdi-linkedin"></span></a>
              </div>
          </div>
        </div>  
      </section>
      <footer class="border-top">
        <p class="text-center text-muted pt-4">Copyright © 2023</a> Team 8</p>
      </footer>
    </div> 
  </div>
  <script src="{{asset('assets/vendors/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('assets/vendors/bootstrap/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/vendors/owl-carousel/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('assets/vendors/aos/js/aos.js')}}"></script>
  <script src="{{asset('assets/js/landingpage.js')}}"></script>
</body>
</html>