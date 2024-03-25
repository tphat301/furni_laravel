<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
      @yield('title')
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <link rel="stylesheet" href="{{url('resources/admin/sumoselect/sumoselect.css')}}">
    <link rel="stylesheet" href="{{url('resources/admin/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{url('resources/admin/css/adminlte.css')}}">
    <link rel="stylesheet" href="{{url('resources/admin/css/adminlte-style.css')}}">
    <link rel="stylesheet" href="{{url('resources/admin/css/fancybox.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
  </head>

  <body>
    <div class="wrapper">
      @include('admin.layouts.header')
      @include('admin.layouts.sidebar')

      <div class="content-wrapper" style="min-height: 596px;">
        @yield('content')
      </div>
      @include('admin.layouts.footer')
    </div>

    <script
      type="text/javascript"
      src='https://cdn.tiny.cloud/1/6exkcycuzl4n4cx1xx4333jpg4l4ahsk8nxrjw2d1kveux33/tinymce/5/tinymce.min.js'
      referrerpolicy="origin">
    </script>
    <script>
      var editor_config = {
        path_absolute : "http://localhost/furni_laravel/",
        selector: "textarea.tiny",
        relative_urls: false,
        plugins: [
          "advlist autolink lists link image charmap print preview hr anchor pagebreak",
          "searchreplace wordcount visualblocks visualchars code fullscreen",
          "insertdatetime media nonbreaking save table directionality",
          "emoticons template paste textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        file_picker_callback : function(callback, value, meta) {
          var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
          var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

          var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
          if (meta.filetype == 'image') {
            cmsURL = cmsURL + "&type=Images";
          } else {
            cmsURL = cmsURL + "&type=Files";
          }

          tinyMCE.activeEditor.windowManager.openUrl({
            url : cmsURL,
            title : 'Filemanager',
            width : x * 0.8,
            height : y * 0.8,
            resizable : "yes",
            close_previous : "no",
            onMessage: (api, message) => {
              callback(message.content);
            }
          });
        }
      };
      tinymce.init(editor_config);
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{url('resources/admin/js/fancybox.umd.js')}}"></script>
    <script src="{{url('resources/admin/js/adminlte.js')}}"></script>
    <script src="{{url('resources/admin/js/priceFormat.js')}}"></script>
    <script src="{{url('resources/admin/sumoselect/jquery.sumoselect.js')}}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
    <script src="{{url('resources/admin/js/app.js')}}"></script>
  </body>

</html>
