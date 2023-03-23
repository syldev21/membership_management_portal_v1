<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <h3 class="mb-4">Number of Members at Church Level</h3>
    <div class="row">
        <div class="col-xl-2 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">All Members</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    {{$all_members}}
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div><div class="col-xl-2 col-md-6">
            <div class="card text-white mb-4"  style="!important;background-color: red">
                <div class="card-body">Children</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    @php
                        $children = count(\App\Models\User::where('age_cluster', config('membership.age_clusters.Children.id'))->get());
                    @endphp
                    {{$children}}
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div><div class="col-xl-2 col-md-6">
            <div class="card text-white mb-4"  style="!important;background-color: orangered">
                <div class="card-body">Teenies</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    @php
                        $teenies = count(\App\Models\User::where('age_cluster', config('membership.age_clusters.Teenies.id'))->get());
                    @endphp
                    {{$teenies}}                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-md-6">
            <div class="card  text-white mb-4" style="!important;background-color: orange">
                <div class="card-body">Youths</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    @php
                        $youths = count(\App\Models\User::where('age_cluster', config('membership.age_clusters.Youths.id'))->get());
                    @endphp
                    {{$youths}}
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-md-6">
            <div class="card text-white mb-4"  style="!important;background-color: yellowgreen">
                <div class="card-body">Middle Age</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    @php
                        $middle_age = count(\App\Models\User::where('age_cluster', config('membership.age_clusters.Middle_Age.id'))->get());
                    @endphp
                    {{$middle_age}}
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-md-6">
            <div class="card text-white mb-4"  style="!important;background-color: greenyellow">
                <div class="card-body">Adults</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    @php
                        $adults = count(\App\Models\User::where('age_cluster', config('membership.age_clusters.Adults.id'))->get());
                    @endphp
                    {{$adults}}
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="table table-responsive m-2" id="main">
        <h3 class="mb-4">Numbers at Cell Group Level</h3>
        <table id="dt_select" class="table table-responsive table-striped table-bordered thead-light table-hover" cellspacing="0" width="100%" style="border-top: 1px solid #dddddd; border-bottom: 1px solid #dddddd ">
            <thead class="bg-info">
                <tr>
                    <th>S/R</th>
                    <th>Name</th>
                    <th>Children</th>
                    <th>Teenies</th>
                    <th>Youths</th>
                    <th>Middle Age</th>
                    <th>Adults</th>
                    <th>Total</th>
                    <td hidden="hidden">View</th>
                </tr>
            </thead>
            <tboby>
                @foreach(config('membership.estate') as $cell_group)
                    <tr class="item">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$cell_group['text']}}</td>

                        <td>{{count(\App\Models\User::where(['cell_group_id'=>$cell_group['id'], 'age_cluster'=>config('membership.age_clusters.Children')['id']])->get())}}</td>
                        <td>{{count(\App\Models\User::where(['cell_group_id'=>$cell_group['id'], 'age_cluster'=>config('membership.age_clusters.Teenies')['id']])->get())}}</td>
                        <td>{{count(\App\Models\User::where(['cell_group_id'=>$cell_group['id'], 'age_cluster'=>config('membership.age_clusters.Youths')['id']])->get())}}</td>
                        <td>{{count(\App\Models\User::where(['cell_group_id'=>$cell_group['id'], 'age_cluster'=>config('membership.age_clusters.Middle_Age')['id']])->get())}}</td>
                        <td>{{count(\App\Models\User::where(['cell_group_id'=>$cell_group['id'], 'age_cluster'=>config('membership.age_clusters.Adults')['id']])->get())}}</td>
                        <td>{{count(\App\Models\User::where(['cell_group_id'=>$cell_group['id']])->get())}}</td>
                        <td hidden="hidden">
                            <a href="" class="btn btn-success church-members" data-id="{{$cell_group['id']}}">View</a>
                        </td>
                    </tr>
                @endforeach
            </tboby>
            <tfoot class="bg-info">
            <tr>
                <th>S/R</th>
                <th>Name</th>
                <th>Children</th>
                <th>Teenies</th>
                <th>Youths</th>
                <th>Middle Age</th>
                <th>Adults</th>
                <th>Total</th>
                <td hidden="hidden">View</th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
