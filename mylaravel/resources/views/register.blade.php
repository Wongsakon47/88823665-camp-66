@extends('layouts.default')

@section('content')
    <div class="register-page">
        <div class="register-box">
            <div class="register-logo">
                <a href="../index2.html"><b>Admin</b>LTE</a>
            </div>

            <!-- /.register-logo -->
            <div class="card">
                <div class="card-body register-card-body">
                    <p class="register-box-msg">Register a new membership</p>
                    <form action="{{ url('/register') }}"id="register-form" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Full Name" />
                            <div class="input-group-text"><span class="bi bi-person"></span></div>
                        </div>
                        <div class="valid-feedback">
                            OK
                        </div>
                        <div class="invalid-feedback" id="invalid-name">
                            กรุณาระบุข้อมูล ชื่อ-นามสกุล
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email" />
                            <div class="input-group-text"><span class="bi bi-envelope"></span></div>
                        </div>
                        <div class="invalid-feedback" id="invalid-email">
                            กรุณาระบุข้อมูล อีเมล
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Password" />
                            <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                        </div>
                        <div class="invalid-feedback" id="invalid-password">
                            กรุณาตั้งรหัสผ่าน
                        </div>

                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-8">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                                    <label class="form-check-label" for="flexCheckDefault">
                                        I agree to the <a href="#">terms</a>
                                    </label>
                                </div>
                            </div>

                            <!-- /.col -->
                            <div class="col-4">
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">Sign In</button>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!--end::Row-->
                    </form>

                    <button class="btn" onclick="myfunction()">Click Me</button>
                    <!-- /.social-auth-links -->
                    <p class="mb-0">
                        <a href="{{ url('/login') }}" class="text-center"> I already have a membership </a>
                    </p>
                </div>
                <!-- /.register-card-body -->
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function myfunction() {
            window.location.href = "{{ url('/users') }}";
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('register-form').addEventListener('submit', function(event) {
            let name = $('#name').val().trim();
            let email = $('#email').val().trim();
            let password = $('#password').val().trim();
            let checkbox = $('#flexCheckDefault').prop('checked');
            let isValid = true;

            //เช็ก Name ต้องไม่เป็นค่าว่าง
            if (name === "") {
                $('#invalid-name').show();
                $('#name').addClass('is-invalid');
                isValid = false;
            } else {
                $('#invalid-name').hide();
                $('#name').removeClass('is-invalid');
            }

            //เช็ก Email ต้องมี @ และ .
            if (email === "") {
                $('#invalid-email').show();
                $('#email').addClass('is-invalid');
                isValid = false;
            } else if (!email.includes('@') || !email.includes('.')) {
                $('#invalid-email').show();
                $('#invalid-email').text('กรุณาระบุอีเมลที่ถูกต้อง');
                $('#email').addClass('is-invalid');
                isValid = false;
            } else {
                $('#invalid-email').hide();
                $('#email').removeClass('is-invalid');
            }

            //เช็ก Password ต้องมี ตัวเลข, ตัวอักษรพิมพ์เล็ก, ตัวอักษรพิมพ์ใหญ่
            if (password === "") {
                $('#invalid-password').show();
                $('#password').addClass('is-invalid');
                isValid = false;
            } else if (!/[a-z]/.test(password) || !/[A-Z]/.test(password) || !/\d/.test(password)) {
                $('#invalid-password').show();
                $('#invalid-password').text('รหัสผ่าน ต้องมีตัวพิมพ์เล็ก ตัวพิมพ์ใหญ่ และตัวเลข');
                $('#password').addClass('is-invalid');
                isValid = false;
            } else {
                $('#invalid-password').hide();
                $('#password').removeClass('is-invalid');
            }

            //เช็ก Checkbox ต้องถูกติ๊ก
            if (!checkbox) {
                Swal.fire({
                    title: "ข้อตกลงไม่ได้ถูกยอมรับ",
                    text: "กรุณายืนยันการยอมรับข้อตกลง😏",
                    icon: "warning",
                    confirmButtonText: "ตกลง",
                    background: '#fff3cd',
                    confirmButtonColor: '#d39e00',
                    customClass: {
                        title: 'swal-title-warning',
                        content: 'swal-text-warning',
                        confirmButton: 'swal-btn-warning'
                    },
                    showClass: {
                        popup: 'animate__animated animate__shakeX'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOut'
                    }
                });
                isValid = false;
            }

            //ถ้าไม่ผ่านเงื่อนไข หยุดการส่งฟอร์ม
            if (!isValid) {
                event.preventDefault();
                return;
            }

            //ถ้าผ่านเงื่อนไขทั้งหมด แสดง SweetAlert และส่งฟอร์ม
            event.preventDefault();
            Swal.fire({
                title: "ลงทะเบียนสำเร็จ!",
                text: "คุณสามารถเข้าสู่ระบบได้แล้ว😎",
                icon: "success",
                confirmButtonText: "ตกลง",
                background: '#f0f8ff',
                confirmButtonColor: '#3085d6',
                customClass: {
                    title: 'swal-title',
                    content: 'swal-text',
                    confirmButton: 'swal-btn-confirm'
                },
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            }).then(() => {
                document.getElementById('register-form').submit();

                setTimeout(() => {
                    window.location.href = "{{ url('/users') }}";
                }, 1000);
            });
        });
    </script>
@endsection
