    <!-- latest jquery-->
    <script src="{{ asset('backend/assets/js/jquery-3.3.1.min.js') }}"></script>

    <!-- Bootstrap js-->
    <script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- feather icon js-->
    <script src="{{ asset('backend/assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/icons/feather-icon/feather-icon.js') }}"></script>

    <!-- Sidebar jquery-->
    <script src="{{ asset('backend/assets/js/sidebar-menu.js') }}"></script>

    {{-- <!-- Dropzone js-->
<script src="{{ asset('backend/assets/js/dropzone/dropzone.js') }}"></script>
<script src="{{ asset('backend/assets/js/dropzone/dropzone-script.js') }}"></script>

<!-- Table Row Delete js -->
<script src="{{ asset('backend/assets/js/table-row-delete.js')}}"></script> --}}

    <!--chartist js-->
    <script src="{{ asset('backend/assets/js/chart/chartist/chartist.js') }}"></script>

    <!--chartjs js-->
    <script src="{{ asset('backend/assets/js/chart/chartjs/chart.min.js') }}"></script>

    <!--ck editor-->
    <script src="{{ asset('backend/assets/js/editor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('backend/assets/js/editor/ckeditor/ckeditor.custom.js') }}"></script>

    <!-- lazyload js-->
    <script src="{{ asset('backend/assets/js/lazysizes.min.js') }}"></script>

    <!--copycode js-->
    <script src="{{ asset('backend/assets/js/prism/prism.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/custom-card/custom-card.js') }}"></script>

    <!--counter js-->
    <script src="{{ asset('backend/assets/js/counter/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/counter/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/counter/counter-custom.js') }}"></script>

    <!--peity chart js-->
    <script src="{{ asset('backend/assets/js/chart/peity-chart/peity.jquery.js') }}"></script>

    <!-- Apex Chart Js -->
    <script src="{{ asset('backend/assets/js/apexcharts.js') }}"></script>

    <!--sparkline chart js-->
    <script src="{{ asset('backend/assets/js/chart/sparkline/sparkline.js') }}"></script>

    <!--Customizer admin-->
    <script src="{{ asset('backend/assets/js/admin-customizer.js') }}"></script>

    <!--dashboard custom js-->
    <script src="{{ asset('backend/assets/js/dashboard/default.js') }}"></script>

    <!--right sidebar js-->
    <script src="{{ asset('backend/assets/js/chat-menu.js') }}"></script>

    <!--height equal js-->
    <script src="{{ asset('backend/assets/js/height-equal.js') }}"></script>

    <!-- lazyload js-->
    <script src="{{ asset('backend/assets/js/lazysizes.min.js') }}"></script>

    <!--script admin-->
    <script src="{{ asset('backend/assets/js/admin-script.js') }}"></script>

    <script src="{{ asset('backend/assets/js/treeview.js') }}"></script>


    <script>
        // $(document).ready(function() {
        //     $('select[name="category"]').on('change', function() {
        //         var CategoryId = $(this).val();
        //         if (CategoryId) {
        //             $.ajax({
        //                 url: "{{ URL::to('admin/product/fetchBrands') }}/" + CategoryId,
        //                 type: "GET",
        //                 dataType: "json",
        //                 success: function(data) {
        //                     $('select[name="brand"]').empty();
        //                     $.each(data, function(key, value) {
        //                         $('select[name="brand"]').append('<option value="' +
        //                             value.id + '">' + value.name + '</option>');
        //                     });
        //                 },
        //             });
        //         } else {
        //             console.log('AJAX load did not work');
        //         }
        //     });
        // });
    </script>
    </body>

    </html>
