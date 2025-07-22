<?php include 'header.php'; ?>

<!-- Carousel Slider -->
<div id="carouselMain" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images\pexels-rafael-cosquiere-1059286-2041540.jpg" class="d-block w-100" style="height:500px; object-fit:cover;" alt="Slide 1">
      <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-3 rounded">
         <h1 class="text-white display-5">Build Skills That Empower Your Career</h1>
        <p class="lead text-light">Explore certified courses & job opportunities all in one place.</p>
        <a href="course.php" class="btn btn-primary">Browse Courses</a>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images\pexels-fauxels-3183197.jpg" class="d-block w-100" style="height:500px; object-fit:cover;" alt="Slide 2">
      <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-3 rounded">
        <h1 class="text-white display-5">Get Hired by Top Companies</h1>
        <p class="lead text-light">Apply now and start your dream career with us.</p>
        
      </div>
    </div>
    <div class="carousel-item">
      <img src="images\pexels-onbab-7739813.jpg" class="d-block w-100" style="height:500px; object-fit:cover;" alt="Slide 3">
      <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-3 rounded">
        <h2>Get Email Notification</h2>
        <p>We notify you when you're selected!</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselMain" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselMain" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

<!-- Stats Section -->
<!-- Stats Section -->
<section class="py-5 bg-light text-center">
  <div class="container">
    <h2 class="mb-4 fw-bold text-primary">Our Achievements</h2>
    <div class="row g-4">
      <div class="col-sm-6 col-md-3">
        <div class="card shadow border-0 p-3">
          <div class="card-body">
            <i class="bi bi-people-fill display-4 text-primary mb-2"></i>
            <h3 class="fw-bold">1200+</h3>
            <p class="mb-0">Students</p>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="card shadow border-0 p-3">
          <div class="card-body">
            <i class="bi bi-book-half display-4 text-success mb-2"></i>
            <h3 class="fw-bold">50+</h3>
            <p class="mb-0">Courses</p>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="card shadow border-0 p-3">
          <div class="card-body">
            <i class="bi bi-briefcase-fill display-4 text-warning mb-2"></i>
            <h3 class="fw-bold">80+</h3>
            <p class="mb-0">Job Roles</p>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="card shadow border-0 p-3">
          <div class="card-body">
            <i class="bi bi-award-fill display-4 text-danger mb-2"></i>
            <h3 class="fw-bold">500+</h3>
            <p class="mb-0">Placements</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



<!-- How It Works Section -->
<section class="py-5 bg-light">
  <div class="container">
    <h2 class="text-center mb-5 fw-bold text-dark">📘 How It Works</h2>

    <div class="row justify-content-center">
      <div class="col-md-8">

        <!-- Step 1 -->
        <div class="d-flex align-items-start mb-4 p-4 bg-white shadow-sm rounded-4 border-start border-4 border-primary">
          <div class="me-4 display-5 fw-bold text-primary">1</div>
          <div>
            <h5 class="fw-bold">Browse Opportunities</h5>
            <p class="text-muted mb-0">Explore our latest courses that fit your interest.</p>
          </div>
        </div>

        <!-- Step 2 -->
        <div class="d-flex align-items-start mb-4 p-4 bg-white shadow-sm rounded-4 border-start border-4 border-success">
          <div class="me-4 display-5 fw-bold text-success">2</div>
          <div>
            <h5 class="fw-bold">Submit Application</h5>
            <p class="text-muted mb-0">Fill in the application form for the selected course.</p>
          </div>
        </div>

        <!-- Step 3 -->
        <div class="d-flex align-items-start mb-4 p-4 bg-white shadow-sm rounded-4 border-start border-4 border-warning">
          <div class="me-4 display-5 fw-bold text-warning">3</div>
          <div>
            <h5 class="fw-bold">Receive Confirmation</h5>
            <p class="text-muted mb-0">You’ll receive a confirmation or selection email from our team.</p>
          </div>
        </div>

        <!-- Step 4 -->
        <div class="d-flex align-items-start mb-4 p-4 bg-white shadow-sm rounded-4 border-start border-4 border-danger">
          <div class="me-4 display-5 fw-bold text-danger">4</div>
          <div>
            <h5 class="fw-bold">Start Your Journey</h5>
            <p class="text-muted mb-0">Begin your learning or career path with us successfully.</p>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>



<?php include 'footer.php'; ?>
