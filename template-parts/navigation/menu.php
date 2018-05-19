<header>
  
		<div id="commonwealth-logo">
          <a href="/">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/graphics/logo-new.png">
          </a>
        </div>
  
	
	<a id="main-menu" class="dropdown-button" href="#!" onclick="dropIt()"><i class="fa fa-bars"></i></a>
    <div id="header-nav-container">
      <ul class="header-nav-menu">
          <li id="one"><a id="past" href="/exhibits/">EXHIBITIONS </a></li>
          <li id="two"><a id="current" href="/upcoming/">UPCOMING </a></li>
          <li id="three"><a id="upcoming" href="/news/">NEWS </a></li>
          <li id="four"><a id="news" href="/about/">ABOUT </a></li>
          <li id="last-item"><a id="artists" href="/artist/">US</a></li>
      </ul>
    </div>
</header>
<ul id="main-dropdown" class="dropdown-content">
    <li><a id="p" href="/exhibits/">EXHIBITIONS </a></li>
    <li><a id="c" href="/upcoming">UPCOMING </a></li>
    <li><a id="u" href="/news">NEWS </a></li>
    <li><a id="n" href="/about">ABOUT </a></li>
    <li id="last-item"><a id="artists" href="/artist/">ARTISTS</a></li>
</ul>

<script>
  var counter = 0;
  function dropIt() {
    console.log(counter);
    var drop = document.getElementById("main-dropdown");
    if(counter%2==0) {
      drop.style.opacity = 1;
      drop.style.display = "block";
      drop.style.right = "10px";
    } else {
      drop.style.opacity = 0;
      drop.style.display = "none";
    }
    counter++;
  }
</script>