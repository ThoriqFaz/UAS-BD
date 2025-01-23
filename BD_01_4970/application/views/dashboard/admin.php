<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <script src="<?= base_url('assets/js/bootstrap.js'); ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
    <link rel="icon" href="<?= base_url('assets/lb_icon.png'); ?>" type="image/png">
    <title>Dashboard Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .dashboard-container {
            display: flex;
            flex-direction: column;
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            overflow: hidden;
            width: 1000px;
            max-width: 100%;
            position: relative;
            padding: 20px;
        }
        .background-banner {
            position: fixed; 
            top: 0;
            left: 0;
            width: 100vw; 
            height: 100vh; 
            z-index: -1;
            background-image: url('<?= base_url('assets/LB_R32.jpg'); ?>');
            background-size: cover; 
            background-position: center; 
            background-repeat: no-repeat; 
            filter: blur(5px);
        }
        h2, h3 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            justify-content: space-around;
            padding: 20px 0;
        }
        form input, form button {
            padding: 10px;
            margin: 5px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 16px;
        }
        form button {
            background-color: #d04b4b;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        form button:hover {
            background-color: #b33d3d;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        a {
            color: #d04b4b;
            font-weight: bold;
            text-decoration: none;
        }
        a:hover {
            color: #b33d3d;
        }
        .logout-button {
            margin: 20px auto;
            display: block;
            background-color: #d04b4b;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .logout-button:hover {
            background-color: #b33d3d;
        }

        .alert {
                display:flex;
                align-items:center;
                padding: 15px;
                margin: 15px 0;
                border-radius: 5px;
                font-family: Arial, sans-serif;
            }
            .alert-error {
                background-color: #f8d7da; 
                border: 1px solid #f5c6cb; 
                color: #721c24; 
            }
            .alert-success {
                background-color: #d4edda; 
                border: 1px solid #c3e6cb; 
                color: #155724; 
            }
            .error-text, .success-text {
                margin: 0;
                font-size: 16px;
            }
            .alert-error::before {
                content: "⚠️";
                margin-right: 10px;
                font-size: 18px;
            }
            .alert-success::before {
                content: "✅";
                margin-right: 10px;
                font-size: 18px;
            }
    </style>
</head>
<body>

    <div class="dashboard-container">
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-error">
                <p class="error-text"><?php echo $this->session->flashdata('error'); ?></p>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success">
                <p class="success-text"><?php echo $this->session->flashdata('success'); ?></p>
            </div>
        <?php endif; ?>

        <div class="background-banner"></div>
        
        <h2>Admin Dashboard - Manage Students</h2>


        <form class="form" method="POST" action="<?php echo base_url().'/mahasiswa/create' ?>">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    <button type="submit" class="button">Tambah Data</button>
                </div>
            </div>   
        </form>  


        <h3>Current Students</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        $nomor = 1;
                        if (! empty($users)) {
                            foreach ($users as $data) {
                                echo "<tr>";
                                echo "<td>" . $nomor++ . "</td>";
                                echo "<td>" . htmlspecialchars($data->nama) . "</td>";
                                echo "<td>" . htmlspecialchars($data->user) . "</td>";
                                echo "<td>
                            <a href='javascript:void(0)' onclick='confirmDelete(\"" . htmlspecialchars($data->user) . "\")' class='btn btn-danger'><i class='bi bi-trash-fill'></i></a>
                            </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7'>Tidak ada data ditemukan.</td></tr>";
                        }
                    ?>

                </tbody>
            </table>




        <form action="<?php echo base_url() . 'auth/logout' ?>" method="POST">
            <button type="submit" class="logout-button">Logout</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function confirmDelete(nim) {
            if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                window.location.href = "<?=base_url().'/mahasiswa/delete'?>?delete_nim=" + nim;
            }
        }

        function openEditModal(nim, nama, id) {
            document.getElementById("editNim").value = nim;
            document.getElementById("editNama").value = nama;
            new bootstrap.Modal(document.getElementById("editModal")).show();
        }
    </script>

</body>
</html>
