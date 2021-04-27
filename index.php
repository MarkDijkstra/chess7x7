<!DOCTYPE html>
<html>
<head>
    <title>Chessboard</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
      
    <div class="container">
        <?php 
            include 'classes/Chessboard.php';
            $chessboard = new Chessboard;
            $chessboard->buildBoard();

            echo '<pre>';
            print_r($chessboard);
            echo '</pre>';

        ?>
    </div>
</body>
</html>