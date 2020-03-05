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
.ajax-loader {
    position: fixed;
    top: 20%;
    left: 50%;
        z-index: 1000;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}
.dot {
    width: 2em;
    height: 2em;
    border: 2px solid white;
    border-radius: 50%;
    float: left;
    background: orange;
    margin: 0 5px;
    -webkit-transform: scale(0);
    transform: scale(0);
    -webkit-animation: fx 1000ms ease infinite 0ms;
    animation: fx 1000ms ease infinite 0ms;

}

.dot:nth-child(2) {

    -webkit-animation: fx 1000ms ease infinite 300ms;
    animation: fx 1000ms ease infinite 300ms;
}

.dot:nth-child(3) {
    -webkit-animation: fx 1000ms ease infinite 600ms;
    animation: fx 1000ms ease infinite 600ms;
}

@-webkit-keyframes fx {
    50% {
        -webkit-transform: scale(1);
        transform: scale(1);
        opacity: 1;
    }
    100% {
        opacity: 0;
    }
}

@keyframes fx {
    50% {
        -webkit-transform: scale(1);
        transform: scale(1);
        opacity: 1;
    }
    100% {
        opacity: 0;
    }
}
</style>
</head>
<body>
  <div id="loader" class="ajax-loader" style="display:none">
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
  </div>
<section id="main">
</section>
<script>
window.onload = function(){
  let ajax = new  XMLHttpRequest();
  let ajaxLoader = document.getElementById('loader');
  ajax.onreadystatechange = function(){

    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("main").innerHTML = this.response;

     }
  }
  ajax.open("GET","ajax-form.php");
  ajax.send();


document.getElementById("main").addEventListener("submit",function(event){
  event.preventDefault();
    let ajaxRequest = new XMLHttpRequest();
    ajaxRequest.onreadystatechange = function(){
          ajaxLoader.style.display  ='block';
      if (this.readyState == 4 && this.status == 200) {
        let data = JSON.parse(this.response);
        document.getElementById("output").innerHTML = "Das input Feld hat den Wert: "+data.test;
ajaxLoader.style.display  ='none';
       }
    }
    let form = event.target;
    let formDataPairs = [];
    let formDataString = "";
    for(let index in form.elements){
        let currentElement =form.elements[index];
            if(currentElement.type === "text"){
                formDataPairs.push(encodeURIComponent(currentElement.name)+"="+encodeURIComponent(currentElement.value));
            }
    }
    formDataString = formDataPairs.join( '&' ).replace( /%20/g, '+' );
    ajaxRequest.open(form.method,form.action);
    ajaxRequest.setRequestHeader( 'Content-Type', 'application/x-www-form-urlencoded' );
    ajaxRequest.send(formDataString);
},true);







/*
  document.getElementById("main").addEventListener("submit",function(event){
  event.preventDefault();
    let ajaxRequest = new XMLHttpRequest();

    ajaxRequest.onreadystatechange = function(){

      if (this.readyState == 4 && this.status == 200) {
        let data = JSON.parse(this.response);
        document.getElementById("output").innerHTML = "Das input Feld hat den Wert: "+data.test;

       }
    }
    let form = event.target;

    let formDataPairs = [];
    let formDataString = "";

    for(let index in form.elements){
      let currentElement =form.elements[index];
      if(currentElement.type === "text"){
        formDataPairs.push(encodeURIComponent( currentElement.name ) + '=' + encodeURIComponent( currentElement.value ))
      }
    }
    formDataString = formDataPairs.join( '&' ).replace( /%20/g, '+' );
    ajaxRequest.open(form.method,form.action);
    ajaxRequest.setRequestHeader( 'Content-Type', 'application/x-www-form-urlencoded' );
    ajaxRequest.send(formDataString);
  },true);
  */
}
</script>
</body>
</html>
