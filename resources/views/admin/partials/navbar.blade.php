<nav class="cl-navbar">
    <div class="nav-wrapper container">
        <a href="/admin" class="brand-logo">Complete Living</a>
        <a href="#" data-activates="mobile-nav" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            @foreach($postCategories as $postCategory)
                <li><a href="/admin/blog/categories/{{ $postCategory->id }}/posts">{{ ucfirst($postCategory->name) }}</a></li>
            @endforeach
            <li><a href="/admin/users">Users</a></li>
            <li><i class="material-icons">face</i></li>
        </ul>
        <ul class="side-nav" id="mobile-nav">
            <li><a href="/admin/users">Users</a></li>
        </ul>
    </div>
</nav>