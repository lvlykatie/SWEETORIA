// Hàm kiểm tra email hợp lệ
function validateEmail(email) {
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
}

// Hàm kiểm tra số điện thoại hợp lệ (ít nhất 9 số)
function validatePhoneNumber(phone) {
    return phone.length >= 9;
}

// Hàm kiểm tra mật khẩu tối thiểu 4 ký tự
function validatePassword(password) {
    return password.length >= 4;
}

// Hàm kiểm tra confirm password có khớp với password không
function confirmPassword(password, confirmPassword) {
    return password === confirmPassword;
}

// Hàm kiểm tra form
function validateForm() {
    const email = document.getElementById("userEmail").value;
    const phone = document.getElementById("phonenum").value;
    const password = document.getElementById("password").value;
    const confirmPasswordValue = document.getElementById("confirm").value;

    // Kiểm tra các trường không được để trống
    if (!email || !phone || !password || !confirmPasswordValue) {
        alert("Vui lòng điền đầy đủ thông tin!");
        return false;
    }

    // Kiểm tra email hợp lệ
    if (!validateEmail(email)) {
        alert("Email không hợp lệ!");
        return false;
    }

    // Kiểm tra số điện thoại phải có ít nhất 9 số
    if (!validatePhoneNumber(phone)) {
        alert("Số điện thoại phải có ít nhất 9 số!");
        return false;
    }

    // Kiểm tra password phải tối thiểu 4 ký tự
    if (!validatePassword(password)) {
        alert("Mật khẩu phải có ít nhất 4 ký tự!");
        return false;
    }

    // Kiểm tra confirm password có khớp với password không
    if (!confirmPassword(password, confirmPasswordValue)) {
        alert("Mật khẩu xác nhận không khớp!");
        return false;
    }

    // Nếu tất cả các kiểm tra đều hợp lệ, form được submit
    alert("Form đã được điền đúng!");
    return true;
}

// Gắn sự kiện submit form
document.querySelector("form").addEventListener("submit", function (e) {
    // Ngăn form submit nếu không hợp lệ
    if (!validateForm()) {
        e.preventDefault();
    }
});
