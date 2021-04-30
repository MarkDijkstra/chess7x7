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
        ?>
        <br/>
        <p>Posibilities: 40</p>
    </div>
</body>
</html>