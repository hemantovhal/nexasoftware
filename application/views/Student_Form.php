<!DOCTYPE html>
<html>
<head>
  <title>Nexa Software Assignment</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://sweetalert2.github.io/styles/bootstrap4-buttons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
  <script>
    var base_url = '<?php echo BASEURL; ?>';
  </script>
</head>
<body><br>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Nexa Software Assignment</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo BASEURL; ?>">Add New</a></li>
              <li class="breadcrumb-item active">Assignment</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h4 class="card-title">Student Information</h4>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="stud_info" action="" method="POST">
                <input type="hidden" value="<?php echo isset($student->stud_id) ? $student->stud_id : ''; ?>" id="id" name="id">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="firstname">First Name:</label>
                        <input type="text" class="form-control" value="<?php echo isset($student->FirstName) ? $student->FirstName : ''; ?>" id="firstname" name="firstname" placeholder="Enter first name" minlength="3" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="lastname">Last Name:</label>
                        <input type="text" class="form-control" value="<?php echo isset($student->LastName) ? $student->LastName : ''; ?>" id="lastname" name="lastname" placeholder="Enter last name" minlength="3" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" value="<?php echo isset($student->Email) ? $student->Email : ''; ?>" id="email" name="email" placeholder="Enter email" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="dateofbirth">Date of birth:</label>
                        <input type="date" class="form-control" id="dateofbirth" value="<?php echo isset($student->DateOfBirth) ? $student->DateOfBirth : ''; ?>" name="dateofbirth" placeholder="Enter date of birth" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="mobile">Mobile:</label>
                        <input type="text" class="form-control" id="mobile" value="<?php echo isset($student->Mobile) ? $student->Mobile : ''; ?>" name="mobile" placeholder="Enter mobile" minlength="10" maxlength="10" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="designation">Designation:</label>
                        <select class="form-control" id="designation" name="designation" required>
                          <option value="">Select</option>
                          <option value="php_developer" <?php echo isset($student->Designation) && ($student->Designation == 'php_developer') ? 'selected' : ''; ?>>PHP Developer</option>
                          <option value="andriod_developer" <?php echo isset($student->Designation) && ($student->Designation == 'andriod_developer') ? 'selected' : ''; ?>>Andriod Developer</option>
                        </select>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="gender">Gender:</label>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="gender" id="male" name="male" value="male" <?php echo isset($student->Gender) && ($student->Gender == 'male') ? 'checked' : ''; ?> required>
                          <label class="form-check-label" for="male">
                            Male
                          </label>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="gender" id="female" value="female" <?php echo isset($student->Gender) && ($student->Gender == 'female') ? 'checked' : ''; ?> required>
                          <label class="form-check-label" for="female">
                            Female
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="hobbies">Hobbies:</label> <small>optional</small>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="1" id="swimming" name="swimming" <?php echo isset($student->Swimming) && ($student->Swimming == 1) ? 'checked' : ''; ?>>
                          <label class="form-check-label" for="swimming">
                            Swimming
                          </label>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="1" id="jogging" name="jogging" <?php echo isset($student->Jogging) && ($student->Jogging == 1) ? 'checked' : ''; ?>>
                          <label class="form-check-label" for="jogging">
                            Jogging
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary"><?php echo isset($student->stud_id) ? 'Update' : 'Save'; ?></button>
                  <button type="reset" class="btn btn-danger">Cancel</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <br>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">STUDENT RECORDS</h4>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="refresh" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>Date Of Birth</th>
                      <th>Mobile</th>
                      <th>Designation</th>
                      <th>Gender</th>
                      <th>Swimming</th>
                      <th>Jogging</th>
                      <th>Posting Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>Date Of Birth</th>
                      <th>Mobile</th>
                      <th>Designation</th>
                      <th>Gender</th>
                      <th>Swimming</th>
                      <th>Jogging</th>
                      <th>Posting Date</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- DataTables -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
  <script type="text/javascript" src="<?php echo BASEURL . 'assets/manage_student_details.js'; ?>"></script>
</body>

</html>