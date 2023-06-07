@extends('layouts.master')
@section('title', 'Membership')
@section('content')
    <table>
        <thead>
        <tr>
            <th>Country</th>
            <th colspan="3">Names</th>
            <th>Email</th>
            <th>Age</th>
        </tr>
        <tr>
            <th></th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Surname</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>USA</td>
            <td>John</td>
            <td>Doe</td>
            <td>Smith</td>
            <td>john@example.com</td>
            <td>30</td>
        </tr>
        <tr>
            <td>Canada</td>
            <td>Jane</td>
            <td>Smith</td>
            <td>Johnson</td>
            <td>jane@example.com</td>
            <td>25</td>
        </tr>
        <tr>
            <td>Australia</td>
            <td>Mark</td>
            <td>Johnson</td>
            <td>Doe</td>
            <td>mark@example.com</td>
            <td>35</td>
        </tr>
        </tbody>
    </table>

@endsection
