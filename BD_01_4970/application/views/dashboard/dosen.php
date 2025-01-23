<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Dosen</title>
    <link rel="icon" href="<?= base_url('assets/lb_icon.png'); ?>" type="image/png">
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
            width: 1200px;
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
        form select, form input, form button {
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
        
        <h2>Lecturer Dashboard - Manage Grades</h2>

        
        <form method="POST" action="<?php echo base_url() . '/mahasiswa/update_nilai'?>">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <select class="form-select" id="nama" name="nama" required onchange="updateNilai()" >
                    <option value="">Pilih Nama</option>

                    <?php foreach ($students as $user) {
                            echo "<option value=\"" . htmlspecialchars($user->id) . "\">" . htmlspecialchars($user->nama) . "</option>";
                    }?>
                </select>
                <input type="hidden" id="nilai_id" name="nilai_id" value="">
                <input type="hidden" id="nim" name="nim" value="">
            </div>
            <div class="mb-3">
                <label for="matakuliah" class="form-label">Matakuliah</label>
                <select class="form-select" id="matakuliah" name="matakuliah" required onchange="updateNilai()">
                    <option value="">Pilih Matakuliah</option>

                    <?php foreach ($matakuliah as $mata) {
                            echo "<option value=\"" . htmlspecialchars($mata->id) . "\">" . htmlspecialchars($mata->nama) . "</option>";
                    }?>
                </select>
                <input type="hidden" id="nim" name="nim" value="">
            </div>
            <div class="mb-3">
                <label for="nilai" class="form-label">Nilai</label>
                <input type="number" class="form-control" id="nilai" name="nilai" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Nilai</button>
        </form>

        
        <h3>Student Grades</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Nilai</th>
                    <th>Mata Kuliah</th>
                </tr>
            </thead>
            <tbody>
                <?php

                    $nomor = 1;

                    foreach ($nilai as $siswa) {
                        echo "<tr>";
                        echo "<td>" . $nomor++ . "</td>";
                        echo "<td>" . htmlspecialchars($siswa->nama) . "</td>";
                        echo "<td>" . htmlspecialchars($siswa->user) . "</td>";
                        echo "<td>" . htmlspecialchars($siswa->score) . "</td>";
                        echo "<td>" . htmlspecialchars($siswa->matkul) . "</td>";
                        echo "</tr>";

                    }

                ?>
            </tbody>
        </table>


        <form action="<?php echo base_url() . '/auth/logout'?>" method="POST">
            <button type="submit" class="logout-button">Logout</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function updateNim() {
            const namaSelect = document.getElementById('nama');
            const matakuliahSelect = document.getElementById('matakuliah');
            const nimInput = document.getElementById('nim');
            nimInput.value = namaSelect.value;
        }
        function updateNilai() {
            var nama = document.getElementById("nama").value;
            var matakuliah = document.getElementById("matakuliah").value;

            if (nama && matakuliah) {
                var mahasiswa_id = nama;

                fetch('<?php echo base_url("mahasiswa/cek_nilai"); ?>', {
                    method: 'POST', 
                    headers: {
                        'Content-Type': 'application/json' 
                    },
                    body: JSON.stringify({
                        mahasiswa_id: mahasiswa_id, 
                        matkul_id: matakuliah       
                    })
                })
                .then(response => response.json()) 
                .then(data => {

                    if (data.nilai) {
                        document.getElementById("nilai").value = data.nilai.score;
                        document.getElementById('nilai_id').value = data.nilai.id;
                    } else {
                        document.getElementById("nilai").value = '';
                    }
                })
                .catch(error => {
                    console.error('Error:', error.message);
                });
            }
        }
    </script>
</body>
</html>