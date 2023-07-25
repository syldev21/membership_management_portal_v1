    <div class="row">
        <h3 class="mb-2"> Members at Church Level</h3>
        <div class="col-xl-1 col-md-6">
            <div class="card text-white">
                <div class="card-header d-flex align-items-center justify-content-between" style="!important;background-color: yellowgreen">
                    Age {{config('membership.age_clusters.stage1.start')}}-{{config('membership.age_clusters.stage1.end')}}
                </div>
                <div class="card-body bg-info">
                    <div class="active_category">
                        {{$stagecounts['stage1_counts']['inactive']}}
                    </div>
                </div>
            </div>
        </div><div class="col-xl-1 col-md-6">
            <div class="card text-white mb-2">
                <div class="card-header d-flex align-items-center justify-content-between" style="!important;background-color: yellowgreen">
                    Age {{config('membership.age_clusters.stage2.start')}}-{{config('membership.age_clusters.stage2.end')}}
                </div>
                <div class="card-body bg-info">

                    @php

                        $inactive_stage2 = $stagecounts['stage2_counts']['inactive'];

                    @endphp
                    <div class="active_category">
                        {{$inactive_stage2}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-1 col-md-6">
            <div class="card  text-white mb-2">
                <div class="card-header d-flex align-items-center justify-content-between" style="!important;background-color: yellowgreen">
                    Age {{config('membership.age_clusters.stage3.start')}}-{{config('membership.age_clusters.stage3.end')}}
                </div>
                <div class="card-body bg-info">
                    @php
                        $inactive_stage3 = $stagecounts['stage3_counts']['inactive'];
                    @endphp
                    <div class="active_category">
                        {{$inactive_stage3 }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-1 col-md-6">
            <div class="card text-white mb-2">
                <div class="card-header d-flex align-items-center justify-content-between" style="!important;background-color: yellowgreen">
                    Age {{config('membership.age_clusters.stage4.start')}}-{{config('membership.age_clusters.stage4.end')}}
                </div>
                <div class="card-body bg-info">
                    @php
                        $inactive_stage4 = $stagecounts['stage4_counts']['inactive'];
                    @endphp
                    <div class="active_category">
                        {{$inactive_stage4 }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-1 col-md-6">
            <div class="card text-white mb-2">
                <div class="card-header d-flex align-items-center justify-content-between" style="!important;background-color: yellowgreen">
                    Age {{config('membership.age_clusters.stage5.start')}}-{{config('membership.age_clusters.stage5.end')}}
                </div>
                <div class="card-body bg-info">
                    @php
                        $inactive_stage5 = $stagecounts['stage5_counts']['inactive'];
                    @endphp
                    <div class="active_category">
                        {{$inactive_stage5 }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-1 col-md-6">
            <div class="card text-white mb-2">
                <div class="card-header d-flex align-items-center justify-content-between" style="!important;background-color: yellowgreen">
                    Age {{config('membership.age_clusters.stage6.start')}}-{{config('membership.age_clusters.stage6.end')}}
                </div>
                <div class="card-body bg-info">
                    @php
                        $inactive_stage6 = $stagecounts['stage6_counts']['inactive'];
                    @endphp
                    <div class="active_category">
                        {{$inactive_stage6 }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-1 col-md-6">
            <div class="card text-white mb-2">
                <div class="card-header d-flex align-items-center justify-content-between" style="!important;background-color: yellowgreen">
                    Age {{config('membership.age_clusters.stage7.start')}}-{{config('membership.age_clusters.stage7.end')}}
                </div>
                <div class="card-body bg-info">

                    @php
                        $inactive_stage7 = $stagecounts['stage7_counts']['inactive'];
                    @endphp
                    <div class="active_category">
                        {{$inactive_stage7}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-1 col-md-6">
            <div class="card  text-white mb-2">
                <div class="card-header d-flex align-items-center justify-content-between" style="!important;background-color: yellowgreen">
                    Age {{config('membership.age_clusters.stage8.start')}}-{{config('membership.age_clusters.stage8.end')}}
                </div>
                <div class="card-body bg-info">
                    @php
                        $inactive_stage8 = $stagecounts['stage8_counts']['inactive'];
                    @endphp
                    <div class="active_category">
                        {{$inactive_stage8 }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-1 col-md-6">
            <div class="card  text-white mb-2">
                <div class="card-header d-flex align-items-center justify-content-between" style="!important;background-color: yellowgreen">
                    Age {{config('membership.age_clusters.stage9.start')}}-{{config('membership.age_clusters.stage9.end')}}
                </div>
                <div class="card-body bg-info">
                    @php
                        $inactive_stage9 = $stagecounts['stage9_counts']['inactive'];
                    @endphp
                    <div class="active_category">
                        {{$inactive_stage9 }}
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
    </div>
    <div class="row">
        <div class="col-xl-1 col-md-6">
            <div class="card  text-white mb-2">
                <div class="card-header d-flex align-items-center justify-content-between" style="!important;background-color: yellowgreen">
                    Age {{config('membership.age_clusters.stage10.start')}}-{{config('membership.age_clusters.stage10.end')}}
                </div>
                <div class="card-body bg-info">
                    @php
                        $inactive_stage10 = $stagecounts['stage10_counts']['inactive'];
                    @endphp
                    <div class="active_category">
                        {{$inactive_stage10 }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-1 col-md-6">
            <div class="card  text-white mb-2">
                <div class="card-header d-flex align-items-center justify-content-between" style="!important;background-color: yellowgreen">
                    Age {{config('membership.age_clusters.stage11.start')}}-{{config('membership.age_clusters.stage11.end')}}
                </div>
                <div class="card-body bg-info">
                    @php
                        $inactive_stage11 = $stagecounts['stage11_counts']['inactive'];
                    @endphp
                    <div class="active_category">
                        {{$inactive_stage11 }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-1 col-md-6">
            <div class="card text-white mb-2">
                <div class="card-header d-flex align-items-center justify-content-between" style="!important;background-color: yellowgreen">
                    Age {{config('membership.age_clusters.stage12.start')}}-{{config('membership.age_clusters.stage12.end')}}
                </div>
                <div class="card-body bg-info">
                    @php
                        $inactive_stage12 = $stagecounts['stage12_counts']['inactive'];
                    @endphp
                    <div class="active_category">
                        {{$inactive_stage12 }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-1 col-md-6">
            <div class="card text-white mb-2">
                <div class="card-header d-flex align-items-center justify-content-between" style="!important;background-color: yellowgreen">
                    Age {{config('membership.age_clusters.stage13.start')}}-{{config('membership.age_clusters.stage13.end')}}
                </div>
                <div class="card-body bg-info">
                    @php
                        $inactive_stage13 = $stagecounts['stage13_counts']['inactive'];
                    @endphp
                    <div class="active_category">
                        {{$inactive_stage13 }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-1 col-md-6">
            <div class="card text-white mb-2">
                <div class="card-header d-flex align-items-center justify-content-between" style="!important;background-color: yellowgreen">
                    Age {{config('membership.age_clusters.stage14.start')}}-{{config('membership.age_clusters.stage14.end')}}
                </div>
                <div class="card-body bg-info">
                    @php
                        $inactive_stage14 = $stagecounts['stage14_counts']['inactive'];
                    @endphp
                    <div class="active_category">
                        {{$inactive_stage14 }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-1 col-md-6">
            <div class="card text-white mb-2">
                <div class="card-header d-flex align-items-center justify-content-between" style="!important;background-color: yellowgreen">
                    Age {{config('membership.age_clusters.stage15.start')}}-{{config('membership.age_clusters.stage15.end')}}
                </div>
                <div class="card-body bg-info">
                    @php
                        $inactive_stage15 = $stagecounts['stage15_counts']['inactive'];
                    @endphp
                    <div class="active_category">
                        {{$inactive_stage15 }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-1 col-md-6">
            <div class="card text-white mb-2">
                <div class="card-header d-flex align-items-center justify-content-between" style="!important;background-color: yellowgreen">
                    Age {{config('membership.age_clusters.stage16.start')}}-{{config('membership.age_clusters.stage16.end')}}
                </div>
                <div class="card-body bg-info">
                    @php
                        $inactive_stage16 = $stagecounts['stage16_counts']['inactive'];
                    @endphp
                    <div class="active_category">
                        {{$inactive_stage16 }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-1 col-md-6">
            <div class="card text-white mb-2">
                <div class="card-header d-flex align-items-center justify-content-between" style="!important;background-color: yellowgreen">
                    Age {{config('membership.age_clusters.stage17.start')}}<i class="fa fa-arrow-right"></i>
                </div>
                <div class="card-body bg-info">
                    @php
                        $inactive_stage17 = $stagecounts['stage17_counts']['inactive'];
                    @endphp
                    <div class="active_category">
                        {{$inactive_stage17 }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-1 col-md-6">
            <div class="card bg-primary text-white mb-2">
                <div class="card-header  d-flex align-items-center justify-content-between" style="background-color: grey">
                    All
                </div>
                <div class="card-body bg-warning">
                    @php
                        $inactive = count(\App\Models\User::where('dob', '!=', null)->where('cell_group_id', '!=', null)->where('active', 0)->where('existing', 1)->where('registration_status', 5)->get());
                    @endphp
                    <div class="inactive_category">
                        {{$inactive }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="table table-responsive m-2" id="main">
        <h3 class="mb-2"><span class="spanned_status"></span> Members at Cell Group Level</h3>
        <table id="dt_select" class="table table-responsive table-striped table-bordered thead-light table-hover" cellspacing="0" width="100%" style="border-top: 1px solid #dddddd; border-bottom: 1px solid #dddddd ">
            <thead class="bg-info">
            <tr>
                <th>S/R</th>
                <th>Cell Group</th>
                @php
                    $age_cluster = config('membership.age_clusters');
                @endphp
                <th>Age {{$age_cluster['stage1']['start']}}-{{$age_cluster['stage1']['end']}}</th>
                <th>Age {{$age_cluster['stage2']['start']}}-{{$age_cluster['stage2']['end']}}</th>
                <th>Age {{$age_cluster['stage3']['start']}}-{{$age_cluster['stage3']['end']}}</th>
                <th>Age {{$age_cluster['stage4']['start']}}-{{$age_cluster['stage4']['end']}}</th>
                <th>Age {{$age_cluster['stage5']['start']}}-{{$age_cluster['stage5']['end']}}</th>
                <th>Age {{$age_cluster['stage6']['start']}}-{{$age_cluster['stage6']['end']}}</th>
                <th>Age {{$age_cluster['stage7']['start']}}-{{$age_cluster['stage7']['end']}}</th>
                <th>Age {{$age_cluster['stage8']['start']}}-{{$age_cluster['stage8']['end']}}</th>
                <th>Age {{$age_cluster['stage9']['start']}}-{{$age_cluster['stage9']['end']}}</th>
                <th>Age {{$age_cluster['stage10']['start']}}-{{$age_cluster['stage10']['end']}}</th>
                <th>Age {{$age_cluster['stage11']['start']}}-{{$age_cluster['stage11']['end']}}</th>
                <th>Age {{$age_cluster['stage12']['start']}}-{{$age_cluster['stage12']['end']}}</th>
                <th>Age {{$age_cluster['stage13']['start']}}-{{$age_cluster['stage13']['end']}}</th>
                <th>Age {{$age_cluster['stage14']['start']}}-{{$age_cluster['stage14']['end']}}</th>
                <th>Age {{$age_cluster['stage15']['start']}}-{{$age_cluster['stage15']['end']}}</th>
                <th>Age {{$age_cluster['stage16']['start']}}-{{$age_cluster['stage16']['end']}}</th>
                <th>Age {{$age_cluster['stage17']['start']}} and Older</th>
                <th>Total</th>
            </tr>
            </thead>
            <tboby>
                <tr class="inactive_category">
                @foreach($status_counts['inactive'] as $cell_group)
                    <tr class="active_category">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $cell_group['cell_group'] }}</td>
                        @foreach (range(1, 17) as $stageNumber)
                            <td>{{ $cell_group['stage' . $stageNumber] }}</td>
                        @endforeach
                        <td>
                                <?php
                                $sum = 0;
                                for ($stageNumber = 1; $stageNumber <= 17; $stageNumber++) {
                                    $sum += $cell_group['stage' . $stageNumber];
                                }
                                echo $sum;
                                ?>
                        </td>
                    </tr>
                    @endforeach
                    </tr>
            </tboby>
            <tfoot class="bg-warning">
            <tr class="active_category">
                <th>{{count(config('membership.cell_group'))+1}}</th>
                <th>Total</th>
                <th>{{$stagecounts['stage1_counts']['inactive']}}</th>
                <th>{{$inactive_stage2}}</th>
                <th>{{$inactive_stage3}}</th>
                <th>{{$inactive_stage4}}</th>
                <th>{{$inactive_stage5}}</th>
                <th>{{$inactive_stage6}}</th>
                <th>{{$inactive_stage7}}</th>
                <th>{{$inactive_stage8}}</th>
                <th>{{$inactive_stage9}}</th>
                <th>{{$inactive_stage10}}</th>
                <th>{{$inactive_stage11}}</th>
                <th>{{$inactive_stage12}}</th>
                <th>{{$inactive_stage13}}</th>
                <th>{{$inactive_stage14}}</th>
                <th>{{$inactive_stage15}}</th>
                <th>{{$inactive_stage16}}</th>
                <th>{{$inactive_stage17}}</th>
                <th>{{$inactive}}</th>
            </tr>
            </tfoot>
        </table>
    </div>
