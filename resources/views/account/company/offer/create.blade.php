@extends('layouts.index')
@section('content')
    <div class="page_header">
        <div class="wrapper cols_table no_hover">
            <div class="row">
                <div class="col page_header_content">
                    <h1>Создание предложения</h1>
                    @if(session()->has('fail'))
                        <div class="alert alert-danger">Предложение не создано</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper tab-content">
        <div class="clearfix tab-pane fade show active" id="tab_pane-main">
            <div class="page_content no_sidebar">
                <form class="form" action="{{ route('account.companies.offer.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
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
                                                        <option value="{{$company->id}}" @if(old('company_id')==$company->id) selected @else""@endif>{{$company->name}}</option>
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

                                <div class="form-group">
                                    <div class="indent-t20" id="category_select">
                                        <div class="form-group row bootstrap_css category_select">
                                            <div class="form-group col-sm-6 mb-sm-0">
                                                <label for="category" class="form-control-label">Категория</label>
                                                <select name="category_id" id="category" class="form-control">
                                                    <option disabled value="No" @if(old('category_id')) '' @else selected @endif>Укажите категорию</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}" @if(old('category_id')==$category->id) selected @else""@endif>{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @error('category_id')
                                <div class="alert alert-danger">
                                    @foreach($errors->get('category_id') as $error)
                                        {{$error}}
                                    @endforeach
                                </div>
                                @enderror

                                <div class="form-group">
                                    <label for="name" class="form-control-label">Название услугм</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Как называется Ваша услуга" value="{{ old('name') }}">
                                </div>
                                @error('name')
                                <div class="alert alert-danger">
                                    @foreach($errors->get('name') as $error)
                                        {{$error}}
                                    @endforeach
                                </div>
                                @enderror

                                <div class="form-group indent-b0">
                                    <label for="description" class="form-control-label">Расскажите подробнее о Вашей услуге</label>
                                    <textarea name="description" id="description" cols="30" rows="10" placeholder="Расскажите подробнее о Вашей услуге">{!! old('description') !!}</textarea>
                                </div>
                                @error('description')
                                <div class="alert alert-danger">
                                    @foreach($errors->get('description') as $error)
                                        {{$error}}
                                    @endforeach
                                </div>
                                @enderror

                                <div class="input-group amount indent-t20">
                                    <input type="number" class="form-control" id="price" name="price" placeholder="Сумма в руб." value="{{old('price')}}" value min="1" autocomplete="off" validate="true">
                                    <div class="input-group-addon">РУБ</div>
                                </div>
                                @error('price') <div class="alert alert-danger">
                                    @foreach($errors->get('price') as $error)
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
                                <input type="submit" class="btn btn-primary" value="Добавить услугу">
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
