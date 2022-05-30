<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        section {
            max-width: 400px;
            margin: 40px auto;
        }

        h1 {
            text-align: center;
        }
        
        a {
            padding: 15px 50px;
            text-decoration: none;
            color: #000;
        }

        a:hover {
            color: #fff;
        }

        .flex {
            display: flex;
            justify-content: space-between;
        }

        .btn {
            text-decoration: none;
            display: block;
            padding: 15px 50px;
            border-radius: 45px;
            font-size: 16px;
            text-transform: uppercase;
            letter-spacing: 3px;
            font-weight: 500;
            background: white;
            box-shadow: 0 8px 15px rgba(0, 0, 0, .1);
            border: 0;
            transition: .3s;
            margin: 40px auto;
        }

        p, h2 {
            text-align: center;
            font-size: 18px;
        }
        
        .flex input {
            margin-right: 10px;
        }

        .btn:hover {
            background: #c0c0c0;
            box-shadow: 0 15px 20px rgba(128, 128, 128, .4);
            color: white;
            transform: translateY(-7px);
        }
    </style>

</head>
<body>
    <section>
        <h1>&#9786; Твої результати &#9786;</h1>
        <form action="index.php" method="POST">
            <?php
                $win = $_POST['win'];
                $lose = $_POST['lose'];
                $level = $_POST['level'];
                $victory = $_POST['victory'];
                
    
                echo "<p>Перемоги - $win</p>";
                echo "<p>Програші - $lose</p>";

                $percentWin =  $win / ($win + $lose) * 100;
                $percentWin = (int)$percentWin;
                
                echo "<p>Процент перемог - $percentWin %</p>";
                
                if ($percentWin >= 50) {
                    echo mb_strtoupper("<h2>Ви перемогли!</h2>");
                } else {
                    echo mb_strtoupper("<h2>Ви програли!</h2>");
                } 

                if (($percentWin >= 50 && $level == "easy") || ($percentWin < 50 && $level == "medium")) {
                    $victory = "openMedium";
                } else if (($percentWin >= 50 && $level == "medium") || ($percentWin <= 100 && $level == "hard")) {
                    $victory = "openHard";
                } else {
                    $victory = 0;
                }

                // echo "<p>$victory</p>";
                // var_dump($_POST);
            ?>
            

                <input type="hidden" name="victory" value="<?php echo($victory); ?>">
                <input type="hidden" name="level" value="<?php echo($_POST['level']); ?>">
                <button class="btn" type="submit">Нова гра</button>
            </form>
            <button class="btn" type="submit"><a href="index.php">Обнулити</a></button>
    </section>
</body>
</html>
