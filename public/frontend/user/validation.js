document.addEventListener("DOMContentLoaded", function () {
    // Hàm kiểm tra thông tin cho form đăng ký
    function validateSignupForm(signupForm) {
        let isValid = true;
        const username = signupForm.querySelector("#username").value;
        const email = signupForm.querySelector("#userEmail").value;
        const phone = signupForm.querySelector("#phonenum").value;
        const password = signupForm.querySelector("#password").value;
        const confirmPassword = signupForm.querySelector("#confirm").value;
        const errorMessages = [];

        if (!username) {
            errorMessages.push("Username không được để trống.");
            isValid = false;
        }

        // Kiểm tra định dạng email
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            errorMessages.push("Email không hợp lệ.");
            isValid = false;
        }

        // Kiểm tra số điện thoại
        if (phone.length < 9) {
            errorMessages.push("Nhập lại số điện thoại.");
            isValid = false;
        }

        // Kiểm tra mật khẩu
        if (password.length < 4) {
            errorMessages.push("Mật khẩu phải tối thiểu 4 ký tự.");
            isValid = false;
        }

        // Kiểm tra khớp mật khẩu
        if (password !== confirmPassword) {
            errorMessages.push("Mật khẩu và xác nhận mật khẩu không khớp.");
            isValid = false;
        }

        // Nếu không hợp lệ, ngăn không cho gửi form và hiển thị thông báo
        if (!isValid) {
            alert(errorMessages.join("\n"));
            return false; // Trả về false nếu không hợp lệ
        }
        return true; // Trả về true nếu hợp lệ
    }

    // Xử lý sự kiện cho form đăng ký
    const signupForm = document.getElementById("signupForm");
    if (signupForm) {
        signupForm.addEventListener("submit", function (event) {
            if (!validateSignupForm(signupForm)) {
                event.preventDefault(); // Ngăn không cho gửi form
            }
        });
    }

    // Hàm kiểm tra thông tin cho form đăng nhập
    function validateSigninForm(signinForm) {
        let isValid = true;
        const email = signinForm.querySelector("#userEmail").value; // #userEmail: id
        const password = signinForm.querySelector("#password").value;
        const errorMessages = [];

        // Kiểm tra định dạng email
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            errorMessages.push("Email không hợp lệ.");
            isValid = false;
        }

        // Kiểm tra mật khẩu
        if (password.length < 4) {
            errorMessages.push("Mật khẩu phải tối thiểu 4 ký tự.");
            isValid = false;
        }

        // Nếu không hợp lệ, ngăn không cho gửi form và hiển thị thông báo
        if (!isValid) {
            alert(errorMessages.join("\n"));
            return false; // Trả về false nếu không hợp lệ
        }
        return true; // Trả về true nếu hợp lệ
    }

    // Xử lý sự kiện cho form đăng nhập
    const signinForm = document.getElementById("signinForm");
    if (signinForm) {
        signinForm.addEventListener("submit", function (event) {
            if (!validateSigninForm(signinForm)) {
                event.preventDefault(); // Ngăn không cho gửi form
            }

            // Ghi nhớ thông tin nếu checkbox được tích
            if (
                document.getElementById("remember") &&
                document.getElementById("remember").checked
            ) {
                localStorage.setItem("email", email); // "email" là tên tự đặt trong localStorage, còn email là tên biến const đặt ở đầu
                localStorage.setItem("password", password);
            } else {
                localStorage.removeItem("email");
                localStorage.removeItem("password");
            }
        });

        // Tự động điền thông tin từ localStorage (nếu có)
        if (localStorage.getItem("email")) {
            document.getElementById("userEmail").value =
                localStorage.getItem("email");
        }
        if (localStorage.getItem("password")) {
            document.getElementById("password").value =
                localStorage.getItem("password");
        }
    }

    // Hàm kiểm tra thông tin cho form quên mật khẩu
    function validateForgetPasswordForm(forgetPasswordForm) {
        let isValid = true;
        const email = forgetPasswordForm.querySelector("#userEmail").value;
        const errorMessages = [];

        // Kiểm tra định dạng email
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            errorMessages.push("Email không hợp lệ.");
            isValid = false;
        }

        // Nếu không hợp lệ, hiển thị thông báo lỗi
        if (!isValid) {
            alert(errorMessages.join("\n"));
            return false; // Trả về false nếu không hợp lệ
        }

        // Kiểm tra email có tồn tại không (AJAX)
        checkEmailExists(email, function (exists) {
            if (!exists) {
                alert("Email chưa được đăng ký.");
                isValid = false;
            }
        });

        return isValid;
    }

    // Xử lý sự kiện cho form quên mật khẩu
    const forgetPasswordForm = document.getElementById("forgetpassForm");
    if (forgetPasswordForm) {
        forgetPasswordForm.addEventListener("submit", function (event) {
            if (!validateForgetPasswordForm(forgetPasswordForm)) {
                event.preventDefault(); // Ngăn không cho gửi form nếu không hợp lệ
            }
        });
    }

    // Hàm kiểm tra email có tồn tại không (giả sử URL Laravel kiểm tra email là /check-email)
    function checkEmailExists(email, callback) {
        $.ajax({
            url: "/check-email",
            method: "POST",
            data: {
                email: email,
                _token: $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                callback(response.exists); // Trả về kết quả từ server
            },
            error: function () {
                alert("Có lỗi xảy ra khi kiểm tra email.");
                callback(false);
            },
        });
    }

    // Hàm kiểm tra thông tin cho form đặt lại mật khẩu
    function validateResetPasswordForm(resetPasswordForm) {
        let isValid = true;
        const newPassword =
            resetPasswordForm.querySelector("#new password").value;
        const confirmPassword =
            resetPasswordForm.querySelector("#confirm new pass").value;
        const errorMessages = [];

        // Kiểm tra mật khẩu có đủ độ dài hay không
        if (newPassword.length < 4) {
            errorMessages.push("Mật khẩu phải tối thiểu 4 ký tự.");
            isValid = false;
        }

        // Kiểm tra mật khẩu có khớp với xác nhận mật khẩu hay không
        if (newPassword !== confirmPassword) {
            errorMessages.push("Mật khẩu không khớp.");
            isValid = false;
        }

        // Nếu không hợp lệ, hiển thị thông báo lỗi
        if (!isValid) {
            alert(errorMessages.join("\n"));
            return false; // Trả về false nếu không hợp lệ
        }

        return true; // Trả về true nếu hợp lệ
    }

    // Xử lý sự kiện cho form đặt lại mật khẩu
    const resetPasswordForm = document.getElementById("resetpasswordForm");
    if (resetPasswordForm) {
        resetPasswordForm.addEventListener("submit", function (event) {
            if (!validateResetPasswordForm(resetPasswordForm)) {
                event.preventDefault(); // Ngăn không cho gửi form nếu không hợp lệ
            }
        });
    }
});
