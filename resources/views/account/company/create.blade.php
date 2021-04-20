@extends('layouts.index')
@section('content')
  <div class="page_header">
    <div class="wrapper cols_table no_hover">
      <div class="row">
        <div class="col page_header_content">
          <h1>Создание компании</h1>
          @if(session()->has('fail'))
            <div class="alert alert-danger">Компания не создана</div>
          @endif
        </div>
      </div>
    </div>
  </div>
  <div class="wrapper tab-content">
    <div class="clearfix tab-pane fade show active" id="tab_pane-main">
      <div class="page_content no_sidebar">
        <form class="form" action="{{route('account.companies.store')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
          @csrf
          <div class="cols_table no_hover">
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="name" class="form-control-label">Название компании</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Как называется Ваша компания" value="{{ old('name') }}">
                </div>
                @error('name') <div class="alert alert-danger">
                  @foreach($errors->get('name') as $error)
                    {{$error}}
                  @endforeach
                </div>
                @enderror
                <div class="form-group">
                  <label for="name" class="form-control-label">Телефон</label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="телефон для связи в формате 9 123 456 78 90" value="{{ old('phone') }}">
                </div>
                @error('phone') <div class="alert alert-danger">
                  @foreach($errors->get('phone') as $error)
                    {{$error}}
                  @endforeach
                </div>
                @enderror
                <div class="form-group">
                  <label for="name" class="form-control-label">Электронная почта</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Адрес электронной почты" value="{{ old('email') }}">
                </div>
                @error('email') <div class="alert alert-danger">
                  @foreach($errors->get('email') as $error)
                    {{$error}}
                  @endforeach
                </div>
                @enderror
                <div class="form-group">
                  <label for="name" class="form-control-label">Адрес</label>
                  <input type="text" class="form-control" id="address" name="address" placeholder="Адрес расположения офиса" value="{{ old('address') }}">
                </div>
                @error('address') <div class="alert alert-danger">
                  @foreach($errors->get('address') as $error)
                    {{$error}}
                  @endforeach
                </div>
                @enderror
                <div class="form-group">
                  <div class="attachment file buttons">
                    <div id="files_form">
                      <a href="" class="btn btn-secondary btn-file upload">
                        <span class="icon-attachment"></span>
                        Логотип компании
                        <input type="file" class="uploader" name="file[]" multiple="multiple" value>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="form-group indent-b0">
                  <label for="description" class="form-control-label">Расскажите подробнее о Вашей компании</label>
                  <textarea name="description" id="description" cols="30" rows="10" placeholder="Расскажите подробнее о Вашей компании">{!! old('description') !!}</textarea>
                </div>
                @error('description') <div class="alert alert-danger">
                  @foreach($errors->get('description') as $error)
                    {{$error}}
                  @endforeach
                </div>
                @enderror

                @error('file') <div class="alert alert-danger">
                  @foreach($errors->get('file') as $error)
                    {{$error}}
                  @endforeach
                </div>
                @enderror
                <div class="form-group">
                  <div class="indent-t20" id="category_select">
                    <div class="form-group row bootstrap_css category_select">
                      <div class="form-group col-sm-6 mb-sm-0">
                        <span style="position: absolute; left: 588px; top: 35px;z-index: 1000;"><i class="fas fa-caret-down"></i></span>
                        <label for="category" class="form-control-label">Категория</label>
                        <select name="category_id" id="category" class="form-control" style="position: relative">
                          <option disabled value="No" @if(old('category_id')) '' @else selected @endif>Укажите категорию</option>
                          @foreach($categories as $category)
                            <option value="{{$category->id}}" @if(old('category_id') == $category->id) selected @else""@endif>{{$category->name}}</option>
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
                <input type="submit" class="btn btn-primary" value="Добавить компанию">
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
      height: 400
    });

  </script>
@endpush
