<!DOCTYPE html> 
<html lang="fr"> 
<head> 
  <meta charset="UTF-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
  <title>Laravel CRUD</title> 
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" /> 
  <link rel="stylesheet" 
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
        integrity="sha384Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
        crossorigin="anonymous"> 
</head> 
 
<body> 
  <div class="container"> 
    @yield('content') 
  </div> 
  <script src="{{ asset('js/app.js') }}" type="text/js"></script> 
</body> 
</html> 