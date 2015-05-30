<?php include_once("../modules/mod_category.php");?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <ul class="nav navbar-nav navbar-right">

    <?php if($pmode=="Delete") {
      removeCategory($_GET["cid"]);
      redirect("?p=category-mgr");
    }?>


    <?php if($pmode=="List") {?>
      <li><a href="?p=category-mgr&m=0"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add New</a></li>
      <?php   } else {?>
        <li><a href="?p=category-mgr"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Back to List</a></li>
        <?php   } ?>

      </ul>

      <h1 class="page-header">Category - <?php echo $pmode;?></h1>

      <?php if($pmode=="List") { ?>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Category Name</th>
                <th>Description</th>
                <th>Created</th>
                <th>Modified</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $categories=getCategories();
              foreach( $categories as $i=>$category){ ?>
                <tr>
                  <td><?php echo $i+1; ?></td>

                  <td><?php echo $category["name"]; ?></td>
                  <td><?php echo $category["description"]; ?></td>
                  <td><?php echo $category["created_date"]; ?></td>
                  <td><?php echo $category["modified_date"]; ?></td>


                  <td><a href="?p=category-mgr&m=2&cid=<?php echo $category["id"]; ?>" >Edit</a> |
                    <a href="?p=category-mgr&m=3&cid=<?php echo $category["id"]; ?>" >Delete</a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <?php }else{?>
            <?php if($_POST) {
              $flag=saveCategory();

              //  header("location:?p=webinar");
              ?>
              <?php }else{

                $category=getCategory($_GET["cid"]);

                ?>
                <form class="form-horizontal" role="form" method="post">
                  <input type="hidden" name="cid" value="<?php echo $category["id"];?>">
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="name"> Name </label>
                    <div class="col-sm-10">
                      <input type="text" value="<?php echo $category["name"];?>" class="form-control" name="name" id="name" placeholder="Enter Category name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="description"> Description </label>
                    <div class="col-sm-10">
                      <textarea class="form-control" id="description"  name="description" rows="6" ><?php echo $category["description"];?></textarea>
                    </div>
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
