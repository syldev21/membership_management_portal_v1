   @foreach(config('membership.roles') as $role)
        <td>
            <input type="radio" class="radio_button" id="role_{{$role['id']}}" name="role_id" value="{{$role['id']}}" data-role="" {{\App\Models\User::find($id)->hasRole($role['text']) ? 'checked' : ''}}>
        </td>
    @endforeach
    <td></td>
