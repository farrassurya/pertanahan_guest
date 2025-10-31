<!-- Footer Partial -->
<div class="container-fluid bg-dark footer py-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h5 class="text-uppercase text-light mb-4">Our Office</h5>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary me-3"></i>Jl. Umban Sari, No 1,
                    Pekanbaru</p>
                <p class="mb-2"><i class="fa fa-phone-alt text-primary me-3"></i>+62 812 7691328</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary me-3"></i>farrassurya12@gmail.com</p>
                <div class="d-flex pt-3">
                    <a class="btn btn-square btn-light me-2" href="https://wa.me/+628117691328"><i class="fab fa-whatsapp"></i></a>
                    <a class="btn btn-square btn-light me-2" href="https://www.instagram.com/farrassuryaa?igsh=cnJjY3U2MWdkd2pt"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-square btn-light me-2" href="https://youtu.be/CghoDWzy3xo?si=to_RY35EJL57UK8O"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-uppercase text-light mb-4">Tautan</h5>
                <a class="btn btn-link" href="">Tentang Kami</a>
                <a class="btn btn-link" href="">Kontak</a>
                <a class="btn btn-link" href="">Pelayanan</a>
                <a class="btn btn-link" href="">Syarat & Ketentuan</a>
                <a class="btn btn-link" href="">Dukungan</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-uppercase text-light mb-4">Jam Kerja</h5>
                <p class="text-uppercase mb-0">Senin - Sabtu</p>
                <p>06:00 WIB - 17:00 WIB</p>
                <p class="text-uppercase mb-0">Minggu</p>
                <p>Tutup</p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-uppercase text-light mb-4">Gallery</h5>
                <div class="row g-1">
                    <div class="col-4">
                        <img class="img-fluid" src="{{ asset('assets-guest/img/service-1.jpg') }}" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid" src="{{ asset('assets-guest/img/service-2.jpg') }}" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid" src="{{ asset('assets-guest/img/service-3.jpg') }}" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid" src="{{ asset('assets-guest/img/service-4.jpg') }}" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid" src="{{ asset('assets-guest/img/service-5.jpg') }}" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid" src="{{ asset('assets-guest/img/service-6.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Copyright Partial -->
<div class="container-fluid text-body copyright py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                &copy; <a class="fw-semi-bold" href="#">Pertanahan - Guest</a>, All Right Reserved.
            </div>
            <div class="col-md-6 text-center text-md-end">
                Designed By <a class="fw-semi-bold" href="https://htmlcodex.com">HTML Codex</a>
            </div>
        </div>
    </div>
</div>

<!-- Back to Top -->
<!-- Expandable Floating Action Button (FAB) for Contact -->
<style>
    .fab-container { position: fixed; right: 20px; bottom: 20px; z-index: 2100; }
    .fab { width: 56px; height: 56px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; box-shadow: 0 10px 30px rgba(0,0,0,0.18); color: #fff; border: none; cursor: pointer; }
    .fab-toggle { background: #b87d1a; }
    .fab-toggle i { transition: transform .2s ease; }
    .fab-actions { position: absolute; right: 0; bottom: 70px; display: flex; flex-direction: column; align-items: flex-end; gap: 12px; pointer-events: none; }
    .fab-action { width: 48px; height: 48px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; color: #fff; text-decoration: none; box-shadow: 0 8px 20px rgba(0,0,0,0.12); transform: translateY(8px) scale(.9); opacity: 0; transition: transform .22s cubic-bezier(.2,.9,.3,1), opacity .18s ease; }
    .fab-action.whatsapp { background: #25D366; }
    .fab-action.instagram { background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%); }
    .fab-container.open .fab-action,
    .fab-container:hover .fab-action { transform: translateY(0) scale(1); opacity: 1; pointer-events: auto; }
    .fab-container.open .fab-toggle i,
    .fab-container:hover .fab-toggle i { transform: rotate(45deg); }
    @media(max-width:576px){ .fab { width:50px;height:50px;} .fab-action{ width:44px;height:44px;} .fab-actions{ bottom:64px; } }
</style>

<div class="fab-container" id="fabContainer" aria-haspopup="true" aria-expanded="false">
    <div class="fab-actions" id="fabActions">
        <a href="https://wa.me/+628117691328" class="fab-action whatsapp" target="_blank" rel="noopener" aria-label="WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>
        <a href="https://www.instagram.com/farrassuryaa?igsh=cnJjY3U2MWdkd2pt" class="fab-action instagram" target="_blank" rel="noopener" aria-label="Instagram">
            <i class="fab fa-instagram"></i>
        </a>
    </div>

    <button class="fab fab-toggle" id="fabToggle" aria-label="Buka kontak" aria-expanded="false">
        <i class="fas fa-plus" aria-hidden="true"></i>
    </button>
</div>

<script>
    (function(){
        var container = document.getElementById('fabContainer');
        var toggle = document.getElementById('fabToggle');
        var closeTimeout = null;
        var CLOSE_DELAY = 600; // ms

        function openFab(){
            cancelClose();
            container.classList.add('open');
            container.setAttribute('aria-expanded','true');
            toggle.setAttribute('aria-expanded','true');
        }
        function closeFab(){
            cancelClose();
            container.classList.remove('open');
            container.setAttribute('aria-expanded','false');
            toggle.setAttribute('aria-expanded','false');
        }
        function scheduleClose(){
            cancelClose();
            closeTimeout = setTimeout(function(){ closeFab(); closeTimeout = null; }, CLOSE_DELAY);
        }
        function cancelClose(){ if(closeTimeout){ clearTimeout(closeTimeout); closeTimeout = null; } }

        // Use pointer events for robust hover detection (works better with touch/pointer devices)
        container.addEventListener('pointerenter', function(){ cancelClose(); openFab(); });
        container.addEventListener('pointerleave', function(){ scheduleClose(); });

        // Accessibility: open on focus within, close when focus moves outside (use delayed close)
        container.addEventListener('focusin', function(){ cancelClose(); openFab(); });
        container.addEventListener('focusout', function(e){ if(!container.contains(e.relatedTarget)) scheduleClose(); });

        // Keep click toggle as fallback for touch devices: toggle immediately and cancel any pending close
        toggle.addEventListener('click', function(e){
            e.stopPropagation();
            cancelClose();
            if(container.classList.contains('open')) closeFab(); else openFab();
        });

        // Close when clicking outside immediately
        document.addEventListener('click', function(e){ if(!container.contains(e.target)) closeFab(); });

        // Close on Escape
        document.addEventListener('keydown', function(e){ if(e.key === 'Escape') closeFab(); });
    })();
</script>
