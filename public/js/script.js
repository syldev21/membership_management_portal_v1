$(document).ready(function () {



$('.church-members, .cell_group_members, .progressive-registration, #priviledged_users').click(function (e) {

    e.preventDefault();
    let member_category = $(this).data('id');
    let category = $(this).attr('class')
    let category_name = $(this).text();
    let registration_progress_id = $(this).data('id')
    let class_name = $(this).attr('class')
    let priviledged_id = $(this).attr('id')
    let gender_cell = $(this).data('gender_cell')
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/main-church-members',
        data: {
            member_category: member_category,
            category: category,
            category_name: category_name,
            progressive_registration: registration_progress_id,
            class_name: class_name,
            priviledged_id: priviledged_id,
            gender_cell: gender_cell,
        },
        success: function (data) {
            $('#dashboar').html(data)
            $('#dt_select').DataTable({
                responsive: true,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        }
    })
})
//     $.ajaxSetup({
//
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });
//
//     $('#dt_select').DataTable({
//         processing: true,
//         serverSide: true,
//         ajax: "{{ route('members.index}}",
//         columns: [
//             {data: 'id'},
//             {data: 'name'},
//             // {data: 'email'},
//             {data: 'phone'},
//             {data: 'dob'},
//             {data: 'born_again_id'},
//             {data: 'gender'},
//             {data: 'marital_status_id'},
//             {data: 'estate_id'},
//             {data: 'cell_group_id'},
//             {data: 'employment_status_id'},
//             {data: 'leadership_status_id'},
//             {data: 'occupation_id'},
//             {data: 'ministry_id'},
//             {data: 'education_level_id'},
//             {data: 'role_as'},
//             {data: 'action'},
//         ]
//     });
// //
    // $('.church-members').click(function (e) {
    //     e.preventDefault();
    //     $member_cluster = $(this).data("id");
    //     $.ajax({
    //         url: '/main-church-members',
    //         method: 'GET',
    //         data: $member_cluster,
    //         dataType: 'json',
    //         success: function (response) {
    //
    //             $("#main").html(response);
    //             var data = '';
    //             $.each(response, function (key, value) {
    //                 data = data+ "<tr>"
    //                 data = data + "<td>"+value.id+"</td>"
    //                 data = data  + "<td>"+value.name+"</td>"
    //                 data = data  + "<td>"+value.email+"</td>"
    //                 data = data  + "<td>"+value.phone+"</td>"
    //                 data = data  + "<td>"+value.dob+"</td>"
    //                 data = data  + "<td>"+value.born_again_id+"</td>"
    //                 data = data  + "<td>"+value.gender+"</td>"
    //                 data = data  + "<td>"+value.marital_status_id+"</td>"
    //                 data = data  + "<td>"+value.estate_id+"</td>"
    //                 data = data  + "<td>"+value.cell_group_id+"</td>"
    //                 data = data  + "<td>"+value.employment_status_id+"</td>"
    //                 data = data  + "<td>"+value.leadership_status_id+"</td>"
    //                 data = data  + "<td>"+value.occupation_id+"</td>"
    //                 data = data  + "<td>"+value.ministry_id+"</td>"
    //                 data = data  + "<td>"+value.education_level_id+"</td>"
    //                 data = data  + "<td>"+value.role_as+"</td>"
    //                 data = data  + "<td>"
    //                 data = data  + "<button class='btn btn-sm btn-primary mr-2'>Edit</button>"
    //                 data = data  + "<button class='btn btn-sm btn-danger mr-2'>Delete</button>"
    //                 data = data  + "</td>"
    //                 data = data + "</tr>"
    //             })
    //             // $('tboby').html(data)
    //         }
    //     })
    //
    // })
    // fetchMainChurchMember();
    // function fetchMainChurchMember(){
    //     $.ajax({
    //         type: 'GET',
    //         url: 'main-church-members',
    //         dataType: 'json',
    //         success: function (response) {
    //             $('tbody').html("");
    //             $.each(response.members, function (key, member) {
    //                 $('tbody').append(
    //                     '<tr>\
    //                         <td>'+member.id+'</td>\
    //                         <td>'+member.name+'</td>\
    //                         <td>'+member.phone+'</td>\
    //                         <td>'+member.dob+'</td>\
    //                         <td>'+member.born_again_id+'</td>\
    //                         <td>'+member.gender+'</td>\
    //                         <td>'+member.marital_status_id+'</td>\
    //                         <td>'+member.estate_id+'</td>\
    //                         <td>'+member.cell_group_id+'</td>\
    //                         <td>'+member.employment_status_id+'</td>\
    //                         <td>'+member.leadership_status_id+'</td>\
    //                         <td>'+member.occupation_id+'</td>\
    //                         <td>'+member.ministry_id+'</td>\
    //                         <td>'+member.education_level_id+'</td>\
    //                         <td type="button" value="'+member.id+'" class="edit_student btn btn-primary btn-sm"><button>Edit</button></td>\
    //                         <td type="button" value="'+member.id+'" class="edit_student btn btn-danger btn-sm"><button>Edit</button></td>\<' +
    //                     '/tr>'
    //                 );
    //                 $('tboby').html(data)
    //             })
    //         }
    //     })
    // }

})
