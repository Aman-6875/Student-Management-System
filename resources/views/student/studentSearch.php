<!DOCTYPE html>
<html>
<head>
    <title>Live search in laravel using AJAX</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<br />
<div class="container box">
    <h3 align="center">Search Student</h3><br />
    <div class="panel panel-default">
        <div class="panel-heading">Search Student Record</div>
        <div class="panel-body">
            <div class="form-group">
                <input type="text" name="search" id="search" class="form-control" placeholder="Search Student Record" />
            </div>
            <div class="table-responsive">
                <h3 align="center">Total Data : <span id="total_records"></span></h3>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Roll</th>
                        <th>Reg_Id</th>
                        <th>Department</th>
                        <th>Semester</th>
                        <th>Father Name</th>
                        <th>Mother Name</th>
                        <th>Present Address</th>
                        <th>Permanent Address</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script>
    $(document).ready(function(){

        fetch_student_data();

        function fetch_student_data(query = '')
        {
            $.ajax({
               url:"/student/studentSearch/action",
                method:'GET',
                data:{query:query},
                dataType:'json',
                success:function(data)
                {
                    //console.log(data);
                    $('tbody').html(data.table_data);
                    $('#total_records').text(data.total_data);
                }
            })
        }

        $(document).on('keyup', '#search', function(){
            var query = $(this).val();
             console.log(query);
            fetch_student_data(query);
        });
    });
</script>
