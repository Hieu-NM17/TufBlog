<?php
$pageTitle = 'Trang cá nhân';
$styles = ['base.css', 'profile.css'];
require_once __DIR__ . '/../layouts/header.php';
?>


<body>

  <div class="profile">
    <aside class="profile__left">
      <div class="profile__nav">
        <a href="#" class="profile__nav-items">Dành cho bạn</a>
        <a href="#" class="profile__nav-items">Tìm kiếm</a>
        <a href="#" class="profile__nav-items">Hoạt động</a>
        <a href="#" class="profile__nav-items">Trang cá nhân</a>
        <a href="#" class="profile__nav-items">Đã lưu</a>
        <a href="#" class="profile__nav-items">Đã thích</a>
      </div>
      <button class="profile__create">+ Viết bài mới</button>
    </aside>

    <!-- CỘT GIỮA -->
    <main class="">
      <div class="main">
        <div class="main__heading">
          <span>khoatro121006</span>
        </div>

        <div class="main__info">
          <div>
            <h1>Nguyễn Đăng Khoa</h1>
            <p class="main__info--nickname">khoadepchai121006</p>
            <p class="main__info--bio">Đang code trang cá nhân cho TufBlog.</p>
            <p class="main__info--follow">1tr người theo dõi</p>
          </div>
          <img src="https://i.pravatar.cc/120?img=11" alt="Avatar" class="avatar">
        </div>

        <div class="main__button">
          <button>Chỉnh sửa trang cá nhân</button>
          <button>Xem thông tin chi tiết</button>
        </div>
      </div>
    </main>

    <!-- CỘT PHẢI -->
    <aside class="profile__right">
      <div class="profile__statistic">
        <h4>Thông tin chi tiết</h4>
        <p>Lượt xem: 2</p>
        <p>Người xem: 2</p>
        <p>Lượt tương tác: 0</p>
      </div>
    </aside>
  </div>

</body>
</html>