<div>
    <div style="float: left">
        <h1 class="mt-4">Dashboard</h1>
        <h3 class="mb-4"><span class="spanned_status bg-success bg-warning bg-danger"></span> Members at Church Level</h3>
    </div>
    <div style="float: right">
        <label  class="fw-bold" for="estate">Member Status Category</label>

        <select name="member_status_category" id="member_status_category" class="form-select rounded  bg-success bg-warning bg-danger">
            <option value="active">Active Members</option>
            <option value="inactive">Inactive Members</option>
            <option value="deleted">Deleted Members</option>

        </select>
    </div>
</div>
<div class="container-fluid px-4">
    <div class="row">
        <div class="col-xl-2 col-md-6">
            <div class="card text-white mb-4">
                <div class="card-header d-flex align-items-center justify-content-between" style="!important;background-color: red">
                    Children
                </div>
                <div class="card-body bg-info">
                    @php
                        $active_children = count(\App\Models\User::where('age_cluster', config('membership.age_clusters.Children.id'))->where('active', 1)->get());
                        $inactive_children = count(\App\Models\User::where('age_cluster', config('membership.age_clusters.Children.id'))->where('active', 0)->where('exists', 1)->get());
                        $deleted_children = count(\App\Models\User::where('age_cluster', config('membership.age_clusters.Children.id'))->where('active', 0)->where('exists', 0)->get());
                    @endphp
                    <div class="active_category">
                        {{$active_children}}
                    </div>
                    <div class="inactive_category">
                        {{$inactive_children}}
                    </div>
                    <div class="deleted_category">
                        {{$deleted_children}}
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between" style="!important;background-color: red">

                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div><div class="col-xl-2 col-md-6">
            <div class="card text-white mb-4">
                <div class="card-header d-flex align-items-center justify-content-between" style="!important;background-color: orangered">
                    Teenies
                </div>
                <div class="card-body bg-info">

                    @php
                        $active_teenies = count(\App\Models\User::where('age_cluster', config('membership.age_clusters.Teenies.id'))->where('active', 1)->get());
                        $inactive_teenies = count(\App\Models\User::where('age_cluster', config('membership.age_clusters.Teenies.id'))->where('active', 0)->where('exists', 1)->get());
                        $deleted_teenies = count(\App\Models\User::where('age_cluster', config('membership.age_clusters.Teenies.id'))->where('exists', 0)->where('exists', 0)->get());
                    @endphp
                    <div class="active_category">
                        {{$active_teenies}}
                    </div>
                    <div class="inactive_category">
                        {{$inactive_teenies}}
                    </div>
                    <div class="deleted_category">
                        {{$deleted_teenies}}
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between" style="!important;background-color: orangered">

                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-md-6">
            <div class="card  text-white mb-4">
                <div class="card-header d-flex align-items-center justify-content-between" style="!important;background-color: orange">
                    Youths
                </div>
                <div class="card-body bg-info">
                    @php
                        $active_youths = count(\App\Models\User::where('age_cluster', config('membership.age_clusters.Youths.id'))->where('active', 1)->get());
                        $inactive_youths = count(\App\Models\User::where('age_cluster', config('membership.age_clusters.Youths.id'))->where('active', 0)->where('exists', 1)->get());
                        $deleted_youths = count(\App\Models\User::where('age_cluster', config('membership.age_clusters.Youths.id'))->where('exists', 0)->where('active', 0)->get());
                    @endphp
                    <div class="active_category">
                        {{$active_youths }}
                    </div>
                    <div class="inactive_category">
                        {{$inactive_youths }}
                    </div>
                    <div class="deleted_category">
                        {{$deleted_youths }}
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between" style="!important;background-color: orange">

                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-md-6">
            <div class="card text-white mb-4">
                <div class="card-header d-flex align-items-center justify-content-between" style="!important;background-color: yellowgreen">
                    Middle Age
                </div>
                <div class="card-body bg-info">
                    @php
                        $active_middle_age = count(\App\Models\User::where('age_cluster', config('membership.age_clusters.Middle_Age.id'))->where('active', 1)->get());
                        $inactive_middle_age = count(\App\Models\User::where('age_cluster', config('membership.age_clusters.Middle_Age.id'))->where('active', 0)->where('exists', 1)->get());
                        $deleted_middle_age = count(\App\Models\User::where('age_cluster', config('membership.age_clusters.Middle_Age.id'))->where('exists', 0)->where('active', 0)->get());
                    @endphp
                    <div class="active_category">
                        {{$active_middle_age }}
                    </div>
                    <div class="inactive_category">
                        {{$inactive_middle_age }}
                    </div>
                    <div class="deleted_category">
                        {{$inactive_middle_age }}
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between" style="!important;background-color: yellowgreen">

                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-md-6">
            <div class="card text-white mb-4">
                <div class="card-header d-flex align-items-center justify-content-between" style="!important;background-color: greenyellow">
                    Adults
                </div>
                <div class="card-body bg-info">
                    @php
                        $active_adults = count(\App\Models\User::where('age_cluster', config('membership.age_clusters.Adults.id'))->where('active', 1)->get());
                        $inactive_adults = count(\App\Models\User::where('age_cluster', config('membership.age_clusters.Adults.id'))->where('active', 0)->where('exists', 1)->get());
                        $deleted_adults = count(\App\Models\User::where('age_cluster', config('membership.age_clusters.Adults.id'))->where('exists', 0)->where('active', 0)->get());
                    @endphp
                    <div class="active_category">
                        {{$active_adults }}
                    </div>
                    <div class="inactive_category">
                        {{$inactive_adults }}
                    </div>
                    <div class="deleted_category">
                        {{$deleted_adults }}
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between" style="!important;background-color: greenyellow">

                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-header  d-flex align-items-center justify-content-between">
                    All Members
                </div>
                <div class="card-body bg-info">
                    @php
                        $active = count(\App\Models\User::where('active', 1)->get());
                        $inactive = count(\App\Models\User::where('active', 0)->where('exists', 1)->get());
                        $deleted = count(\App\Models\User::where('exists', 0)->where('active', 0)->get());
                    @endphp
                    <div class="active_category">
                        {{$active }}
                    </div>
                    <div class="inactive_category">
                        {{$inactive }}
                    </div>
                    <div class="deleted_category">
                        {{$deleted }}
                    </div>
                </div>
                <div class="card-footer">

                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="table table-responsive m-2" id="main">
        <h3 class="mb-4"><span class="spanned_status bg-success bg-warning bg-danger"></span> Members at Cell Group Level</h3>
        <table id="dt_select" class="table table-responsive table-striped table-bordered thead-light table-hover" cellspacing="0" width="100%" style="border-top: 1px solid #dddddd; border-bottom: 1px solid #dddddd ">
            <thead class="bg-info">
                <tr>
                    <th>S/R</th>
                    <th>Cell Group</th>
                    <th>Children</th>
                    <th>Teenies</th>
                    <th>Youths</th>
                    <th>Middle Age</th>
                    <th>Adults</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tboby>
                @foreach(config('membership.cell_group') as $cell_group)
                    <tr class="active_category">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$cell_group['text']}}</td>
                        <td>{{count(\App\Models\User::where(['cell_group_id'=>$cell_group['id'], 'age_cluster'=>config('membership.age_clusters.Children')['id']])->where('active', 1)->get())}}</td>
                        <td>{{count(\App\Models\User::where(['cell_group_id'=>$cell_group['id'], 'age_cluster'=>config('membership.age_clusters.Teenies')['id']])->where('active', 1)->get())}}</td>
                        <td>{{count(\App\Models\User::where(['cell_group_id'=>$cell_group['id'], 'age_cluster'=>config('membership.age_clusters.Youths')['id']])->where('active', 1)->get())}}</td>
                        <td>{{count(\App\Models\User::where(['cell_group_id'=>$cell_group['id'], 'age_cluster'=>config('membership.age_clusters.Middle_Age')['id']])->where('active', 1)->get())}}</td>
                        <td>{{count(\App\Models\User::where(['cell_group_id'=>$cell_group['id'], 'age_cluster'=>config('membership.age_clusters.Adults')['id']])->where('active', 1)->get())}}</td>
                        <td>{{count(\App\Models\User::where(['cell_group_id'=>$cell_group['id']])->where('active', 1)->get())}}</td>
                    </tr>
               <tr class="inactive_category">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$cell_group['text']}}</td>
                        <td>{{count(\App\Models\User::where(['cell_group_id'=>$cell_group['id'], 'age_cluster'=>config('membership.age_clusters.Children')['id']])->where('active', 0)->where('exists', 1)->get())}}</td>
                        <td>{{count(\App\Models\User::where(['cell_group_id'=>$cell_group['id'], 'age_cluster'=>config('membership.age_clusters.Teenies')['id']])->where('active', 0)->where('exists', 1)->get())}}</td>
                        <td>{{count(\App\Models\User::where(['cell_group_id'=>$cell_group['id'], 'age_cluster'=>config('membership.age_clusters.Youths')['id']])->where('active', 0)->where('exists', 1)->get())}}</td>
                        <td>{{count(\App\Models\User::where(['cell_group_id'=>$cell_group['id'], 'age_cluster'=>config('membership.age_clusters.Middle_Age')['id']])->where('active', 0)->where('exists', 1)->get())}}</td>
                        <td>{{count(\App\Models\User::where(['cell_group_id'=>$cell_group['id'], 'age_cluster'=>config('membership.age_clusters.Adults')['id']])->where('active', 0)->where('exists', 1)->get())}}</td>
                        <td>{{count(\App\Models\User::where(['cell_group_id'=>$cell_group['id']])->where('active', 0)->get())}}</td>
                    </tr>
               <tr class="deleted_category">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$cell_group['text']}}</td>
                        <td>{{count(\App\Models\User::where(['cell_group_id'=>$cell_group['id'], 'age_cluster'=>config('membership.age_clusters.Children')['id']])->where('exists', 0)->where('active', 0)->get())}}</td>
                        <td>{{count(\App\Models\User::where(['cell_group_id'=>$cell_group['id'], 'age_cluster'=>config('membership.age_clusters.Teenies')['id']])->where('exists', 0)->where('active', 0)->get())}}</td>
                        <td>{{count(\App\Models\User::where(['cell_group_id'=>$cell_group['id'], 'age_cluster'=>config('membership.age_clusters.Youths')['id']])->where('exists', 0)->where('active', 0)->get())}}</td>
                        <td>{{count(\App\Models\User::where(['cell_group_id'=>$cell_group['id'], 'age_cluster'=>config('membership.age_clusters.Middle_Age')['id']])->where('exists', 0)->where('active', 0)->get())}}</td>
                        <td>{{count(\App\Models\User::where(['cell_group_id'=>$cell_group['id'], 'age_cluster'=>config('membership.age_clusters.Adults')['id']])->where('exists', 0)->where('active', 0)->get())}}</td>
                        <td>{{count(\App\Models\User::where(['cell_group_id'=>$cell_group['id']])->where('exists', 0)->where('active', 0)->get())}}</td>
                    </tr>
                @endforeach
            </tboby>
            <tfoot class="bg-success bg-warning bg-danger">
            <tr class="active_category">
                <th>{{count(config('membership.cell_group'))+1}}</th>
                <th>Total</th>
                <th>{{$active_children}}</th>
                <th>{{$active_teenies}}</th>
                <th>{{$active_youths}}</th>
                <th>{{$active_middle_age}}</th>
                <th>{{$active_adults}}</th>
                <th>{{$active}}</th>
            </tr>
            <tr class="inactive_category">
                <th>{{count(config('membership.cell_group'))+1}}</th>
                <th>Total</th>
                <th>{{$inactive_children}}</th>
                <th>{{$inactive_teenies}}</th>
                <th>{{$inactive_youths}}</th>
                <th>{{$inactive_middle_age}}</th>
                <th>{{$inactive_adults}}</th>
                <th>{{$inactive}}</th>
            </tr>
            <tr class="deleted_category">
                <th>{{count(config('membership.cell_group'))+1}}</th>
                <th>Total</th>
                <th>{{$deleted_children}}</th>
                <th>{{$deleted_teenies}}</th>
                <th>{{$deleted_youths}}</th>
                <th>{{$deleted_middle_age}}</th>
                <th>{{$deleted_adults}}</th>
                <th>{{$deleted}}</th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#member_status_category').val('active')
        $('.inactive_category').hide()
        $('.deleted_category').hide()
        $('.spanned_status').html('Active')
        $('.spanned_status').removeClass('bg-danger')
        $('.spanned_status').removeClass('bg-warning')
        $('tfoot').addClass('bg-success')
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
                $('.spanned_status').removeClass('bg-danger')
                $('.spanned_status').removeClass('bg-success')
                $('.spanned_status').addClass('bg-warning')
                $('tfoot').removeClass('bg-success')
                $('tfoot').addClass('bg-warning')
                $('tfoot').removeClass('bg-danger')
                $('#member_status_category').removeClass('bg-success')
                $('#member_status_category').addClass('bg-warning')
                $('#member_status_category').removeClass('bg-danger')
            }else if ($('#member_status_category').val() == 'deleted'){
                $('.active_category').hide()
                $('.inactive_category').hide()
                $('.deleted_category').show()
                $('.spanned_status').html('Deleted')
                $('.spanned_status').removeClass('bg-success')
                $('.spanned_status').removeClass('bg-warning')
                $('.spanned_status').addClass('bg-danger')
                $('tfoot').removeClass('bg-success')
                $('tfoot').removeClass('bg-warning')
                $('tfoot').addClass('bg-danger')
                $('#member_status_category').removeClass('bg-success')
                $('#member_status_category').removeClass('bg-warning')
                $('#member_status_category').addClass('bg-danger')
            }else {
                $('.active_category').show()
                $('.inactive_category').hide()
                $('.deleted_category').hide()
                $('.spanned_status').html('Active')
                $('.spanned_status').removeClass('bg-danger')
                $('.spanned_status').removeClass('bg-warning')
                $('.spanned_status').addClass('bg-success')
                $('tfoot').addClass('bg-success')
                $('tfoot').removeClass('bg-warning')
                $('tfoot').removeClass('bg-danger')
                $('#member_status_category').addClass('bg-success')
                $('#member_status_category').removeClass('bg-warning')
                $('#member_status_category').removeClass('bg-danger')
            }
        })
    })
</script>
