

    <footer>
        <div class="container">
            <p class="copy">Copyright © 2020 ESIS. Todos los derechos reservados.</p>
            <ul class="social">
                <li><a href="https://www.facebook.com/ciistacna"><svg class="social-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#9ba0a3"><path d="M13.397,20.997v-8.196h2.765l0.411-3.209h-3.176V7.548c0-0.926,0.258-1.56,1.587-1.56h1.684V3.127 C15.849,3.039,15.025,2.997,14.201,3c-2.444,0-4.122,1.492-4.122,4.231v2.355H7.332v3.209h2.753v8.202H13.397z"></path></svg></a></li>
                <li><a href="https://www.youtube.com/user/ciistacna"><svg class="social-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#9ba0a3"><path d="M21.593,7.203c-0.23-0.858-0.905-1.535-1.762-1.766C18.265,5.007,12,5,12,5S5.736,4.993,4.169,5.404 c-0.84,0.229-1.534,0.921-1.766,1.778c-0.413,1.566-0.417,4.814-0.417,4.814s-0.004,3.264,0.406,4.814 c0.23,0.857,0.905,1.534,1.763,1.765c1.582,0.43,7.83,0.437,7.83,0.437s6.265,0.007,7.831-0.403c0.856-0.23,1.534-0.906,1.767-1.763 C21.997,15.281,22,12.034,22,12.034S22.02,8.769,21.593,7.203z M9.996,15.005l0.005-6l5.207,3.005L9.996,15.005z"></path></svg></a></li>
                <li><a href="https://www.flickr.com/people/160684070@N02/"><svg class="social-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#9ba0a3"><path d="M21.907 32.25c0 2.526-2.048 4.573-4.574 4.573-2.524 0-4.573-2.047-4.573-4.573 0-2.525 2.048-4.573 4.573-4.573C19.859 27.677 21.907 29.725 21.907 32.25zM32.74 32.25c0 2.526-2.048 4.573-4.574 4.573-2.525 0-4.573-2.047-4.573-4.573 0-2.525 2.048-4.573 4.573-4.573C30.692 27.677 32.74 29.725 32.74 32.25z" transform="translate(-10.75 -20.25)"></path></svg></a></li>
            </ul>
        </div>
    </footer>
    <script src="<?php echo JS.'countdown.js' ?>"></script>
    <div class="modal-video">
        <!-- <video src="assets/videos/video_ciis.mp4" controls="true"></video> -->
        <video id="player" playsinline controls>
            <source src="<?php echo UPLOADS.'video_ciis.mp4' ?>" type="video/mp4"/>
        </video>
        <svg xmlns="http://www.w3.org/2000/svg" class="close" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368"/></svg>
    </div>
    <script src="https://cdn.plyr.io/3.6.2/plyr.polyfilled.js"></script>
    <script>
        const player = new Plyr('#player');
    </script>

    <script src="<?php echo JS.'main.js' ?>"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="<?php echo JS.'preinscripcion.js' ?>"></script>
    
</body>
</html>