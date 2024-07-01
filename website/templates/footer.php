
</main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
        <script>
    $('#avatar').on('change', function(){
    //get the file name
    var filName = $(this).val();

    //replace "Choose a file" label
    $(this).next('.custom-file-label').html(fileName);
    });
        </script>
        
        <script>

        $(document).ready(function(){
        $('table').DataTable({
            "pageLength":6,
            lengthMenu:[
               [10,25,50],
            [10,25,50] 
            ],
            "language":{
                "url":"https://cdn.datatables.net/plug-ins/2.0.1/i18n/es-MX.json"
            }
        });
        });

        </script>
    </body>
</html>
