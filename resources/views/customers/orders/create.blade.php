@extends('layouts.index')
@section('content')
    <div class="container">
        <div class="mb-3">
            <form class="form" action="" method="POST" enctype="multipart/form-data">
                @csrf
                <label class="form-label" for="text" name="text">text</label>
                <input class="form-control" id="text" type="text" placeholder="Что нужно сделать">
                <label class="form-label" for="body">Описание</label><br>
                <textarea name="body" id="body" cols="30" rows="10" placeholder="Подробно опишите вашу задачу"></textarea>
                <input class="form-control" type="file">
                <label class="form-label" for="budget">Бюджет</label><br>

                <input type="radio" id="budget1" name="budget" value="proposal">
                <label class="form-label" for="budget1">Компания предложит цены</label>
                <input type="radio" id="budget2" name="budget" value="self">
                <label class="form-label" for="budget2">Я хочу указать бюджет</label>
                <br>
                <label class="form-label" for="category">Категория</label><br>
                <input type="radio" id="category1" name="budget" value="auto">
                <label class="form-label" for="category1">Определить автоматически</label>
                <input type="radio" id="category2" name="budget" value="self">
                <label class="form-label" for="category2">Я хочу указать категорию</label>
                <br>
                <input class="button alert-success" type="submit" value="Разместить заказ">
            </form>
        </div>
    </div>
@stop
