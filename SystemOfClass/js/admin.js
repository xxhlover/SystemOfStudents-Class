$('#addclass').click(function() {
    /* Act on the event */
    var $classname = $('#classname').val();
    if(!$classname){
        $('#classname').next('.err').html('班级名称必填！');
        return ;
    }

    var $classdesc = $('#classdesc').val();

    $.ajax({
        url: './addclasssubmit.php',
        type: 'POST',
        dataType: 'json',
        data: {classname: $classname, classdesc:$classdesc},
        success:function (data) {
            /* body... */
            console.log(data);
        }
    });
    window.location.href='index.php';
});


$('#addstudent').click(function () {
    /* body... */
    //检查必填信息是否填写，自己下来补充
    //
    $.ajax({
        url: './addstudentsubmit.php',
        type: 'POST',
        dataType: 'json',
        data: $('#addform').serialize(),
        success:function (data) {
            /* body... */


        }
    });
    window.location.href='students.php';
});



$('#updatestudent').click(function () {
    /* body... */
    //检查必填信息是否填写，自己下来补充
    //
    $.ajax({
        url: './updatestudentsubmit.php',
        type: 'POST',
        dataType: 'json',
        data: $('#updateform').serialize(),
        success:function (data) {
            /* body... */


        }
    });
//  window.location.href='students.php';
});

$('#updatesclass').click(function () {
    /* body... */
    //检查必填信息是否填写，自己下来补充
    //
    $.ajax({
        url: './updatesclasssubmit.php',
        type: 'POST',
        dataType: 'json',
        data: $('#updateclassform').serialize(),
        success:function (data) {
            /* body... */
		

        }
    });
    window.location.href='index.php';
});