</div>
<footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <center>
                <div class="">
                    
                    &copy; 2016 Ana Banda && Sindy Suarez.
                    <br>
                    <a  href="/colegio/otros/" target="_blank"  title=""><b> Comunidad educativa</b></a>
                </div>
               </center>
            </div>
        </div>
    </footer><!--/#footer-->

    <script src="/assets/js/jquery.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/jquery.prettyPhoto.js"></script>
    <script src="/assets/js/jquery.isotope.min.js"></script>
    <script src="/assets/js/main.js"></script>
    <script src="/assets/js/wow.min.js"></script>
     <script>
        $(window).resize(function() {
            CambiarTamano();
        });
        CambiarTamano();
        function CambiarTamano(){
            if(document.body.scrollHeight<screen.height){
                document.getElementById('contenedor').style.height=(screen.height-header.scrollHeight-(footer.scrollHeight*2))+"px";
            }else{
                document.getElementById('contenedor').style.height="auto";
            }
        }
    </script>
</body>
</html>