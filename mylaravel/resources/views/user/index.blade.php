@extends('layouts.default_with_menu')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-12">
                <div class="card-header">
                    <h3 class="card-title"></h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th style="width: 240px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $index => $user)
                            <tr class="align-middle">
                                <td>{{ $index + 1 }}.</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('users.delete') }}" method="POST" class="delete-form" style="display:inline;">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                        <button type="button" class="btn btn-danger delete-button">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-end">
                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".delete-button").forEach(button => {
            button.addEventListener("click", function () {
                let form = this.closest(".delete-form");
                let userName = this.closest("tr").querySelector("td:nth-child(2)").textContent.trim();

                Swal.fire({
                    title: "ยืนยันการลบ",
                    html: `<strong> คุณแน่ใจหรือไม่ที่จะลบ <span style="color: red;">${userName}</span>?</strong><br>การลบข้อมูลไม่สามารถกู้คืนได้!⚠️`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "ยืนยัน",
                    cancelButtonText: "ยกเลิก",
                    reverseButtons: true,
                    background: "#1e1e1e",
                    color: "#fff"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "กำลังลบ...",
                            text: "โปรดรอในขณะที่เราลบผู้ใช้",
                            icon: "info",
                            timer: 1500,
                            showConfirmButton: false
                        });
                        setTimeout(() => form.submit(), 1600);
                    }
                });
            });
        });
    });
</script>
@endsection
