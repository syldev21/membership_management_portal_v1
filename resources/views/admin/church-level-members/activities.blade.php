
    <table id="dt_select" class="table table-striped table-bordered thead-dark" style="border-top: 1px solid #dddddd; border-bottom: 1px solid #dddddd ">
        <thead>
        <tr>
            <th>S/R</th>
            <th>Member</th>
            <th>Activity</th>
            <th>Time Elapsed</th>
        </tr>
        </thead>
        <tboby>
            @foreach($members as $notification)
                @php
                    $user = $notification->createdByUser;
                    $gender_id = $user->gender;
                    if ($gender_id == config('membership.gender.male.id')){
                       $possessive = 'His';
                   }else{
                       $possessive = 'Her';
                   }
                    $activity = config('membership.statuses.activities')[$notification->activity];
                    if ($notification->activity == 12){
                        $activity_refined = explode(' ', $activity)[0].' '.$possessive.' '.explode(' ', $activity)[1];
                    }elseif ($notification->activity == 2){
                        $activity_refined = $activity.' to '.$possessive.' Account';

                    }elseif ($notification->activity == 13){
                        $activity_refined = $activity.' from '.$possessive.' Account';
                    }
                    else{
                        $activity_refined = $activity;
                    }
                                @endphp
                <tr class="item{--><!--{$member->id}  text-black fw-bolder}">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$activity_refined}}</td>
                    <td>{{\Carbon\Carbon::parse($notification->created_at)->diffForHumans()}}</td>
                </tr>
            @endforeach
        </tboby>
    </table>