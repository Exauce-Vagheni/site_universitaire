<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0"  name="viewport">

  <title>Admin/Université Adventiste de Lukanga</title>
  <meta content="" name="description">
  <meta content=""  name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicn.png" rel="icon">
  <link href="assets/img/apple-touch-icn.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/loo.png" alt="">
        <span class="d-none d-lg-block">UNILUK</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" required name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

         

  </header><!-- End Header -->

  <?php include("menus.php") ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Ajouter</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Institution</a></li>
          <li class="breadcrumb-item">Ajouter</li>
          <li class="breadcrumb-item active">Article</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Ajouter un article</h5>

              <!-- General Form Elements -->
              <form action="../../controleur/saves/save_article.php" method="post" enctype="multipart/form-data">
                <div class="row mb-3">
                  <label for="auteur" class="col-sm-2 col-form-label">Auteur</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="auteur">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="titre" class="col-sm-2 col-form-label">Titre</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="titre">
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="image" class="col-sm-2 col-form-label">Photo de l'article</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile" required name="image">
                  </div>
                </div>
                

              
                <div class="row mb-3">
                  <label for="contenu" class="col-sm-2 col-form-label">Contenu</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height: 100px" required name="contenu"></textarea>
                  </div>
                </div>
              

                <div class="row mb-3">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Ajouter l'article</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>


        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php  
    include("footer.php");
  ?><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>