<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Строительная биржа', route('home'));
});



Breadcrumbs::register('companies', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Все подрядчики', route('companies.index'));
});

Breadcrumbs::register('companies.show', function ($breadcrumbs, $attrs) {
    $breadcrumbs->parent('companies');
    $breadcrumbs->push($attrs["company"]->name, route('companies.show', $attrs["company"]));
});

Breadcrumbs::register('tasks', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Все заказы', route('tasks.index'));
});
Breadcrumbs::register('tasks.index', function ($breadcrumbs, $attrs) {
    $breadcrumbs->parent('tasks');
    $breadcrumbs->push($attrs["task"]->title, route('tasks.index'));
});
Breadcrumbs::register('tasks.create', function ($breadcrumbs) {
    $breadcrumbs->parent('tasks');
    $breadcrumbs->push('Создание заказа', route('tasks.create'));
});



Breadcrumbs::register('account', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Личный кабинет', route('account.index'));
});

Breadcrumbs::register('account.companies', function ($breadcrumbs) {
    $breadcrumbs->parent('account');
    $breadcrumbs->push('Мои компании', route('account.companies.index'));
});

Breadcrumbs::register('account.companies.offer', function ($breadcrumbs) {
    $breadcrumbs->parent('account');
    $breadcrumbs->push('Услуги', route('account.companies.offer.index'));
});
Breadcrumbs::register('account.companies.create', function ($breadcrumbs) {
    $breadcrumbs->parent('account.companies');
    $breadcrumbs->push('Создание компании', route('account.companies.create'));
});


Breadcrumbs::register('account.project', function ($breadcrumbs) {
    $breadcrumbs->parent('account');
    $breadcrumbs->push('Заказы в работе', route('account.project'));
});


Breadcrumbs::register('account.tasks', function ($breadcrumbs) {
    $breadcrumbs->parent('account');
    $breadcrumbs->push('Список заявок', route('account.tasks'));
});
Breadcrumbs::register('account.tasks.show', function ($breadcrumbs, $attrs) {
    $breadcrumbs->parent('account.tasks');
    $breadcrumbs->push($attrs["task"]->title, route('account.tasks'));
});

Breadcrumbs::register('account.orders', function ($breadcrumbs) {
    $breadcrumbs->parent('account');
    $breadcrumbs->push('Список заказов', route('account.orders'));
});

Breadcrumbs::register('account.executors', function ($breadcrumbs) {
    $breadcrumbs->parent('account');
    $breadcrumbs->push('Выбранные исполнители', route('account.executor'));
});
