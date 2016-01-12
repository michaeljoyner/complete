<nav class="main-nav">
    @if(Request::path() !== "/")
    <span class="nav-branding"><a href="/">Complete Living</a></span>
    @endif
    <label for="mobile-trigger"><i class="material-icons">menu</i></label>
    <input type="checkbox" id="mobile-trigger">
    <ul>
        <li><a href="/services">Services</a></li>
        <li><a href="/blog">Blog</a></li>
        <li><a href="/contact">Contact & Info</a></li>
    </ul>
</nav>