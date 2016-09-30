@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Добавить запись</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @include('admin.post.form.post', ['categories' => $categories])
                </div>
            </div>
        </div>
    </div>
@endsection