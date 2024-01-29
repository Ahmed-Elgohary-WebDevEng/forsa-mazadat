<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link rel="stylesheet" type="text/css" href="sl/slider.css">
</head>
<body>
    <div class="wrapper">
        <div class="track">
           @foreach ($agent as $item)
            <div class="logo" dir="RTL">
				<a href="{{$item->link}}" target="_blank" >
                <img style="padding-right:9px; padding-left:9px" width="150px" src="{{ asset('uploads/agentsLogo/'.$item->logo)}}"/></a>
            </div>
			@endforeach
        </div>
    </div>
</body>
</html>