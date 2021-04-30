
<div style="height:50px;"></div>


<div class='container-fluid' id="body">
  <div class='row'>
    <div class='col-3'></div>
    <div class='col-6 text-center'>
      <a href='/?infoMush=on&name=".$data[0]."' class='text-white fs-4 text' style="text-decoration:none;"></a>
       </div>
       <div class='col-3'></div>
     </div>
</div>

<script>
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
