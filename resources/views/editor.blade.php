<!DOCTYPE html>
<html>
<head>
    <title>GrapesJS Editor</title>
    <link rel="stylesheet" href="{{ asset('css/grapesjs/grapes.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <button id="guardar-template">Guardar</button>
    <div id="gjs"></div>

    <script src="{{ asset('js/grapesjs/grapes.min.js') }}"></script>
    <script src="{{ asset('js/grapesjs/grapesjs-preset-webpage/index.js') }}"></script>
    <script src="{{ asset('js/grapesjs/grapesjs-plugin-forms/index.js') }}"></script>
    <script
  src="https://code.jquery.com/jquery-3.6.4.min.js"
  integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
  crossorigin="anonymous"></script>
    <script>
        var editor = grapesjs.init({
            plugins: ['grapesjs-preset-webpage', 'grapesjs-plugin-forms'],
            container: '#gjs',
            height: '1000px',
            storageManager: { autoload: 0 },
            components: '<div class="txt-red">templates por defecto</div>',
            style: '.txt-red{color: red}',
        });
        // fetch('{{ asset('html/test.html') }}')
        //     .then(response => response.text())
        //     .then(html => editor.setComponents(html));


        jQuery('#guardar-template').click(function() {
        var name = prompt("Introduce un nombre para el template:");
        if (name != null) {
            jQuery.ajax({
                type: 'POST',
                url: '{{ route("guardar-template") }}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    name: name,
                    html: editor.getHtml(),
                    css: editor.getCss(),
                    js: editor.getJs(),
                    description: 'Este es un template guardado'
                },
                success: function(response) {
                    alert('El template se ha guardado exitosamente.');
                }
            });
        }
        });
    </script>



<script>

</script>

</body>
</html>
