<?php

?>
<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplication Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-body">
                <?php
                $number = 2;
                ?>
                <h1 class="text-center text-primary">สูตรคูณแม่ <?php echo $number; ?></h1>
                <table class="table table-bordered mt-4">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">การคำนวณ</th>
                            <th scope="col">ผลลัพธ์</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($i = 1; $i <= 12; $i++) {
                            $result = $number * $i;
                            echo "<tr>";
                            echo "<td>" . $number . " x " . $i . "</td>";
                            echo "<td>" . $result . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>