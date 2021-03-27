<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">Marketplace</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-navbar"
                aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="main-navbar">
            <div class="navbar-nav">
                @include('includes.menu')
                <!-- Authentication Links -->
                @include('includes.auth-links')
            </div>
        </div>
    </div>
</nav>




