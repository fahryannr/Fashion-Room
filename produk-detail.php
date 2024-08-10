<?php
    require"koneksi.php";

    $nama = htmlspecialchars($_GET['p']);
    $queriProduk = mysqli_query($con, "select * from produk where nama='$nama'");
    $produk = mysqli_fetch_array($queriProduk);
    
    $produkTerkait = mysqli_query($con, "select * from produk where kategori_id='$produk[kategori_id]' and id !='$produk[id]' limit 4");
    
//     $id = htmlspecialchars($_GET['p']);
// $queriProduk = mysqli_query($con, "SELECT * FROM produk WHERE id='$id'");
// $produk = mysqli_fetch_array($queriProduk);

// $produkTerkait = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id='$produk[kategori_id]' AND id != '$produk[id]' LIMIT 4");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Online | <?php print $produk['nama']; ?></title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .product-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .product-title {
            color: #343a40;
            font-weight: bold;
        }
        .product-price {
            font-size: 1.5rem;
            color: #ca965c;
            margin: 1rem 0;
        }
        .availability {
            font-size: 1.1rem;
            color: #28a745;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
        .detail-img-small {
            max-width: 100%; /* Memastikan gambar responsif */
            height: auto; /* Mempertahankan rasio aspek */
            max-height: 450px; /* Mengatur tinggi maksimum gambar */
        }
        .produk-terkait-img{
    height: 100%;
    width: 100%;
    object-fit: cover;
    object-position: center;
}
    </style>
</head>
<body>

<?php require "navbar.php"; ?>

<!-- Detail Produk -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="image/<?php print $produk['foto']; ?>" class="img-fluid rounded shadow detail-img-small" alt="Baju Keren">
            </div>
            <div class="col-md-6">
                <div class="product-card">
                    <h1 class="display-4 product-title"><?php echo $produk['nama']; ?></h1>
                    <p class="lead text-muted"><?php echo $produk['detail']; ?></p>
                    <p class="product-price">Rp <?php echo number_format($produk['harga'], 0, ',', '.'); ?></p>
                    <p class="availability">Ketersediaan: <strong><?php echo $produk['ketersediaan_stock']; ?></strong></p>
                    <a href="" class="btn btn-custom warna2 mt-3">Beli Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- produk terkait -->
 <div class="container-fluid py-5 warna2">
    <div class="container">
        <div class="text-center">
            <h2 class="text-white mb-5">Produk Terkait</h2>

            <div class="row">
                <?php
                    while($data = mysqli_fetch_array($produkTerkait)){?>
                <div class="col-md-6 col-lg-3 mb-3">
                    <a href="produk-detail.php?p=<?php print $data['nama'];?>">
                        <img src="image/<?php print $data['foto'];?>" alt="" class="img-fluid img-thumbnail produk-terkait-img">
                    </a>
                </div>
                <?php    }?>
            </div>
                

        </div>
    </div>
 </div>

<?php require "footer.php"; ?>

<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../fontawesome/js/all.min.js"></script>
</body>
</html>
