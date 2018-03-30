<div class="form-area new-service">
  <div class="header-new-service">
    <h2>List your Services</h2>
  </div>
  <form name="service_form" class="form-new-service suForm form-horizontal form_font" method="POST" action="newService_post.php" onsubmit="return Validate()">
    <div class="form-group row">
      <label class="control-label col-sm-3" for="title">Title:</label>
      <div id="title_div" class="col-sm-9">
        <input class="form-control" id="title" type="text" name="title" placeholder="Title" />
        <div id="title_err"></div>
      </div>
    </div>
    <div class="form-group row">
      <label class="control-label col-sm-3" for="price">Cost/Day:</label>
      <div id="price_div" class="col-sm-9">
        <input class="form-control" id="price" type="number" name="price" step="0.01" min="1" />
        <div id="price_err"></div>
      </div>
    </div>
    <div class="form-group row">
      <label class="control-label col-sm-3" for="max">Maximum number of Pets: </label>
      <div id="max_div" class="col-sm-9">
        <input class="form-control" id="max" type="number" name="max"/>
        <div id="max_err"></div>
      </div>
    </div>
    <div class="form-group row">
      <label class="control-label col-sm-3" for="startDate">Start Date:</label>
      <div id="startDate_div" class="col-sm-9">
        <input size="21" type="date" id="startDate" name="startDate"/>
        <div id="startDate_err"></div>
      </div>
    </div>
    <div class="form-group row">
    <label class="control-label col-sm-3" for="endDate">End Date:</label>
      <div id="endDate_div" class="col-sm-9">
        <input size="21" type="date" id="endDate" name="endDate"/>
        <div id="endDate_err"></div>
      </div>
    </div>
    <div class="sign_up_submit">
      <input type="submit" name="submit" value="List Service" class="btn-list"/>
    </div>
  </form>
</div>
