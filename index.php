<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="utf-8">
<title>Ajax Demo</title>
<style>
#main{
  width: 800px;
  border:1px solid black;
  height: 500px;
  margin: auto;
}
</style>
</head>
<body>
<section id="main">
</section>
<script>
window.onload = function(){
  let ajax = new XMLHttpRequest();
  ajax.onreadystatechange = function(){
    if (this.readyState === 4 && this.status === 200) {
      let data = JSON.parse(this.response);
      document.getElementById("main").innerHTML = '<h1> Antwort ist:'+data.test+'</h1>';
     }
  }
  ajax.open("GET","ajax-json.php");
  ajax.send();

}
</script>
</body>
</html>
