<div class="row">
  <div class="col-md-3">

    <div class="card card-primary card-outline">
      <div class="card-body box-profile">
        <div class="text-center">
          <img class="profile-user-img img-fluid img-circle" id="photo"
                src=""
                alt="User profile picture">
        </div>

        <h3 class="profile-username text-center" id="fullname"></h3>
<br>

        <ul class="list-group list-group-unbordered mb-3">
          <li class="list-group-item">
            <b>Position</b> <span class="float-right text-muted" id="type"></span>
          </li>
          <li class="list-group-item">
            <b>Daily Rate</b> <span class="float-right text-muted" id="rate"></span>
          </li>
        </ul>
      </div>
    </div>
    <div class="card card-info card-outline">
      
      <div class="card-body text-center">

        <strong><i class="fas fa-user-alt mr-1"></i> Username</strong>
        <p class="text-muted mt-3 mb-0" id="username"><?= $_SESSION['user-data']['username'] ?></p>
        <hr>

        <strong><i class="fa fa-lock mr-1"></i> Password</strong>
        <p class="text-muted mt-3 mb-0" id="password">*********</p>
        <hr>
        <a href="?page=account_details_edit" class="btn btn-success btn-block"><i class="fa fa-edit"></i> <b>Update</b></a>
      </div>
    </div>
  </div>
  <div class="col-md-9">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">About Me</h3>
      </div>
      <div class="card-body">

        <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>
        <p class="text-muted" id="address"></p>
        <hr>

        <strong><i class="fas fa-user-alt mr-1"></i> Gender</strong>
        <p class="text-muted" id="gender"></p>
        <hr>

        <strong><i class="far fa-file-alt mr-1"></i> Marital</strong>
        <p class="text-muted" id="marital"></p>
        <hr>

        <strong><i class="fa fa-mobile mr-1"></i> Mobile</strong>
        <p class="text-muted" id="mobile"></p>
        <hr>

        <strong><i class="fa fa-envelope mr-1"></i> Email</strong>
        <p class="text-muted" id="email"></p>
        <hr>

        <strong><i class="far fa-calendar-alt mr-1"></i> Join Date</strong>
        <p class="text-muted" id="join_date"></p>
        <hr>

      </div>
    </div>
  </div>
</div>