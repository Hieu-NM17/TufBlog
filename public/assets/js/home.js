const feed = document.getElementById('feed');

function timeAgo(dateString) {
    const past = new Date(dateString.replace(' ', 'T'));
    const seconds = Math.floor((Date.now() - past.getTime()) / 1000);

    if (seconds < 60) return 'Vừa xong';

    const minutes = Math.floor(seconds / 60);
    if (minutes < 60) return minutes + ' phút trước';

    const hours = Math.floor(minutes / 60);
    if (hours < 24) return hours + ' giờ trước';

    const days = Math.floor(hours / 24);
    if (days < 30) return days + ' ngày trước';

    return past.toLocaleDateString('vi-VN');
}

function createPostElement(post) {
    const name = post.display_name || post.username;

    const article = document.createElement('article');
    article.className = 'post';

    const avatar = document.createElement('div');
    avatar.className = 'avatar';
    avatar.textContent = name.charAt(0).toUpperCase();

    const body = document.createElement('div');
    body.className = 'post__body';

    const head = document.createElement('div');
    head.className = 'post__head';

    const author = document.createElement('a');
    author.className = 'post__author';
    author.href = '/profile.php?u=' + encodeURIComponent(post.username);
    author.textContent = name;

    const time = document.createElement('span');
    time.className = 'post__time';
    time.textContent = timeAgo(post.created_at);
    time.title = post.created_at;

    const content = document.createElement('p');
    content.className = 'post__content';
    content.textContent = post.content;

    head.append(author, time);
    body.append(head, content);
    article.append(avatar, body);

    return article;
}

async function loadPosts() {
    const response = await fetch('/api/posts.php');
    const posts = await response.json();

    feed.innerHTML = '';
    posts.forEach(function (post) {
        feed.append(createPostElement(post));
    });
}

loadPosts();

const form = document.getElementById('post-form');

if (form) {
    const input = document.getElementById('post-content');
    const errorBox = document.getElementById('post-error');
    const button = form.querySelector('button');
    input.addEventListener('input', function () {
        input.style.height = 'auto';
        input.style.height = input.scrollHeight + 'px';
    });

    form.addEventListener('submit', async function (event) {
        event.preventDefault();
        errorBox.textContent = '';
        button.disabled = true;

        try {
            const response = await fetch('/api/create_post.php', {
                method: 'POST',
                body: new FormData(form)
            });
            const result = await response.json();

            if (!response.ok) {
                errorBox.textContent = result.error;
                return;
            }

            feed.prepend(createPostElement(result.post));
            input.value = '';
            input.style.height = 'auto';
        } catch (error) {
            errorBox.textContent = 'Không kết nối được máy chủ';
        } finally {
            button.disabled = false;
        }
    });
}