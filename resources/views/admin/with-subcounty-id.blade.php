
<label  class="fw-bold" for="ward">Ward</label>
<select name="ward" id="ward" class="form-select rounded-0 profile_edit">
    <option selected disabled>--Select</option>

    @foreach(config('membership.statuses.sub_county')[$sub_county]['wards'] as $ward)
        <option value="{{$ward['id']}}">{{$ward['text']}}</option>
    @endforeach
</select>
