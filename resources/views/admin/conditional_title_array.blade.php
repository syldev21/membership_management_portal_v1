
<label  class="fw-bold" for="title">Title</label>
<select name="title"  id="title" class="form-select rounded-0 ">
    <option selected value="">--Select--</option>
    <?php
    $title_array = config('membership.title');
    ?>

    @if($email == 'voshburuburu@gmail.com')
            <?php
            $title_array = array_slice($title_array, -1);
            ?>
    @else
            <?php
            array_pop($title_array);
            ?>
    @endif

    @foreach($title_array as $title)
        <option value="{{$title['id']}}" >
            {{$title['text']}}</option>
    @endforeach
</select>
<div class="invalid-feedback"></div>
