<!-- chat.php -->
<?php include_once "views/header.php"; ?>
<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="php/images/<?php echo $userDetails['img']; ?>" alt="">
        <div class="details">
          <span><?php echo $userDetails['fname'] . " " . $userDetails['lname']; ?></span>
          <p><?php echo $userDetails['status']; ?></p>
        </div>
      </header>
      <div class="chat-box">
        <?php foreach ($chatMessages as $message) { ?>
          <!-- Affichez les messages de chat -->
        <?php } ?>
      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>

  <script src="assets/js/chat.js"></script>
</body>
</html>