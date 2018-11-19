@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <script src="teste/js/jquery.js"></script>
</head>

<style type="text/css">
*{
  margin: 0px; 
  padding: 0px;
}
body{
  background-color: #f9f9f9;
}
#main-gallery{ 
  width: 300px; 
  height: 300px; 
  margin: 50px auto;
  background-color: #FFF;
  border: 1px solid #ddd;
}
#main-gallery .large-img{ 
  width: 300px; 
  height: 300px; 
  overflow: hidden;
}
#main-gallery .large-img img{
  max-width: 300px;
  height: 300px;
}
#main-gallery .small-img{ 
  width: 300px; 
  height: 100px; 
  background-color: #222;
}
#main-gallery .small-img .img-holder{ 
  width: 60px; 
  height: 50px; 
  margin: 5px 0px 5px 5px;
  overflow: hidden;
  float: left;
}
#main-gallery .small-img img{ 
  max-width: 200px; 
  height: auto;
  opacity: .5;
  border-radius: 4px;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  -o-border-radius: 4px;
}
#main-gallery .small-img img:hover{
  opacity: 1;
}
</style>

<body>
  <div id="main-gallery">
    <div class="large-img">
      <img src="teste/img/img/1.jpg" alt="">
    </div>

    <div class="small-img">
      <div class="img-holder">
        <img src="teste/img/img/1.jpg" alt="">
      </div>
      <div class="img-holder">
        <img src="teste/img/img/2.jpg" alt="">
      </div>
      <div class="img-holder">
        <img src="teste/img/img/3.jpg" alt="">
      </div>
    </div>

  </div>

  <script type="text/javascript">
  $(function() {
    $('.small-img img').hover(function() {
      var imgSrc = $(this).attr('src');
      $('.large-img img').attr('src', imgSrc);
    });
  });
  </script>
</body>
</html>
@endsection