@extends('layouts.admin')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>@sortablelink('q.id', 'id')</th>
            <th>@sortablelink('q.name', 'Наименование')</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($objects as $object)
            <tr>
                <td>{{ $object->getId() }}</td>
                <td>{{ $object->getName() }}</td>
                <td></td>
            </tr>
        @empty
            <td colspan="5">Пока категорий нет</td>
        @endforelse
        </tbody>
    </table>

    {{ $objects->render() }}
@endsection