@extends('layouts.admin')

@section('content')
    {{ BootForm::open(array('route' => 'admin.posts.new.save')) }}

    {!! BootForm::text('title', 'Заголовок') !!}
    {!! BootForm::textarea('description', 'Описание', null, ['rows' => 3]) !!}
    {!! BootForm::select('category', 'Категория', $categories) !!}
    {!! BootForm::textarea('content', 'Текст') !!}
    {!! BootForm::submit() !!}

    {{ BootForm::close() }}
@endsection