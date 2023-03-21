<div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Numbers at Church Level</li>
        </ol>
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
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Number of Members per Cell Group</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">{{config('membership.estate.kiambiu.text')}}</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        @php
                            $kiambiu = count(\App\Models\User::where('cell_group_id', config('membership.estate.kiambiu.id'))->get());
                        @endphp
                        {{$kiambiu}}
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">{{config('membership.estate.umoja_bethel.text')}}</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        @php
                            $umoja_bethel = count(\App\Models\User::where('cell_group_id', config('membership.estate.umoja_bethel.id'))->get());
                        @endphp
                        {{$umoja_bethel}}
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">{{config('membership.estate.kariobangi_south.text')}}</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        @php
                            $kariobangi_south = count(\App\Models\User::where('cell_group_id', config('membership.estate.kariobangi_south.id'))->get());
                        @endphp
                        {{$kariobangi_south}}
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-info text-white mb-4">
                    <div class="card-body">{{config('membership.estate.chokaa_berea.text')}}</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        @php
                            $chokaa_berea = count(\App\Models\User::where('cell_group_id', config('membership.estate.chokaa_berea.id'))->get());
                        @endphp
                        {{$chokaa_berea}}
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">{{config('membership.estate.diaspora.text')}}</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        @php
                            $diaspora = count(\App\Models\User::where('cell_group_id', config('membership.estate.diaspora.id'))->get());
                        @endphp
                        {{$diaspora}}
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card bg-secondary text-white mb-4">
                    <div class="card-body">{{config('membership.estate.langata.text')}}</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        @php
                            $langata = count(\App\Models\User::where('cell_group_id', config('membership.estate.langata.id'))->get());
                        @endphp
                        {{$langata}}
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card bg-dark text-white mb-4">
                    <div class="card-body">{{config('membership.estate.Jericho.text')}}</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        @php
                            $Jericho = count(\App\Models\User::where('cell_group_id', config('membership.estate.Jericho.id'))->get());
                        @endphp
                        {{$Jericho}}
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Numbers at Cell Group Level</li>
        </ol>
        <div class="cell_group kiambiu">
            <h3>{{config('membership.estate.kiambiu.text')}}</h3>
            <div class="row">
                <div class="col-xl-2 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">All Members</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            {{count(\App\Models\User::where('cell_group_id', config('membership.estate.kiambiu.id'))->get())}}
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 col-md-6">
                    <div class="card text-white mb-4"style="!important;background-color: red">
                        <div class="card-body">Children</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            @php
                                $children = count(\App\Models\User::where(['cell_group_id' => config('membership.estate.kiambiu.id'), 'age_cluster'=> config('membership.age_clusters.Children.id')])->get());
                            @endphp
                            {{$children}}
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div><div class="col-xl-2 col-md-6">
                    <div class="card text-white mb-4"style="!important;background-color: orangered">
                        <div class="card-body">Teenies</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            @php
                                $teenies = count(\App\Models\User::where(['cell_group_id'=> config('membership.estate.kiambiu.id'), 'age_cluster'=> config('membership.age_clusters.Teenies.id')])->get());
                            @endphp
                            {{$teenies}}                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="card text-white mb-4"style="!important;background-color: orange">
                        <div class="card-body">Youths</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            @php
                                $youths = count(\App\Models\User::where(['cell_group_id'=> config('membership.estate.kiambiu.id'),'age_cluster'=> config('membership.age_clusters.Youths.id')])->get());
                            @endphp
                            {{$youths}}
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="card text-white mb-4"style="!important;background-color: yellowgreen">
                        <div class="card-body">Middle Age</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            @php
                                $middle_age = count(\App\Models\User::where(['cell_group_id'=> config('membership.estate.kiambiu.id'),'age_cluster'=> config('membership.age_clusters.Middle_Age.id')])->get());
                            @endphp
                            {{$middle_age}}
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="card text-white mb-4"style="!important;background-color: greenyellow">
                        <div class="card-body">Adults</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            @php
                                $adults = count(\App\Models\User::where(['cell_group_id'=> config('membership.estate.kiambiu.id'),'age_cluster'=> config('membership.age_clusters.Adults.id')])->get());
                            @endphp
                            {{$adults}}
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cell_group umoja_bethel">
            <h3>{{config('membership.estate.umoja_bethel.text')}}</h3>
            <div class="row">
                <div class="col-xl-2 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">All Members</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            {{count(\App\Models\User::where('cell_group_id', config('membership.estate.umoja_bethel.id'))->get())}}
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div><div class="col-xl-2 col-md-6">
                    <div class="card text-white mb-4"style="!important;background-color: red">
                        <div class="card-body">Children</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            @php
                                $children = count(\App\Models\User::where(['cell_group_id' => config('membership.estate.umoja_bethel.id'), 'age_cluster'=> config('membership.age_clusters.Children.id')])->get());
                            @endphp
                            {{$children}}
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div><div class="col-xl-2 col-md-6">
                    <div class="card text-white mb-4"style="!important;background-color: orangered">
                        <div class="card-body">Teenies</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            @php
                                $teenies = count(\App\Models\User::where(['cell_group_id'=> config('membership.estate.umoja_bethel.id'), 'age_cluster'=> config('membership.age_clusters.Teenies.id')])->get());
                            @endphp
                            {{$teenies}}                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="card text-white mb-4"style="!important;background-color: orange">
                        <div class="card-body">Youths</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            @php
                                $youths = count(\App\Models\User::where(['cell_group_id'=> config('membership.estate.umoja_bethel.id'),'age_cluster'=> config('membership.age_clusters.Youths.id')])->get());
                            @endphp
                            {{$youths}}
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="card text-white mb-4"style="!important;background-color: yellowgreen">
                        <div class="card-body">Middle Age</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            @php
                                $middle_age = count(\App\Models\User::where(['cell_group_id'=> config('membership.estate.umoja_bethel.id'),'age_cluster'=> config('membership.age_clusters.Middle_Age.id')])->get());
                            @endphp
                            {{$middle_age}}
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="card text-white mb-4"style="!important;background-color: greenyellow">
                        <div class="card-body">Adults</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            @php
                                $adults = count(\App\Models\User::where(['cell_group_id'=> config('membership.estate.umoja_bethel.id'),'age_cluster'=> config('membership.age_clusters.Adults.id')])->get());
                            @endphp
                            {{$adults}}
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cell_group kariobangi_south">
            <h3>{{config('membership.estate.kariobangi_south.text')}}</h3>
            <div class="row">
                <div class="col-xl-2 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">All Members</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            {{count(\App\Models\User::where('cell_group_id', config('membership.estate.kariobangi_south.id'))->get())}}
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div><div class="col-xl-2 col-md-6">
                    <div class="card text-white mb-4"style="!important;background-color: red">
                        <div class="card-body">Children</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            @php
                                $children = count(\App\Models\User::where(['cell_group_id' => config('membership.estate.kariobangi_south.id'), 'age_cluster'=> config('membership.age_clusters.Children.id')])->get());
                            @endphp
                            {{$children}}
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div><div class="col-xl-2 col-md-6">
                    <div class="card text-white mb-4"style="!important;background-color: orangered">
                        <div class="card-body">Teenies</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            @php
                                $teenies = count(\App\Models\User::where(['cell_group_id'=> config('membership.estate.kariobangi_south.id'), 'age_cluster'=> config('membership.age_clusters.Teenies.id')])->get());
                            @endphp
                            {{$teenies}}                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="card text-white mb-4"style="!important;background-color: orange">
                        <div class="card-body">Youths</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            @php
                                $youths = count(\App\Models\User::where(['cell_group_id'=> config('membership.estate.kariobangi_south.id'),'age_cluster'=> config('membership.age_clusters.Youths.id')])->get());
                            @endphp
                            {{$youths}}
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="card text-white mb-4"style="!important;background-color: yellowgreen">
                        <div class="card-body">Middle Age</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            @php
                                $middle_age = count(\App\Models\User::where(['cell_group_id'=> config('membership.estate.kariobangi_south.id'),'age_cluster'=> config('membership.age_clusters.Middle_Age.id')])->get());
                            @endphp
                            {{$middle_age}}
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="card text-white mb-4"style="!important;background-color: greenyellow">
                        <div class="card-body">Adults</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            @php
                                $adults = count(\App\Models\User::where(['cell_group_id'=> config('membership.estate.kariobangi_south.id'),'age_cluster'=> config('membership.age_clusters.Adults.id')])->get());
                            @endphp
                            {{$adults}}
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cell_group chokaa_berea">
            <h3>{{config('membership.estate.chokaa_berea.text')}}</h3>
            <div class="row">
                <div class="col-xl-2 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">All Members</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            {{count(\App\Models\User::where('cell_group_id', config('membership.estate.chokaa_berea.id'))->get())}}
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div><div class="col-xl-2 col-md-6">
                    <div class="card text-white mb-4"style="!important;background-color: red">
                        <div class="card-body">Children</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            @php
                                $children = count(\App\Models\User::where(['cell_group_id' => config('membership.estate.chokaa_berea.id'), 'age_cluster'=> config('membership.age_clusters.Children.id')])->get());
                            @endphp
                            {{$children}}
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div><div class="col-xl-2 col-md-6">
                    <div class="card text-white mb-4"style="!important;background-color: orangered">
                        <div class="card-body">Teenies</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            @php
                                $teenies = count(\App\Models\User::where(['cell_group_id'=> config('membership.estate.chokaa_berea.id'), 'age_cluster'=> config('membership.age_clusters.Teenies.id')])->get());
                            @endphp
                            {{$teenies}}                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="card text-white mb-4"style="!important;background-color: orange">
                        <div class="card-body">Youths</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            @php
                                $youths = count(\App\Models\User::where(['cell_group_id'=> config('membership.estate.chokaa_berea.id'),'age_cluster'=> config('membership.age_clusters.Youths.id')])->get());
                            @endphp
                            {{$youths}}
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="card text-white mb-4"style="!important;background-color: yellowgreen">
                        <div class="card-body">Middle Age</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            @php
                                $middle_age = count(\App\Models\User::where(['cell_group_id'=> config('membership.estate.chokaa_berea.id'),'age_cluster'=> config('membership.age_clusters.Middle_Age.id')])->get());
                            @endphp
                            {{$middle_age}}
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="card text-white mb-4"style="!important;background-color: greenyellow">
                        <div class="card-body">Adults</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            @php
                                $adults = count(\App\Models\User::where(['cell_group_id'=> config('membership.estate.chokaa_berea.id'),'age_cluster'=> config('membership.age_clusters.Adults.id')])->get());
                            @endphp
                            {{$adults}}
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cell_group diaspora">
            <h3>{{config('membership.estate.diaspora.text')}}</h3>
            <div class="row">
                <div class="col-xl-2 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">All Members</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            {{count(\App\Models\User::where('cell_group_id', config('membership.estate.diaspora.id'))->get())}}
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div><div class="col-xl-2 col-md-6">
                    <div class="card text-white mb-4"style="!important;background-color: red">
                        <div class="card-body">Children</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            @php
                                $children = count(\App\Models\User::where(['cell_group_id' => config('membership.estate.diaspora.id'), 'age_cluster'=> config('membership.age_clusters.Children.id')])->get());
                            @endphp
                            {{$children}}
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div><div class="col-xl-2 col-md-6">
                    <div class="card text-white mb-4"style="!important;background-color: orangered">
                        <div class="card-body">Teenies</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            @php
                                $teenies = count(\App\Models\User::where(['cell_group_id'=> config('membership.estate.diaspora.id'), 'age_cluster'=> config('membership.age_clusters.Teenies.id')])->get());
                            @endphp
                            {{$teenies}}                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="card text-white mb-4"style="!important;background-color: orange">
                        <div class="card-body">Youths</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            @php
                                $youths = count(\App\Models\User::where(['cell_group_id'=> config('membership.estate.diaspora.id'),'age_cluster'=> config('membership.age_clusters.Youths.id')])->get());
                            @endphp
                            {{$youths}}
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="card text-white mb-4"style="!important;background-color: yellowgreen">
                        <div class="card-body">Middle Age</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            @php
                                $middle_age = count(\App\Models\User::where(['cell_group_id'=> config('membership.estate.diaspora.id'),'age_cluster'=> config('membership.age_clusters.Middle_Age.id')])->get());
                            @endphp
                            {{$middle_age}}
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="card text-white mb-4"style="!important;background-color: greenyellow">
                        <div class="card-body">Adults</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            @php
                                $adults = count(\App\Models\User::where(['cell_group_id'=> config('membership.estate.diaspora.id'),'age_cluster'=> config('membership.age_clusters.Adults.id')])->get());
                            @endphp
                            {{$adults}}
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cell_group langata">
            <h3>{{config('membership.estate.langata.text')}}</h3>
            <div class="row">
                <div class="col-xl-2 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">All Members</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            {{count(\App\Models\User::where('cell_group_id', config('membership.estate.langata.id'))->get())}}
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div><div class="col-xl-2 col-md-6">
                    <div class="card text-white mb-4"style="!important;background-color: red">
                        <div class="card-body">Children</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            @php
                                $children = count(\App\Models\User::where(['cell_group_id' => config('membership.estate.langata.id'), 'age_cluster'=> config('membership.age_clusters.Children.id')])->get());
                            @endphp
                            {{$children}}
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div><div class="col-xl-2 col-md-6">
                    <div class="card text-white mb-4"style="!important;background-color: orangered">
                        <div class="card-body">Teenies</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            @php
                                $teenies = count(\App\Models\User::where(['cell_group_id'=> config('membership.estate.langata.id'), 'age_cluster'=> config('membership.age_clusters.Teenies.id')])->get());
                            @endphp
                            {{$teenies}}                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="card text-white mb-4"style="!important;background-color: orange">
                        <div class="card-body">Youths</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            @php
                                $youths = count(\App\Models\User::where(['cell_group_id'=> config('membership.estate.langata.id'),'age_cluster'=> config('membership.age_clusters.Youths.id')])->get());
                            @endphp
                            {{$youths}}
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="card text-white mb-4"style="!important;background-color: yellowgreen">
                        <div class="card-body">Middle Age</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            @php
                                $middle_age = count(\App\Models\User::where(['cell_group_id'=> config('membership.estate.langata.id'),'age_cluster'=> config('membership.age_clusters.Middle_Age.id')])->get());
                            @endphp
                            {{$middle_age}}
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="card text-white mb-4"style="!important;background-color: greenyellow">
                        <div class="card-body">Adults</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            @php
                                $adults = count(\App\Models\User::where(['cell_group_id'=> config('membership.estate.langata.id'),'age_cluster'=> config('membership.age_clusters.Adults.id')])->get());
                            @endphp
                            {{$adults}}
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cell_group Jericho">
            <h3>{{config('membership.estate.Jericho.text')}}</h3>
            <div class="row">
                <div class="col-xl-2 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">All Members</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            {{count(\App\Models\User::where('cell_group_id', config('membership.estate.Jericho.id'))->get())}}
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div><div class="col-xl-2 col-md-6">
                    <div class="card text-white mb-4"style="!important;background-color: red">
                        <div class="card-body">Children</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            @php
                                $children = count(\App\Models\User::where(['cell_group_id' => config('membership.estate.Jericho.id'), 'age_cluster'=> config('membership.age_clusters.Children.id')])->get());
                            @endphp
                            {{$children}}
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div><div class="col-xl-2 col-md-6">
                    <div class="card text-white mb-4"style="!important;background-color: orangered">
                        <div class="card-body">Teenies</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            @php
                                $teenies = count(\App\Models\User::where(['cell_group_id'=> config('membership.estate.Jericho.id'), 'age_cluster'=> config('membership.age_clusters.Teenies.id')])->get());
                            @endphp
                            {{$teenies}}                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="card text-white mb-4"style="!important;background-color: orange">
                        <div class="card-body">Youths</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            @php
                                $youths = count(\App\Models\User::where(['cell_group_id'=> config('membership.estate.Jericho.id'),'age_cluster'=> config('membership.age_clusters.Youths.id')])->get());
                            @endphp
                            {{$youths}}
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="card text-white mb-4"style="!important;background-color: yellowgreen">
                        <div class="card-body">Middle Age</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            @php
                                $middle_age = count(\App\Models\User::where(['cell_group_id'=> config('membership.estate.Jericho.id'),'age_cluster'=> config('membership.age_clusters.Middle_Age.id')])->get());
                            @endphp
                            {{$middle_age}}
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="card text-white mb-4"style="!important;background-color: greenyellow">
                        <div class="card-body">Adults</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            @php
                                $adults = count(\App\Models\User::where(['cell_group_id'=> config('membership.estate.Jericho.id'),'age_cluster'=> config('membership.age_clusters.Adults.id')])->get());
                            @endphp
                            {{$adults}}
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    $(document).ready(function(e) {

        $(".cell_group").hide(); //maybe is better to hide them by Css
        fadeInAll()
    });

    var delay = 500;



    //Show each div in sequence
    function fadeInAll(){
        $(".kiambiu").show(delay,function(){
            $(".umoja_bethel").show(delay,function(){
                $(".kariobangi_south").show(delay,function(){
                    $(".chokaa_berea").show(delay,function(){
                        $(".diaspora").show(delay,function(){
                            $(".langata").show(delay,function(){
                                $(".Jericho").show(delay,function(){
                                    fadeOutAll()
                                })
                            })
                        })
                    })
                })
            })
        })
    }

    //Hide each div in sequence
    function fadeOutAll(){
        $(".kiambiu").hide(delay,function(){
            $(".umoja_bethel").hide(delay,function(){
                $(".kariobangi_south").hide(delay,function(){
                    $(".chokaa_berea").hide(delay,function(){
                        $(".diaspora").hide(delay,function(){
                            $(".langata").hide(delay,function(){
                                $(".Jericho").hide(delay,function(){
                                    fadeInAll()
                                })
                            })
                        })
                    })
                })
            })
        })
    }</script>
