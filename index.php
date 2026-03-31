<?php
include 'config.php';

$profileQuery = mysqli_query($conn, "SELECT * FROM profile LIMIT 1");
$profile = mysqli_fetch_assoc($profileQuery);

$skillsQuery = mysqli_query($conn, "SELECT * FROM skills ORDER BY id");
$experiencesQuery = mysqli_query($conn, "SELECT * FROM experiences ORDER BY id");
$certificatesQuery = mysqli_query($conn, "SELECT * FROM certificates ORDER BY id");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portfolio - <?php echo htmlspecialchars($profile['name']); ?></title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow custom-navbar">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#home">
        <?php echo htmlspecialchars($profile['name']); ?>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#about">About Me</a></li>
          <li class="nav-item"><a class="nav-link" href="#certificates">Certificates</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <section id="home" class="vh-100 d-flex align-items-center bg-light">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <h1 class="fw-bold display-4 hero-title">
            Hi!
            <br>
            <span class="hero-name">I'm <?php echo htmlspecialchars($profile['name']); ?></span>
          </h1>

          <p class="lead mt-3">
            <?php echo htmlspecialchars($profile['tagline']); ?>
          </p>

          <p class="text-muted">
            <?php echo htmlspecialchars($profile['intro']); ?>
          </p>

          <a href="#about" class="btn hero-btn mt-3">Explore More</a>
        </div>

        <div class="col-md-6 text-center">
          <div class="image-wrapper">
            <img src="<?php echo htmlspecialchars($profile['profile_image']); ?>" class="img-fluid hero-img" alt="Profile">
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="about" class="about-section py-5">
    <div class="container">
      <div class="about-title text-center mb-4">
        <h2 class="fw-bold mb-0">About Me 𐀪⭑.ᐟ</h2>
      </div>

      <div class="row g-4 align-items-stretch">
        <div class="col-lg-7">
          <div class="about-card about-card-denim p-4 p-lg-5 mb-4">
            <h4 class="fw-bold mb-3">Tentang Saya</h4>
            <p class="mb-0 about-text">
              <?php echo htmlspecialchars($profile['about_text']); ?>
            </p>
          </div>

          <div class="about-card about-card-seashell p-4 p-lg-5">
            <h4 class="fw-bold text-center mb-4">Skills</h4>

            <?php while ($skill = mysqli_fetch_assoc($skillsQuery)) : ?>
              <div class="mb-3">
                <div class="d-flex justify-content-between small fw-semibold">
                  <span><?php echo htmlspecialchars($skill['skill_name']); ?></span>
                  <span><?php echo (int)$skill['skill_level']; ?>%</span>
                </div>

                <div class="progress about-progress mt-2">
                  <div
                    class="progress-bar about-progress-bar"
                    style="width: <?php echo (int)$skill['skill_level']; ?>%;"
                  ></div>
                </div>
              </div>
            <?php endwhile; ?>
          </div>
        </div>

        <div class="col-lg-5">
          <div class="about-card about-card-seashell p-4 p-lg-5 h-100">
            <h3 class="text-center fw-bold mb-4">Pengalaman</h3>

            <div class="timeline">
              <?php while ($exp = mysqli_fetch_assoc($experiencesQuery)) : ?>
                <div class="timeline-item">
                  <div class="timeline-dot"></div>

                  <div class="timeline-content">
                    <div class="d-flex flex-wrap justify-content-between gap-2">
                      <div class="fw-bold"><?php echo htmlspecialchars($exp['title']); ?></div>
                      <div class="small text-muted"><?php echo htmlspecialchars($exp['year']); ?></div>
                    </div>

                    <div class="small text-muted mb-2">
                      <?php echo htmlspecialchars($exp['role']); ?>
                    </div>
                  </div>
                </div>
              <?php endwhile; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="certificates" class="py-5 bg-light">
    <div class="container">
      <div class="about-title text-center mb-4">
        <h2 class="fw-bold mb-0">CERTIFICATES</h2>
      </div>

      <p class="text-center text-muted mb-5">
        Beberapa sertifikat keikutsertaan saya dalam berbagai kegiatan
      </p>

      <div class="row g-4 cert-grid">
        <?php while ($cert = mysqli_fetch_assoc($certificatesQuery)) : ?>
          <div class="col-12 col-md-6 col-lg-4 d-flex">
            <div
              class="cert-tile shadow-sm w-100"
              role="button"
              data-bs-toggle="modal"
              data-bs-target="#certModal<?php echo $cert['id']; ?>"
            >
              <img
                src="<?php echo htmlspecialchars($cert['image_path']); ?>"
                class="cert-img"
                alt="<?php echo htmlspecialchars($cert['title']); ?>"
              >
            </div>
          </div>

          <div class="modal fade" id="certModal<?php echo $cert['id']; ?>" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <div>
                    <h5 class="modal-title mb-0">
                      <?php echo htmlspecialchars($cert['title']); ?>
                    </h5>
                    <small class="text-muted">
                      <?php echo htmlspecialchars($cert['issuer']); ?> • <?php echo htmlspecialchars($cert['year']); ?>
                    </small>
                  </div>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                  <div class="text-center">
                    <img
                      src="<?php echo htmlspecialchars($cert['image_path']); ?>"
                      class="img-fluid cert-full"
                      alt="<?php echo htmlspecialchars($cert['title']); ?>"
                    >
                  </div>

                  <?php if (!empty($cert['description'])) : ?>
                    <p class="text-muted mt-3 mb-0">
                      <?php echo htmlspecialchars($cert['description']); ?>
                    </p>
                  <?php endif; ?>
                </div>

                <div class="modal-footer">
                  <a
                    class="btn btn-primary"
                    href="<?php echo htmlspecialchars($cert['image_path']); ?>"
                    target="_blank"
                    rel="noopener"
                  >
                    Buka di Tab Baru
                  </a>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>