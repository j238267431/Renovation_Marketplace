@extends('layouts.index')
@section('content')
@include('includes.title', [
'title'=> "Редактирование задачи",
'breadcrumbs' => 'tasks.index',
'breadcrumbsAttrs' =>[
"task" => $task
],
])
<div class="wrapper tab-content">
    <div class="clearfix tab-pane fade show active" id="tab_pane-main">
        <div class="page_content no_sidebar">
            <div class="cols_table no_hover">
                <div class="row">
                    <div class="col">
                        <form class="form" action="{{ route('tasks.update', $task) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name" class="form-control-label">Название заказа</label>
                                <input type="text" class="form-control" id="name" name="title" placeholder="Что нужно сделать" value="{{ $task->title }}">
                            </div>
                            @error('title') <div class="alert alert-danger">
                                @foreach($errors->get('title') as $error)
                                {{$error}}
                                @endforeach
                            </div>
                            @enderror
                            <div class="form-group indent-b0">
                                <label for="description" class="form-control-label">Описание</label>
                                <textarea name="description" id="description" cols="30" rows="10" placeholder="Подробно опишите задачу">{!! $task->description !!}</textarea>
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
                                        <input onclick="budgetInsert()" type="radio" class="form-check-input" name="budget_toggle" value="0" @if($task->budget === null) checked="checked" @endif validate="true">
                                        Компании предложат цены
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input onclick="budgetInsert()" id="budget_insert" type="radio" class="form-check-input" value="1" name="budget_toggle" @if($task->budget !== null) checked="checked" @endif validate="true">
                                        Я хочу указать бюджет
                                    </label>
                                </div>
                                @error('budget') <div class="alert alert-danger">
                                    @foreach($errors->get('budget') as $error)
                                    {{$error}}
                                    @endforeach
                                </div>
                                @enderror
                                <div class="input-group amount indent-t20" @if($task->budget == null) style="display: none" @endif id="set_budget">
                                    <input type="number" class="form-control" id="budget" name="budget" placeholder="Сумма в руб." value="{{ $task->budget }}" value min="1" autocomplete="off" validate="true">
                                    <div class="input-group-addon">РУБ</div>
                                </div>
                            </fieldset>
                            <div class="form-group">
                                <div id="category_auto">
                                    <label class="form-control-label" for="category_id">Категория</label>
                                    <fieldset>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input onclick="categoryInsert()" type="radio" class="form-check-input" name="category_toggle" value="0" @if(!$task->category_id) checked="checked" @endif validate="true">
                                                Определить автоматически
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input onclick="categoryInsert()" id="category_insert" type="radio" class="form-check-input" name="category_toggle" value="1" @if($task->category_id) checked="checked" @endif validate="true">
                                                Я хочу указать категорию
                                            </label>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="indent-t20" @if(!$task->category_id) style="display: none" @endif id="category_select">
                                    <div class="form-group row bootstrap_css category_select">
                                        <div class="form-group col-sm-6 mb-sm-0">
                                            <label for="category" class="form-control-label">Категория</label>
                                            <select name="category_id" id="category" class="form-control">
                                                <option disabled value="No" @if($task->category_id === null) selected @endif>Укажите категорию</option>
                                                @foreach($categories as $category)
                                                <option value="{{ $category->id }}" @if($task->category_id == $category->id) selected @endif>{{ $category->name }}</option>
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

                            <div class="mt-4 mb-4">
                                <input type="submit" class="btn btn-primary" value="Обновить задачу">
                                <a class="btn btn-danger" onclick="javascript:$('#delete-button').click()">Удалить задачу</a>
                            </div>
                        </form>
                        <br>
                        @if($task->attachments()->count() > 0)
                        <ul class="list-group list-group-flush">
                            <b>Прикрепленные файлы</b>
                            @foreach($task->attachments as $attach)
                            <li class="list-group-item border-0 pl-0">
                                <form class="form" action="{{ route('attachment.delete', ['task' => $task, 'attachment' => $attach]) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                                    @csrf
                                    @method('DELETE')
                                    <a class="mr-3" href="{{ route('attachment.download', $attach) }}">{{ $attach->title }}</a> 
                                        <a class="btn btn-primary mr-3" href="{{ route('attachment.download', $attach) }}">Скачать</a>
                                        <a class="btn btn-danger mr-3" href="{{ route('attachment.download', $attach) }}">Удалить</a>
                                        <input class="hidden" type="submit" value="Удалить"> 
                                </form>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<form class="hidden" action="{{ route('tasks.destroy', $task)}}" method="post">
    @csrf
    @method('DELETE')
    <input id="delete-button" class="btn btn-danger" type="submit" value="Delete" />
</form>
@stop

@push('js')
<script type="text/javascript">
    $('#description').summernote({
        height: 400
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