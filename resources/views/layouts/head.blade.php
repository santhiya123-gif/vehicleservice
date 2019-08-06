<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Laravel Test</title>
  <!-- Bootstrap core CSS -->
  <link href="{{ url('css/app.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="{{ url('css/landing-page.css') }}" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="{{ url('css/toastr.min.css') }}">

  @stack('styles')
  <style type="text/css">
    .error {
      color: red;
    }
  </style>

  
</head>