<div class="page_header">
    <div class="wrapper cols_table no_hover">
        <div class="row">
            <div class="col page_header_content">
                <h1>{{ $title ?? ''}}</h1>
                @if(isset($breadcrumbs))
                {{ Breadcrumbs::render($breadcrumbs, $breadcrumbsAttrs ?? null) }}
                @endif
                @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @elseif(session('fail'))
                <div class="alert alert-danger">{{ session('fail') }}</div>
                @endif
            </div>
            @guest
            @else
            @if (Auth::user()->companies()->count() > 0)
            <div class="col-aut d-flex flex-column page_header_sidebar">
                <a class="btn btn-success" href="{{route('account.companies.index')}}">Мои компании</a>
            </div>
            @else
            <div class="col-aut d-flex flex-column page_header_sidebar">
                <a class="btn btn-success" href="{{route('account.companies.create')}}">Создать компанию</a>
            </div>
            @endif
            @endguest
        </div>
    </div>
</div>