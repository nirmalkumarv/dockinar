<?php include_once("../modules/mod_webinar.php");?>
<?php include_once("../modules/mod_organizer.php");?>
<?php include_once("../modules/mod_category.php");?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <ul class="nav navbar-nav navbar-right">

    <?php if($pmode=="Delete") {
      removeWebinar($_GET["wid"]);
      redirect("?p=webinar-mgr");
    }?>


    <?php if($pmode=="List") {?>
      <li><a href="?p=webinar-mgr&m=0"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add New</a></li>
      <?php   } else {?>
        <li><a href="?p=webinar-mgr"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Back to List</a></li>
        <?php   } ?>

      </ul>

      <h1 class="page-header">Webinar -  <?php echo $pmode;?></h1>

      <?php if($pmode=="List") { ?>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th> Title</th>
                <th>Organizer</th>
                <th>Date</th>
                <th>Last Fetched</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $webinars=getWebinars();
              foreach( $webinars as $i=>$webinar){ ?>
                <tr>
                  <td><?php echo $i+1; ?></td>

                  <td><?php echo "<b>".$webinar["title"]."</b>"; ?>
                    <?php if(!$webinar["is_tweeted"]) { ?>
                    <br><button  data-webinar="<?php echo $webinar["id"]?>" type="button" class="btn-tweet btn btn-default btn-xs"><span class="glyphicon" aria-hidden="true"></span> Tweet</button>
                    <?php } ?>
                  </td>
                  <td><?php echo $webinar["org_name"]; ?></td>
                  <td><?php echo $webinar["webinar_date"]." ".$webinar["webinar_time"]; ?></td>
                  <td><?php echo $webinar["created_date"]; ?></td>


                  <td><a href="?p=webinar-mgr&m=2&wid=<?php echo $webinar["id"]; php?>" >Edit</a> |
                    <a href="?p=webinar-mgr&m=3&wid=<?php echo $webinar["id"]; php?>" >Delete</a>

                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <?php } else { ?>
            <?php if($_POST) {
              $flag=savewebinar();

              //  header("location:?p=webinar");
              ?>
              <?php } else {

                $webinar=getWebinar($_GET["wid"]);

                ?>
                <form class="form-horizontal" role="form" method="post">


                  <div class="form-group">
                    <label class="control-label col-sm-2" for="title"> Organizer </label>
                    <div class="col-sm-10">
                      <select  style="width:600px;height:auto;" name="org_id" class="selectbox">
                        <?php
                        $organizers=getOrganizers();
                        foreach($organizers as $i=>$organizer) { ?>
                          <option value="<?=$organizer["id"]?>" <?if($webinar["org_id"]==$organizer["id"]) echo "selected";?>><?php echo $organizer["name"]?></option>

                        <?} ?>
                        </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-2" for="title"> Category </label>
                    <div class="col-sm-10">
                          <?php $categories=getCategories(); ?>
                          <?php $catIds=getWebinarCatIds($_GET["wid"]);
                          $catidList=[];
                          foreach($catIds as $i=>$catInfo){
                            $catidList[]=$catInfo["category_id"];

                          }

                          ?>
                          <?foreach($categories as $k=>$category) {

                            $isMapped=in_array($category["id"],$catidList);
                             ?>
                            <div><input type="checkbox" name="category[]"  <?php echo $isMapped?"checked":"";?>  value="<?=$category["id"]?>" id="cat<?=$category["id"]?>"?><label for="cat<?=$category["id"]?>"><?=$category["name"]?></label> </div>
                          <? } ?>
                        </select>
                      </div>
                    </div>





                  <hr>
                  <input type="hidden" name="wid" value="<?php echo $webinar["id"];?>">
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="title"> Name </label>
                    <div class="col-sm-10">
                      <input type="text" value="<?php echo $webinar["title"];?>" class="form-control" name="title" id="title" placeholder="Enter webinar title">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="description"> Description </label>
                    <div class="col-sm-10">
                      <textarea class="form-control" id="description"  name="description" rows="6" ><?php echo $webinar["description"];?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="webinar_date"> Date </label>
                    <div class="col-sm-8">
                      <div class="col-sm-4">
                      <input class="form-control" type="date" value="<?php echo $webinar["webinar_date"];?>"  name="webinar_date" id="webinar_date" placeholder="Enter webinar date">
                    </div>
                    <div class="col-sm-4">
                      <input class="col-sm-2 form-control" type="time" value="<?php echo $webinar["webinar_time"];?>"  name="webinar_time" id="webinar_time" placeholder="Enter webinar time">
                    </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-2" for="webinar_url"> Webinar url </label>
                    <div class="col-sm-6">
                      <input type="text" value="<?php echo $webinar["webinar_url"];?>" class="form-control" name="webinar_url" id="webinar_url" placeholder="Enter Webinar Url">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-2" for="webinar_reg_url"> Registration Link </label>
                    <div class="col-sm-6">
                      <input type="text" value="<?php echo $webinar["webinar_reg_url"];?>" class="form-control" name="webinar_reg_url" id="webinar_reg_url" placeholder="Enter Webinar Reg Link">
                    </div>
                  </div>



                  <div class="form-group">
                    <label class="control-label col-sm-2" for="speaker_name"> Speaker Name </label>
                    <div class="col-sm-4">
                      <input type="text" value="<?php echo $webinar["speaker_name"];?>" class="form-control" name="speaker_name" id="speaker_name" placeholder="Enter Speaker Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="speaker_desig"> Speaker Designation </label>
                    <div class="col-sm-4">
                      <input type="text" value="<?php echo $webinar["speaker_desig"];?>" class="form-control" name="speaker_desig" id="speaker_desig" placeholder="Enter Speaker Design">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="speaker_desc"> About Speaker </label>
                    <div class="col-sm-10">
                      <textarea class="form-control" id="speaker_desc"  name="speaker_desc" rows="6" ><?php echo $webinar["speaker_desc"];?></textarea>
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


<script>
($(function(){
  $(".btn-tweet").click(function(e){
    $btn=$(this);
    $urlPath="handler.php?webinar_id=" + $(this).data("webinar");
    $.get($urlPath,function(response){
      $btn.hide();
    });
  });
}))

</script>
