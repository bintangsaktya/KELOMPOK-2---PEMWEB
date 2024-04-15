<?php
session_start();
if (!isset($_SESSION['id'])) {
  header("Location: ../index.html");
}
?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!--CSS BS-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link href="assets/css/style-main.css" rel="stylesheet" />
  <!--JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script src="assets/js/home_page.js"></script>
  <!--FONT-->
  <link href="https://api.fontshare.com/v2/css?f[]=satoshi@500&display=swap" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

  <title>Document</title>
</head>

<body class="h-100">
  <div class="container h-100">
    <!--NAVBAR-->
    <div class="container row ps-5 pt-0">
      <div class="col-3 pt-3">
        <img src="assets/img/Unifind..svg" />
      </div>
      <div class="col-5 justify-content-start border border-top-0 d-flex pt-3">
        <p class="nav-text2">Barang Saya</p>
      </div>
      <div class="col-4 justify-content-start d-flex mt-1">
        <form class="pt-2">
          <div class="search ms-1">
            <img src="assets/img/search.svg" class="ms-2" />
            <input class="search-input border-0 p-2" type="search" placeholder="Search" />
          </div>
        </form>
      </div>
    </div>
    <!--NAVBAR END-->

    <!--CONTENT SECTION-->
    <div class="container row ps-5 h-100">
      <!--NAV KIRI-->
      <div class="col-3">
        <ul class="menu pt-3 list-group">
          <li class="menu-item">
            <img src="assets/img/Vector.svg" class="me-2 pb-1" />
            <a href="../main/home_page.php">Beranda</a>
          </li>
          <li class="mt-3 menu-item">
            <img src="assets/img/work_outline.svg" class="me-2 pb-1" />
            <a href="../main/barang_page.php">Barang Saya</a>
          </li>
          <li class="mt-3 menu-item">
            <img src="assets/img/perm_identity.svg" class="me-2 pb-1" />
            <a href="../main/profil_page.php">Profil</a>
          </li>
          <li class="mt-4">
            <a href="../main/upload_page.php" type="button" class="btn btn-secondary btn-unggah">Unggah Kehilangan</a>
          </li>
          <li class="mt-4">
            <a href="../controller/userLogout.php" type="button" class="btn btn-secondary btn-logout">Logout</a>
          </li>
        </ul>
      </div>
      <!--CONTENT-->
      <div class="col-5 border border-top-0 h-100">
        <?php
        require_once '../config/db.php';

        $sql = "SELECT * FROM barang INNER JOIN users ON barang.id_user = users.id";

        $statement = $pdo->query($sql);

        $posts = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($posts) {
          foreach ($posts as $post) { ?>
            <div class="row border-bottom mx-1 mt-3 pb-2">
              <div class="col-4 ps-0">
                <img src="<?php echo $post['img_url'] ?>" class="img-fluid" />
              </div>
              <div class="col-5">
                <h5 class="item-name"><?php echo $post['nama_barang'] ?></h5>
                <p class="posting-date mb-0">Posting Date</p>
                <p class="date"><?php echo $post['tanggal'] ?></p>
              </div>
              <div class="col-3 d-flex justify-content-end align-items-center pe-0">
                <ul class="">
                  <li>
                    <button type="button"
                      class="btn-secondary btn-create rounded d-flex justify-content-center align-items-center border-0 mt-1 ms-1">
                      <img src="assets/img/create.svg" class="py-1" />
                    </button>
                  </li>
                  <li>
                    <button type="button"
                      class="btn-secondary btn-del rounded d-flex justify-content-center align-items-center border-0 mt-2 ms-1 px-1">
                      <img src="assets/img/delete.svg" class="py-1 img-del" />
                    </button>
                  </li>
                </ul>
              </div>
            </div>
          <?php }
        } else { ?>
          <p>Tidak ada barang yang hilang</p>
        <?php }

        ?>
      </div>
      <!--WHITESPACE-->
      <div class="col-4"></div>
    </div>
    <!--CONTENT UPLOAD SECTION END-->

    <!--MAIN CONTENT-->

    <!--MAIN CONTENT END-->
  </div>
</body>

</html>