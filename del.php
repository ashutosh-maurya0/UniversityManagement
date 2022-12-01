<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box;}

body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.header {
    width:100%;
    overflow: hidden;
    background-color: #f1f1f1;
    padding: 10px 10px;
}
.header-right {
    float: right;
    width: 20%; 
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: right;
    width:20%;
  }
}
.responsive {
    width: 30%;
    max-width: 100px;
    height: auto;
    float: left;
    border: 3px solid red;
}
.center {
    width:60%;
    max-width: 300px;
    text-align: center;
    float:left;
    border: 3px solid green;
}

</style>
</head>
<body>

<div class="header">
    <div style="width:30%">
        <img src="img/logo.jpg" alt="Nature" class="responsive">
    </div>
    <div class="center">
        <h1>Christ University</h1>
    </div>
    <div class="header-right">
        <p><?php echo " ".date("d M Y");  echo "  " . date("h:i:sa");?></p>
    </div>
</div>

<div style="padding-left:20px">
  <h1>Responsive Header</h1>
  <p>Resize the browser window to see the effect.</p>
  <p>Some content..</p>
</div>

</body>
</html>
