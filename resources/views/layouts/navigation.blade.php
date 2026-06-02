        <div id="head">
            <h1>
                <a href="/top">
                    <img src="{{ asset('images/atlas.png') }}" alt="Atlas">
                </a>
            </h1>
            <div id="">
                <div id="">
                    <button id="menu-toggle">
                        <p>{{ Auth::user()->username }}さん</p>
                        <span id="menu-arrow">▼</span>
                     </button>
                </div>

                <ul id="accordion-menu">
                    <li><a href="/top">HOME</a></li>
                    <li><a href="/profile">プロフィール編集</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="logout-btn">
                                ログアウト
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>


<script>
const toggle = document.getElementById('menu-toggle');
const menu = document.getElementById('accordion-menu');
const arrow = document.getElementById('menu-arrow');

toggle.addEventListener('click', function () {
    if (menu.style.display === 'block') {
        menu.style.display = 'none';
        arrow.textContent = '▼';
    } else {
        menu.style.display = 'block';
        arrow.textContent = '▲';
    }
});
</script>
