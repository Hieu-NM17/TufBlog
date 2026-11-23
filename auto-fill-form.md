(() => {
    const randStr = (len) => Math.random().toString(36).substring(2, 2 + len);
    const id = Math.floor(100 + Math.random() * 900);

    const data = {
        username: `user_${randStr(5)}_${id}`,       // Đúng chuẩn ^[a-zA-Z0-9_]{3,20}$
        display_name: `Tester ${id}`,              // Dưới 20 ký tự
        password: `Pass@${id}${randStr(3)}`,       // Trên 6 ký tự
        email: `test_${randStr(5)}${id}@gmail.com` // Đúng định dạng email
    };

    const fill = (name, val) => {
        const el = document.querySelector(`[name="${name}"]`);
        if (el) el.value = val;
    };

    fill('username', data.username);
    fill('display_name', data.display_name);
    fill('password', data.password);
    fill('retype_password', data.password);
    fill('email', data.email);

    // In ra console để bạn copy mật khẩu test luôn bên trang login.php
    console.table(data);
})();