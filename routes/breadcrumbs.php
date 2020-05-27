<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push(__('Home'), route('home'));
});

// Home > User
Breadcrumbs::for('users.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Users'), route('users.index'));
});
Breadcrumbs::for('users.create', function ($trail) {
    $trail->parent('users.index');
    $trail->push(__('Create'), route('users.create'));
});
Breadcrumbs::for('users.show', function ($trail, $user) {
    $trail->parent('users.index');
    $trail->push($user->name, route('users.show', $user));
});
Breadcrumbs::for('users.edit', function ($trail, $user) {
    $trail->parent('users.show', $user);
    $trail->push(__('Update'), route('users.edit', $user));
});



// Home > Role
Breadcrumbs::for('roles.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Roles'), route('roles.index'));
});
Breadcrumbs::for('roles.create', function ($trail) {
    $trail->parent('roles.index');
    $trail->push(__('Create'), route('roles.create'));
});
Breadcrumbs::for('roles.show', function ($trail, $model) {
    $trail->parent('roles.index');
    $trail->push($model->name, route('roles.show', $model));
});
Breadcrumbs::for('roles.edit', function ($trail, $model) {
    $trail->parent('roles.show', $model);
    $trail->push(__('Update'), route('roles.edit', $model));
});

// Home > Proprietários (Landlords)
Breadcrumbs::for('proprietarios.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Landlords', route('proprietarios.index'));
});
Breadcrumbs::for('proprietarios.create', function ($trail) {
    $trail->parent('proprietarios.index');
    $trail->push(__('Create Landlord'), route('proprietarios.create'));
});
Breadcrumbs::for('proprietarios.show', function ($trail, $model) {
    $trail->parent('proprietarios.index');
    $trail->push($model->nome, route('proprietarios.show', $model));
});
Breadcrumbs::for('proprietarios.edit', function ($trail, $model) {
    $trail->parent('proprietarios.show', $model);
    $trail->push(__('Update Landlord'), route('proprietarios.edit', $model));
});

// Home > Settings
Breadcrumbs::for('settings.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Settings'), route('settings.index'));
});
Breadcrumbs::for('settings.create', function ($trail) {
    $trail->parent('settings.index');
    $trail->push(__('Create'), route('settings.create'));
});
Breadcrumbs::for('settings.show', function ($trail, $model) {
    $trail->parent('settings.index');
    $trail->push($model->name, route('settings.show', $model));
});
Breadcrumbs::for('settings.edit', function ($trail, $model) {
    $trail->parent('settings.show', $model);
    $trail->push(__('Update'), route('settings.edit', $model));
});

// Home > Inquilinos
Breadcrumbs::for('inquilinos.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Inquilinos', route('inquilinos.index'));
});
Breadcrumbs::for('inquilinos.create', function ($trail) {
    $trail->parent('inquilinos.index');
    $trail->push('Criar', route('inquilinos.create'));
});
Breadcrumbs::for('inquilinos.show', function ($trail, $model) {
    $trail->parent('inquilinos.index');
    $trail->push($model->nome, route('inquilinos.show', $model));
});
Breadcrumbs::for('inquilinos.edit', function ($trail, $model) {
    $trail->parent('inquilinos.show', $model);
    $trail->push(__('Update'), route('inquilinos.edit', $model));
});


/*
// Home > Blog
Breadcrumbs::for('blog', function ($trail) {
    $trail->parent('home');
    $trail->push('Blog', route('blog'));
});

// Home > Blog > [Category]
Breadcrumbs::for('category', function ($trail, $category) {
    $trail->parent('blog');
    $trail->push($category->title, route('category', $category->id));
});

// Home > Blog > [Category] > [Post]
Breadcrumbs::for('post', function ($trail, $post) {
    $trail->parent('category', $post->category);
    $trail->push($post->title, route('post', $post->id));
});*/
