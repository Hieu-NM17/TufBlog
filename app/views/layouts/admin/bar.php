<div class="admin-wrapper">
    <nav class="side">
        <div class="side__heading">
            <p>
                <a href="#"><b>Administration Site</b></a>
            </p>
        </div>

        <div class="side__function">
            <ul>
                <li>
                    <a href="#">Bảng điều khiển</a>
                </li>
                <li>
                    <a href="#">Bài viết</a>
                </li>
                <li>
                    <a href="#">Người dùng</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="main-wrapper">
        <nav class="top-bar">
            <div class="top-bar__left">
                <div class="top-bar__minimize">
                    <a href="#">
                        <i class="bi bi-list" style="font-size: 25px"></i>
                    </a>
                </div>

                <p><?= htmlspecialchars($pageTitle ?? 'Admin Panel') ?></p>
            </div>

            <div class="top-bar__right">
                <div class="top-bar__create">
                    <a href="">
                        <i class="bi bi-plus-lg"></i>
                        Tạo
                    </a>
                </div>

                <div class="top-bar__profile">
                    <a href="">
                        <img src="../assets/images/default-avatar.jpg" alt="">
                        <i class="bi bi-chevron-down"></i>
                    </a>
                </div>
            </div>
        </nav>

        <div class="content">

        </div>
    </div>
</div>