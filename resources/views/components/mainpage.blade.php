<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="E-Crayon - Electronic Gradebook" />
    <meta name="author" content="E-Crayon" />

    <link rel="stylesheet" href="{{ asset('joson/css/bootstrap.css') }}" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,600,700&display=swap" rel="stylesheet" />
    <link href="{{ asset('joson/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('joson/css/responsive.css') }}" rel="stylesheet" />
  </head>
  <body>
    <div class="header">
		@include('header')
    </div>
    <div class="content">
		{{ $slot }}
    </div>
  </body>
</html>
