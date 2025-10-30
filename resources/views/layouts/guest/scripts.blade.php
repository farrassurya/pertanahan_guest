<!-- Scripts Partial -->
<!-- JavaScript Libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets-guest/lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('assets-guest/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('assets-guest/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('assets-guest/lib/counterup/counterup.min.js') }}"></script>
<script src="{{ asset('assets-guest/lib/owlcarousel/owl.carousel.min.js') }}"></script>

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

{{-- info login sukses --}}
@if(session('success'))
    <script>
        // Show login success modal when session('success') exists
        document.addEventListener('DOMContentLoaded', function () {
            var modalEl = document.getElementById('loginSuccessModal');
            if(modalEl){
                var bsModal = new bootstrap.Modal(modalEl);
                bsModal.show();
            }
        });
    </script>
@endif

<script>
    // Smooth-scroll and offset handling for sticky navbar
    document.addEventListener('DOMContentLoaded', function () {
        function getNavHeight() {
            var nav = document.querySelector('.navbar');
            return nav ? nav.offsetHeight : 80;
        }

        function scrollToElementWithOffset(el) {
            var rect = el.getBoundingClientRect();
            var offset = window.pageYOffset + rect.top - getNavHeight() - 8; // small gap
            window.scrollTo({ top: offset, behavior: 'smooth' });
        }

        // If page loaded with a hash, scroll to it with offset
        if (location.hash) {
            var id = location.hash.slice(1);
            var el = document.getElementById(id);
            if (el) {
                // small timeout to wait for rendering/layout
                setTimeout(function () { scrollToElementWithOffset(el); }, 50);
            }
        }

        // Intercept internal anchor clicks and smooth-scroll with offset
        document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
            anchor.addEventListener('click', function (e) {
                var href = this.getAttribute('href');
                if (!href || href === '#') return;
                var id = href.slice(1);
                var el = document.getElementById(id);
                if (el) {
                    e.preventDefault();
                    scrollToElementWithOffset(el);
                    // update url without jumping
                    history.pushState(null, '', '#' + id);
                }
            });
        });
    });
</script>
