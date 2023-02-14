<html>
    <head>
        <meta charset="UTF-8">
        <title>Summernote with Bootstrap 4</title>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>    
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>    
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
      </head>
      <body>
        <form method="post" action="hello">
            <textarea id="summernote" name="summernote"></textarea>
            <input type="submit">
        </form>
        <script>
          $('#summernote').summernote({
            tabsize: 2,
            height: 100
          });
          $('#summernote').summernote('code','<p>hello</p>');
        </script>
      </body>
</html>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">