{{ BootForm::open(array('route' => $route)) }}
{!! BootForm::text('title', 'Заголовок', $object->getTitle()) !!}
{!! BootForm::textarea('description', 'Описание', $object->getDescription(), ['rows' => 3]) !!}
{!! BootForm::select('category', 'Категория', $categories, $object->getCategory()->getId()) !!}
{!! BootForm::textarea('content', 'Текст', $object->getContent(), ['class' => 'tinytext'] )!!}
{!! BootForm::submit('Сохранить') !!}

{{ BootForm::close() }}

<script src="{{ asset('js/tiny_init.js') }}"></script>

@section('js_head')
    @parent

    <script src="{{ asset('vendors/tinymce/tinymce.min.js') }}"></script>
@endsection