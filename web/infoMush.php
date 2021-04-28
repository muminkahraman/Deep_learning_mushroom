<div class="container-fluid">
  <div class="row text-center">
    <div class="col-3"></div>
    <div class="col-6">
      <h2 class="display-2" id="mushName"></h2>
    </div>
    <div class="col-3"></div>
  </div>
  <div class="row">
    <div class="txt text-center">
      <p id="txt"></p>
    </div>
  </div>
  <div>

    <script>
    function $_GET(param) {
      var vars = {};
      window.location.href.replace( location.hash, '' ).replace(
        /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
        function( m, key, value ) { // callback
          vars[key] = value !== undefined ? value : '';
        }
      );

      if ( param ) {
        return vars[param] ? vars[param] : null;
      }
      return vars;
    }

    var name = $_GET('name');
    name= name.replace("%20", " ");
    document.getElementById('mushName').innerText=name;
    var url = "https://fr.wikipedia.org/wiki/"+name;
    var title = url.split("/").slice(4).join("/");

    //Get Leading paragraphs (section 0)
    $.getJSON("https://en.wikipedia.org/w/api.php?action=query&format=json&origin=*&prop=extracts&titles="+title+"&formatversion=2&exlimit=20&explaintext=1", function (data) {
      var text = data.query.pages[0].extract;
      if (text == null)
      {

        var p = document.getElementById('txt');
        p.innerText= "Nous n'avons pas de données pour ce champignon.";
      }
      else {
        console.log("ok");
        var arr = text.split("==");
        console.log(arr);
        var arr2 = new Array();

        if (arr.includes(" Taxonomy and naming "))
        {
          var i = arr.indexOf(" Taxonomy and naming ");
          arr2.push(arr[i]);
          arr2.push(arr[i+1]);
        }

        if (arr.includes(" Description "))
        {
          var i = arr.indexOf(" Description ");
          arr2.push(arr[i]);
          arr2.push(arr[i+1]);
        }

        if (arr.includes(" Toxicity "))
        {
          var i = arr.indexOf(" Toxicity ");
          arr2.push(arr[i]);
          arr2.push(arr[i+1]);
        }

        if (arr.includes("= Lookalike species "))
        {
          var i = arr.indexOf("= Lookalike species ");
          arr2.push(arr[i]);
          arr2.push(arr[i+1]);
        }

        if (arr.includes("= Related species "))
        {
          var i = arr.indexOf("= Related species ");
          arr2.push(arr[i]);
          arr2.push(arr[i+1]);
        }

        if (arr.includes("= Similarity to edible species"))
        {
          var i = arr.indexOf(" = Similarity to edible species  ");
          arr2.push(arr[i]);
          arr2.push(arr[i+1]);
        }

        if (arr.includes(" Habitat and distribution "))
        {
          var i = arr.indexOf(" Habitat and distribution ");
          arr2.push(arr[i]);
          arr2.push(arr[i+1]);
        }


        var p = document.getElementById('txt');
        p.innerText=arr2;
      }


    });
    </script>
