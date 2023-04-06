<h2 class="mb-4">{{in_array($category_name, config('membership.statuses.cell_group'))?$category_name. ' Cell Group Members':$category_name}}</h2>
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
                          <option data-id="{{$member->id}}" id="edit" value="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Edit
                          </option>
                          <option data-id="{{$member->id}}"  data-user="" id="assignRole" value="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</option>
                          <option data-id="{{$member->id}}" id="fetchPermissions" value="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#activateModal">
                              @if($member->dob)
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

<!-- Edit Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                        <div id="profile_alert"></div>
                        <div class="row">

                                <?php

                                $loggedInUser = auth()->user();


                                ?>

                            <input type="hidden" name="user_id" id="user_id" value="{{(isset($userInfo)) ? $userInfo->id : ((isset($loggedInUser))  ? $loggedInUser->id : '')}}">
                            <div class="col-lg-12 px-5">
                                <form action="#" method="POST" id="profile_form" class="accordion-flush">
                                    @csrf

                                    <meta name="csrf-token" content="{{ csrf_token() }}" />
                                    <div class="my-2">
                                        <label  class="fw-bold"  for="name">Full Name</label>
                                        <input type="text" name="name" class="form-control rounded-0 " id="name" value="{{isset(auth()->user()->name)?auth()->user()->name:''}}">
                                    </div>
                                    <div class="my-2">
                                        <label  class="fw-bold" for="name">Email</label>
                                        <input type="email" name="email" class="form-control rounded-0 " id="email" value="{{isset(auth()->user()->email)?auth()->user()->email:''}}">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg">
                                            <label  class="fw-bold" for="gender">Gender</label>
                                            <select name="gender"  id="gender" class="form-select rounded-0 ">
                                                <option selected disabled>--Select</option>
                                                @foreach(config('membership.gender') as $gender)
                                                    <option value="{{$gender['id']}}" >
                                                        {{$gender['text']}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col-lg"  >
                                            <label  class="fw-bold" for="dob" class="">Date of Birth</label>
                                            <input type="date"  name="dob" class="form-control rounded-0 " id="dob" value="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg">
                                            <label  class="fw-bold hide-status" for="phone">Phone</label>
                                            <input type="tel"   name="phone" class="form-control rounded-0  hide-status hide-field" id="phone" value="{{isset(auth()->user()->phone)?auth()->user()->phone:''}}">
                                        </div>
                                        <div class="col-lg">
                                            <label  class="fw-bold hide-status" for="marital_status">Marital Status</label>
                                            <select  name="marital_status" id="marital_status" class="form-select rounded-0  hide-status hide-field">
                                                <option selected disabled>--Select</option>
                                                @foreach(config('membership.marital_status') as $marital_status)
                                                    <option value="{{$marital_status['id']}}" >
                                                        {{$marital_status['text']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg">
                                            <label  class="fw-bold" for="cell_group">Estate</label>
                                            <select  name="cell_group" id="cell_group" class="form-select rounded-0 ">
                                                <option selected disabled>--Select</option>
                                                @foreach(config('membership.cell_group') as $cell_group)
                                                    <option value="{{$cell_group['id']}}" >
                                                        {{$cell_group['text']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg">
                                            <label  class="fw-bold" for="cell_group">Cell Group</label>
                                            <select  name="cell_group" id="cell_group" class="form-select rounded-0 ">
                                                <option selected disabled>--Select</option>
                                                @foreach(config('membership.cell_group') as $cell_group)
                                                    <option value="{{$cell_group['id']}}" >
                                                        {{$cell_group['text']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg">
                                            <label  class="fw-bold" for="education_level">Level of Education</label>
                                            <select  name="education_level" id="education_level" class="form-select rounded-0 ">
                                                <option selected disabled>--Select</option>
                                                @foreach(config('membership.level_of_education') as $level_of_education)
                                                    <option value="{{$level_of_education['id']}}" >
                                                        {{$level_of_education['text']}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-lg">
                                            <label  class="fw-bold" for="born_again">Born Again</label>
                                            <select  name="born_again" id="born_again" class="form-select rounded-0 ">
                                                <option selected disabled>--Select</option>
                                                @foreach(config('membership.flag') as $flag)
                                                    <option value="{{$flag['id']}}" >
                                                        {{$flag['text']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg">
                                            <label  class="fw-bold" for="leadership_status">In Leadership?</label>
                                            <select  name="leadership_status" id="leadership_status" class="form-select rounded-0 ">
                                                <option selected disabled>--Select</option>
                                                @foreach(config('membership.flag') as $flag)
                                                    <option value="{{$flag['id']}}" >
                                                        {{$flag['text']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg" >
                                            <label  class="fw-bold" for="ministry">Current Ministry</label>
                                            <select  name="ministry" id="ministry" class="form-select rounded-0 ">
                                                <option selected disabled>--Select</option>
                                                @foreach(config('membership.ministry') as $ministry)
                                                    <option value="{{$ministry['id']}}" >
                                                        {{$ministry['text']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row " >
                                        <label  class="fw-bold" for="leadership_status">Current Ministry/ Ministry of Interest (Tick all the applicable options)</label>
                                        @foreach(config('membership.ministry') as $ministry)
                                            <div class="form-check col-lg">
                                                <input type="checkbox" class="check_box" id="check_box" name="check_box[]" value="{{$ministry['id']}}">
                                                <label  class="" class="form-check-label" for="check1">{{$ministry['text']}}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="row">
                                        <div class="col-lg">
                                            <label  class="fw-bold hide-status" for="occupation">Occupation/Specialization</label>
                                            <select  name="occupation" id="occupation" class="form-select rounded-0  hide-status hide-field">
                                                <option selected disabled>--Select</option>
                                                @foreach(config('membership.occupation') as $occupation)
                                                    <option value="{{$occupation['id']}}" >
                                                        {{$occupation['text']}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-lg">
                                            <label  class="fw-bold hide-status" for="employment_status">Employment Status</label>
                                            <select  name="employment_status" id="employment_status" class="form-select rounded-0  hide-status hide-field">
                                                <option selected disabled>--Select</option>
                                                @foreach(config('membership.employment_status') as $employment_status)
                                                    <option value="{{$employment_status['id']}}" >
                                                        {{$employment_status['text']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

{{--Delete Modal--}}

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Lyddia Gathoni</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="my-2">
                        <label  class="fw-bold hide-status" for="occupation">Reason for Deletion</label>
                        <select  name="occupation" id="occupation" class="form-select rounded-0  hide-status hide-field">
                            <option selected disabled>--Select</option>
                            @foreach(config('membership.occupation') as $occupation)
                                <option value="{{$occupation['id']}}" >
                                    {{$occupation['text']}}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>

{{--Activate Modal--}}

<div class="modal fade" id="activateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Activate Lyddia Gathoni</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="switch1">
                            <label class="custom-control-label" for="switch1">Toggle me</label>
                        </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn bg-warning">Activate</button>
            </div>
        </div>
    </div>
</div>
    <script>
        $(document).ready( function () {
            $('.conditional_show').data('id')==true ? $('.conditional_show').hide() : $('.conditional_show').show()
        })
    </script>
