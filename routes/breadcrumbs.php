<?php

Breadcrumbs::register('home', function ($breadcrumbs) {
  $breadcrumbs->push('Строительная биржа', route('home'));
});

Breadcrumbs::register('companies', function ($breadcrumbs) {
  $breadcrumbs->parent('home');
  $breadcrumbs->push('Все подрядчики', route('companies.index'));
});
 
Breadcrumbs::register('tasks', function ($breadcrumbs) {
  $breadcrumbs->parent('home');
  $breadcrumbs->push('Все заказы', route('tasks.index'));
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

Breadcrumbs::register('account.tasks', function ($breadcrumbs) {
  $breadcrumbs->parent('account');
  $breadcrumbs->push('Список заявок', route('account.tasks'));
});

Breadcrumbs::register('account.orders', function ($breadcrumbs) {
  $breadcrumbs->parent('account');
  $breadcrumbs->push('Список заказов', route('account.orders'));
});

Breadcrumbs::register('account.executors', function ($breadcrumbs) {
  $breadcrumbs->parent('account');
  $breadcrumbs->push('Выбранные исполнители', route('account.executor'));
}); 
 
