<?php
include 'db.php';


if (isset($_POST['kirim'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $tim  = htmlspecialchars($_POST['tim']);
    $pesan = htmlspecialchars($_POST['pesan']);

    $query = "INSERT INTO fans (nama, tim_favorit, pesan) VALUES ('$nama', '$tim', '$pesan')";
    mysqli_query($conn, $query);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le Mans 24h - Fan Zone</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    <style>
        .fan-zone { padding: 50px 20px; text-align: center; background: #111; }
        .form-box { max-width: 500px; margin: 0 auto; background: #222; padding: 30px; border-radius: 10px; border: 1px solid #e74c3c; }
        input, select, textarea { width: 100%; padding: 10px; margin: 10px 0; background: #333; border: none; color: white; border-radius: 5px; }
        .comment-list { max-width: 800px; margin: 30px auto; text-align: left; }
        .comment-card { background: #1c1c1c; padding: 15px; margin-bottom: 15px; border-left: 4px solid #e74c3c; border-radius: 5px; }
        .comment-header { display: flex; justify-content: space-between; color: #aaa; font-size: 0.9rem; margin-bottom: 5px; }
        .team-tag { background: #e74c3c; color: white; padding: 2px 8px; border-radius: 3px; font-size: 0.8rem; }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="logo">LE MANS <span>24H</span></div>
        <ul class="nav-links">
            <li><a href="#home">Home</a></li>
            <li><a href="#fans">Fan Zone</a></li>
        </ul>
    </nav>

    <section id="home" class="hero">
        <div class="hero-content">
            <h1>SUPPORT YOUR TEAM</h1>
            <p>Dukung tim favoritmu di ajang balap ketahanan dunia.</p>
        </div>
    </section>

    <section id="fans" class="fan-zone">
        <h2>LE MANS FAN ZONE</h2>
        <p>Tulis dukunganmu agar tersimpan di Server Database!</p>
        <br>

        <div class="form-box">
            <form action="" method="POST">
                <input type="text" name="nama" placeholder="Nama Kamu" required>
                <select name="tim">
                    <option value="Ferrari AF Corse">Ferrari AF Corse</option>
                    <option value="Toyota Gazoo Racing">Toyota Gazoo Racing</option>
                    <option value="Porsche Penske">Porsche Penske</option>
                    <option value="Cadillac Racing">Cadillac Racing</option>
                    <option value="Peugeot TotalEnergies">Peugeot TotalEnergies</option>
                </select>
                <textarea name="pesan" rows="3" placeholder="Pesan Semangat..." required></textarea>
                <button type="submit" name="kirim" class="btn" style="width:100%; border:none; cursor:pointer;">KIRIM DUKUNGAN</button>
            </form>
        </div>

        <div class="comment-list">
            <h3>Recent Supports:</h3>
            <?php
         
            $result = mysqli_query($conn, "SELECT * FROM fans ORDER BY id DESC");
            while ($row = mysqli_fetch_assoc($result)) {
                echo "
                <div class='comment-card'>
                    <div class='comment-header'>
                        <strong>{$row['nama']}</strong>
                        <span class='team-tag'>{$row['tim_favorit']}</span>
                    </div>
                    <p>{$row['pesan']}</p>
                    <small style='color:#555;'>{$row['waktu']}</small>
                </div>";
            }
            ?>
        </div>
    </section>

    <footer>
        <p>&copy; 2025 Fadhlan Server. Powered by Debian 11 & MariaDB.</p>
    </footer>

</body>
</html>
