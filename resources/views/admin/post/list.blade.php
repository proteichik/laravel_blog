@extends('layouts.admin')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>Заголовок</th>
                <th>Каегория</th>
                <th>Дата создания</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($objects as $object)
                <tr>
                    <td>{{ $object->getId() }}</td>
                    <td>{{ $object->getTitle() }}</td>
                    <td>{{ $object->getCategory()->getName() }}</td>
                    <td>{{ $object->getCreatedAt()->format('Y-m-d H:i:s') }}</td>
                    <td></td>
                </tr>
            @empty
                <td colspan="5">Пока публикаций нет</td>
            @endforelse
        </tbody>
    </table>

    {{ $objects->render() }}
@endsection