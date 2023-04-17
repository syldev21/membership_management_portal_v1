<tr>
    @foreach(config('membership.roles') as $role)

        <td>
            <input type="checkbox" class="check_box" id="check_box" name="check_box[]" value="{{$role['id']}}" data-role="" <?php $model_has_role=\App\Models\ModelHasRole::where('mode_id', 1)->where('role_id', $role['id'])->first();?> @if(isset($model_has_role)) checked @endif>
        </td>
    @endforeach

</tr>
