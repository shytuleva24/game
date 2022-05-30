<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Орел & Решка</title>
    <style>
        section {
            max-width: 400px;
            margin: 40px auto;
        }

        h1 {
            text-align: center;
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
    <section class="test">
        <h1>&#9786; Обери сторону монетки &#9786;</h1>
        <form action="
            <?php
                $level = $_POST['level'];
                $win = $_POST['win'];
                $lose = $_POST['lose'];


                if (($win + $lose) == 9) {
                    echo 'result.php';
                } else {
                    echo 'game.php';
                } 
            ?>
            " method="POST">
            <div class="flex">
                <button class="btn" name="game" type="submit" id="tails" value="1" required>Орел</button>
                <button class="btn" name="game" type="submit" id="eagle" value="2" required>Решка</button>
                <input type="hidden" name="victory" value="<?php echo($_POST['victory']); ?>">

            </div>
            <?php   

                if ($_POST && isset($_POST["game"])) {
                    $game = $_POST["game"]; // 1 or 2
                    $rand = rand(0, 100);
                    $result = "";
                    $victory = $_POST['victory'];

                    if (isset($_POST['victory'])) {
                        $victory = $_POST['victory'];
                    } else {
                        $victory = 0;
                    }
                    
                    if (isset($_POST['win'])) {
                        $win = $_POST['win'];
                    } else {
                        $win = 0;
                    }

                    if (isset($_POST['lose'])) {
                        $lose = $_POST['lose'];
                    } else {
                        $lose = 0;
                    }

                    echo ("<p>Рівень складності - $level</p>");
                    
                    if ($rand == 0) {
                      echo ("<p>Ребро!!!</p>");
                    } else if ($rand <= 50) {
                    //   echo ("Решка");
                      $rand = 2;
                      $result = "Випала Решка";
                    } else if ($rand > 50) {
                    //   echo ("Орел");
                      $rand = 1;
                      $result = "Випав Орел";
                    } 
        
                    if ($game == 1) {
                        echo("<p>Ви обрали Орел</p>");
                    } else if ($game == 2) {
                      echo("<p>Ви обрали Решка</p>");
                    } 
                    
    
                    if ($game == $rand) {
                        if ($level == "hard") {
                            $rand = rand (0, 2);
                            if ($rand == 0) {
                                if ($game == 1) {
                                    $result = "Випала Решка";
                                } else {
                                    $result = "Випав Орел";
                                }
                              echo ("<h2>ХА-ХА Ви програли!</h2>");
                              $lose++;
                            } else {
                              echo ("<h2>Перемога за Вами!</h2>");
                              $win++;
                            } 
                        } else {
                            echo ("<h2>Перемога!</h2>");
                            $win++;
                        } 
                    } else {
                        if ($level == "easy") {
                            $rand = rand(0, 1);
                            if ($rand == 1) {
                                if ($game == 1) {
                                    $result = "Випав Орел";
                                } else {
                                    $result = "Випала Решка";
                                }
                                echo ("<h2>Удача на Вашій стороні... Перемога!</h2>");
                                $win++;
                            } else {
                                echo ("<h2>Шкода, Ви програли!</h2>");
                                $lose++;
                            }
                        } else {
                            echo ("<h2>Ви програли!</h2>");
                            $lose++;
                        }
                    }

                    echo ("<p>$result</p>");
                    // var_dump($_POST);
                    // echo "<p>$win</p>";
                    // echo "<p>$lose</p>";
                }
                ?>
            <input type="hidden" name="win" value="<?php echo($win); ?>">
            <input type="hidden" name="lose" value="<?php echo($lose); ?>">
            <input type="hidden" name="level" value="<?php echo($_POST['level']); ?>">
        </form>
    </section>
</body>
</html>