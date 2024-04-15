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
  <!-- <script src="assets/js/home_page.js"></script> -->
  <!--FONT-->
  <link href="https://api.fontshare.com/v2/css?f[]=satoshi@500&display=swap" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

  <title>Upload Kehilangan</title>
</head>

<body class="h-100">
  <div class="container h-100">
    <!--NAVBAR-->
    <div class="container row ps-5 pt-0">
      <div class="col-3 pt-3">
        <img src="assets/img/Unifind..svg" />
      </div>
      <div class="col-5 justify-content-start border border-top-0 d-flex pt-3">
        <p class="nav-text2">Upload Kehilangan</p>
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
        <!-- PROFILE ISI -->
        <div class="row vh-100 mx-1 mt-3">
          <div class="col h-100">
            <!--FORM EDIT PROFIL  -->
            <form class="mt-3" method="POST">
              <div class="mb-3">
                <label for="exampleInputNama1" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" />
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Deskripsi</label>
                <input type="text" class="form-control" id="deskripsi" />
                <p class="mini-text">
                  Jelaskan informasi penting seperti warna, jenis, dll.
                </p>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Lokasi</label>
                <input type="text" class="form-control" id="lokasi" />
                <p class="mini-text">
                  Lokasi terakhir sebelum barang hilang.
                </p>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Foto</label>
                <input type="file" class="form-control" id="file" />
              </div>

              <button type="button" class="btn-full active" id="submit">Simpan</button>
            </form>
          </div>
        </div>
      </div>
      <!--WHITESPACE-->
      <div class="col-4"></div>
    </div>
    <!--CONTENT UPLOAD SECTION END-->

    <!--MAIN CONTENT-->

    <!--MAIN CONTENT END-->
  </div>
  <script>
    const button = document.querySelector("#submit");

    button.addEventListener("click", () => {
      let id_user = <?php echo $_SESSION["id"]; ?>;
      let nama_barang = document.querySelector("#nama_barang").value;
      let deskripsi = document.querySelector("#deskripsi").value;
      let lokasi = document.querySelector("#lokasi").value;
      let currentDate = new Date().toDateString();
      let image = document.querySelector("#file");
      let formData = new FormData();

      formData.append("id_user", id_user);
      formData.append("nama_barang", nama_barang);
      formData.append("deskripsi", deskripsi);
      formData.append("lokasi", lokasi);
      formData.append("tanggal", currentDate);
      formData.append("file", image.files[0]);

      if (!!nama_barang && !!deskripsi && !!lokasi) {
        axios.post("http://localhost/PW_project/controller/createPost.php", formData, {
          headers: {
            'Content-Type': 'multipart/form-data'
          },
        }).then(function (response) {
          alert(response.data);
          if (response.data == "Upload Berhasil") {
            window.location.href = "./home_page.php";
          }
        })
      } else {
        alert("Silahkan isi yang kosong");
      }
    })
  </script>
</body>

</html>