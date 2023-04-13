<div class="table table-responsive m-2" id="main">
    <table id="dt_select" class="table table-striped table-bordered thead-dark" style="border-top: 1px solid #dddddd; border-bottom: 1px solid #dddddd ">
        <thead>
        <tr>
            <th>S/R</th>
            <th>User Name</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Age</th>
            <th>Born Again</th>
            <th>Gender</th>
            <th>Marital Status</th>
            <th>Residence</th>
            <th class="conditional_show" data-id="{{in_array($category_name, config('membership.statuses.cell_group')) ?? false}}">Cell Group</th>
            <th>Employment Status</th>
            <th>Leadership Status</th>
            <th>Occupation</th>
            <th>Ministries of Interest</th>
            <th>Level of Education</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tboby>
            @foreach($members as $member)
                    <?php
                    if($member->ministries_of_interest == null){
                        $ministries = 'none';
                    }else{
                        if (strpos($member->ministries_of_interest, ',') == true){

                            $ministry_string_array = explode(' ', str_replace(',', ' ', $member->ministries_of_interest));
                            $ministry_name_array = [];
                            foreach ($ministry_string_array as $ministry_id){
                                $ministry_name = config('membership.statuses.ministry')[$ministry_id];
                                array_push($ministry_name_array, $ministry_name);
                            }

                            $ministries = implode(',', $ministry_name_array);
                        }else{
                            $ministries = config('membership.statuses.ministry')[$member->ministries_of_interest];
                        }
                    }



                    if (isset($member->marital_status_id)){
                        $marital_status_id = is_numeric($member->marital_status_id)?config('membership.statuses.marital_status')[$member->marital_status_id] : $member->marital_status_id;
                    }
                    if (isset($member->employment_status_id)){
                        $employment_status_id = is_numeric($member->employment_status_id)?config('membership.statuses.employment_status')[$member->employment_status_id] : $member->marital_status_id;
                    }
                    if (isset($member->occupation_id)){
                        $occupation_id = is_numeric($member->occupation_id)?config('membership.statuses.occupation')[$member->occupation_id] : $member->marital_status_id;
                    }


                    ?>
                <tr class="item{{$member->id}}">
                    <td>{{$loop->iteration}}</td>
                    <td>{{isset($member->user_name)?$member->user_name:''}}</td>
                    <td>{{isset($member->name)?$member->name:''}}</td>
                    <td>{{isset($member->phone)?$member->phone:''}}</td>
                    <td>{{isset($member->dob)?\Illuminate\Support\Carbon::parse($member->dob)->age:''}}</td>
                    <td>{{isset($member->born_again_id)?config('membership.statuses.flag')[$member->born_again_id]:''}}</td>
                    <td>{{isset($member->gender)?config('membership.statuses.gender')[$member->gender]:''}}</td>
                    <td>{{isset($marital_status_id)?$marital_status_id:''}}</td>
                    <td>{{isset($member->estate_id) ? config('membership.statuses.sub_county')[$member->estate_id]['text'] : ''}}</td>
                    <td class="conditional_show" data-id="{{in_array($category_name, config('membership.statuses.cell_group')) ?? false}}">{{isset($member->cell_group_id)?config('membership.statuses.cell_group')[$member->cell_group_id]:''}}</td>
                    <td>{{isset($employment_status_id)?$employment_status_id:''}}</td>
                    <td>{{isset($member->leadership_status_id)?config('membership.statuses.flag')[$member->leadership_status_id]:''}}</td>
                    <td>{{isset($occupation_id)?$occupation_id:''}}</td>
                    <td>{{isset($ministries)?$ministries:''}}</td>
                    <td>{{isset($member->education_level_id)?config('membership.statuses.level_of_education')[$member->education_level_id]:''}}</td>
                    <td>
                        <select id="" name="" class="browser-default">
                            <option data-id="{{$member->id}}" data-user_name="{{$member->name}}" data-user_email="{{$member->email}}"  data-user_phone="{{$member->phone}}" id="edit" value="{{$member->id}}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
                                Edit
                            </option>
                            <option data-id="{{$member->id}}"  data-hide="{{auth()->id()}}" data-user_name="{{$member->name}}" id="delete" value="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</option>
                            <option data-id="{{$member->id}}" data-hide="{{auth()->id()}}" data-user_name="{{$member->name}}" id="deactivate" value="{{$member->id}}" class="user_status" data-bs-toggle="modal" data-bs-target="#activateModal">
                                @if($member->active == null)
                                    Activate

                                @else
                                    Deactivate
                                @endif
                            </option>
                        </select>
                    </td>
                </tr>
            @endforeach
        </tboby>
        <tfoot>
        <tr>
            <th>S/R</th>
            <th>User Name</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Age</th>
            <th>Born Again</th>
            <th>Gender</th>
            <th>Marital Status</th>
            <th>Residence</th>
            <th class="conditional_show" data-id="{{in_array($category_name, config('membership.statuses.cell_group')) ?? false}}">Cell Group</th>
            <th>Employment Status</th>
            <th>Leadership Status</th>
            <th>Occupation</th>
            <th>Ministries of Interest</th>
            <th>Level of Education</th>
            <th>Actions</th>
        </tr>
        </tfoot>
    </table>
</div>
