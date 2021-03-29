@extends('layouts.index')
@section('content')
    <div class="container">
        <div class="mb-3">
            <h3>Добавить задачу</h3>
            <hr>
            @if(session()->has('fail'))
                <div class="alert alert-danger">Заявка не добавлена</div>
            @endif
            <form class="form" action="{{route('tasks.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <label class="form-label" for="title">Заголовок</label>
                <input class="form-control" id="title"
                                            name="title"
                                            placeholder="Что нужно сделать"
                                            value="{{ old('title') }}">
                @error('title') <div class="alert alert-danger">
                    @foreach($errors->get('title') as $error)
                        {{$error}}
                    @endforeach
                    </div>
                @enderror
                <label class="form-label" for="description">Описание</label><br>
                <textarea name="description"
                          id="description"
                          cols="100" rows="10"
                          placeholder="Подробно опишите вашу задачу">{!! old('description') !!}</textarea>
                @error('description') <div class="alert alert-danger">
                    @foreach($errors->get('description') as $error)
                        {{$error}}
                    @endforeach
                </div>
                @enderror
                <input class="form-control" type="file">
                @error('file') <div class="alert alert-danger">
                    @foreach($errors->get('file') as $error)
                        {{$error}}
                    @endforeach
                </div>
                @enderror
                <label class="form-label" for="budget">Бюджет</label>
                @error('budget') <div class="alert alert-danger">
                    @foreach($errors->get('budget') as $error)
                        {{$error}}
                    @endforeach
                </div>
                @enderror
                <br>

                <input type="radio" id="budget1" name="budget" value="proposal" checked>
                <label class="form-label" for="budget1">Компания предложит цены</label>
                <input type="radio" id="budget2" name="budget" value="self">
                <label class="form-label" for="budget2">Я хочу указать бюджет</label>
                <br>
                <label class="form-label" for="category">Категория</label><br>
                <select id="category" name="category_id">
                    <option disabled selected value="No">Укажите категорию</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                @error('category_id') <div class="alert alert-danger">
                    @foreach($errors->get('category_id') as $error)
                        {{$error}}
                    @endforeach
                </div>
                @enderror
{{--                <input type="radio" id="category1" name="budget" value="auto">--}}
{{--                <label class="form-label" for="category1">Определить автоматически</label>--}}
{{--                <input type="radio" id="category2" name="budget" value="self">--}}
{{--                <label class="form-label" for="category2">Я хочу указать категорию</label>--}}
                <br><br>
                <input class="button alert-success" type="submit" value="Разместить заказ">
            </form>
        </div>
    </div>
@stop
