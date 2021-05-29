<div class="page_header">
    <div class="wrapper cols_table no_hover">
        <div class="row">
            <div class="col page_header_content">
                <h1>{{ $title ?? ''}}</h1>
                @if(isset($breadcrumbs))
                {{ Breadcrumbs::render($breadcrumbs, $breadcrumbsAttrs ?? null) }}
                @endif
                @if(isset($success))
                <div class="alert alert-success">{{ $success }}</div>
                @endif
                @if(isset($fail))
                <div class="alert alert-danger">danger</div>
                @endif
            </div>
            @guest
            @else

            <div class="col-aut d-flex flex-column page_header_sidebar">
                <a class="btn btn-success" href="{{route('account.companies.create')}}">Создать компанию</a>
            </div>
            @if (Auth::user()->companies()->count() > 0)
            <div class="col-aut d-flex flex-column page_header_sidebar">
                <a class="btn btn-success" href="{{route('account.companies.index')}}">Мои компании</a>
            </div>
            @endif
            @endguest
        </div>
    </div>
</div>