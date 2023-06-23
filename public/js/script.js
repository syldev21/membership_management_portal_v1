$(document).ready(function () {
    var input = document.querySelector("#phone");
    var iti = window.intlTelInput(input, {
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.min.js"
    });

    var countryCodeInput = document.querySelector("#country_code");
    countryCodeInput.addEventListener("change", function () {
        var countryCode = this.value;
        input.setAttribute("data-country_code", countryCode);
        iti.setCountry(countryCode);
    });

    // Import DataTables CSS and JavaScript CDN links dynamically
    $.getScript("https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js", function () {
        $.getScript("https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js", function () {
            $.getScript("https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js", function () {
                $.getScript("https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js", function () {
                    $('<link>')
                        .appendTo('head')
                        .attr({
                            type: 'text/css',
                            rel: 'stylesheet',
                            href: 'https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css'
                        });

                    // Inside the callback functions, DataTables and buttons libraries are loaded and ready to use
                    $('.church-members, .cell_group_members, .progressive-registration, #priviledged_users').click(function (e) {
                        e.preventDefault();
                        let member_category = $(this).data('id');
                        let category = $(this).attr('class');
                        let category_name = $(this).text();
                        let registration_progress_id = $(this).data('id');
                        let class_name = $(this).attr('class');
                        let priviledged_id = $(this).attr('id');
                        let gender_cell = $(this).data('gender_cell');

                        let column_filter = $(this).data('column_filter')
                        // alert([member_category, category, category_name, registration_progress_id, class_name, priviledged_id, gender_cell, column_filter])
                        // alert(column_filter==1)

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
                                $('#dashboar').html(data);


                                var buttons = [
                                    'copy', 'csv', 'excel', 'pdf', 'print'
                                ];

                                var tableOptions = {
                                    responsive: true,
                                    dom: 'lBfrtip',
                                    buttons: buttons,
                                    // pageLength: 6, // Set the number of records per page
                                    columns: [
                                        { visible: false }, // hide the first column
                                        // { visible: false }, // Show the second column
                                        null, // Show the third column
                                        null, // Show the third column
                                        null, // Show the fourth column
                                        null, // Show the fifth column
                                        null, // Show the sixth column
                                        null, // Show the sixth column
                                        null, // Show the seventh column
                                        null, // Show the eigth column
                                        null, // Show the nineth column
                                        null, // Show the tenth column
                                        null, // Show the 11th column
                                        null, // Show the 12th column
                                        null, // Show the 13th column
                                        null, // Show the 14th column
                                        null, // Show the 15th column
                                        null, // Show the 16th column
                                        null, // Show the 17th column
                                        // Add more null values for additional visible columns
                                    ],
                                    select: {
                                        style: 'multi', // Allow multiple row selection
                                    },
                                    order: [], // Disable initial sorting
                                    searching: true,
                                };

                                if (column_filter != 1) {
                                    // tableOptions.pageLength = 8; // Set the number of records per page
                                    tableOptions.columns = [
                                        { visible: false }, // Show the 1st column
                                        null, // Show the 2nd column
                                        null, // Show the 3rd column
                                        null, // Show the 4th column
                                        null, // Show the 5th column
                                        null, // Show the 6th column
                                        null, // Show the 7th column
                                        null, // Show the 8th column
                                        null, // Show the 9th column
                                        null, // Show the 10th column
                                        null, // Show the 11th column
                                        null, // Show the 12th column
                                        null, // Show the 12th column
                                        null, // Show the 15th column
                                        null, // Show the 16th column
                                        null, // Show the 17th column
                                        { visible: false }, // Show the 18th column
                                        { visible: false }, // Show the 19th column
                                        { visible: false }, // Show the 20th column
                                        { visible: false }, // Show the 21st column
                                        { visible: false }, // Show the 22nd column
                                        null, // Show the 23rd column
                                    ];
                                }
                                var table = $('#dt_select').DataTable(tableOptions);
                                // Show all columns when exporting
                                table.buttons().container()
                                    .appendTo('#dt_select_wrapper .col-md-6:eq(0)');
                                // Set the current pageLength value in the length menu
                                $('.dataTables_length select').val(table.page.len());
                            }
                        });
                    });
                });
            });
        });
    });
});
