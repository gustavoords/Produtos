<?php
include_once("Menu.php");
include_once("header.php");
        
    
?>

<script src="js/vendor/jquery.js"></script>
<script src="js/foundation/foundation.js"></script>
<script src="js/foundation/foundation.orbit.js"></script>


<div class="orbit-container">
  <ul data-orbit data-options="animation_speed:1500" class="example-orbit orbit-slides-container">
    <li>
        <img src="/img/pink.jpg.jpg" alt="slide 1" />
      <div class="orbit-caption">
        Caption One.
      </div>
    </li>
    <li class="active">
        <img src="/img/batle.jpg" alt="slide 1" />
      <div class="orbit-caption">
        Caption Two.
      </div>
    </li>
    <li>
        <img src="/img/leao.jpg" alt="slide 1" />
      <div class="orbit-caption">
        Caption Three.
      </div>
    </li>
  </ul>

  <!-- Navigation Arrows -->
  <a href="#" class="orbit-prev">Prev <span></span></a>
  <a href="#" class="orbit-next">Next <span></span></a>

  <!-- Slide Numbers -->
  <div class="orbit-slide-number">
    <span>1</span> of <span>3</span>
  </div>

  <!-- Timer and Play/Pause Button -->
  <div class="orbit-timer">
    <span></span>
    <div class="orbit-progress"></div>
  </div>
</div>

<!-- Bullets -->
<ol class="orbit-bullets">
  <li data-orbit-slide-number="1"></li>
  <li data-orbit-slide-number="2" class="active"></li>
  <li data-orbit-slide-number="3"></li>
</ol>