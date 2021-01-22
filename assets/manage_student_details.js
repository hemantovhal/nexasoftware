$(document).ready(function () {
    get_all_records();
    $('#stud_info').validate({
        messages: {
            firstname: {
                required: "Please provide a first name",
                minlength: "Your name must be at least 3 characters long"
            },
            lastname: {
                required: "Please provide a last name",
                minlength: "Your name must be at least 3 characters long"
            },
            email: {
                required: "Please enter a email address",
                email: "Please enter a vaild email address"
            },
            dateofbirth: {
                required: "Please provide a date of birth",
            },
            mobile: {
                required: "Please provide a mobile number",
                minlength: "Your mobile must be at least 10 characters long",
                maxlength: "Your mobile must be 10 characters long"
            },
            designation: {
                required: "Please provide a designation"
            },
            gender: "Please select gender"
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
});

function get_all_records() {
    $.ajax({
        url: base_url + 'Student_Controller/get_all_records',
        method: "POST",
        success: function (response) {
            var result = JSON.parse(response);
            $('#refresh tbody').html(result);
        }
    });
}

$('#stud_info').submit(function (e) {
    e.preventDefault();
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    if ($('#stud_info').valid()) {
        $.ajax({
            type: 'POST',
            url: base_url + 'Student_Controller/set_student_details',
            data: $('#stud_info').serialize(),
            success: function (res) {
                if (res == 0) {
                    Toast.fire({
                        icon: 'warning',
                        title: ' Someting went wrong!'
                    });
                } else if (res == 1) {
                    Toast.fire({
                        icon: 'success',
                        title: ' Data saved!'
                    }).then((value) => {
                        $('#stud_info').trigger("reset");
                        get_all_records();
                    });
                } else if (res == 2) {
                    Toast.fire({
                        icon: 'success',
                        title: ' Data Updated!'
                    }).then((value) => {
                        //location.reload();
                        get_all_records();
                    });
                }
            },
            error: function (res) {
                Toast.fire({
                    icon: 'error',
                    title: ' Please Contact Admin!'
                });
            }
        });
    }
});

//delete client record
$("#refresh").on('click', '.deleteStudent', function () {
    let id = $(this).parents("tr").attr("id");
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: base_url + "Student_Controller/delete_student_details",
                data: {
                    "id": id
                },
                success: function (res) {
                    if (res == 0) {
                        swalWithBootstrapButtons.fire(
                            'Not Deleted!',
                            'Someting went wrong!',
                            'warning'
                        )
                    } else if (res == 1) {
                        swalWithBootstrapButtons.fire(
                            'Deleted!',
                            'Student detail has been deleted.',
                            'success'
                        )
                        $("#" + id).remove();
                    } else if (res == 2) {
                        swalWithBootstrapButtons.fire(
                            'Invalid!',
                            'Invalid Student ID.',
                            'error'
                        )
                    }
                },
                error: function (res) {
                    swalWithBootstrapButtons.fire(
                        'Deleted!',
                        'Please Contact Admin!',
                        'error'
                    )
                }
            });
        }
    });
});
