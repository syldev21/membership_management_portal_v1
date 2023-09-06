<div class="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 p-r-0 title-margin-right">
                <div class="page-header">
                    <div class="page-title">
                        {{--                        <h1>Hello, <span class="text-uppercase text-success">{{explode(' ', \Illuminate\Support\Facades\Auth::user()->name)[0]}}.</span> <span> Welcome to Admin Membership Dashboard</span></h1>--}}
                    </div>
                </div>
            </div>
            <!-- /# column -->
            <div class="col-lg-4 p-l-0 title-margin-left">
                <div class="page-header">
                    <div class="page-title">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Home</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- /# column -->
        </div>
        <!-- /# row -->
        <section id="main-content">
            <div class="row">
                <div class="col-lg-2">
                    <div class="card">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="fas fa-users color-primary border-primary"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">All the Members</div>
                                <div
                                    class="stat-digit">{{ count(\App\Models\User::where('registration_status', 5)->get()) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="fas fa-user-times color-pink border-pink"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Inactive Members</div>
                                <div
                                    class="stat-digit">{{ count(\App\Models\User::where('registration_status', 5)->where(['active'=> 0, 'existing'=> 1])->get()) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="fas fa-user-slash color-danger border-danger"></i>
                            </div>
                            <div class="stat-content dib">
                                <div class="stat-text">Deleted Members</div>
                                <div
                                    class="stat-digit">{{ count(\App\Models\User::where('registration_status', 5)->where(['existing'=> 0])->get()) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="fas fa-clock color-yellow border-yellow"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Pending Membership</div>
                                <div
                                    class="stat-digit">{{ count(\App\Models\User::where('registration_status', '!=', 5)->where(['active'=> 1])->get()) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="fas fa-thumbs-down color-red border-red"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Declined Members</div>
                                <div
                                    class="stat-digit">{{ count(\App\Models\User::where('registration_status', 0)->where(['active'=> 1])->get()) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="fas fa-user-check color-success border-success"></i>
                            </div>
                            <div class="stat-content dib">
                                <div class="stat-text">Active Members</div>
                                <div
                                    class="stat-digit">{{ count(\App\Models\User::where('registration_status', 5)->where(['active'=> 1])->get()) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
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

                    <select name="member_status_category" id="member_status_category"
                            class="form-select rounded  bg-success bg-warning bg-danger">
                        <option value="active">Active Members</option>
                        <option value="inactive">Inactive Members</option>
                        <option value="deleted">Deleted Members</option>

                    </select>
                </div>
            </div>
    </div>
    <div class="container-fluid px-4 data" id="status-based-dashboard">
        @include('dashboard.admin.active')
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
                if ($('#member_status_category').val() == 'inactive') {
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
                } else if ($('#member_status_category').val() == 'deleted') {
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
                } else {
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


    @include('layouts.includes.admin.footer')
    </section>
</div>
</div>
