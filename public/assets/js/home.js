const feed = document.getElementById('feed');
const form = document.getElementById('post-form');
const input = document.getElementById('post-content');

// Đổi thời gian 
function timeAgo(dateString) {
    const past = new Date(dateString.replace(' ', 'T'));
    const seconds = (Date.now() - past.getTime()) / 1000;

    if (seconds < 60) return 'Vừa xong';
    if (seconds < 3600) return Math.floor(seconds / 60) + ' phút trước';
    if (seconds < 86400) return Math.floor(seconds / 3600) + ' giờ trước';
    return Math.floor(seconds / 86400) + ' ngày trước';
}

// Tạo HTML cho 1 bài viết
function createPostElement(post) {
    const name = post.display_name || post.username;

    const article = document.createElement('article');
    article.className = 'post';
    article.innerHTML = `
        <div class="avatar"></div>
        <div class="post__body">
            <div class="post__head">
                <a class="post__author"></a>
                <span class="post__time"></span>
            </div>
            <p class="post__content"></p>
        </div>
    `;

    // Chữ do người dùng nhập luôn đưa vào bằng textContent (an toàn)
    article.querySelector('.avatar').textContent = name.charAt(0);
    article.querySelector('.post__author').textContent = name;
    article.querySelector('.post__author').href = '/profile.php?u=' + post.username;
    article.querySelector('.post__time').textContent = timeAgo(post.created_at);
    article.querySelector('.post__content').textContent = post.content;

    return article;
}

// Lấy danh sách bài từ API rồi hiển thị
async function loadPosts() {
    const response = await fetch('/api/posts.php');
    const posts = await response.json();

    feed.innerHTML = '';
    for (const post of posts) {
        feed.append(createPostElement(post));
    }
}

// Ô nhập tự dãn ra khi gõ nhiều dòng
input.addEventListener('input', function () {
    input.style.height = 'auto';
    input.style.height = input.scrollHeight + 'px';
});

// Bấm nút "Đăng"
form.addEventListener('submit', async function (event) {
    event.preventDefault();

    const response = await fetch('/api/create_post.php', {
        method: 'POST',
        body: new FormData(form)
    });
    const result = await response.json();

    if (result.error) {
        alert(result.error);
        return;
    }

    input.value = '';
    input.style.height = 'auto';
    loadPosts();
});

loadPosts();