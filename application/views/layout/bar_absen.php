<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Add your CSS and other head elements here -->
</head>
<body>
  
<style>
  body {
    margin: 0;
    padding: 0;
    position: absolute;
  }

  .fixed-buttons {
    position: fixed;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    display: float;
    justify-content: center;
  }

  .button {
    margin: 5px;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
</style>
..
  <div class="fixed-buttons">
    <?php
    for ($i = 1; $i <= 3; $i++) {
        echo '<button class="button">Button ' . $i . '</button>';
    }
    ?>
  </div>
  
  <!-- Additional content or scripts here -->
</body>
</html>