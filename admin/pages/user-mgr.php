<?php include_once("../modules/mod_user.php");?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <ul class="nav navbar-nav navbar-right">

    <?php

     if($pmode=="Delete") {
      removeUser($_GET["uid"]);
      redirect("?p=user-mgr");
    }?>


    <?php if($pmode=="List") {?>
      <li><a href="?p=user-mgr&m=0"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add New</a></li>
      <?php   } else {?>
        <li><a href="?p=user-mgr"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Back to List</a></li>
        <?php   } ?>

      </ul>

      <h1 class="page-header">Users - <?php echo $pmode;?></h1>

      <?php if($pmode=="List") { ?>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Created</th>
                <th>Modified</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $users=getUsers();
              foreach( $users as $i=>$user){ ?>
                <tr>
                  <td><?php echo $i+1; ?></td>

                  <td><?php echo $user["firstname"]; ?></td>
                  <td><?php echo $user["lastname"]; ?></td>
                  <td><?php echo $user["do_email_id"]; ?></td>
                  <td><?php echo $user["created_date"]; ?></td>
                  <td><?php echo $user["modified_date"]; ?></td>


                  <td><a href="?p=user-mgr&m=2&uid=<?php echo $user["id"]; ?>" >Edit</a> |
                    <a href="?p=user-mgr&m=3&uid=<?php echo $user["id"]; ?>" >Delete</a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <?php }else{?>
            <?php if($_POST) {
              $flag=saveUser();

              //  header("location:?p=webinar");
              ?>
              <?php }else{

                $user=getUser($_GET["uid"]);

                ?>
                <form class="form-horizontal" role="form" method="post">
                  <input type="hidden" name="uid" value="<?php echo $user["id"];?>">
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="firstname">First Name </label>
                    <div class="col-sm-10">
                      <input type="text" value="<?php echo $user["firstname"];?>" class="form-control" name="firstname" id="firstname" placeholder="Enter First name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="lastname">Last Name </label>
                    <div class="col-sm-10">
                      <input type="text" value="<?php echo $user["lastname"];?>" class="form-control" name="lastname" id="lastname" placeholder="Enter Last Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="do_email_id">Email </label>
                    <div class="col-sm-10">
                      <input type="text" value="<?php echo $user["do_email_id"];?>" class="form-control" name="do_email_id" id="do_email_id" placeholder="Enter Email">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-2" for="do_password">Password </label>
                    <div class="col-sm-10">
                      <input type="password" value="<?php echo $user["do_password"];?>" class="form-control" name="do_password" id="do_password"  placeholder="Enter Password">
                    </div>
                  </div>

                  <div class="col-sm-offset-2 col-sm-6" >
                    <input type="checkbox" name="is_developer" id="chk1"  value="1" <?php echo $user["is_developer"]=="1"?"checked":"";?>> <label for="chk1">Is  Developer?</label><br>
                    <input type="checkbox" name="is_speaker" id="chk2"  value="1" <?php echo $user["is_speaker"]=="1"?"checked":"";?>> <label for="chk2">Is  Speaker?</label><br>
                    <input type="checkbox" name="is_organizer"  id="chk3" value="1" <?php echo $user["is_organizer"]=="1"?"checked":"";?>><label for="chk3"> Is  Organizer?</label><br>
                    <input type="checkbox" name="is_sms_subscribed"  id="chk4" value="1" <?php echo $user["is_sms_subscribed"]=="1"?"checked":"";?>><label for="chk4"> Subscribed for SMS?</label><br><br>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-6">
                      <button type="submit" class="btn btn-default">Submit</button>
                      <button type="cancel" class="col-sm-offset-2  btn btn-default">Cancel</button>

                    </div>

                  </div>
                </form>
                <?php } ?>

                <?php } ?>
              </div>
