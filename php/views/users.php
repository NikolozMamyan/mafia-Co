<?php include_once "views/header.php"; ?>
<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <img src="assets/images/<?php echo $userDetails['img']; ?>" alt="">
          <div class="details">
            <span><?php echo $userDetails['fname'] . " " . $userDetails['lname']; ?></span>
            <p><?php echo $userDetails['status']; ?></p>
          </div>
        </div>
        <a href="php/logout.php?logout_id=<?php echo $userDetails['unique_id']; ?>" class="logout">Logout</a>
      </header>
      <div class="search">
        <span class="text">Select a user to start chatting</span>
        <input type="text" placeholder="Enter a name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
        <?php foreach ($otherUsers as $user) { ?>
          <div class="user">
            <!-- Affichez les informations de l'utilisateur -->
          </div>
        <?php } ?>
      </div>
    </section>
  </div>

  <script src="assets/js/users.js"></script>
</body>
</html>