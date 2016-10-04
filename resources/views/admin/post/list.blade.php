@extends('layouts.admin')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>@sortablelink('q.id', 'id')</th>
                <th>@sortablelink('q.title', 'Заголовок')</th>
                <th>@sortablelink('c.name', 'Категория')</th>
                <th>@sortablelink('q.createdAt', 'Дата создания')</th>
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
                    <td>
                        <div class="btn-group btn-group-sm">
                            <a href="{{ route('admin.posts.edit', ['id' => $object->getId()])  }}" type="button" class="btn btn-warning">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                            <a href="#" type="button" class="btn btn-danger" name="btn-delete">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @empty
                <td colspan="5">Пока публикаций нет</td>
            @endforelse
        </tbody>
    </table>

    {{ $objects->render() }}
@endsection