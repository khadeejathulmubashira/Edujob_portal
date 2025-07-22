<!-- Featured Courses -->
<section class="py-5 bg-light">
  <div class="container">
    <h2 class="text-center mb-5 fw-bold text-primary">🌟 Featured Courses</h2>

    <?php
    $courses = [
      ['title' => 'Web Development', 'desc' => 'Build responsive websites using HTML, CSS, JS, and frameworks.', 'img' => 'images\Web-Development.jpeg'],
      ['title' => 'AI & Machine Learning', 'desc' => 'Master ML, deep learning, and data processing tools.', 'img' => 'images\Artificial-Intelligence-and-Machine-Learning.jpg'],
      ['title' => 'Digital Marketing', 'desc' => 'Promote brands through SEO, SEM, and social media campaigns.', 'img' => 'images\digital-marketing.jpg'],
    ];
    foreach ($courses as $course):
    ?>
    <div class="card mb-4 shadow-sm border-0 rounded-4">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="<?php echo $course['img']; ?>" class="img-fluid rounded-start" alt="<?php echo $course['title']; ?>">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title text-primary"><?php echo $course['title']; ?></h5>
            <p class="card-text"><?php echo $course['desc']; ?></p>
            <a href="apply.php?type=course&for=<?php echo urlencode($course['title']); ?>" class="btn btn-outline-primary rounded-pill">Apply Now</a>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</section>


<!-- Job Opportunities -->
<section class="py-5">
  <div class="container">
    <h2 class="text-center mb-5 fw-bold text-success">💼 Job Opportunities</h2>

    <?php
    $jobs = [
      ['title' => 'Frontend Developer', 'desc' => 'Join tech teams building stunning interfaces using React, Angular, and more.', 'img' => 'images\front end developer.jpeg'],
      ['title' => 'Data Analyst', 'desc' => 'Analyze trends and help businesses make data-driven decisions.', 'img' => 'images\data-analysis.webp'],
      ['title' => 'UI/UX Designer', 'desc' => 'Design user-friendly and aesthetic digital interfaces.', 'img' => 'images\ux-design.webp'],
    ];
    foreach ($jobs as $job):
    ?>
    <div class="card mb-4 shadow-sm border-0 rounded-4">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="<?php echo $job['img']; ?>" class="img-fluid rounded-start" alt="<?php echo $job['title']; ?>">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title text-success"><?php echo $job['title']; ?></h5>
            <p class="card-text"><?php echo $job['desc']; ?></p>
            <a href="apply.php?type=job&for=<?php echo urlencode($job['title']); ?>" class="btn btn-outline-success rounded-pill">Apply Now</a>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</section>