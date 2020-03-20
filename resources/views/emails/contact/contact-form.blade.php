@component('mail::message')

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
  <h2 style="color:red;">You have a messege!</h2>
   
    <p>
        My name is <b>{{$data['name']}}</b>,
         my email is  <b>{{$data['email']}}</b> <br>
         , my mobile is <b>{{$data['mobile']}}</b>

    </p>

    <h3 style="color:red;margin-bottom:10px;">My message : </h3><br>
     <p>{{$data['message']}}</p> 

    

</body>
</html>
@endcomponent
