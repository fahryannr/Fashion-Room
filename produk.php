<?php
    require"koneksi.php";

    $queriMenampilkanKategori = mysqli_query($con, "select * from kategori");
    
    // mencari berdasar nama produk
    if(isset($_GET['keyword'])){
        $queriProduk = mysqli_query($con, "SELECT * FROM produk WHERE nama LIKE '%$_GET[keyword]%'");

    }

    // mencari berdasar kategori
    elseif(isset($_GET['kategori'])){
        $queriDariId = mysqli_query($con, "select id from kategori where nama='$_GET[kategori]'");
        $kategoriId = mysqli_fetch_array($queriDariId);

        $queriProduk = mysqli_query($con, "select * from produk where kategori_id='$kategoriId[id]'");

    }
    // mencari berdasar default
    else {
            $queriProduk = mysqli_query($con, "SELECT * FROM produk");
    }

    $countData = mysqli_num_rows($queriProduk);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Online | Produk</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
<?php
    require "navbar.php";
?>

<!-- Banner -->
<div class="container-fluid baner-produk">
    <div class="container">
        <h1 class="text-white text-center py-5">Produk</h1>
    </div>
</div>

<!-- Body -->
<div class="container py-5">
    <div class="row">
        <div class="col-lg-3 mb-3">
            <h3>Kategori</h3>
            <ul class="list-group">
                <?php
                    while ($kategori = mysqli_fetch_array($queriMenampilkanKategori)) {
                ?>
                <a href="produk.php?kategori=<?php print $kategori['nama']; ?>" class="text-decoration-none">
                    <li class="list-group-item"><?php print $kategori['nama']; ?></li>
                </a>
                <?php
                    }
                ?>
            </ul>
        </div>
        
        <div class="col-lg-9">
            <h3 class="text-center mb-3">Produk</h3>
            <div class="row">

            <?php
            if($countData < 1){
                ?>
                <h4 class="text-center">Produk yang anda cari tidak tersedia</h4>
                <?php
            }
            ?>

                <?php
                while ($produk = mysqli_fetch_array($queriProduk)) {
                ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="image-box">
                            <img src="image/<?php print $produk['foto']; ?>" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $produk['nama']; ?></h4>
                            <p class="card-text text-truncate"><?php echo $produk['detail']; ?></p>
                            <p class="card-text text-harga">Rp <?php echo number_format($produk['harga'], 0, ',', '.'); ?></p>
                            <a href="produk-detail.php?p=<?php print $produk ['nama']?>" class="btn warna2 text-white">Lihat Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php
        require "footer.php";
    ?>

<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../fontawesome/js/all.min.js"></script>
</body>
</html>
