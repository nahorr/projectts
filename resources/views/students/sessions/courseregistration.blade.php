<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Your {{@$session->session_name}} {{@$semester->semester_name}} Courses <div class="pull-right">Register</div></div>
                
                <div class="panel-body">
                   
                 <!-- div.dataTables_borderWrap -->
                    <div class="table-responsive">
                        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr style="font-size: 11px;">
                                    <th>ID</th>
                                    <th>Course Code</th>
                                    <th>Course Name</th>
                                    <th>Session</th>
                                    <th>Semester</th>
                                    <th>Instructor First Name</th>
                                    <th>Instructor Last Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                        <script src="https://datatables.yajrabox.com/js/jquery.min.js"></script>
                        <script src="https://datatables.yajrabox.com/js/bootstrap.min.js"></script>
                        <script src="https://datatables.yajrabox.com/js/jquery.dataTables.min.js"></script>
                        <script src="https://datatables.yajrabox.com/js/datatables.bootstrap.js"></script>  
                        <script type="text/javascript">
                            $(function() {
                                $('#dynamic-table').DataTable({
                                    processing: true,
                                    serverSide: true,
                                    ajax: 'http://127.0.0.1:8000/students/2/4/getcoursedata',
                                    columns: [
                                        {data: 'id', name: 'courses.id'},
                                        {data: 'course_code', name: 'courses.course_code'},
                                        {data: 'course_name', name: 'courses.course_name'},
                                        {data: 'session_name', name: 'sessions.session_name'},
                                        {data: 'semester_name', name: 'semesters.semester_name'},
                                        {data: 'first_name', name: 'instructors.first_name'},
                                        {data: 'last_name', name: 'instructors.last_name'},
                                        {data: 'action', name: 'action', orderable: false, searchable: false}
                                    ]
                                });
                            });
                        </script>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
