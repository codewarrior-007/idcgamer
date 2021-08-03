// <!-- Scrollbar bonita del menú lateral -->
  // const ps = new PerfectScrollbar('#sidenav-bar');
  // const not = new PerfectScrollbar('#notifications');

// <!-- Iconos animados lottie hamburguesa menú lateral-->
    var btn = document.getElementById("categoriesBtn");
    lottieContainer = document.getElementById('lottiehamburguer');
  
    var params = {
        container: lottieContainer,
        renderer: 'svg',
        loop: false,
        autoplay: false,
        prerender: true,
        autoloadSegments: false,
        path: './img/iconos-lottie/hamburger.json'
    };
  
    // var anim = bodymovin.loadAnimation(params);
    
  
    // function scriptPlay(){
    //     bodymovin.setSpeed(2);
    //     bodymovin.setDirection(1);
    //     anim.play();
    // }
  
    // function scriptPause(){
    //     bodymovin.setSpeed(2);
    //     bodymovin.setDirection(-1);
    //     anim.play();
    // };

  $( document ).ready(function() {
    $("body").on( "click", ".openMenuBtn", function() {
      $(this).removeClass("openMenuBtn");
      $(this).addClass("closeMenuBtn");
      $("#sidenav-bar").removeClass("sidenav-closed");
      $("#sidenav-bar").addClass("sidenav-opened");
      // scriptPlay();
    });
    $("body").on( "click", ".closeMenuBtn", function() {
      $(this).removeClass("closeMenuBtn");
      $(this).addClass("openMenuBtn");
      $("#sidenav-bar").removeClass("sidenav-opened");
      $("#sidenav-bar").addClass("sidenav-closed");
      // scriptPause();
    });
    $("body").on("click", "main", function() {
        $("#categoriesBtn").removeClass("closeMenuBtn");
        $("#categoriesBtn").addClass("openMenuBtn");
        $("#sidenav-bar").removeClass("sidenav-opened");
        $("#sidenav-bar").addClass("sidenav-closed");
        // scriptPause();
    });
  });

// <!-- Notifications dismiss-->
  $( document ).ready(function() {
    $("body").on( "click", ".delete-notification", function() {
      $(this).closest(".dropdown-item").addClass("d-none");
    });
  });
  
  $(document).on('click', '.notifications.dropdown-menu', function (e) {
    e.stopPropagation();
  });