<?php
session_start();
include_once "php/config.php";
if (!isset($_SESSION['id_diff'])) {
  header("location: login.php");
}
?>
<?php include_once "header.php"; ?>

<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE id_diff = {$_SESSION['id_diff']}");
          if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
          }
          ?>
          <img src="php/images/<?php echo $row['img_profile']; ?>" alt="">
          <div class="details">
            <span><?php echo $row['n_user'] . " " . $row['l_user'] ?></span>
            <p><?php echo $row['st']; ?></p>
          </div>
        </div>
        <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Cerrar Sesión</a>
      </header>
      <div class="search">
        <span class="text">Selecciona un usuario para iniciar el chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">

      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>

</body>

</html>