<!-- Scripts Partial -->
<!-- JavaScript Libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/counterup/counterup.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<script>
    // Sidebar toggle script
    (function(){
        var sidebar = document.getElementById('user-sidebar');
        var openBtn = document.getElementById('sidebar-open');
        var closeBtn = document.getElementById('sidebar-close');

        if(openBtn && sidebar){
            openBtn.addEventListener('click', function(e){
                e.preventDefault();
                sidebar.classList.remove('collapsed');
                // For small screens, also add a body class to prevent scroll
                document.body.classList.add('sidebar-open');
            });
        }

        if(closeBtn && sidebar){
            closeBtn.addEventListener('click', function(e){
                e.preventDefault();
                sidebar.classList.add('collapsed');
                document.body.classList.remove('sidebar-open');
            });
        }

        // Clicking outside the sidebar on small screens closes it
        document.addEventListener('click', function(e){
            if(!sidebar) return;
            if(window.innerWidth >= 992) return; // only on small screens
            if(!sidebar.classList.contains('collapsed')){
                var target = e.target;
                if(!sidebar.contains(target) && target !== openBtn){
                    sidebar.classList.add('collapsed');
                    document.body.classList.remove('sidebar-open');
                }
            }
        });
    })();
</script>

<!-- Template Javascript -->
<script src="{{ asset('assets-guest/js/main.js') }}"></script>
