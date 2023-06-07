@extends('layouts.master')
@section('title', 'Membership')
@section('content')
    <form>
    <div class="form-group">
        <label for="country">Country:</label>
        <div class="input-group">
            <div class="input-group-prepend">
            <span class="input-group-text">
                <img src="{{ asset('images/country_flag/kenya.jpg')}}" alt="Kenya Flag">
            </span>
            </div>
            <input type="text" id="country-code" class="form-control" value="+254" readonly>
            <input type="text" id="phone-number" name="phone_number" class="form-control" placeholder="Enter phone number">
        </div>
    </div>
</form>
@endsection
