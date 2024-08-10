<?php
    require"koneksi.php";

    $queriProduk = mysqli_query($con, "select id, nama, harga, foto, detail from produk limit 6");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko-Online | Home</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

    <style>
            
    </style>


<body>

    <?php
        require"navbar.php";
    ?>

<!--baner-->
    <div class="container-fluid baner d-flex align-items-center">
        <div class="container text-center text-white">
            <h1>Toko Online Fashion</h1>
            <h3>Mau Cari Apa</h3>

            
                <div class="col-md-8 offset-md-2">
                    <form action="produk.php" method="get">
                        <div class="input-group input-group-lg my-4">
                            <input type="text" class="form-control" placeholder="Nama Produk" aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword">
                            </a><button type="submit" class="btn warna2 text-white">telusuri</button>
                        </div>
                    </form>
                </div>
        </div>
    </div>



    <!-- highlight kategori -->
    <div class="container-fluid py-5">
    <div class="container text-center">
        <h3>Kategori Paling Laris</h3>

        <div class="row mt-5">
            <div class="col-md-4 mb-3">
                <div class="higlighted-kategori kategori-baju-pria d-flex justify-content-center align-items-center kategori">
                    <h4><a href="produk.php?kategori=Baju Pria" class="no-dekor">Baju Pria</a></h4>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="higlighted-kategori kategori-baju-wanita d-flex justify-content-center align-items-center kategori">
                    <h4><a href="produk.php?kategori=Baju Wanita" class="no-dekor">Baju Wanita</a></h4>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="higlighted-kategori kategori-sepatu d-flex justify-content-center align-items-center kategori">
                    <h4><a class="no-dekor" href="produk.php?kategori=Sepatu">Sepatu</a></h4>
                </div>
            </div>
        </div>
    </div>
</div>



     
      <!-- Tentang Kami -->
<div class="container-fluid py-5 kami">
    <div class="container text-center">
        <h3>Tentang Kami</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, quia, ducimus, tempore possimus sapiente voluptatum necessitatibus assumenda, officia similique reiciendis minima inventore delectus sint saepe doloribus iure incidunt! Iure, assumenda quam inventore doloremque reprehenderit odio veniam id soluta atque nulla dicta quos illum consequatur magnam excepturi maxime enim autem ullam earum quo.</p>
    </div>
</div>

    <!-- produk -->
<div class="container-fluid py-5">
    <div class="container text-center">
        <h3>Produk</h3>

        <div class="row mt-5">
            <?php
                while($data = mysqli_fetch_array($queriProduk)) {
            ?>
                <div class="col-sm-6 col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="image-box">
                            <img src="image/<?php echo $data['foto']; ?>" class="card-img-top" alt="<?php echo $data['nama']; ?>">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $data['nama']; ?></h4>
                            <p class="card-text text-truncate"><?php echo $data['detail']; ?></p>
                            <p class="card-text text-harga">Rp <?php echo number_format($data['harga'], 0, ',', '.'); ?></p>
                            <a href="produk-detail.php?p=<?php echo $data['nama']; ?>" class="btn warna2 text-white">Lihat Selengkapnya</a>
                        </div>
                    </div>
                </div>
            <?php
                }
            ?>
        </div>
        <a  href="produk.php" class="btn btn-outline-warning mt-3">Lebih Lanjut</a>
    </div>
</div>

       
    <?php
        require "footer.php";
    ?>



<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../fontawesome/js/all.min.js"></script>
    
</body>
</html>