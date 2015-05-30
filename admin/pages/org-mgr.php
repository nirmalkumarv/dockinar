<?php include_once("../modules/mod_category.php");?>
<?php include_once("../modules/mod_category.php");?>
<?php include_once("../modules/mod_organizer.php");?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <ul class="nav navbar-nav navbar-right">

    <?php if($pmode=="Delete") {
      removeOrganizer($_GET["oid"]);
      redirect("?p=org-mgr");
    }?>

    <?php if($pmode=="List") {?>
      <li><a href="?p=org-mgr&m=0"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add New</a></li>
      <?php   } else {?>
        <li><a href="?p=org-mgr"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Back to List</a></li>
        <?php   } ?>

      </ul>

      <h1 class="page-header">Organizer - <?php echo $pmode;?></h1>

      <?php if($pmode=="List") { ?>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Organizer</th>
                <th>Description</th>
                <th>Created</th>
                <th>Modified</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $organizers=getOrganizers();
              foreach( $organizers as $i=>$organizer){ ?>
                <tr>
                  <td><?php echo $i+1; ?></td>

                  <td><?php echo "<b>".$organizer["name"]."</b><br>".$organizer["cat_name"]; ?></td>
                  <td><?php echo $organizer["description"]; ?></td>
                  <td><?php echo $organizer["created_date"]; ?></td>
                  <td><?php echo $organizer["modified_date"]; ?></td>


                  <td><a href="?p=org-mgr&m=2&oid=<?php echo $organizer["id"]; ?>" >Edit</a> |
                    <a href="?p=org-mgr&m=3&oid=<?php echo $organizer["id"]; ?>" >Delete</a> |
                    <a target="_blank" href="?p=service-mgr&oid=<?php echo $organizer["id"]; php?>" >Fetch Data</a>

                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <?php } else {

            include_once("org-edit.php");
           } ?>
                
          </div>
