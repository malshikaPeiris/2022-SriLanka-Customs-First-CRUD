<?php include('connection.php'); ?>

<?php
session_start();

if (!isset($_SESSION['username'])) {
  $_SESSION['msg'] = "You must log in first";
  header('location: login.php');
}
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location: login.php");
}
?>
<!doctype html>
<html lang="en">

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="css/bootstrap5.0.1.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/datatables-1.10.25.min.css" />
  <title>Server Side CRUD Ajax Operations</title>
  <style type="text/css">
    .btnAdd {
      text-align: right;
      width: 100%;
      margin-bottom: 20px;
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <h2 class="text-center">Welcome to Inventory Management</h2>
   

    <div class="content">
      <!-- notification message -->
      <?php if (isset($_SESSION['success'])) : ?>
        <div class="error success">
          <h3>
            <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']);
            ?>
          </h3>
         
          </div>
      <?php endif ?>

      <!-- logged in user information -->
 
     
   
    </div>
    <div class="row">
      <div class="container">
        <?php if (isset($_SESSION['username'])) : ?>
          <center><lable>Welcome <strong><?php echo $_SESSION['username']; ?></strong></lable></center><br/>
          <div style="margin-left: 80%;"><lable> <a href="index.php?logout='1'" style="color: white;" class="btn btn-success btn-sm">logout</a> </lable></div><br/><br/><br>
      <?php endif ?>
      <div style="margin-left: 280px;">
        <a href="#!" data-id="" data-bs-toggle="modal" data-bs-target="#addUserModal" class="btn btn-primary btn">Add Inventory</a>&nbsp;
        <a href="index_report.php"  class="btn btn-warning btn">Reports</a><br/><br/>
        </div>
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <table id="example" class="table">
              <thead>
                <th>#</th>
                <th>serial no</th>
                <th>brand</th>
                <th>model</th>
                <th>status</th>
                <th>description</th>
                <th>directorate</th>
                <th>quantity</th>
                <th>purchase date</th>
                <th>Options</th>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
          <div class="col-md-2"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- Optional JavaScript; choose one of the two! -->
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
  <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/dt-1.10.25datatables.min.js"></script>
  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
  -->
  <script type="text/javascript">
    $(document).ready(function() {
      $('#example').DataTable({
        "fnCreatedRow": function(nRow, aData, iDataIndex) {
          $(nRow).attr('id', aData[0]);
        },
        'serverSide': 'true',
        'processing': 'true',
        'paging': 'true',
        'order': [],
        'ajax': {
          'url': 'fetch_data.php',
          'type': 'post',
        },
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [5]
          },

        ]
      });
    });
    $(document).on('click', 'submitadd', function(e) {
      e.preventDefault();
      var serial_no = $('#addSerial_noField').val();
      var brand = $('#addBrandField').val();
      var model = $('#addModelField').val();
      var status = $('#addStatusField').val();
      var description = $('#addDescriptionField').val();
      var directorate = $('#addDirectorateField').val();
      var quantity = $('#addQuantityField').val();
      var purchase_date = $('#addPurchase_dateField').val();

      if (serial_no != '' && brand != '' && model != '' && status != '' && description != '' && directorate != '' && quantity != '' && purshase_date != '') {
        $.ajax({
          url: "add_user.php",
          type: "post",
          data: {
            serial_no: serial_no,
            brand: brand,
            model: model,
            status: status,
            description: description,
            directorate: directorate,
            quantity: quantity,
            purshase_date: purshase_date
          },
          success: function(data) {
            var json = JSON.parse(data);
            var status = json.status;
            if (status == 'true') {
              mytable = $('#example').DataTable();
              mytable.draw();
              $('#addUserModal').modal('hide');
            } else {
              alert('failed');
            }
          }
        });
      } else {
        alert('Fill all the required fields');
      }
    });
    $(document).on('click', 'submitupdate', function(e) {
      e.preventDefault();
      //var tr = $(this).closest('tr');
      var serial_no = $('#serial_noField').val();
      var brand = $('#brandField').val();
      var model = $('#modelField').val();
      var status = $('#statusField').val();
      var description = $('#descriptionField').val();
      var directorate = $('#directorateField').val();
      var quantity = $('#quantityField').val();
      var purchase_date = $('#purchase_dateField').val();
      // var trid = $('#trid').val();
      // var id = $('#id').val();
      if (serial_no != '' && brand != '' && model != '' && status != '' && description != '' && directorate != '' && quantity != '' && purshase_date != '') {
        $.ajax({
          url: "update_user.php",
          type: "post",
          data: {
            serial_no: serial_no,
            brand: brand,
            model: model,
            status: status,
            description: description,
            directorate: directorate,
            quantity: quantity,
            purshase_date: purshase_date,
            id: id
          },
          success: function(data) {
            var json = JSON.parse(data);
            var status = json.status;
            if (status == 'true') {
              table = $('#example').DataTable();
              //   table.cell(parseInt(trid) - 1,0).data(id);
              //   table.cell(parseInt(trid) - 1,1).data(username);
              //   table.cell(parseInt(trid) - 1,2).data(email);
              //   table.cell(parseInt(trid) - 1,3).data(mobile);
              //   table.cell(parseInt(trid) - 1,4).data(city);
              var button = '<td><a href="javascript:void();" data-id="' + id + '" class="btn btn-info btn-sm editbtn">Edit</a>  <a href="#!"  data-id="' + id + '"  class="btn btn-danger btn-sm deleteBtn">Delete</a></td>';
              var row = table.row("[id='" + trid + "']");
              row.row("[id='" + trid + "']").data([id, serial_no, brand, model, status, description, directorate, quantity, purchase_date, button]);
              $('#exampleModal').modal('hide');
            } else {
              alert('failed');
            }
          }
        });
      } else {
        alert('Fill all the required fields');
      }
    });
    $('#example').on('click', '.editbtn ', function(event) {
      var table = $('#example').DataTable();
      var trid = $(this).closest('tr').attr('id');
      // console.log(selectedRow);
      var id = $(this).data('id');
      $('#exampleModal').modal('show');

      $.ajax({
        url: "get_single_data.php",
        data: {
          id: id
        },
        type: 'post',
        success: function(data) {
          var json = JSON.parse(data);
          $('#serial_noField').val(json.serial_no);
          $('#brandField').val(json.brand);
          $('#modelField').val(json.model);
          $('#statusField').val(json.status);
          $('#descriptionField').val(json.description);
          $('#directorateField').val(json.directorate);
          $('#quantityField').val(json.quantity);
          $('#purchase_dateField').val(json.purchase_date);
          $('#id').val(id);
          $('#trid').val(trid);
        }
      })
    });

    $(document).on('click', '.deleteBtn', function(event) {
      var table = $('#example').DataTable();
      event.preventDefault();
      var id = $(this).data('id');
      if (confirm("Are you sure want to delete this User ? ")) {
        $.ajax({
          url: "delete_user.php",
          data: {
            id: id
          },
          type: "post",
          success: function(data) {
            var json = JSON.parse(data);
            status = json.status;
            if (status == 'success') {
              //table.fnDeleteRow( table.$('#' + id)[0] );
              //$("#example tbody").find(id).remove();
              //table.row($(this).closest("tr")) .remove();
              $("#" + id).closest('tr').remove();
            } else {
              alert('Failed');
              return;
            }
          }
        });
      } else {
        return null;
      }



    })
  </script>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="updateUser" action="update_user.php" method="post">
            <input type="hidden" name="id" id="id" value="">
            <input type="hidden" name="trid" id="trid" value="">
            <div class="mb-3 row">
              <label for="serial_noField" class="col-md-3 form-label">serial_no</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="serial_noField" name="serial_no">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="brandField" class="col-md-3 form-label">brand</label>
              <div class="col-md-9">
                <input type="brand" class="form-control" id="brandField" name="brand">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="modelField" class="col-md-3 form-label">model</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="modelField" name="model">
              </div>
            </div>
            <!-- <div class="mb-3 row">
              <label for="statusField" class="col-md-3 form-label">status</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="statusField" name="status">
              </div>
            </div> -->
            <div class="form-group col-md-5 mb-3">
                    <label for="vendorDetailsStatus">Status</label>
                    <select name="status" class="form-control chosenSelect">
                      <?php include('inc/statusList.html'); ?>
                    </select>
                  </div>

            <div class="mb-3 row">
              <label for="descriptionField" class="col-md-3 form-label">description</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="descriptionField" name="description">
              </div>
            </div>
            <!-- <div class="mb-3 row">
              <label for="directorateField" class="col-md-3 form-label">directorate</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="directorateField" name="directorate">
              </div>
            </div> -->
            <div class="form-group col-md-5 mb-3">
                    <label for="vendorDetailsStatus">Directorate</label>
                    <select name="directorateField" class="form-control chosenSelect">
                      <?php include('inc/directorList.html'); ?>
                    </select>
                  </div>
            <div class="mb-3 row">
              <label for="quantityField" class="col-md-3 form-label">quantity</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="quantityField" name="quantity">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="purchase_dateField" class="col-md-3 form-label">purchase_date</label>
              <div class="col-md-9">
                <input type="date" class="form-control" id="purchase_dateField" name="purchase_date">
              </div>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary" name="submitupdate">Submit</button>&nbsp;&nbsp;
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
  <!-- Add user Modal -->
  <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Inventory</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="addUser" action="add_user.php" method="post">
            <div class="mb-3 row">
              <label for="addSerial_noField" class="col-md-3 form-label">Serial no</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="addSerial_noField" name="serial_no">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="addBrandField" class="col-md-3 form-label">Brand</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="addBrandField" name="brand">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="addModelField" class="col-md-3 form-label">Model</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="addModelField" name="model">
              </div>
            </div>
            <!-- <div class="mb-3 row">
              <label for="addStatusField" class="col-md-3 form-label">Status</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="addStatusField" name="status">
              </div>
            </div> -->
            <div class="form-group col-md-5 mb-3">
                    <label for="vendorDetailsStatus">Status</label>
                    <select name="status" class="form-control chosenSelect">
                      <?php include('inc/statusList.html'); ?>
                    </select>
                  </div>
            <div class="mb-3 row">
              <label for="addDescriptionField" class="col-md-3 form-label">Description</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="addDescriptionField" name="description">
              </div>
            </div>
            <!-- <div class="mb-3 row">
              <label for="addDirectorateField" class="col-md-3 form-label">Directorate</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="addDirectorateField" name="directorate">
              </div>
            </div> -->
            <div class="form-group col-md-5 mb-3">
                    <label for="vendorDetailsStatus">Directorate</label>
                    <select name="directorateField" class="form-control chosenSelect">
                      <?php include('inc/directorList.html'); ?>
                    </select>
                  </div>
            <div class="mb-3 row">
              <label for="addQuantityField" class="col-md-3 form-label">Quantity</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="addQuantityField" name="quantity">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="addPurchase_dateField" class="col-md-3 form-label">Purchase_date</label>
              <div class="col-md-9">
                <input type="date" class="form-control" id="addPurchase_dateField" name="purchase_date">
              </div>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary" name="submitadd">Submit</button>&nbsp;&nbsp;
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>