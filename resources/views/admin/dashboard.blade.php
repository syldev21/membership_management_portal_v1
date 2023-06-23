<div class="side-profile-here">
    <input type="hidden" value="1" id="testa">
    <div style="float: left">
        <h1 class="mt-4">Dashboard</h1>
        <h3 class="mb-2"><span class="spanned_status"></span> Members at Church Level</h3>
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
        <div class="col-xl-1 col-md-6">
            <div class="card text-white">
                <div class="card-header d-flex align-items-center justify-content-between" style="!important;background-color: yellowgreen">
                    Age {{config('membership.age_clusters.stage1.start')}}-{{config('membership.age_clusters.stage1.end')}}
                </div>
                <div class="card-body bg-info">
                    @php
                        $category_details = config('membership.age_clusters.stage1');
                            $age_cluster_array = [$category_details['start'], $category_details['end']];
                                $active_stage1 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('active', 1)->where('registration_status', 5)->get());
                                $inactive_stage1 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('active', 0)->where('existing', 1)->where('registration_status', 5)->get());
                                $deleted_stage1 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('active', 0)->where('existing', 0)->where('registration_status', 5)->get());
                    @endphp
                    <div class="active_category">
                        {{$active_stage1}}
                    </div>
                    <div class="inactive_category">
                        {{$inactive_stage1}}
                    </div>
                    <div class="deleted_category">
                        {{$deleted_stage1}}
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
                        $category_details = config('membership.age_clusters.stage2');
                            $age_cluster_array = [$category_details['start'], $category_details['end']];
                        $active_stage2 = count(App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('active', 1)->where('registration_status', 5)->get());
                        $inactive_stage2 = count(App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('active', 0)->where('existing', 1)->where('registration_status', 5)->get());
                        $deleted_stage2 = count(App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('existing', 0)->where('existing', 0)->where('registration_status', 5)->get());
                    @endphp
                    <div class="active_category">
                        {{$active_stage2}}
                    </div>
                    <div class="inactive_category">
                        {{$inactive_stage2}}
                    </div>
                    <div class="deleted_category">
                        {{$deleted_stage2}}
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
                        $category_details = config('membership.age_clusters.stage3');
                            $age_cluster_array = [$category_details['start'], $category_details['end']];
                        $active_stage3 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('active', 1)->where('registration_status', 5)->get());
                        $inactive_stage3 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('active', 0)->where('existing', 1)->where('registration_status', 5)->get());
                        $deleted_stage3 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('existing', 0)->where('active', 0)->where('registration_status', 5)->get());
                    @endphp
                    <div class="active_category">
                        {{$active_stage3 }}
                    </div>
                    <div class="inactive_category">
                        {{$inactive_stage3 }}
                    </div>
                    <div class="deleted_category">
                        {{$deleted_stage3 }}
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
                        $category_details = config('membership.age_clusters.stage4');
                            $age_cluster_array = [$category_details['start'], $category_details['end']];
                        $active_stage4 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('active', 1)->where('registration_status', 5)->get());
                        $inactive_stage4 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('active', 0)->where('existing', 1)->where('registration_status', 5)->get());
                        $deleted_stage4 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('existing', 0)->where('active', 0)->where('registration_status', 5)->get());
                    @endphp
                    <div class="active_category">
                        {{$active_stage4 }}
                    </div>
                    <div class="inactive_category">
                        {{$inactive_stage4 }}
                    </div>
                    <div class="deleted_category">
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
                        $category_details = config('membership.age_clusters.stage5');
                            $age_cluster_array = [$category_details['start'], $category_details['end']];
                        $active_stage5 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('active', 1)->where('registration_status', 5)->get());
                        $inactive_stage5 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('active', 0)->where('existing', 1)->where('registration_status', 5)->get());
                        $deleted_stage5 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('existing', 0)->where('active', 0)->where('registration_status', 5)->get());
                    @endphp
                    <div class="active_category">
                        {{$active_stage5 }}
                    </div>
                    <div class="inactive_category">
                        {{$inactive_stage5 }}
                    </div>
                    <div class="deleted_category">
                        {{$deleted_stage5 }}
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
                        $category_details = config('membership.age_clusters.stage6');
                            $age_cluster_array = [$category_details['start'], $category_details['end']];
                        $active_stage6 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('active', 1)->where('registration_status', 5)->get());
                        $inactive_stage6 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('active', 0)->where('existing', 1)->where('registration_status', 5)->get());
                        $deleted_stage6 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('existing', 0)->where('active', 0)->where('registration_status', 5)->get());
                    @endphp
                    <div class="active_category">
                        {{$active_stage6 }}
                    </div>
                    <div class="inactive_category">
                        {{$inactive_stage6 }}
                    </div>
                    <div class="deleted_category">
                        {{$deleted_stage6 }}
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
                        $category_details = config('membership.age_clusters.stage7');
                            $age_cluster_array = [$category_details['start'], $category_details['end']];
                        $active_stage7 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('active', 1)->where('registration_status', 5)->get());
                        $inactive_stage7 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('active', 0)->where('existing', 1)->where('registration_status', 5)->get());
                        $deleted_stage7 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('existing', 0)->where('existing', 0)->where('registration_status', 5)->get());
                    @endphp
                    <div class="active_category">
                        {{$active_stage7}}
                    </div>
                    <div class="inactive_category">
                        {{$inactive_stage7}}
                    </div>
                    <div class="deleted_category">
                        {{$deleted_stage7}}
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
                        $category_details = config('membership.age_clusters.stage8');
                            $age_cluster_array = [$category_details['start'], $category_details['end']];
                        $active_stage8 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('active', 1)->where('registration_status', 5)->get());
                        $inactive_stage8 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('active', 0)->where('existing', 1)->where('registration_status', 5)->get());
                        $deleted_stage8 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('existing', 0)->where('active', 0)->where('registration_status', 5)->get());
                    @endphp
                    <div class="active_category">
                        {{$active_stage8 }}
                    </div>
                    <div class="inactive_category">
                        {{$inactive_stage8 }}
                    </div>
                    <div class="deleted_category">
                        {{$deleted_stage8 }}
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
                        $category_details = config('membership.age_clusters.stage9');
                            $age_cluster_array = [$category_details['start'], $category_details['end']];
                        $active_stage9 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('active', 1)->where('registration_status', 5)->get());
                        $inactive_stage9 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('active', 0)->where('existing', 1)->where('registration_status', 5)->get());
                        $deleted_stage9 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('existing', 0)->where('active', 0)->where('registration_status', 5)->get());
                    @endphp
                    <div class="active_category">
                        {{$active_stage9 }}
                    </div>
                    <div class="inactive_category">
                        {{$inactive_stage9 }}
                    </div>
                    <div class="deleted_category">
                        {{$deleted_stage9 }}
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
                        $category_details = config('membership.age_clusters.stage10');
                            $age_cluster_array = [$category_details['start'], $category_details['end']];
                        $active_stage10 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('active', 1)->where('registration_status', 5)->get());
                        $inactive_stage10 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('active', 0)->where('existing', 1)->where('registration_status', 5)->get());
                        $deleted_stage10 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('existing', 0)->where('active', 0)->where('registration_status', 5)->get());
                    @endphp
                    <div class="active_category">
                        {{$active_stage10 }}
                    </div>
                    <div class="inactive_category">
                        {{$inactive_stage10 }}
                    </div>
                    <div class="deleted_category">
                        {{$deleted_stage10 }}
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
                        $category_details = config('membership.age_clusters.stage11');
                            $age_cluster_array = [$category_details['start'], $category_details['end']];
                        $active_stage11 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('active', 1)->where('registration_status', 5)->get());
                        $inactive_stage11 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('active', 0)->where('existing', 1)->where('registration_status', 5)->get());
                        $deleted_stage11 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('existing', 0)->where('active', 0)->where('registration_status', 5)->get());
                    @endphp
                    <div class="active_category">
                        {{$active_stage11 }}
                    </div>
                    <div class="inactive_category">
                        {{$inactive_stage11 }}
                    </div>
                    <div class="deleted_category">
                        {{$deleted_stage11 }}
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
                        $category_details = config('membership.age_clusters.stage12');
                            $age_cluster_array = [$category_details['start'], $category_details['end']];
                        $active_stage12 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('active', 1)->where('registration_status', 5)->get());
                        $inactive_stage12 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('active', 0)->where('existing', 1)->where('registration_status', 5)->get());
                        $deleted_stage12 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('existing', 0)->where('active', 0)->where('registration_status', 5)->get());
                    @endphp
                    <div class="active_category">
                        {{$active_stage12 }}
                    </div>
                    <div class="inactive_category">
                        {{$active_stage12 }}
                    </div>
                    <div class="deleted_category">
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
                        $category_details = config('membership.age_clusters.stage13');
                            $age_cluster_array = [$category_details['start'], $category_details['end']];
                        $active_stage13 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('active', 1)->where('registration_status', 5)->get());
                        $inactive_stage13 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('active', 0)->where('existing', 1)->where('registration_status', 5)->get());
                        $deleted_stage13 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('existing', 0)->where('active', 0)->where('registration_status', 5)->get());
                    @endphp
                    <div class="active_category">
                        {{$active_stage13 }}
                    </div>
                    <div class="inactive_category">
                        {{$inactive_stage13 }}
                    </div>
                    <div class="deleted_category">
                        {{$deleted_stage13 }}
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
                        $category_details = config('membership.age_clusters.stage14');
                            $age_cluster_array = [$category_details['start'], $category_details['end']];
                        $active_stage14 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('active', 1)->where('registration_status', 5)->get());
                        $inactive_stage14 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('active', 0)->where('existing', 1)->where('registration_status', 5)->get());
                        $deleted_stage14 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('existing', 0)->where('active', 0)->where('registration_status', 5)->get());
                    @endphp
                    <div class="active_category">
                        {{$active_stage14 }}
                    </div>
                    <div class="inactive_category">
                        {{$inactive_stage14 }}
                    </div>
                    <div class="deleted_category">
                        {{$deleted_stage14 }}
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
                        $category_details = config('membership.age_clusters.stage15');
                            $age_cluster_array = [$category_details['start'], $category_details['end']];
                        $active_stage15 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('active', 1)->where('registration_status', 5)->get());
                        $inactive_stage15 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('active', 0)->where('existing', 1)->where('registration_status', 5)->get());
                        $deleted_stage15 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('existing', 0)->where('active', 0)->where('registration_status', 5)->get());
                    @endphp
                    <div class="active_category">
                        {{$active_stage15 }}
                    </div>
                    <div class="inactive_category">
                        {{$inactive_stage15 }}
                    </div>
                    <div class="deleted_category">
                        {{$deleted_stage15 }}
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
                        $category_details = config('membership.age_clusters.stage16');
                            $age_cluster_array = [$category_details['start'], $category_details['end']];
                        $active_stage16 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('active', 1)->where('registration_status', 5)->get());
                        $inactive_stage16 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('active', 0)->where('existing', 1)->where('registration_status', 5)->get());
                        $deleted_stage16 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($age_cluster_array) {
                                        $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), $age_cluster_array);
                                    })->where('existing', 0)->where('active', 0)->where('registration_status', 5)->get());
                    @endphp
                    <div class="active_category">
                        {{$active_stage16 }}
                    </div>
                    <div class="inactive_category">
                        {{$inactive_stage16 }}
                    </div>
                    <div class="deleted_category">
                        {{$deleted_stage16 }}
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
                        $category_details = config('membership.age_clusters.stage17');
                            $end_age_detail = $category_details['start'];
                        $active_stage17 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($category_details) {
                                $query->where(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), '>=', $category_details['start']);
                            })->where('active', 1)->where('registration_status', 5)->get());
                        $inactive_stage17 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($category_details) {
                                $query->where(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), '>=', $category_details['start']);
                            })->where('active', 0)->where('existing', 1)->where('registration_status', 5)->get());
                        $deleted_stage17 = count(\App\Models\User::where('cell_group_id', '!=', null)
                                ->where(function ($query) use ($category_details) {
                                $query->where(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), '>=', $category_details['start']);
                            })->where('existing', 0)->where('active', 0)->where('registration_status', 5)->get());
                    @endphp
                    <div class="active_category">
                        {{$active_stage17 }}
                    </div>
                    <div class="inactive_category">
                        {{$inactive_stage17 }}
                    </div>
                    <div class="deleted_category">
                        {{$deleted_stage17 }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-1 col-md-6">
            <div class="card bg-primary text-white mb-2">
                <div class="card-header  d-flex align-items-center justify-content-between" style="background-color: grey">
                    All
                </div>
                <div class="card-body bg-info">
                    @php
                        $active = count(\App\Models\User::where('dob', '!=', null)->where('cell_group_id', '!=', null)->where('active', 1)->where('registration_status', 5)->get());
                        $inactive = count(\App\Models\User::where('dob', '!=', null)->where('cell_group_id', '!=', null)->where('active', 0)->where('existing', 1)->where('registration_status', 5)->get());
                        $deleted = count(\App\Models\User::where('dob', '!=', null)->where('cell_group_id', '!=', null)->where('existing', 0)->where('active', 0)->where('registration_status', 5)->get());
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
                    <th>Age {{config('membership.age_clusters.stage1.start')}}-{{config('membership.age_clusters.stage1.end')}}</th>
                    <th>Age {{config('membership.age_clusters.stage2.start')}}-{{config('membership.age_clusters.stage2.end')}}</th>
                    <th>Age {{config('membership.age_clusters.stage3.start')}}-{{config('membership.age_clusters.stage3.end')}}</th>
                    <th>Age {{config('membership.age_clusters.stage4.start')}}-{{config('membership.age_clusters.stage4.end')}}</th>
                    <th>Age {{config('membership.age_clusters.stage5.start')}}-{{config('membership.age_clusters.stage5.end')}}</th>
                    <th>Age {{config('membership.age_clusters.stage6.start')}}-{{config('membership.age_clusters.stage6.end')}}</th>
                    <th>Age {{config('membership.age_clusters.stage7.start')}}-{{config('membership.age_clusters.stage7.end')}}</th>
                    <th>Age {{config('membership.age_clusters.stage8.start')}}-{{config('membership.age_clusters.stage8.end')}}</th>
                    <th>Age {{config('membership.age_clusters.stage9.start')}}-{{config('membership.age_clusters.stage9.end')}}</th>
                    <th>Age {{config('membership.age_clusters.stage10.start')}}-{{config('membership.age_clusters.stage10.end')}}</th>
                    <th>Age {{config('membership.age_clusters.stage11.start')}}-{{config('membership.age_clusters.stage11.end')}}</th>
                    <th>Age {{config('membership.age_clusters.stage12.start')}}-{{config('membership.age_clusters.stage12.end')}}</th>
                    <th>Age {{config('membership.age_clusters.stage13.start')}}-{{config('membership.age_clusters.stage13.end')}}</th>
                    <th>Age {{config('membership.age_clusters.stage14.start')}}-{{config('membership.age_clusters.stage14.end')}}</th>
                    <th>Age {{config('membership.age_clusters.stage15.start')}}-{{config('membership.age_clusters.stage15.end')}}</th>
                    <th>Age {{config('membership.age_clusters.stage16.start')}}-{{config('membership.age_clusters.stage16.end')}}</th>
                    <th>Age {{config('membership.age_clusters.stage17.start')}} and older</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tboby>
                @foreach(config('membership.cell_group') as $cell_group)
                <tr class="active_category">
                    @php
                        $age_clusters = config('membership.age_clusters');
                        $cell_group_id = $cell_group['id'];
                    @endphp

                    <td>{{$loop->iteration}}</td>
                    <td>{{$cell_group['text']}}</td>
                    <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 1)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage1']['start'], $age_clusters['stage1']['end']]);
                                })
                                ->count() }}
                    </td>
                    <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 1)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage2']['start'], $age_clusters['stage2']['end']]);
                                })
                                ->count() }}
                    </td>
                    <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 1)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage3']['start'], $age_clusters['stage3']['end']]);
                                })
                                ->count() }}
                    </td>
                    <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 1)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage4']['start'], $age_clusters['stage4']['end']]);
                                })
                                ->count() }}
                    </td>
                    <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 1)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage5']['start'], $age_clusters['stage5']['end']]);
                                })
                                ->count() }}
                    </td>
                    <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 1)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage6']['start'], $age_clusters['stage6']['end']]);
                                })
                                ->count() }}
                    </td>
                    <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 1)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage7']['start'], $age_clusters['stage7']['end']]);
                                })
                                ->count() }}
                    </td>
                    <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 1)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage8']['start'], $age_clusters['stage8']['end']]);
                                })
                                ->count() }}
                    </td>
                    <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 1)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage9']['start'], $age_clusters['stage9']['end']]);
                                })
                                ->count() }}
                    </td>
                    <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 1)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage10']['start'], $age_clusters['stage10']['end']]);
                                })
                                ->count() }}
                    </td>
                    <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 1)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage11']['start'], $age_clusters['stage11']['end']]);
                                })
                                ->count() }}
                    </td>
                    <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 1)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage12']['start'], $age_clusters['stage12']['end']]);
                                })
                                ->count() }}
                    </td>
                    <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 1)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage13']['start'], $age_clusters['stage13']['end']]);
                                })
                                ->count() }}
                    </td>
                    <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 1)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage14']['start'], $age_clusters['stage14']['end']]);
                                })
                                ->count() }}
                    </td>
                    <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 1)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage15']['start'], $age_clusters['stage15']['end']]);
                                })
                                ->count() }}
                    </td>
                    <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 1)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage16']['start'], $age_clusters['stage16']['end']]);
                                })
                                ->count() }}
                    </td>
                    <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 1)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->where(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), '>=', $age_clusters['stage17']['start']);
                                })
                                ->count() }}
                    </td>
                    <td>{{count(\App\Models\User::where('dob', '!=', null)->where(['cell_group_id' => $cell_group_id])->where('active', 1)->where('registration_status', 5)->get())}}</td>
                </tr>
               <tr class="inactive_category">
                    @php
                    $inactive_members = \App\Models\User::where(['cell_group_id'=>$cell_group['id']])->where('active', 0)->where('existing', 1)->where('registration_status', 5);
                    @endphp
                   <td>{{$loop->iteration}}</td>
                   <td>{{$cell_group['text']}}</td>
                   <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 0)
                                ->where('existing', 1)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage1']['start'], $age_clusters['stage1']['end']]);
                                })
                                ->count() }}
                   </td>
                   <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 0)
                                ->where('existing', 1)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage2']['start'], $age_clusters['stage2']['end']]);
                                })
                                ->count() }}
                   </td>
                   <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 0)
                                ->where('existing', 1)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage3']['start'], $age_clusters['stage3']['end']]);
                                })
                                ->count() }}
                   </td>
                   <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 0)
                                ->where('existing', 1)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage4']['start'], $age_clusters['stage4']['end']]);
                                })
                                ->count() }}
                   </td>
                   <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 0)
                                ->where('existing', 1)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage5']['start'], $age_clusters['stage5']['end']]);
                                })
                                ->count() }}
                   </td>
                   <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 0)
                                ->where('existing', 1)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage6']['start'], $age_clusters['stage6']['end']]);
                                })
                                ->count() }}
                   </td>
                   <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 0)
                                ->where('existing', 1)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage7']['start'], $age_clusters['stage7']['end']]);
                                })
                                ->count() }}
                   </td>
                   <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 0)
                                ->where('existing', 1)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage8']['start'], $age_clusters['stage8']['end']]);
                                })
                                ->count() }}
                   </td>
                   <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 0)
                                ->where('existing', 1)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage9']['start'], $age_clusters['stage9']['end']]);
                                })
                                ->count() }}
                   </td>
                   <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 0)
                                ->where('existing', 1)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage10']['start'], $age_clusters['stage10']['end']]);
                                })
                                ->count() }}
                   </td>
                   <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 0)
                                ->where('existing', 1)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage11']['start'], $age_clusters['stage11']['end']]);
                                })
                                ->count() }}
                   </td>
                   <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 0)
                                ->where('existing', 1)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage12']['start'], $age_clusters['stage12']['end']]);
                                })
                                ->count() }}
                   </td>
                   <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 0)
                                ->where('existing', 1)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage13']['start'], $age_clusters['stage13']['end']]);
                                })
                                ->count() }}
                   </td>
                   <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 0)
                                ->where('existing', 1)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage14']['start'], $age_clusters['stage14']['end']]);
                                })
                                ->count() }}
                   </td>
                   <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 0)
                                ->where('existing', 1)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage15']['start'], $age_clusters['stage15']['end']]);
                                })
                                ->count() }}
                   </td>
                   <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 0)
                                ->where('existing', 1)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage16']['start'], $age_clusters['stage16']['end']]);
                                })
                                ->count() }}
                   </td>
                   <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 0)
                                ->where('existing', 1)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->where(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), '>=', $age_clusters['stage17']['start']);
                                })
                                ->count() }}
                   </td>
                   <td>{{count(\App\Models\User::where('dob', '!=', null)->where(['cell_group_id'=>$cell_group['id']])->where('active', 0)->where('registration_status', 5)->get())}}</td>
                    </tr>
               <tr class="deleted_category">
                   @php
                   $deleted_members = \App\Models\User::where(['cell_group_id'=>$cell_group['id']])->where('existing', 0)->where('active', 0)->where('registration_status', 5);
                   @endphp
                   <td>{{$loop->iteration}}</td>
                   <td>{{$cell_group['text']}}</td>
                   <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 0)->where('existing', 0)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage1']['start'], $age_clusters['stage1']['end']]);
                                })
                                ->count() }}
                   </td>
                   <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 0)->where('existing', 0)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage2']['start'], $age_clusters['stage2']['end']]);
                                })
                                ->count() }}
                   </td>
                   <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 0)->where('existing', 0)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage3']['start'], $age_clusters['stage3']['end']]);
                                })
                                ->count() }}
                   </td>
                   <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 0)->where('existing', 0)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage4']['start'], $age_clusters['stage4']['end']]);
                                })
                                ->count() }}
                   </td>
                   <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 0)->where('existing', 0)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage5']['start'], $age_clusters['stage5']['end']]);
                                })
                                ->count() }}
                   </td>
                   <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 0)->where('existing', 0)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage6']['start'], $age_clusters['stage6']['end']]);
                                })
                                ->count() }}
                   </td>
                   <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 0)->where('existing', 0)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage7']['start'], $age_clusters['stage7']['end']]);
                                })
                                ->count() }}
                   </td>
                   <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 0)->where('existing', 0)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage8']['start'], $age_clusters['stage8']['end']]);
                                })
                                ->count() }}
                   </td>
                   <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 0)->where('existing', 0)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage9']['start'], $age_clusters['stage9']['end']]);
                                })
                                ->count() }}
                   </td>
                   <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 0)->where('existing', 0)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage10']['start'], $age_clusters['stage10']['end']]);
                                })
                                ->count() }}
                   </td>
                   <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 0)->where('existing', 0)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage11']['start'], $age_clusters['stage11']['end']]);
                                })
                                ->count() }}
                   </td>
                   <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 0)->where('existing', 0)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage12']['start'], $age_clusters['stage12']['end']]);
                                })
                                ->count() }}
                   </td>
                   <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 0)->where('existing', 0)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage13']['start'], $age_clusters['stage13']['end']]);
                                })
                                ->count() }}
                   </td>
                   <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 0)->where('existing', 0)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage14']['start'], $age_clusters['stage14']['end']]);
                                })
                                ->count() }}
                   </td>
                   <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 0)->where('existing', 0)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage15']['start'], $age_clusters['stage15']['end']]);
                                })
                                ->count() }}
                   </td>
                   <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 0)->where('existing', 0)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_clusters['stage16']['start'], $age_clusters['stage16']['end']]);
                                })
                                ->count() }}
                   </td>
                   <td>{{ \App\Models\User::where('cell_group_id', $cell_group_id)
                                ->where('active', 0)->where('existing', 0)
                            ->where('registration_status', 5)
                            ->where(function ($query) use ($age_clusters) {
                                    $query->where(DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), '>=', $age_clusters['stage17']['start']);
                                })
                                ->count() }}
                   </td>
                   <td>{{count(\App\Models\User::where('dob', '!=', null)->where(['cell_group_id'=>$cell_group['id']])->where('existing', 0)->where('active', 0)->where('registration_status', 5)->get())}}</td>
                    </tr>
                @endforeach
            </tboby>
            <tfoot class="bg-success bg-warning bg-danger">
            <tr class="active_category">
                <th>{{count(config('membership.cell_group'))+1}}</th>
                <th>Total</th>
                <th>{{$active_stage1}}</th>
                <th>{{$active_stage2}}</th>
                <th>{{$active_stage3}}</th>
                <th>{{$active_stage4}}</th>
                <th>{{$active_stage5}}</th>
                <th>{{$active_stage6}}</th>
                <th>{{$active_stage7}}</th>
                <th>{{$active_stage8}}</th>
                <th>{{$active_stage9}}</th>
                <th>{{$active_stage10}}</th>
                <th>{{$active_stage11}}</th>
                <th>{{$active_stage12}}</th>
                <th>{{$active_stage13}}</th>
                <th>{{$active_stage14}}</th>
                <th>{{$active_stage15}}</th>
                <th>{{$active_stage16}}</th>
                <th>{{$active_stage17}}</th>
                <th>{{$active}}</th>
            </tr>
            <tr class="inactive_category">
                <th>{{count(config('membership.cell_group'))+1}}</th>
                <th>Total</th>
                <th>{{$inactive_stage1}}</th>
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
            <tr class="deleted_category">
                <th>{{count(config('membership.cell_group'))+1}}</th>
                <th>Total</th>
                <th>{{$deleted_stage1}}</th>
                <th>{{$deleted_stage2}}</th>
                <th>{{$deleted_stage3}}</th>
                <th>{{$deleted_stage4}}</th>
                <th>{{$deleted_stage5}}</th>
                 <th>{{$deleted_stage6}}</th>
                <th>{{$deleted_stage7}}</th>
                <th>{{$deleted_stage8}}</th>
                <th>{{$deleted_stage9}}</th>
                <th>{{$deleted_stage10}}</th>
                 <th>{{$deleted_stage11}}</th>
                <th>{{$deleted_stage12}}</th>
                <th>{{$deleted_stage13}}</th>
                <th>{{$deleted_stage14}}</th>
                <th>{{$deleted_stage15}}</th>
                <th>{{$deleted_stage16}}</th>
                <th>{{$deleted_stage17}}</th>
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
                // $('.spanned_status').removeClass('bg-danger')
                // $('.spanned_status').removeClass('bg-success')
                // $('.spanned_status').addClass('bg-warning')
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
                // $('.spanned_status').removeClass('bg-success')
                // $('.spanned_status').removeClass('bg-warning')
                // $('.spanned_status').addClass('bg-danger')
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
                // $('.spanned_status').removeClass('bg-danger')
                // $('.spanned_status').removeClass('bg-warning')
                // $('.spanned_status').addClass('bg-success')
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
