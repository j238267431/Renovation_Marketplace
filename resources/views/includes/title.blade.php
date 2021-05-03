<div class="page_header">
    <div class="wrapper cols_table no_hover">
        <div class="row">
            <div class="col page_header_content">
                <h1>{{ $title ?? ''}}</h1>
                @if(isset($breadcrumbs))
                {{ Breadcrumbs::render($breadcrumbs) }}
                @endif
            </div>
            <div class="col-aut d-flex flex-column page_header_sidebar">
                <a class="btn btn-success" href="{{route('account.companies.create')}}">Создать компанию</a>
            </div>
            @if(isset($hasCompany)&&($hasCompany))
            <div class="col-aut d-flex flex-column page_header_sidebar">
                <a class="btn btn-success" href="{{route('account.companies.index')}}">Мои компании</a>
            </div>
            @endif
        </div>
    </div>
</div>
