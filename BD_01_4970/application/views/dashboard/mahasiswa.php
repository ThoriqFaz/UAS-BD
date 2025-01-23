<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <script src="<?= base_url('assets/js/bootstrap.js'); ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
    <title>Dashboard Mahasiswa</title>
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
        h2 {
            color: #333;
            margin-bottom: 20px;
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
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
            color: #333;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        a {
            color: #d04b4b;
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #ffcccc;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        a:hover {
            background-color: #ff9999;
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
        <div class="background-banner"></div>
        <h2>Data Mahasiswa</h2>
        <table>
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Nilai</th>
                    <th>Matakuliah</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $nomor = 1;
                foreach ($nilai as $data) {
                    echo "<tr>";
                    echo "<td>" . $nomor++ . "</td>";
                    echo "<td>" . htmlspecialchars($data->nama) . "</td>";
                    echo "<td>" . htmlspecialchars($data->user) . "</td>";
                    echo "<td>" . htmlspecialchars($data->score) . "</td>";
                    echo "<td>" . htmlspecialchars($data->matkul) . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <a class="logout-button" href="<?php echo base_url().'/auth/logout'?>">Logout</a>
    </div>
</body>
</html>
