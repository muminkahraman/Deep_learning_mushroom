<div class="container-fluid">
  <div class="row" style="padding-top:20em">
    <div class="circle back"></div>
    <div class="circle white"></div>
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
