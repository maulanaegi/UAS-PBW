<div class="box-title">
    <p>Tentang / <b>Profil Pembuat</b></p>
</div>

<div id="box">
  <!-- Profil Orang Pertama -->
  <div class="profile">
    <h1 class="centered">Tentang</h1>
    <div class="profile-content">
      <img src="img/jersey/idan.jpeg" width="150" class="profile-img" />
      <table>
        <tr>
          <td width="25%"><b>NAMA</b></td>
          <td>: Wildan Taufik Dermawan</td>
        </tr>
        <tr>
          <td><b>NIM</b></td>
          <td>: 220660121128</td>
        </tr>
        <tr>
          <td><b>Jurusan</b></td>
          <td>: Informatika</td>
        </tr>
        <tr>
          <td><b>Hobby</b></td>
          <td>: Naik Gunung, Futsal, Berenang, dll</td>
        </tr>
        <tr>
          <td><b>Minat</b></td>
          <td>: Sistem Cerdas, Keamanan Sistem, Jaringan Komputer</td>
        </tr>
      </table>
    </div>
  </div>

  <!-- Profil Orang Kedua -->
  <div class="profile">
    <h1 class="centered">Tentang</h1>
    <div class="profile-content">
      <img src="img/jersey/uqi.jpeg" width="150" class="profile-img" />
      <table>
        <tr>
          <td width="25%"><b>NAMA</b></td>
          <td>: Syauqi Zainun Nauval</td>
        </tr>
        <tr>
          <td><b>NIM</b></td>
          <td>: 220660121022</td>
        </tr>
        <tr>
          <td><b>Jurusan</b></td>
          <td>: Informatika</td>
        </tr>
        <tr>
          <td><b>Hobby</b></td>
          <td>: Olahraga, Mendengarkan Music</td>
        </tr>
        <tr>
          <td><b>Minat</b></td>
          <td>: IoT Enthusiast, Arduino Programmer</td>
        </tr>
      </table>
    </div>
  </div>

  <!-- Profil Orang Ketiga -->
  <div class="profile">
    <h1 class="centered">Tentang</h1>
    <div class="profile-content">
      <img src="img/jersey/adi.jpeg" width="150" class="profile-img" />
      <table>
        <tr>
          <td width="25%"><b>NAMA</b></td>
          <td>: Radhi Rabbani</td>
        </tr>
        <tr>
          <td><b>NIM</b></td>
          <td>: 220660121102</td>
        </tr>
        <tr>
          <td><b>Jurusan</b></td>
          <td>: Informatika</td>
        </tr>
        <tr>
          <td><b>Hobby</b></td>
          <td>: Modifikasi Motor, Fotografi, Bermain Game</td>
        </tr>
        <tr>
          <td><b>Minat</b></td>
          <td>: Jaringan Komputer, Machine Learning</td>
        </tr>
      </table>
    </div>
  </div>
</div>

<style>
  /* Centering Title */
  .centered {
    text-align: center;
    font-size: 28px;
    margin: 20px 0;
    color: #fff;
    font-family: 'Arial', sans-serif;
  }

  /* Box styling */
  #box {
    width: 80%;
    margin: 0 auto;
    font-family: Arial, sans-serif;
    background: linear-gradient(45deg, #ff6b6b, #f06c64, #4ecdc4, #556270); /* Gradasi lebih cerah dengan warna pink, oranye, hijau, dan biru */
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Bayangan kotak */
  }

  /* Styling untuk setiap profil */
  .profile {
    background-color: #ffffff; /* Latar belakang putih untuk setiap profil */
    border: 2px solid #4CAF50; /* Garis tepi hijau untuk setiap profil */
    padding: 20px;
    margin-bottom: 20px; /* Jarak antara profil */
    border-radius: 10px; /* Sudut melengkung pada border */
    transition: transform 0.3s ease, box-shadow 0.3s ease; /* Efek transisi */
  }

  /* Hover effect pada profil */
  .profile:hover {
    transform: translateY(-5px); /* Profil terangkat sedikit */
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2); /* Bayangan lebih tebal saat hover */
  }

  /* Flexbox untuk menyusun gambar dan tabel secara sejajar */
  .profile-content {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
  }

  /* Styling untuk gambar profil */
  .profile-img {
    margin-right: 20px; /* Memberikan jarak antara gambar dan tabel */
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Bayangan pada gambar */
  }

  /* Styling tabel */
  table {
    width: 70%;
    border-spacing: 5px;
  }

  table td {
    padding: 8px;
    border-bottom: 1px solid #ddd;
  }

  table td:first-child {
    width: 25%;
    font-weight: bold;
    color: #4CAF50; /* Warna hijau untuk label */
  }

  /* Styling garis tepi dan pemisah antar profil */
  .profile:not(:last-child) {
    border-bottom: 2px solid #4CAF50; /* Garis pemisah antar profil */
  }

  /* Styling tambahan untuk responsive tampilan */
  @media (max-width: 768px) {
    #box {
      width: 90%;
    }

    .profile {
      padding: 15px;
    }

    .profile-img {
      margin-right: 0;
      margin-bottom: 15px;
    }

    .profile-content {
      flex-direction: column;
      align-items: center;
    }

    table {
      width: 100%;
      margin-top: 10px;
    }
  }
</style>
