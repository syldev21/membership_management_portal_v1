{{--@extends('layouts.master')--}}
{{--@section('title', 'Admin Dashboard')--}}
{{--@section('content')--}}

    <div class="table-responsive m-5" id="main">
        <h2 class="mb-4">{{in_array($category_name, config('membership.statuses.estate'))?$category_name. ' Members':$category_name}}</h2>
        <table id="dt_select" class="table table-striped table-bordered thead-dark mt-5 " cellspacing="0" width="100%" style="border-top: 1px solid #dddddd; border-bottom: 1px solid #dddddd ">
      <thead>
            <tr>
                <th>S/R</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Age</th>
                <th>Born Again</th>
                <th>Gender</th>
                <th>Marital Status</th>
                <th>Estate</th>
                <th>Cell Group</th>
                <th>Employment Status</th>
                <th>Leadership Status</th>
                <th>Occupation</th>
                <th>Ministry</th>
                <th>Ministries of Interest</th>
                <th>Level of Education</th>
                <th colspan="2">Actions</th>
            </tr>
      </thead>
        <tbody>
        </tbody>
      <tboby>
          @foreach($members as $member)
              <tr class="item{{$member->id}}">
                  <td>{{$loop->iteration}}</td>
                  <td>{{isset($member->name)?$member->name:''}}</td>
                  <td>{{isset($member->phone)?$member->phone:''}}</td>
                  <td>{{isset($member->dob)?\Illuminate\Support\Carbon::parse($member->dob)->age:''}}</td>
                  <td>{{isset($member->born_again_id)?config('membership.statuses.flag')[$member->born_again_id]:''}}</td>
                  <td>{{isset($member->gender)?config('membership.statuses.gender')[$member->gender]:''}}</td>
                  <td>{{isset($member->marital_status_id)?config('membership.statuses.marital_status')[$member->marital_status_id]:''}}</td>
                  <td>{{isset($member->estate_id)?config('membership.statuses.estate')[$member->estate_id]:''}}</td>
                  <td>{{isset($member->cell_group_id)?config('membership.statuses.estate')[$member->cell_group_id]:''}}</td>
                  <td>{{isset($member->employment_status_id)?config('membership.statuses.employment_status')[$member->employment_status_id]:''}}</td>
                  <td>{{isset($member->leadership_status_id)?config('membership.statuses.flag')[$member->leadership_status_id]:''}}</td>
                  <td>{{isset($member->occupation_id)?config('membership.statuses.occupation')[$member->occupation_id]:''}}</td>
                  <td>{{isset($member->ministry_id)?config('membership.statuses.ministry')[$member->ministry_id]:''}}</td>
                  <td>{{isset($ministries)?$ministries:''}}</td>
                  <td>{{isset($member->education_level_id)?config('membership.statuses.level_of_education')[$member->education_level_id]:''}}</td>
                  <td>
                      <button class="edit-modal btn btn-info"
                              data-info="{{$member->id}},{{$member->first_name}},{{$member->last_name}},{{$member->email}},{{$member->gender}},{{$member->country}},{{$member->salary}}">
                          <span class="glyphicon glyphicon-edit"></span> Edit
                      </button>
                  </td>
                  <td>

                      <button class="delete-modal btn btn-danger"
                              data-info="{{$member->id}},{{$member->first_name}},{{$member->last_name}},{{$member->email}},{{$member->gender}},{{$member->country}},{{$member->salary}}">
                          <span class="glyphicon glyphicon-trash"></span> Delete
                      </button></td>
              </tr>
          @endforeach
      </tboby>
{{--      <tfoot>--}}
{{--      <th>S/R</th>--}}
{{--      <th>Name</th>--}}
{{--      --}}{{--                <th>Email</th>--}}
{{--      <th>Phone</th>--}}
{{--      <th>Age</th>--}}
{{--      <th>Born Again</th>--}}
{{--      <th>Gender</th>--}}
{{--      <th>Marital Status</th>--}}
{{--      <th>Estate</th>--}}
{{--      <th>Cell Group</th>--}}
{{--      <th>Employment Status</th>--}}
{{--      <th>Leadership Status</th>--}}
{{--      <th>Occupation</th>--}}
{{--      <th>Ministry</th>--}}
{{--      <th>Level of Education</th>--}}
{{--      <th colspan="2">Actions</th>--}}
{{--      </tfoot>--}}
    </table>
    </div>

{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            // $('#dt_select').DataTable();--}}
{{--        })--}}
{{--    </script>--}}
