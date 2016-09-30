{{ BootForm::open(array('route' => 'admin.posts.new.save')) }}

{!! BootForm::text('title', 'Заголовок') !!}
{!! BootForm::textarea('description', 'Описание', null, ['rows' => 3]) !!}
@if (isset($object))
    {!! BootForm::select('category', 'Категория', $categories, $object->getId()) !!}
@else
    {!! BootForm::select('category', 'Категория', $categories) !!}
@endif
{!! BootForm::textarea('content', 'Текст') !!}
{!! BootForm::submit('Сохранить') !!}

{{ BootForm::close() }}