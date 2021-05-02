<div class="container-fluid">
  <div class="row text-center">
    <div class="col-3"></div>
    <div class="col-6">
      <h2 class="display-2 title1" id="mushName"></h2>
    </div>
    <div class="col-3"></div>
  </div>
  <div class="row">
    <div class="txt text-center">
      <p id="txt"></p>
    </div>
    <div id="imgContainer"></div>
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
    };

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
      else
      {
        var arr = text.split("==");
        var arr2 = new Array();

        var p = document.getElementById('txt');
        p.innerText=arr[0];
      }




    });
    </script>
