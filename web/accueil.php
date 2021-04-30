
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
          <div class="modal-body">
            <img id="imgOutput" height="224" width="224"></div>
            <a href="/?infoMush=on&name=Amanita_muscaria">Amanite Phalloïde</a>
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
        <input id="inputIMG" type="file" name="file" size="1" onchange="onFileSelected(event);"/>
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
      $('#mushModal').modal('show');

    }

    </script>


    <script>
    function onFileSelected(event) {
      var file= event;
      var input = file.target;
      var reader = new FileReader();
      reader.onload = function(){
        var dataURL = reader.result;
        var output = document.getElementById('imgOutput');
        output.src = dataURL;
      };
      $('#mushModal').modal('show');
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
        model.then(model=>
          {
            let result = model.predict(t4d).data();
            result.then(function(res) {
              res.forEach(element =>  element*100);
              res.sort(function(a,b){return b-a});
              console.log(res);
            })

            let order = Array.from(result)
            .map(function (p, i) {
              return {
                probability: p,
                className: Result[i]
              };
            }).sort(function (a, b) {
              return b.probability - a.probability;
            }).slice(0, 2);

            console.log(order);
          });




        }
        const model = load();

        let a,b=predict(model);

      };

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
