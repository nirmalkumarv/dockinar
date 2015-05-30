<?php
	if($_POST) $flag=saveOrganizer();
  $organizer=getOrganizer($_GET["oid"]);
?>


                <form class="form-horizontal" role="form" method="post">
                  <input type="hidden" name="oid" value="<?php echo $organizer["id"];?>">


                  <div class="form-group">
                    <label class="control-label col-sm-2" for="title"> Default Category </label>
                    <div class="col-sm-10">
                      <select  style="width:600px;height:auto;" name="default_category_id" class="selectbox">
                        <?php
                        $categories=getCategories();
                        foreach($categories as $i=>$category) { ?>
                          <option value="<?=$category["id"]?>" <?php if($category["id"]==$organizer["default_category_id"]) echo "selected";?>><?php echo $category["name"]?></option>

                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <hr>
										<div class="form-group">
											<label class="control-label col-sm-2" for="name"> Code </label>
											<div class="col-sm-10">
												<input type="text" value="<?php echo $organizer["org_code"];?>" class="form-control" name="org_code" id="org_code" placeholder="Enter Organizer Code">
											</div>
										</div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="name"> Name </label>
                    <div class="col-sm-10">
                      <input type="text" value="<?php echo $organizer["name"];?>" class="form-control" name="name" id="name" placeholder="Enter Organizer title">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-2" for="logo_name"> Logo </label>
                    <div class="col-sm-10">
                      <input type="text" value="<?php echo $organizer["logo_name"];?>" class="form-control" name="logo_name" id="logo_name" placeholder="Enter Logo name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="name"> Webinar Series URL </label>
                    <div class="col-sm-10">
                      <input type="text" value="<?php echo $organizer["webinar_series_url"];?>" class="form-control" name="webinar_series_url" id="webinar_series_url" placeholder="Enter Webinar base url">
                    </div>
                  </div>


                  <div class="form-group">
                    <label class="control-label col-sm-2" for="description"> Description </label>
                    <div class="col-sm-10">
                      <textarea class="form-control" id="description"  name="description" rows="6" ><?php echo $organizer["description"];?></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-6">
                      <button type="submit" class="btn btn-default">Submit</button>
                      <button type="cancel" class="col-sm-offset-2  btn btn-default">Cancel</button>

                    </div>

                  </div>
                </form>
