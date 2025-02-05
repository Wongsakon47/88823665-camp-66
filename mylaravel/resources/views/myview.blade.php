<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplication Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">แสดงตารางสูตรคูณ</h1>

        <!-- แบบฟอร์มสำหรับการป้อนข้อมูลของผู้ใช้ -->
        <form method="post" class="my-4">
            @csrf
            <div class="row align-items-center">
                <div class="col-auto">
                    <label for="number" class="form-label">แม่สูตรคูณ:</label>
                </div>
                <div class="col-auto">
                    <input type="number" id="number" name="number" class="form-control" value="{{ old('number') }}"
                        required>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">แสดงผล</button>
                </div>
            </div>
        </form>

        <!-- แสดงตารางสูตรคูณหากมีการระบุตัวเลข -->
        @if (isset($multiplicationTable) && count($multiplicationTable) > 0)
            <h2 class="text-center">ตารางสูตรคูณแม่ {{ $number }}</h2>
            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th>สูตร</th>
                        <th>ผลลัพธ์</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($multiplicationTable as $item)
                        <tr>
                            <td>{{ $item['expression'] }}</td>
                            <td>{{ $item['result'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>

</html>
