{{ BootForm::open(array('route' => $route)) }}
{!! BootForm::text('title', 'Заголовок', $object->getTitle()) !!}
{!! BootForm::textarea('description', 'Описание', $object->getDescription(), ['rows' => 3]) !!}
{!! BootForm::select('category', 'Категория', $categories, $object->getCategory()->getId()) !!}
{!! BootForm::textarea('content', 'Текст', $object->getContent(), ['class' => 'tinytext'] )!!}
{!! BootForm::submit('Сохранить') !!}

{{ BootForm::close() }}

<script>
    tinymce.init({
        selector: '.tinytext',
        height: 500,
        theme: 'modern',
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools filemanager'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons',
        image_advtab: true,
        templates: [
            { title: 'Test template 1', content: 'Test 1' },
            { title: 'Test template 2', content: 'Test 2' }
        ],
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css'
        ]
    });
</script>

@section('js_head')
    @parent

    <script src="{{ asset('vendors/tinymce/tinymce.min.js') }}"></script>
@endsection