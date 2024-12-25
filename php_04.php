<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Even or Odd Checker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        .even {
            background-color: #e7f4ff;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center text-primary">แสดงข้อมูลตัวเลขว่าเป็นเลขคู่หรือเลขคี่</h1>
        <form method="post" class="mt-4">
            <div class="mb-3">
                <label for="start" class="form-label">ตัวเลขเริ่มต้น:</label>
                <input type="number" id="start" name="start" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="end" class="form-label">ตัวเลขสิ้นสุด:</label>
                <input type="number" id="end" name="end" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">แสดงผล</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $start = intval($_POST['start']);
            $end = intval($_POST['end']);

            if ($start > $end) {
                echo "<p class='text-danger mt-3'>กรุณากรอกตัวเลขเริ่มต้นให้น้อยกว่าหรือเท่ากับตัวเลขสิ้นสุด</p>";
            } else {
                echo "<h2 class='mt-4'>ผลลัพธ์จาก $start ถึง $end</h2>";
                echo "<ul class='list-group mt-3'>";
                for ($i = $start; $i <= $end; $i++) {
                    $type = ($i % 2 == 0) ? 'เลขคู่' : 'เลขคี่';
                    $class = ($i % 2 == 0) ? 'even' : '';
                    echo "<li class='list-group-item $class'>$i เป็น$type</li>";
                }
                echo "</ul>";
            }
        }
        ?>
    </div>
</body>

</html>
