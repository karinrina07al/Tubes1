<!DOCTYPE html>
<html lang="en">
<head>
  <title>Rental Mobil</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron text-center">
  <h1>RENTAL MOBIL</h1>
  <div>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="admin/index.php">Login</a>
            </li>
          </ul>
        </div>
</div>

    	<!-- Start Feature Area -->
			<section class="featured-area">
				<div class="container">
					<div class="row">
						<?php 
							include 'include/koneksi.php';
							$p = "select * from mobil";
							$i = mysqli_query($koneksi, $p);
							while ($r = mysqli_fetch_array($i)) {
							
						 ?>
						<div  class="col-sm-4 text-center">
							<div class="single-feature d-flex flex-wrap justify-content-between">
								<div class="icon">
									<img class="mx-auto rounded-circle" height="50" src="<?php echo 'admin/images/'.$r['foto_mobil']; ?>" alt="">
								</div>
								<div class="desc">
									<h4><?php echo $r['nama_mobil'] ?></h4>
									<p>Harga Sewa: <?php echo $r['harga_sewa'] ?></p>
									<p>Tujuan : <?php echo $r['tujuan'] ?></p>
								</div>
							</div>
							
						</div>
						<?php  
								}
							?>
						</div>
					</div>
				</section>	
<div class="jumbotron text-center">
	<h1>Contact Me</h1>
	<h2>081214501394</h2>
	
</div>

</body>
</html>