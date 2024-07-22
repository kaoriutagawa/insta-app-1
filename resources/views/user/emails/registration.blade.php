<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    /* ACTIVITY: style the registraion email with CSS */

    *{
      padding: 1em;
    }

    .name{
      font-weight: 700;
    }
    a{
      text-decoration:none;
      background:blue;
      color:white;
    }
        
  </style>
  
</head>
<body>
    <p class="name">Hi, {{ $name }}!</p>
    <p>Than you for registering to Kredo Insta App.</p>
    <p>To begin, visit the website <a href="{{ $app_url }}">here</a>.</p> 
</body>
</html>