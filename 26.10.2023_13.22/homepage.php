<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Your Site</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="src/favicon/favicon.ico" />
  <!-- Bootstrap icons-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="homepage_style.css" rel="stylesheet" />
  <link rel="stylesheet" href="cursor.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <!-- Responsive navbar-->
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="src/favicon/Furrit_Paw_Text.png" alt="Logo" width="100" height="30" class="d-inline-block align-text-top">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <li class="nav-link" style="margin-left: 10px;">
          <?php
          session_start();

          if (isset($_SESSION['email'])) {
            $username = $_SESSION['username'];
            $email = $_SESSION['email'];

            $maxUsernameLength = 255;
            $maxEmailLength = 255;

            if (strlen($username) > $maxUsernameLength) {
              $username = substr($username, 0, $maxUsernameLength) . "...";
            }

            if (strlen($email) > $maxEmailLength) {
              $email = substr($email, 0, $maxEmailLength) . "...";
            }

            echo '<a>Zalogowany użytkownik: <b style="color: aqua;">' . $username . '</span></b></a>';
            echo '<a id="logout" href="logout.php">Wyloguj się</a>';
          } else {
            echo '<a id="login" href="login.php">Zaloguj się</a>';
          }
          ?>
        </li>

      </div>
    </div>
  </nav>
  <!-- Navbar -->
  <!-- Header-->
  <header class="py-5">
    <div class="container px-lg-5">
      <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
        <div class="m-4 m-lg-5">
          <h1 class="display-5 fw-bold">A warm welcome!</h1>
          <p class="fs-4">Bootstrap utility classes are used to create this jumbotron since the old component
            has been removed from the framework. Why create custom CSS when you can use utilities?</p>
          <a class="btn btn-primary btn-lg" href="#!">Call AI to make a job for you</a>
        </div>
      </div>
    </div>
  </header>
  <!-- Page Content-->
  <section class="pt-4">
    <div class="container px-lg-5">
      <!-- Page Features-->
      <div class="row gx-lg-5">
        <div class="col-lg-6 col-xxl-4 mb-5">
          <div class="card bg-light border-0 h-100">
            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
              <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="bi bi-collection"></i></div>
              <h2 class="fs-4 fw-bold">Fresh new layout</h2>
              <p class="mb-0">With Bootstrap 5, we've created a fresh new layout for this template!</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-xxl-4 mb-5">
          <div class="card bg-light border-0 h-100">
            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
              <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="bi bi-cloud-download"></i></div>
              <h2 class="fs-4 fw-bold">Free to use</h2>
              <p class="mb-0">...</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-xxl-4 mb-5">
          <div class="card bg-light border-0 h-100">
            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
              <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="bi bi-card-heading"></i></div>
              <h2 class="fs-4 fw-bold">Jumbotron hero header</h2>
              <p class="mb-0">...</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-xxl-4 mb-5">
          <div class="card bg-light border-0 h-100">
            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
              <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="bi bi-bootstrap"></i></div>
              <h2 class="fs-4 fw-bold">Feature boxes</h2>
              <p class="mb-0">We've created some custom feature boxes using Bootstrap icons!</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-xxl-4 mb-5">
          <div class="card bg-light border-0 h-100">
            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
              <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="bi bi-code"></i></div>
              <h2 class="fs-4 fw-bold">Simple clean code</h2>
              <p class="mb-0">We keep our dependencies up to date and squash bugs as they come!</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-xxl-4 mb-5">
          <div class="card bg-light border-0 h-100">
            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
              <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="bi bi-patch-check"></i></div>
              <h2 class="fs-4 fw-bold">A name you trust</h2>
              <p class="mb-0">Start Bootstrap has been the leader in free Bootstrap templates since 2013!
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Footer-->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; </p>
    </div>
  </footer>
  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Core theme JS-->
  <script src="homepage_script.js"></script>

</body>

</html>