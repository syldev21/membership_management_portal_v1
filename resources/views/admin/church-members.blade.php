<h2 class="mb-4">{{in_array($category_name, config('membership.statuses.estate'))?$category_name. ' Cell Group Members':$category_name}}</h2>
<div class="table table-responsive m-2" id="main">
    <table id="dt_select" class="table table-striped table-bordered thead-dark" style="border-top: 1px solid #dddddd; border-bottom: 1px solid #dddddd ">
      <thead>
            <tr>
                <th>S/R</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Age</th>
                <th>Born Again</th>
                <th>Gender</th>
                <th>Marital Status</th>
                <th>Cell Group</th>
                <th>Employment Status</th>
                <th>Leadership Status</th>
                <th>Occupation</th>
                <th>Ministries of Interest</th>
                <th>Level of Education</th>
                <th colspan="2">Actions</th>
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
                  ?>
              <tr class="item{{$member->id}}">
                  <td>{{$loop->iteration}}</td>
                  <td>{{isset($member->name)?$member->name:''}}</td>
                  <td>{{isset($member->phone)?$member->phone:''}}</td>
                  <td>{{isset($member->dob)?\Illuminate\Support\Carbon::parse($member->dob)->age:''}}</td>
                  <td>{{isset($member->born_again_id)?config('membership.statuses.flag')[$member->born_again_id]:''}}</td>
                  <td>{{isset($member->gender)?config('membership.statuses.gender')[$member->gender]:''}}</td>
                  <td>{{isset($member->marital_status_id)?config('membership.statuses.marital_status')[$member->marital_status_id]:''}}</td>
                  <td>{{isset($member->cell_group_id)?config('membership.statuses.estate')[$member->cell_group_id]:''}}</td>
                  <td>{{isset($member->employment_status_id)?config('membership.statuses.employment_status')[$member->employment_status_id]:''}}</td>
                  <td>{{isset($member->leadership_status_id)?config('membership.statuses.flag')[$member->leadership_status_id]:''}}</td>
                  <td>{{isset($member->occupation_id)?config('membership.statuses.occupation')[$member->occupation_id]:''}}</td>
                  <td>{{isset($ministries)?$ministries:''}}</td>
                  <td>{{isset($member->education_level_id)?config('membership.statuses.level_of_education')[$member->education_level_id]:''}}</td>
                  <td>
                      <a href="" class="btn btn-success edit-member" data-id="{{$member->id}}">Edit</a>
                  </td>
                  <td>
                      <a href="" class="btn btn-danger delete-member" data-id="{{$member->id}}">Delete</a>
                  </td>
              </tr>
          @endforeach
      </tboby>
            <tfoot>
                <tr>
                    <th>S/R</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Age</th>
                    <th>Born Again</th>
                    <th>Gender</th>
                    <th>Marital Status</th>
                    <th>Cell Group</th>
                    <th>Employment Status</th>
                    <th>Leadership Status</th>
                    <th>Occupation</th>
                    <th>Ministries of Interest</th>
                    <th>Level of Education</th>
                    <th colspan="2">Actions</th>
                </tr>
            </tfoot>
    </table>
    </div>
    <script>
        $(document).on('click', '.edit-member', function (e) {
            e.preventDefault();
            let member_id = $(this).data('id')

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/edit-member',
                method: 'post',
                data: {
                    member_id:member_id,
                },
                success: function (res) {
                    $('#main').html(res)
                    // window.location = '/profile';
                }
            })
        })
    </script>
