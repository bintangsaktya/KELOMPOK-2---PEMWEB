<?php
session_start();
if (!isset($_SESSION['id'])) {
  header("Location: ../index.html");
}
?>

<!DOCTYPE html>
<html lang="en">

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

<body>
  <div class="container">
    <!--NAVBAR-->
    <div class="container row ps-5 pt-0">
      <div class="col-3 pt-3">
        <img src="assets/img/Unifind..svg" />
      </div>
      <div class="col-5 justify-content-center border border-top-0 d-flex pt-4">
        <p class="nav-text">Untuk Anda</p>
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

    <!--CONTENT UPLOAD SECTION-->
    <div class="container row ps-5">
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
      <!--UPLOAD CONTENT-->
      <div class="col-5 border border-top-0">
        <div class="border mt-3 rounded content-bg h-75">
          <textarea class="content-text mt-1 mx-2 border-0" placeholder="Sebarkan berita kehilanganmu..."></textarea>
          <div class="row mx-2 mt-4">
            <button type="button" class="upload border-0 mt-3 col-1 d-flex justify-content-start pe-4 ps-0">
              <img src="assets/img/insert_photo.svg" />
            </button>
            <button type="button" class="upload border-0 mt-3 col-1 d-flex justify-content-start pe-4 ps-0">
              <img src="assets/img/gif_box.svg" />
            </button>
            <button type="button" class="upload border-0 mt-3 col-1 d-flex justify-content-start ps-0">
              <img src="assets/img/insert_emoticon.svg" />
            </button>
            <div class="col-6"></div>
            <button type="button" class="btn btn-secondary col-3 h-50 mt-2">
              Post
            </button>
          </div>
        </div>
      </div>
      <!--WHITESPACE-->
      <div class="col-4"></div>
    </div>
    <!--CONTENT UPLOAD SECTION END-->

    <!--MAIN CONTENT-->
    <div class="container row ps-5">
      <div class="col-3"></div>
      <div class="col-5 border border-top-0">
        <div class="row">
          <img src="assets/img/Ellipse 51.svg" class="rounded-circle col-2 profile-img p-0 ms-3" />
          <div class="col-4 mt-3">
            <p class="name mb-0">tiara permata</p>
            <p class="post-info">@tiaraprmt • 28m</p>
          </div>
        </div>
        <!--Teks Konten-->
        <div class="row">
          <div class="col-12">
            <p class="text-main">Halo</p>
          </div>
        </div>
        <!--Gambar Konten-->
        <div class="row pb-3 px-2">
          <div class="col-6 wrap-img px-0">
            <img src="../upload/omori.jpeg" class="img-fluid" />
          </div>
        </div>
      </div>
      <div class="col-4"></div>
    </div>

    <?php
    require_once '../config/db.php';

    $sql = "SELECT * FROM barang AS b INNER JOIN users AS u ON (b.id_user = u.id)";

    $statement = $pdo->prepare($sql);
    $statement->execute();

    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);

    if ($posts) {
      foreach ($posts as $post) { ?>
        <div class="container row ps-5">
          <div class="col-3"></div>
          <div class="col-5 border border-top-0">
            <div class="row">
              <img src="<?php echo $post['profile_img'] ?>" class="rounded-circle col-2 profile-img p-0 ms-3" />
              <div class="col-4 mt-3">
                <p class="name mb-0"><?php echo $post['nama'] ?></p>
                <p class="post-info"><?php echo $post['username'] ?></p>
              </div>
            </div>
            <!--Teks Konten-->
            <div class="row">
              <div class="col-12">
                <p class="text-main"><?php echo $post['deskripsi'] ?></p>
              </div>
            </div>
            <!--Gambar Konten-->
            <div class="row pb-3 px-2">
              <div class="col-6 wrap-img px-0">
                <img src="<?php echo $post['img_url'] ?>" class="img-fluid" />
              </div>
            </div>
          </div>
          <div class="col-4"></div>
        </div>
      <?php }
    } ?>

    <!--MAIN CONTENT END-->
  </div>
</body>

</html>