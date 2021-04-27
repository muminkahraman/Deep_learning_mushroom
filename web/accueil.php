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
            <a href="/?infoMush=on&name=Amanita_muscaria">Amanite Phalloïde</a>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          </div>
        </div>
      </div>
    </div>

    <form method="get" action="">
      <div id="drop_zone" class="circle white" ondrop="dropHandler(event);" ondragover="dragOverHandler(event);">
        <img draggable="false" class="shroom" src="ressources/image/shroomCrop.png"/>
        <input id="input" type="file" name="file" size="1"/>
      </div>
    </form>


    <script>

    $("#input").change(function()
    {
      $('#mushModal').modal('show')
    });


    function dragOverHandler(ev) {
      console.log('File(s) in drop zone');

      // Prevent default behavior (Prevent file from being opened)
      ev.preventDefault();

    }

    function dropHandler(ev) {
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
      $('#mushModal').modal('show')

    }

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
