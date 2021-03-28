<div class="container-fluid">
  <div class="row" style="padding-top:20em">
    <div class="circle back"></div>


    <form method="get" action="">
      <div id="drop_zone" class="circle white" ondrop="dropHandler(event);" ondragover="dragOverHandler(event);">
        <img draggable="false" class="shroom" src="ressources/image/shroomCrop.png"/>
        <input type="file" name="file" size="1" />
      </div>
    </form>



    <script>
    function dragOverHandler(ev) {
      console.log('File(s) in drop zone');

      // Prevent default behavior (Prevent file from being opened)
      ev.preventDefault();
    }


    function dropHandler(ev) {
      console.log('File(s) dropped');

      // Prevent default behavior (Prevent file from being opened)
      ev.preventDefault();

      if (ev.dataTransfer.items) {
        // Use DataTransferItemList interface to access the file(s)
        for (var i = 0; i < ev.dataTransfer.items.length; i++) {
          // If dropped items aren't files, reject them
          if (ev.dataTransfer.items[i].kind === 'file') {
            var file = ev.dataTransfer.items[i].getAsFile();
            console.log('... file[' + i + '].name = ' + file.name);
          }
        }
      } else {
        // Use DataTransfer interface to access the file(s)
        for (var i = 0; i < ev.dataTransfer.files.length; i++) {
          console.log('... file[' + i + '].name = ' + ev.dataTransfer.files[i].name);
        }
      }
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
