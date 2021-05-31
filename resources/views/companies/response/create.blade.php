@extends('layouts.index')
@section('content')
@include('includes.title', [
'title' => $task->title,
'breadcrumbs' => 'account.responses'
])
<div class="wrapper tab-content">
    <div class="clearfix tab-pane fade show active" id="tab_pane-main">
        <div class="page_content no_sidebar">
            <form class="form" action="{{route('tasks.response.store', $task)}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="cols_table no_hover">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <div class="indent-t20" id="category_select">
                                    <div class="form-group row bootstrap_css category_select">
                                        <div class="form-group col-sm-6 mb-sm-0">
                                            <label for="company" class="form-control-label">Компания</label>
                                            <select name="company_id" id="company" class="form-control">
                                                <option disabled value="No" @if(old('company_id')) '' @else selected @endif>Выберите компанию</option>
                                                @foreach($companies as $company)
                                                <option value="{{$company->id}}" @if(old('company_id')==$company->id) selected @endif>{{$company->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @error('company_id')
                            <div class="alert alert-danger">
                                @foreach($errors->get('company_id') as $error)
                                {{$error}}
                                @endforeach
                            </div>
                            @enderror

                            @if($task->budget)
                            <label class="form-control-label" for="budget">Бюджет</label>
                            <fieldset class="form-group">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input onclick="budgetInsert()" type="radio" class="form-check-input" name="budget_toggle" value="0" @if(old('budget_toggle')==0) checked="checked" @endif validate="true">
                                        Готов выполнить за указанную цену
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input onclick="budgetInsert()" id="budget_insert" type="radio" class="form-check-input" name="budget_toggle" value="1" @if(old('budget_toggle')==1) checked="checked" @endif validate="true">
                                        Я хочу предложить свою цену
                                    </label>
                                </div>
                                <div class="input-group amount indent-t20" @if(old('category_toggle')==0) style="display: none" @endif id="set_budget">
                                    <input type="number" class="form-control" id="budget" name="budget" placeholder="Сумма в руб." value="@if(old('budget')){{old('budget')}}@else{{$task->budget}}@endif" min="1" autocomplete="off" validate="true">
                                    <div class="input-group-addon">РУБ</div>
                                </div>
                            </fieldset>
                            @else
                            <fieldset class="form-group">
                                <div class="form-check-inline">
                                    <label class="form-control-label" for="budget">Заказчик не указал бюджет. Предложите свою цену.</label>
                                </div>
                                <div class="input-group amount indent-t20" id="set_budget">
                                    <input type="number" class="form-control" id="budget" name="budget" placeholder="Сумма в руб." value="{{old('budget')}}" min="1" autocomplete="off" validate="true">
                                    <div class="input-group-addon">РУБ</div>
                                </div>
                            </fieldset>
                            @endif
                            @error('budget') <div class="alert alert-danger">
                                @foreach($errors->get('budget') as $error)
                                {{$error}}
                                @endforeach
                            </div>
                            @enderror


                            <div class="form-group indent-b0">
                                <label for="description" class="form-control-label">Комментарии к отклику на заказ</label>
                                <textarea name="description" id="description" cols="30" rows="10" placeholder="Комментарии к отклику на заказ">{!! old('description') !!}</textarea>
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
                        </div>
                    </div>
                </div>
                <div class="cols_table no_hover block-footer">
                    <div class="row align-items-center">
                        <div class="col-sm-6 col-lg-3">
                            {{-- <a href="" class="btn btn-primary btn-md" id="submit_btn">--}}
                            {{-- <b>Добавить проект</b>--}}
                            {{-- </a>--}}
                            <input type="submit" class="btn btn-primary" value="Отправить отклик">
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