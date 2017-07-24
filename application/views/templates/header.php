
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url('assets'); ?>/images/favicon.png">

    <title>1JutaDomain Status Dashboard | <?php echo $title; ?></title>

    <link href="<?php echo base_url('assets'); ?>/css/norm.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets'); ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets'); ?>/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url('assets'); ?>/css/style.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-toggleable-md navbar-inverse -bg-inverse fixed-top">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url(); ?>">
		<img src="<?php echo base_url('assets'); ?>/images/1jutadomain-logo-white.png" alt="1 Juta Domain">
	  </a>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('home'); ?>">Beranda<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('persyaratan'); ?>">Persyaratan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('kontak'); ?>">Hubungi Kami</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('unduh'); ?>">Unduh</a>
          </li>
		  <?php if ( $logged_user ) : ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i> Admin </a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Home</a>
              <a class="dropdown-item" href="#">Pengaturan Status</a>
              <a class="dropdown-item" href="#">Pengaturan User</a>
              <a class="dropdown-item" href="#">Pengaturan Master Data</a>
            </div>
          </li>
		  <?php endif; ?>
        </ul>
        <!--form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Cari tentang">
          <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Cari</button>
        </form-->
      </div>
    </nav>

	<div class="container">
		<div class="row main">
			<div class="col-md-3 sidebar flex-last pl-lg-3 mt-3">
				<?php if ( !( $logged_user /*|| $admin_page*/) ) : ?>
					<h4>Masuk Sistem</h4>
					<form class="form-signin p-0" action="<?php echo base_url('user/login'); ?>" method="post">
						<label for="inputEmail" class="sr-only">Email address</label>
						<input type="email" id="inputEmail" name="username" class="form-control" placeholder="username" required autofocus>
						<label for="inputPassword" class="sr-only">Password</label>
						<input type="password" id="inputPassword" name="password" class="form-control" placeholder="password" required>
						<!--div class="checkbox">
						  <label>
							<input type="checkbox" value="remember-me" name="remember"> Tetap masuk
						  </label>
						</div-->
						<button class="btn btn-md btn-primary btn-block" type="submit">Login</button>
					</form>
				<?php else : ?>
					<h4>Hi <?php echo explode('@', $logged_user->email)[0]; ?>,</h4>
					<ul class="navbar-nav mr-auto">
					  <li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('admin/home'); ?>">Beranda Admin<span class="sr-only">(current)</span></a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('admin/status'); ?>">Pengkinian Status</a>
					  </li>
					  <li class=""><hr></li>
					  <li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('admin/manage_status'); ?>">Pengaturan Status</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('admin/manage_user'); ?>">Pengaturan User</a>
					  </li>
					  <li class=""><hr></li>
					  <li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('user/logout'); ?>">Log out</a>
					  </li>
					</ul>
				<?php endif; ?>
					<br>
					<h4>Cek Status Bantuan</h4>
					<form class="form-signin p-0" action="<?php echo base_url('check/by_requestor'); ?>" method="post">
						<label for="nama" class="sr-only">Email address</label>
						<input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Penerima Bantuan" required>
						Atau
						<label for="namafasil" class="sr-only">Email address</label>
						<input type="text" id="namafasil" name="fasil" class="form-control mb-2" placeholder="Nama Fasilitator" required>
						<!--div class="checkbox">
						  <label>
							<input type="checkbox" value="remember-me" name="remember"> Tetap masuk
						  </label>
						</div-->
						<button class="btn btn-md btn-primary btn-block" type="submit">Cari</button>
					</form>
			</div>
			
			<div class="col-md-9 main flex-first mt-3">