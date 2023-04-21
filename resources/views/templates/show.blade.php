<!DOCTYPE html>
<html>
<head>
    <title>{{ $template->name }}</title>
    <style>
        {!! $template->css !!}
    </style>
</head>
<body>
    {!! $template->html !!}
    <script>
        {!! $template->js !!}
    </script>
</body>
</html>
