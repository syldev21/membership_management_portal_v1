<div class="side-profile-here">
    <input type="hidden" value="1" id="testa">
    <input type="hidden" id="count" data-stage_count='{{ json_encode($stagecounts ?? '') }}' data-status_count='{{ json_encode($status_counts ?? '') }}'>
    <div style="float: left">
        <h1 class="mt-4">Dashboard - <span class="spanned_status"></span></h1>
    </div>
    <div style="float: right">
        <form id="pdf-form" action="{{ route('generate-pdf') }}" method="POST">
            @csrf
        </form>
        <div class="" style="float: right">
            <button id="export-pdf" class="btn btn-primary">Export to PDF</button>
        </div>
        <div class="" style="float: right">
{{--            <label  class="fw-bold" for="estate">Member Status Category</label>--}}

            <select name="member_status_category" id="member_status_category" class="form-select rounded  bg-success bg-warning bg-danger">
                <option value="active">Active Members</option>
                <option value="inactive">Inactive Members</option>
                <option value="deleted">Deleted Members</option>

            </select>
        </div>
    </div>
</div>
<div class="container-fluid px-4 data" id="status-based-dashboard">

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>

<script>
    $(document).ready(function () {

        function loadDashboardData() {
            var stage_count = $('#count').data('stage_count');
            var status_count = $('#count').data('status_count');

            $.ajax({
                url: '{{ route('admin.insert-active-dashboard') }}',
                method: 'get',
                data: {
                    stage_count: stage_count,
                    status_count: status_count,
                    view: 'dashboard.active'
                },
                success: function (response) {
                    $('#status-based-dashboard').html(response);
                }
            });
        }
        // Load dashboard data on page load
        loadDashboardData();

        // Rest of your existing code

        $('#export-pdf').on('click', function (e) {
            e.preventDefault();

            // Load the dashboard data again before generating the PDF
            loadDashboardData();

            // Submit the hidden form to trigger the PDF generation and download
            $('#pdf-form').submit();
        });

        $('#member_status_category').val('active')
        $('.inactive_category').hide()
        $('.deleted_category').hide()
        $('.spanned_status').html('Active')
        // $('.spanned_status').removeClass('bg-danger')
        // $('.spanned_status').removeClass('bg-warning')
        // $('tfoot').addClass('bg-success')
        $('tfoot').removeClass('bg-warning')
        $('tfoot').removeClass('bg-danger')
        $('#member_status_category').addClass('bg-success')
        $('#member_status_category').removeClass('bg-warning')
        $('#member_status_category').removeClass('bg-danger')
        $('#member_status_category').change(function (e) {
            e.preventDefault()
            if ($('#member_status_category').val() == 'inactive'){
                $('.active_category').hide()
                $('.inactive_category').show()
                $('.deleted_category').hide()
                $('.spanned_status').html('Inactive')
                $('tfoot').removeClass('bg-success')
                $('tfoot').addClass('bg-warning')
                $('tfoot').removeClass('bg-danger')
                $('#member_status_category').removeClass('bg-success')
                $('#member_status_category').addClass('bg-warning')
                $('#member_status_category').removeClass('bg-danger')
                var view = 'dashboard.inactive'
            }else if ($('#member_status_category').val() == 'deleted'){
                $('.active_category').hide()
                $('.inactive_category').hide()
                $('.deleted_category').show()
                $('.spanned_status').html('Deleted')
                $('tfoot').removeClass('bg-success')
                $('tfoot').removeClass('bg-warning')
                $('tfoot').addClass('bg-danger')
                $('#member_status_category').removeClass('bg-success')
                $('#member_status_category').removeClass('bg-warning')
                $('#member_status_category').addClass('bg-danger')
                var view = 'dashboard.deleted'
            }else {
                $('.active_category').show()
                $('.inactive_category').hide()
                $('.deleted_category').hide()
                $('.spanned_status').html('Active')
                $('tfoot').addClass('bg-success')
                $('tfoot').removeClass('bg-warning')
                $('tfoot').removeClass('bg-danger')
                $('#member_status_category').addClass('bg-success')
                $('#member_status_category').removeClass('bg-warning')
                $('#member_status_category').removeClass('bg-danger')
                var view = 'dashboard.active'
            }
            var stage_count = $('#count').data('stage_count')
            var status_count = $('#count').data('status_count')
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '{{route('admin.staus-based-dashboard')}}',
                method: 'get',
                data: {
                    stage_count: stage_count,
                    status_count: status_count,
                    view: view
                },
                success: function (response) {
                    $('#status-based-dashboard').html(response)
                }
            });
        })
    })
</script>
