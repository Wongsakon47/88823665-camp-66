<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Even or Odd Numbers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-body">
                <h1 class="text-center text-primary">แสดงข้อมูลตัวเลขว่าเป็นเลขคู่หรือเลขคี่</h1>
                <table class="table table-bordered mt-4">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">เลข</th>
                            <th scope="col">ประเภท</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($i = 1; $i <= 100; $i++) {
                            echo "<tr>";
                            echo "<td>" . $i . "</td>";
                            echo "<td>" . ($i % 2 == 0 ? 'เลขคู่' : 'เลขคี่') . "</td>";
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
