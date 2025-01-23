<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="icon"
      href="https://pmm.kampusmerdeka.kemdikbud.go.id/files/logopt/051024.png"
    />
    <title>Dashboard Dosen</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
        <link rel="stylesheet" href="<?=base_url() . 'assets/styles/dashboard.css'?>" />
        <!-- <link rel="stylesheet" href="<?=base_url() . 'assets/styles/style.css'?>" /> -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <body>
    <!-- HEADER -->
    <div class="top-header">
      <div class="d-flex justify-content-between">
        <div class="d-flex">
          <img src="<?=base_url() . 'assets/pth.png'?>" alt="img" />
          <div class="pts">
            <b><h2>UNIVERSITAS AMIKOM YOGYAKARTA</h2></b>
          </div>
        </div>
        <!-- LOGOUT -->
        <div class="logout">
          <a href="login.php" class="text-decoration-none" style="color: white"
            >LOGOUT</a
          >
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <!-- SIDEBAR KIRI -->
        <div class="col-2 kiri">
          <div class="profile d-flex flex-column align-items-center">
            <img class="pp" src="<?=base_url() . 'assets/pp.png'?>" alt="" />
            <p class="m-0"><b>Vany Eka Karunia</b></p>
            <p class="m-0">23.01.4995</p>
          </div>
          <hr />
          <div class="menu">
            <a
              href="dashboard.php"
              class="text-decoration-none"
              style="color: currentColor"
            >
              <div class="menu-item">
                <i class="fas fa-tachometer-alt menu-icon"></i>Dashboard Dosen
              </div>
            </a>
            <a
              href="tambahdata.php"
              class="text-decoration-none"
              style="color: currentColor"
            >
              <div class="menu-item">
                <i class="fas fa-plus menu-icon"></i>Tambah Data Mahasiswa
              </div>
            </a>
            <a
              href="rekapitulasi.php"
              class="text-decoration-none"
              style="color: currentColor"
            >
              <div class="menu-item">
                <i class="fas fa-chart-bar menu-icon"></i>Rekap Data Mahasiswa
              </div>
            </a>
          </div>
        </div>


        <!-- KONTEN KANAN -->
        <div class="col-10 kanan">
