
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
            <img id="imgOutput" height="200" width="200" src="">
            <table class="table table striped">
              <thead>
                <tr><th>Nom du champignon</th><th>Pourcentage de fiabilité</th>
                </thead>
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
          <input id="inputIMG" type="file" name="file" size="1" onchange="onFileSelected(event); "/>
        </div>
      </form>

      <script>

      function dragOverHandler(ev) {
        console.log('File(s) in drop zone');

        // Prevent default behavior (Prevent file from being opened)
        ev.preventDefault();

      }

      function dropHandler(ev)
      {
        console.log('File(s) dropped');

        // Prevent default behavior (Prevent file from being opened)
        ev.preventDefault();

        if (ev.dataTransfer.items)
        {
          // Use DataTransferItemList interface to access the file(s)
          for (var i = 0; i < ev.dataTransfer.items.length; i++) {
            // If dropped items aren't files, reject them
            if (ev.dataTransfer.items[i].kind === 'file') {
              var file = ev.dataTransfer.items[i].getAsFile();
              //console.log('... file[' + i + '].name = ' + file.name);
            }
          }
        }
        else
        {
          // Use DataTransfer interface to access the file(s)
          for (var i = 0; i < ev.dataTransfer.files.length; i++)
          {
            //console.log('... file[' + i + '].name = ' + ev.dataTransfer.files[i].name);
          }
        }


      }

      function onFileSelected(event) {
        var file= event;
        var input = file.target;
        var reader = new FileReader();
        reader.onload = function(){
          var dataURL = reader.result;
          var output = document.getElementById('imgOutput');
          output.setAttribute("src", dataURL);
        };
        reader.readAsDataURL(input.files[0]);

        const output = document.getElementById('imgOutput');
        const tfImg = tf.browser.fromPixels(output);
        const smallImg = tf.image.resizeBilinear(tfImg, [224,224]);
        const resized = tf.cast(smallImg, 'float32');
        const t4d = tf.tensor4d(Array.from(resized.dataSync()),[1,224,224,3])

        async function load() {
          const model = await tf.loadGraphModel('ressources/model/model.json');
          return model;
        };

        function predict(model)
        {
          let top3 = [];
          model.then(model=>
            {
              let result = model.predict(t4d).data();
              result.then(function(res)
              {
                res.forEach(function(item,i)
                {
                  top3.push( { name: classM[i], prob : item });

                });

                top3.sort(function(a,b)
                {
                  return b.prob - a.prob ;
                })

                top3 = top3.slice(0,3);
                let tbody = document.getElementById("tableBody");
                top3.forEach(function(item)
                {
                  let p = Math.round(item.prob*10000)/100;
                  var newRow = tbody.insertRow();
                  var nameCell = newRow.insertCell();
                  nameCell.appendChild(document.createTextNode(item.name));
                  var probCell = newRow.insertCell();
                  probCell.appendChild(document.createTextNode(p));
                });


              });


            });


          $('#mushModal').modal('show');

          };

          const model = load();
          predict(model);

    };



        var myModalEl = document.getElementById('mushModal')
        myModalEl.addEventListener('hidden.bs.modal', function (event) {
          let tbody = document.getElementById("tableBody");
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
