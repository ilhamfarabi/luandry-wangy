<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Laundry Bersih & Wangi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <style>
    /* ======= GLOBAL ======= */
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f0f8ff;
      color: #333;
      scroll-behavior: smooth;
    }

    /* ======= NAVBAR ======= */
    .navbar {
      transition: background 0.4s, padding 0.3s;
      padding: 15px 0;
    }
    .navbar.scrolled {
      background: rgba(0,0,0,0.8) !important;
      padding: 10px 0;
    }
    .navbar-brand {
      font-weight: bold;
      font-size: 1.5rem;
    }

    /* ======= HERO ======= */
    .hero {
      background: linear-gradient(rgba(0, 150, 255, 0.6), rgba(0, 200, 180, 0.7)),
        url('https://images.unsplash.com/photo-1581579188871-45ea61f7d70b') center/cover no-repeat;
      color: white;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
    }
    .hero h1 {
      font-size: 3.8rem;
      text-shadow: 2px 2px 12px rgba(0,0,0,0.6);
    }
    .hero .btn {
      padding: 14px 35px;
      font-size: 1.2rem;
      border-radius: 35px;
      background: #ffd700;
      border: none;
      color: #000;
      font-weight: bold;
      transition: all 0.3s ease-in-out;
    }
    .hero .btn:hover {
      background-color: #ffb300;
      transform: scale(1.08);
    }

    /* ======= SECTION TITLE ======= */
    .section-title h2 {
      font-size: 2.2rem;
      color: #0d6efd;
      margin-bottom: 15px;
      position: relative;
    }
    .section-title h2::after {
      content: "";
      display: block;
      width: 60px;
      height: 4px;
      background: #00c2a8;
      margin: 10px auto 0;
      border-radius: 2px;
    }

    /* ======= ABOUT ======= */
    .about-box {
      background: linear-gradient(135deg, #ffffff, #e6f7ff);
      border-radius: 15px;
      padding: 25px;
      transition: transform 0.3s, box-shadow 0.3s;
    }
    .about-box:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 30px rgba(0,150,255,0.2);
    }
    .about-box h4 {
      color: #0099ff;
      margin-bottom: 10px;
    }

    /* ======= SERVICES ======= */
    .card {
      border: none;
      border-radius: 15px;
      background: linear-gradient(135deg, #ffffff, #f0fcff);
      transition: transform 0.3s, box-shadow 0.3s;
    }
    .card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(0,180,200,0.25);
    }
    .card h5 {
      color: #00aaff;
      margin-bottom: 10px;
      font-weight: bold;
    }
    .service-icon {
      font-size: 2.5rem;
      margin-bottom: 15px;
      color: #0d6efd;
    }

    /* ======= CONTACT ======= */
    .contact-box {
      background: linear-gradient(135deg, #ffffff, #eafcff);
      padding: 25px;
      border-radius: 15px;
      transition: transform 0.3s, box-shadow 0.3s;
    }
    .contact-box:hover {
      transform: scale(1.05);
      box-shadow: 0 12px 30px rgba(0,180,200,0.25);
    }
    .contact-box i {
      font-size: 2rem;
      margin-bottom: 10px;
      color: #00b3b3;
    }
    .contact-box h5 {
      color: #00b3b3;
      font-weight: bold;
    }

    /* ======= FOOTER ======= */
    footer {
      background: linear-gradient(90deg, #0d6efd, #00c2a8);
      color: white;
      padding: 30px 0;
      text-align: center;
    }
    footer .social i {
      font-size: 1.4rem;
      margin: 0 8px;
      color: white;
      transition: 0.3s;
    }
    footer .social i:hover {
      color: #ffd700;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-transparent">
    <div class="container">
      <a class="navbar-brand" href="#">Laundry <span style="color:#ffd700">Wangi</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navMenu">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="#about">Tentang</a></li>
          <li class="nav-item"><a class="nav-link" href="#services">Layanan</a></li>
          <li class="nav-item"><a class="nav-link" href="#contact">Kontak</a></li>
          <li class="nav-item"><a href="{{ route('login') }}" class="btn btn-warning ms-3">Pesan Sekarang</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero -->
  <section class="hero">
    <div>
      <h1 data-aos="fade-up">Laundry Bersih & Wangi</h1>
      <p data-aos="fade-up" data-aos-delay="200">Solusi terbaik untuk cucian Anda, <span class="typed"></span></p>
      <a href="{{ route('login') }}" class="btn btn-warning btn-lg mt-3" data-aos="zoom-in">Pesan Sekarang</a>
    </div>
  </section>

  <!-- About Us -->
  <section id="about" class="container py-5">
    <div class="section-title" data-aos="fade-up">
      <h2>Tentang Kami</h2>
      <p>Kami adalah penyedia layanan laundry profesional dengan pelayanan cepat, bersih, dan wangi.</p>
    </div>
    <div class="row text-center g-4">
      <div class="col-md-4" data-aos="fade-up">
        <div class="about-box">
          <h4>Berpengalaman</h4>
          <p>Tim kami berpengalaman dalam layanan laundry lebih dari 5 tahun.</p>
        </div>
      </div>
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
        <div class="about-box">
          <h4>Modern</h4>
          <p>Menggunakan mesin modern dan detergen ramah lingkungan.</p>
        </div>
      </div>
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="400">
        <div class="about-box">
          <h4>Terjangkau</h4>
          <p>Harga bersaing dengan kualitas terbaik.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Services -->
  <section id="services" class="bg-light py-5">
    <div class="container">
      <div class="section-title" data-aos="fade-up">
        <h2>Layanan Kami</h2>
      </div>
      <div class="row text-center g-4">
        <div class="col-md-4" data-aos="zoom-in">
          <div class="card p-4 shadow-sm">
            <i class="fa-solid fa-shirt service-icon"></i>
            <h5>Cuci Kering</h5>
            <p>Layanan cepat dan higienis, pakaian langsung siap dipakai.</p>
          </div>
        </div>
        <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
          <div class="card p-4 shadow-sm">
            <i class="fa-solid fa-soap service-icon"></i>
            <h5>Cuci Setrika</h5>
            <p>Pakaian Anda tidak hanya bersih, tapi juga rapi dan wangi.</p>
          </div>
        </div>
        <div class="col-md-4" data-aos="zoom-in" data-aos-delay="400">
          <div class="card p-4 shadow-sm">
            <i class="fa-solid fa-iron service-icon"></i>
            <h5>Setrika Saja</h5>
            <p>Untuk Anda yang hanya butuh layanan setrika profesional.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact -->
  <section id="contact" class="container py-5">
    <div class="section-title" data-aos="fade-up">
      <h2>Kontak Kami</h2>
      <p>Hubungi kami untuk layanan laundry cepat dan bersih.</p>
    </div>
    <div class="row text-center g-4">
      <div class="col-md-4" data-aos="fade-right">
        <div class="contact-box">
          <i class="fa-solid fa-map-marker-alt"></i>
          <h5>Alamat</h5>
          <p>Jl. Mawar No. 123, Jakarta</p>
        </div>
      </div>
      <div class="col-md-4" data-aos="fade-up">
        <div class="contact-box">
          <i class="fa-solid fa-phone"></i>
          <h5>Telepon</h5>
          <p>0812-3456-7890</p>
        </div>
      </div>
      <div class="col-md-4" data-aos="fade-left">
        <div class="contact-box">
          <i class="fa-solid fa-envelope"></i>
          <h5>Email</h5>
          <p>info@laundrybersih.com</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <div class="container">
      <p>&copy; {{ date('Y') }} Laundry Bersih & Wangi. All rights reserved.</p>
      <div class="social mt-2">
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-whatsapp"></i></a>
      </div>
    </div>
  </footer>

  <!-- Script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
  <script>
    // Navbar scroll effect
    window.addEventListener("scroll", function(){
      let nav = document.querySelector(".navbar");
      nav.classList.toggle("scrolled", window.scrollY > 50);
    });

    // AOS init
    AOS.init({ duration: 800, once: true });

    // Typed.js
    var typed = new Typed('.typed', {
      strings: ["Cepat 🚀", "Bersih ✨", "Wangi 🌸"],
      typeSpeed: 80,
      backSpeed: 50,
      loop: true
    });
  </script>
</body>
</html>
