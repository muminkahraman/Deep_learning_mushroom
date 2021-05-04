
<div class='container-fluid' id="body">
  <div class="row">
    <h1 class="title1">Galerie</h1>
  </div>
  <div class='row' id="row">
  </div>
</div>

<script>
  //classM = classes de tous les champignons 
  //Pour chaque classe créé des elements HTML et les insere sur la page
classM.forEach(function(item) {
  var body =document.getElementById("body");
  var row = document.createElement("row");
  var div = document.createElement("div");
  div.classList.add("col-12");
  div.classList.add("text-center")
  var a = document.createElement('a');
  var txt = document.createTextNode(item);
  a.setAttribute("href", "/?infoMush=on&name="+item);
  a.classList.add('text-white');
  a.classList.add("fs-4");
  a.classList.add("text");
  a.setAttribute("style", "text-decoration: none");
  a.appendChild(txt);
  div.appendChild(a);
  row.appendChild(div);
  body.appendChild(row);
});

</script>


<div style="height:50px;"></div>
