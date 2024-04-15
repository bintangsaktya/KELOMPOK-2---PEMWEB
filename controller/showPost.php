<?php
require_once '../config/db.php';

$sql = "SELECT * FROM barang INNER JOIN users ON barang.id_user = users.id";

$statement = $pdo->query($sql);

$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

if ($posts) {
    foreach ($posts as $post) { ?>
        <div class="container row ps-5">
            <div class="col-3"></div>
            <div class="col-5 border border-top-0">
                <div class="row">
                    <img src="assets/img/Ellipse 51.svg" class="rounded-circle col-2 profile-img p-0 ms-3" />
                    <div class="col-4 mt-3">
                        <p class="name mb-0"><?php $post['nama'] ?></p>
                        <p class="post-info"><?php $post['username'] ?></p>
                    </div>
                </div>
                <!--Teks Konten-->
                <div class="row">
                    <div class="col-12">
                        <p class="text-main"><?php $post['deskripsi'] ?></p>
                    </div>
                </div>
                <!--Gambar Konten-->
                <div class="row pb-3 px-2">
                    <div class="col-6 wrap-img px-0">
                        <img src="<?php $post['img_url'] ?>" class="img-fluid" />
                    </div>
                </div>
            </div>
            <div class="col-4"></div>
        </div>
    <?php }
} ?>