@extends('layouts.index')
@section('content')
@include('includes.title', [
'title' => 'Создание проекта',
'breadcrumbs' => 'tasks.create',
])
<div class="wrapper tab-content">
    <div class="clearfix tab-pane fade show active" id="tab_pane-main">
        <div class="page_content no_sidebar">
            <div class="bg-none">
                <ol class="track_progress hidden-md-down" data-steps="4">
                    <li class="active">
                        <div>Разместите заказ</div>
                    </li>
                    <li>
                        <div>Выберите исполнителя</div>
                    </li>
                    <li>
                        <div>Зарезервируйте оплату</div>
                    </li>
                    <li>
                        <div>Получите работу</div>
                    </li>
                </ol>
            </div>
            <form class="form" action="{{route('tasks.store')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="cols_table no_hover">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="name" class="form-control-label">Название заказа</label>
                                <input type="text" class="form-control" id="name" name="title" placeholder="Что нужно сделать" value="{{ old('title') }}">
                            </div>
                            @error('title') <div class="alert alert-danger">
                                @foreach($errors->get('title') as $error)
                                {{$error}}
                                @endforeach
                            </div>
                            @enderror
                            <div class="form-group indent-b0">
                                <label for="description" class="form-control-label">Описание</label>
                                <textarea name="description" id="description" cols="30" rows="10" placeholder="Подробно опишите задачу">{!! old('description') !!}</textarea>
                            </div>
                            @error('description') <div class="alert alert-danger">
                                @foreach($errors->get('description') as $error)
                                {{$error}}
                                @endforeach
                            </div>
                            @enderror
                            <div class="form-group">
                                <div class="attachment file buttons">
                                    <div id="files_form">
                                        <a href="" class="btn btn-secondary btn-file upload">
                                            <span class="icon-attachment"></span>
                                            Прикрепить файлы
                                            <input type="file" class="uploader" name="file[]" multiple="multiple" value>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @error('file') <div class="alert alert-danger">
                                @foreach($errors->get('file') as $error)
                                {{$error}}
                                @endforeach
                            </div>
                            @enderror
                            <label class="form-control-label" for="budget">Бюджет</label>
                            <fieldset class="form-group">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input onclick="budgetInsert()" type="radio" class="form-check-input" name="budget_toggle" value="0" @if(old('budget_toggle')==0) checked="checked" @endif validate="true">
                                        Компании предложат цены
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input onclick="budgetInsert()" id="budget_insert" type="radio" class="form-check-input" name="budget_toggle" value="1" @if(old('budget_toggle')==1) checked="checked" @endif validate="true">
                                        Я хочу указать бюджет
                                    </label>
                                </div>
                                <div class="input-group amount indent-t20" @if(old('budget_toggle')==0) style="display: none" @endif id="set_budget">
                                    <input type="number" class="form-control" id="budget" name="budget" placeholder="Сумма в руб." value="{{old('budget')}}" value min="1" autocomplete="off" validate="true">
                                    <div class="input-group-addon">РУБ</div>
                                </div>
                                @error('budget') <div class="alert alert-danger">
                                    @foreach($errors->get('budget') as $error)
                                    {{$error}}
                                    @endforeach
                                </div>
                                @enderror
                            </fieldset>
                            <div class="form-group">
                                <div id="category_auto">
                                    <label class="form-control-label" for="category_id">Категория</label>
                                    <fieldset>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input onclick="categoryInsert()" type="radio" class="form-check-input" name="category_toggle" value="0" @if(old('category_toggle')==0) checked="checked" @endif validate="true">
                                                Определить автоматически
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input onclick="categoryInsert()" id="category_insert" type="radio" class="form-check-input" name="category_toggle" value="1" @if(old('category_toggle')==1) checked="checked" @endif validate="true">
                                                Я хочу указать категорию
                                            </label>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="indent-t20" @if(old('category_toggle')==0) style="display: none" @endif id="category_select">
                                    <div class="form-group row bootstrap_css category_select">
                                        {{-- <div class="form-group col-sm-6 mb-sm-0">--}}
                                        {{-- <label for="parent_category_id" class="form-control-label">Раздел</label>--}}
                                        {{-- <select name="parent_category_id" id="parent_category_id" class="form-control">--}}
                                        {{-- <option value="1">1</option>--}}
                                        {{-- </select>--}}
                                        {{-- </div>--}}
                                        <div class="form-group col-sm-6 mb-sm-0">
                                            <label for="category" class="form-control-label">Категория</label>
                                            <select name="category_id" id="category" class="form-control">
                                                <option disabled value="No" @if(!old('category_id')) selected @endif>Укажите категорию</option>
                                                @foreach($categories as $category)
                                                <option value="{{ $category->id }}" @if(old('category_id')==$category->id) selected @endif>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @error('category_id') <div class="alert alert-danger">
                                @foreach($errors->get('category_id') as $error)
                                {{$error}}
                                @endforeach
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="cols_table no_hover block-footer">
                    <div class="row align-items-center">
                        <div class="col-sm-6 col-lg-3">
                            {{-- <a href="" class="btn btn-primary btn-md" id="submit_btn">--}}
                            {{-- <b>Добавить проект</b>--}}
                            {{-- </a>--}}
                            <input type="submit" class="btn btn-primary" value="Добавить проект">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@push('js')
<script type="text/javascript">
    $('#description').summernote({
        height: 400,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear', 'fontname', 'fontsize', 'color']],
            ['para', ['ol', 'ul', 'paragraph', 'height']],
            ['table', ['table']],
            ['insert', ['link']],
            ['view', ['undo', 'redo', 'fullscreen', 'codeview', 'help']]
        ]

    });

    function budgetInsert() {
        if ($('#budget_insert').is(':checked')) {
            $('#set_budget').show();
        } else {
            $('#set_budget').hide();
        }
    }

    function categoryInsert() {
        if ($('#category_insert').is(':checked')) {
            $('#category_select').show();
        } else {
            $('#category_select').hide();
        }
    }
</script>
@endpush