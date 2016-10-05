{{ BootForm::open(array('route' => $route)) }}
{!! BootForm::text('name', 'Имя', $object->getName()) !!}
{!! BootForm::submit('Сохранить') !!}

{{ BootForm::close() }}