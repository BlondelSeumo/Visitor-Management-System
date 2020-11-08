/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */
"use strict";

$(document).ready(function() {
    $('#addPeople').click(function() {
        var error         = 0;
       var name      = $('#people_name').val();
        var email   = $('#people_email').val();
        console.log(name);
        if(name == '') {
            error++;
            $('#people-name-div').addClass('text-danger');
            $('#people_name').addClass('is-invalid');
        } else {
                $('#people-name-div').removeClass('text-danger');
                $('#people_name').removeClass('is-invalid');
        }
        if(email == '') {
            error++;
            $('#people-email-div').addClass('text-danger');
            $('#people_email').addClass('is-invalid');
        } else {
                $('#people-email-div').removeClass('text-danger');
                $('#people_email').removeClass('is-invalid');
        }


        if(error == 0) {
            document.getElementById("people_name").value ='';
            document.getElementById("people_email").value ='';

            var appendData = groupItemDesign(name, email);
            $('#GroupList').append(appendData);
        }
    });

    function groupItemDesign(name, email, trCount = 0)
    {
        if(trCount == 0) {
            trCount   = $("#GroupList").children().length;
            trCount++;
        }

       var counter = parseInt($('#counter').val());
        console.log(counter);
        counter++;
        document.getElementById("counter").value =counter;

        var text = '<tr id="tr_'+trCount+'" trID="'+trCount+'">';
        text += '<td>';
        text += trCount;
        text += '</td>';

        text += '<td id="name_'+trCount+'">';
        text += name;
        text += '<input name="name_'+trCount+'" style="display:none" type="text" value="'+name+'">';
        text += '</td>';

        text += '<td id="email_'+trCount+'">';
        text += email;
        text += '<input name="email_'+trCount+'" style="display:none" type="text" value="'+email+'">';
        text += '</td>';

        text += '<td>';
        text += '<button type="button" class="btn btn-danger btn-sm btn-group-delete" id="'+trCount+'" style="padding:1px 3px;font-size:14px">';
        text += '<i class="fa fa-trash-o"></i>';
        text += '</button>';
        text += '</td>';
        text += '</tr>';

        return text;
    }

    $(document).on('click', '.btn-group-delete', function() {
       var id                = parseInt($(this).attr('id'));
       var nameArray     = [];
        var emailArray  = [];
       var trCount           = $("#GroupList").children().length;

        for(var j = 1; j <= trCount; j++) {
            nameArray[j]    = $('#name_'+j).text();
            emailArray[j] = $('#email_'+j).text();
        }

        $("#GroupList").children().remove();
        $('#counter').val(0);
        var k = 1;
        for(var i = 1; i <= trCount; i++) {
            if(id !== i) {
                $('#GroupList').append(groupItemDesign(nameArray[i], emailArray[i], k));
                k++;
            }
        }
    });
    $('#GroupShow').hide();

});
function showGroup(val)
{
    if(val.value=='5'){
        $('#GroupShow').show();
    }else {
        $('#GroupShow').hide();
    }
}
function getEmployee(dID) {
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: '/bookings/department/employee',
        type:'get',
        data:{department: dID},
        dataType:'JSON',
        success:function(res) {
            $('#employeeList').html(res.employee);
            if(res.employeeID){
                getEmployeeProfile(res.employeeID);
            }
        },
        error:function(err) {
            console.log(err);

        }
    });
}

function getEmployeeProfile(EID) {
    document.getElementById("employeeID").value =EID;
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: '/bookings/department/employee/profile',
        type:'get',
        data:{employee: EID},
        dataType:'JSON',
        success:function(res) {
            $('#employeeProfile').html(res.profile);
        },
        error:function(err) {
            console.log(err);

        }
    });
}

