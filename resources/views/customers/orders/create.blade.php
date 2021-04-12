@extends('layouts.index')
@section('content')
  <div class="page_header">
    <div class="wrapper cols_table no_hover">
      <div class="row">
        <div class="col page_header_content">
          <h1>Создание проекта</h1>
          @if(session()->has('fail'))
            <div class="alert alert-danger">Заявка не добавлена</div>
          @endif
        </div>
      </div>
    </div>
  </div>
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
                      <input onclick="budgetInsert()" type="radio" class="form-check-input" name="budget_toggle" value="0" checked="checked" validate="true">
                      Компании предложат цены
                    </label>
                  </div>
                  <div class="form-check-inline">
                    <label class="form-check-label">
                      <input onclick="budgetInsert()" id="budget_insert" type="radio" class="form-check-input" name="budget_toggle" value="1" validate="true">
                      Я хочу указать бюджет
                    </label>
                  </div>
                  @error('budget') <div class="alert alert-danger">
                    @foreach($errors->get('budget') as $error)
                      {{$error}}
                    @endforeach
                  </div>
                  @enderror
                  <div class="input-group amount indent-t20" style="display: none" id="set_budget">
                    <input type="number" class="form-control" id="budget" name="budget" placeholder="Сумма в руб." value min="1" autocomplete="off" validate="true">
                    <div class="input-group-addon">РУБ</div>
                  </div>
                </fieldset>
                <div class="form-group">
                  <div id="category_auto">
                    <label class="form-control-label" for="category_id">Категория</label>
                    <fieldset>
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input onclick="categoryInsert()" type="radio" class="form-check-input" name="category_toggle" value="0" checked="checked" validate="true">
                          Определить автоматически
                        </label>
                      </div>
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input onclick="categoryInsert()" id="category_insert" type="radio" class="form-check-input" name="category_toggle" value="1" validate="true">
                          Я хочу указать категорию
                        </label>
                      </div>
                    </fieldset>
                  </div>
                  <div class="indent-t20" style="display: none" id="category_select">
                    <div class="form-group row bootstrap_css category_select">
{{--                      <div class="form-group col-sm-6 mb-sm-0">--}}
{{--                        <label for="parent_category_id" class="form-control-label">Раздел</label>--}}
{{--                        <select name="parent_category_id" id="parent_category_id" class="form-control">--}}
{{--                          <option value="1">1</option>--}}
{{--                        </select>--}}
{{--                      </div>--}}
                      <div class="form-group col-sm-6 mb-sm-0">
                        <label for="category" class="form-control-label">Категория</label>
                        <select name="category_id" id="category" class="form-control">
                          <option disabled selected value="No">Укажите категорию</option>
                          @foreach($categories as $category)
                            <option value="{{$category->id}}" @if(old('category') == $category->name)"selected"@else""@endif>{{$category->name}}</option>
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
{{--                <a href="" class="btn btn-primary btn-md" id="submit_btn">--}}
{{--                  <b>Добавить проект</b>--}}
{{--                </a>--}}
                <input type="submit" class="btn btn-primary" value="Добавить проект">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>


{{--    <div class="container">--}}
{{--        <div class="mb-3">--}}
{{--            <h3>Добавить задачу</h3>--}}
{{--            <hr>--}}
{{--            @if(session()->has('fail'))--}}
{{--                <div class="alert alert-danger">Заявка не добавлена</div>--}}
{{--            @endif--}}
{{--            <form class="form" action="{{route('tasks.store')}}" method="POST" enctype="multipart/form-data">--}}
{{--                @csrf--}}
{{--                <label class="form-label" for="title">Заголовок</label>--}}
{{--                <input class="form-control" id="title"--}}
{{--                                            name="title"--}}
{{--                                            placeholder="Что нужно сделать"--}}
{{--                                            value="{{ old('title') }}">--}}
{{--                @error('title') <div class="alert alert-danger">--}}
{{--                    @foreach($errors->get('title') as $error)--}}
{{--                        {{$error}}--}}
{{--                    @endforeach--}}
{{--                    </div>--}}
{{--                @enderror--}}
{{--                <label class="form-label" for="description">Описание</label><br>--}}
{{--                <textarea name="description"--}}
{{--                          id="description"--}}
{{--                          cols="100" rows="10"--}}
{{--                          placeholder="Подробно опишите вашу задачу">{!! old('description') !!}</textarea>--}}
{{--                @error('description') <div class="alert alert-danger">--}}
{{--                    @foreach($errors->get('description') as $error)--}}
{{--                        {{$error}}--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--                @enderror--}}
{{--                <input class="form-control" type="file">--}}
{{--                @error('file') <div class="alert alert-danger">--}}
{{--                    @foreach($errors->get('file') as $error)--}}
{{--                        {{$error}}--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--                @enderror--}}
{{--                <label class="form-label" for="budget">Бюджет</label>--}}
{{--                @error('budget') <div class="alert alert-danger">--}}
{{--                    @foreach($errors->get('budget') as $error)--}}
{{--                        {{$error}}--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--                @enderror--}}
{{--                <br>--}}

{{--                <input type="radio" id="budget1" name="budget" value="proposal" checked>--}}
{{--                <label class="form-label" for="budget1">Компания предложит цены</label>--}}
{{--                <input type="radio" id="budget2" name="budget" value="self">--}}
{{--                <label class="form-label" for="budget2">Я хочу указать бюджет</label>--}}
{{--                <br>--}}
{{--                <label class="form-label" for="category">Категория</label><br>--}}
{{--                <select id="category" name="category_id">--}}
{{--                    <option disabled selected value="No">Укажите категорию</option>--}}
{{--                    @foreach($categories as $category)--}}
{{--                        <option value="{{$category->id}}">{{$category->name}}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--                @error('category_id') <div class="alert alert-danger">--}}
{{--                    @foreach($errors->get('category_id') as $error)--}}
{{--                        {{$error}}--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--                @enderror--}}
{{--                <input type="radio" id="category1" name="budget" value="auto">--}}
{{--                <label class="form-label" for="category1">Определить автоматически</label>--}}
{{--                <input type="radio" id="category2" name="budget" value="self">--}}
{{--                <label class="form-label" for="category2">Я хочу указать категорию</label>--}}
{{--                <br><br>--}}
{{--                <input class="button alert-success" type="submit" value="Разместить заказ">--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
@stop

@push('js')
  <script type="text/javascript">
    $('#description').summernote({
      height: 400
    });
    function budgetInsert(){
      if ($('#budget_insert').is(':checked')) {
        $('#set_budget').show();
      } else {
        $('#set_budget').hide();
      }
    }
    function categoryInsert(){
      if ($('#category_insert').is(':checked')) {
        $('#category_select').show();
      } else {
        $('#category_select').hide();
      }
    }
  </script>
@endpush
