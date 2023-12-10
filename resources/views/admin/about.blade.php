<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <script src="https://cdn.jsdelivr.net/npm/tinymce/tinymce.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tinymce/skins/ui/oxide/skin.min.css">
</head>
<style>
    svg {
    display: none;
}
</style>
<body>
    @include('admin.layout.header')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('about_content') }}">
        @csrf
        <h3 class="text-dark">About Us</h3>
        <div class="form-group">
            <label for="inputAddress">Manage Content</label>
            <textarea name="content" id="content" cols="30" rows="10"></textarea>
        </div>

        <button type="submit" class="btn btn-dark">Set Content</button>
    </form>

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'autoresize autolink lists link image charmap print preview anchor',
            toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | link image',
            autoresize_bottom_margin: 20,
            menubar: false,
            content_style: 'body { font-family: Arial, sans-serif; font-size: 14px; line-height: 1.6; }',

        });
    </script>
</body>
</html>
