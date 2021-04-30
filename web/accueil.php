<div class="container-fluid">
  <div class="row" style="padding-top:20em">
    <div class="circle back"></div>



    <!-- Modal -->
    <div class="modal fade" id="mushModal" tabindex="-1" aria-labelledby="labelMushModal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="labelMushModal">Résultats</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" id="body">
            <img id="imgOutput" height="200" src="">
            <button id="predictBtn" class="btn btn-primary float-right">
              Predict
            </button>
            <table class="table table-striped" id="table">
              <tbody id="tableBody">
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          </div>
        </div>
      </div>
    </div>

    <form action="#">
      <div id="drop_zone" class="circle white" ondrop="dropHandler(event);" ondragover="dragOverHandler(event);">
        <img draggable="false" class="shroom" src="ressources/image/shroomCrop.png"/>
        <input id="inputIMG" type="file" name="file" size="1"  accept="image/jpg"/>
      </div>
    </form>

    <script>

    function dragOverHandler(ev) {
      console.log('File(s) in drop zone');
      ev.preventDefault();

    }

    function dropHandler(ev)
    {
      console.log('File(s) dropped');

      ev.preventDefault();

      if (ev.dataTransfer.items)
      {
        // Use DataTransferItemList interface to access the file(s)
        for (var i = 0; i < ev.dataTransfer.items.length; i++) {
          // If dropped items aren't files, reject them
          if (ev.dataTransfer.items[i].kind === 'file') {
            var file = ev.dataTransfer.items[i].getAsFile();
            console.log('... file[' + i + '].name = ' + file.name);
          }
        }
      }
      else
      {
        // Use DataTransfer interface to access the file(s)
        for (var i = 0; i < ev.dataTransfer.files.length; i++)
        {
          console.log('... file[' + i + '].name = ' + ev.dataTransfer.files[i].name);
        }
      }


      let reader = new FileReader();
      reader.onload = function () {
        let dataURL = reader.result;
        $("#imgOutput").attr("src", dataURL);
        $("#prediction-list").empty();
      }
      let file2 = $("#inputIMG").prop("files")[0];
      reader.readAsDataURL(file2);

      $('#mushModal').modal('show');

    }


    $("#inputIMG").change(function () {
      let reader = new FileReader();
      reader.onload = function () {
        let dataURL = reader.result;
        $("#imgOutput").attr("src", dataURL);
        $("#prediction-list").empty();
      }
      let file = $("#inputIMG").prop("files")[0];
      reader.readAsDataURL(file);

      $('#mushModal').modal('show');

    });

    let model;
    (async function () {
      model = await tf.loadGraphModel('ressources/model/model.json');
      $(".progress-bar").hide();
    })();


    $("#predictBtn").click(async function () {
      let btn = document.getElementById("predictBtn");
      btn.classList.add("disabled");
      let image = $('#imgOutput').get(0);

      let pre_image = tf.browser.fromPixels(image, 3)
      .resizeNearestNeighbor([224, 224])
      .expandDims()
      .toFloat()
      let predict_result = await model.predict(pre_image).data();

      let order = Array.from(predict_result)
      .map(function (p, i) {
        return {
          prob: p,
          name: classM[i]
        };
      }).sort(function (a, b) {
        return b.prob - a.prob;
      }).slice(0, 3);

      var table = document.getElementById("table");
      let tbody = document.getElementById("tableBody");
      var thead= document.createElement('thead');
      thead.innerHTML="<tr><th>Nom</th><th>Similarité</th></tr>";
      thead.setAttribute("id", "thead");
      table.appendChild(thead);
      order.forEach(function(item)
      {
        let p = Math.round(item.prob*10000)/100;
        if ( p > 5)
        {
          var newRow = tbody.insertRow();
          let name = item.name;
          var nameCell = newRow.insertCell();

          var a = document.createElement('a');
          var txt = document.createTextNode(name);
          a.setAttribute("href", "/?infoMush=on&name="+item.name);
          a.classList.add('text-black');
          a.setAttribute("style", "text-decoration: none");
          a.appendChild(txt);
          nameCell.appendChild(a);
          var probCell = newRow.insertCell();
          probCell.appendChild(document.createTextNode(p));
        }

      });

    });



    var myModalEl = document.getElementById('mushModal')
    myModalEl.addEventListener('hidden.bs.modal', function (event) {
      var thead = document.getElementById("thead");
      if (thead != null)
      {
        thead.remove();
      }
      let tbody = document.getElementById("tableBody");
      tbody.innerHTML="";
      let btn = document.getElementById("predictBtn");
      btn.classList.remove("disabled");
    })

  </script>

  <script>
  var circleBreath = anime({
    targets: '.back',
    scale:0.90,
    loop: true,
    duration:2000,
    direction: 'alternate',
    easing: 'easeInOutSine'
  });
  document.querySelector('.back').onclick = circleBreath.play;
</script>

<div class="tipDrop">
  <p>
    Glissez ou cliquez pour déposer une image de champignon.
  </p>
</div>
</div>
</div>
