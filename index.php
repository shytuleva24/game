<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orel & Reshka</title>
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
            padding: 30px;
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
        <h1>&#9786; Обери складність гри &#9786;</h1>
        <form action="game.php" method="POST">
            <div class="flex">
                <label>
                    <input type="radio" name="level" value="easy" checked>Легка
                </label>
                <label>
                    <input type="radio" name="level" value="medium" 
                    <?php 
                        if (isset($_POST['victory'])) {
                            $victory = $_POST['victory'];
                        } else {
                            $victory = 0;
                        }

                        if ($victory == "openMedium" || $victory == "openHard") {
                            echo 'checked';
                        } else {
                            echo 'disabled';
                        }
                    ?>
                    >Середня
                </label>
                <label>
                    <input type="radio" name="level" value="hard"
                    <?php 
                        if ($victory == "openHard") {
                            echo 'checked';
                        } else {
                            echo 'disabled';
                        }
                    ?>
                    >Важка
                </label>
                <input type="hidden" name="win" value="0">
                <input type="hidden" name="lose" value="0">
            </div>
            <input class="btn" type="submit" value="ok">
            <?php
                // echo "<p>$victory</p>";
                // var_dump($_POST);
            ?>
                <input type="hidden" name="victory" value="<?php echo($victory); ?>">
        </form>
    </section>
</body>
</html>