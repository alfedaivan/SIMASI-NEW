<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->

    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
    <ul class="navbar-nav">
        <li class="nav-item">
            <form id="form1" action="/logout" method="post">
                @csrf
                <a href="javascript:;" onclick="document.getElementById('form1').submit();" class="nav-link">
                    <i class="nav-icon fas fa-power-off"></i>
                </a>
            </form>
        </li>
    </ul>
</nav>
<!-- /.navbar -->