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
})
