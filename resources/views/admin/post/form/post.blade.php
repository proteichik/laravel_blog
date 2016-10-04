{{ BootForm::open(array('route' => $route)) }}
{!! BootForm::text('title', 'Заголовок', $object->getTitle()) !!}
{!! BootForm::textarea('description', 'Описание', $object->getDescription(), ['rows' => 3]) !!}
{!! BootForm::select('category', 'Категория', $categories, $object->getCategory()->getId()) !!}
{!! BootForm::textarea('content', 'Текст', $object->getContent()) !!}
{!! BootForm::submit('Сохранить') !!}

{{ BootForm::close() }}