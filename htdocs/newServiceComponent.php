<div class="form-area new-service">
  <div class="header-new-service">
    <h2>List your Services</h2>
  </div>
  <form name="service_form" class="form-new-service suForm form-horizontal form_font" method="POST" action="newService_post.php" onsubmit="return ValidatePet()">
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
        <input class="form-control" size="21" type="date" id="startDate" name="startDate"/>
        <div id="startDate_err"></div>
      </div>
    </div>
    <div class="form-group row">
    <label class="control-label col-sm-3" for="endDate">End Date:</label>
      <div id="endDate_div" class="col-sm-9">
        <input class="form-control" size="21" type="date" id="endDate" name="endDate"/>
        <div id="endDate_err"></div>
      </div>
    </div>
    <div class="sign_up_submit">
      <input type="submit" name="submit" value="List Service" class="btn-list"/>
    </div>
  </form>
</div>
<script type="text/javascript">
 var title = document.forms['service_form']['title'];
 var price = document.forms['service_form']['price'];
 var max = document.forms['service_form']['max'];
 var startDate = document.forms['service_form']['startDate'];
 var endDate = document.forms['service_form']['endDate'];

 var title_err = document.getElementById("title_err");
 var price_err = document.getElementById("price_err");
 var max_err = document.getElementById("max_err");
 var startDate_err = document.getElementById("startDate_err");
 var endDate_err = document.getElementById("endDate_err");

 title.addEventListener('blur', titleVerify, true);
 price.addEventListener('blur', priceVerify, true);
 max.addEventListener('blur', maxVerify, true);
 startDate.addEventListener('blur', startDateVerify, true);
 endDate.addEventListener('blur', endDateVerify, true);

 function ValidatePet() {

  // validate title
  if (title.value == "") {
    title.style.border = "1px solid red";
    document.getElementById('title_div').style.color = "red";
    title_err.textContent = "Title is required";
    title.focus();
    return false;
  }
  //validate price
  if (Number(price.value) <= 0) {
    price.style.border = "1px solid red";
    document.getElementById('price_div').style.color = "red";
    price_err.textContent = "Price listed must be greater than 0";
    price.focus();
    return false;
  }

  //validate max
  if (Number(max.value) <= 0) {
    max.style.border = "1px solid red";
    document.getElementById('max_div').style.color = "red";
    max_err.textContent = "Max number of Pets must be greater than 0";
    max.focus();
    return false;
  }

  //validate startDate
  if (!startDate.value) {
    startDate.style.border = "1px solid red";
    document.getElementById('startDate_div').style.color = "red";
    startDate_err.textContent = "Please specify Start date of Service";
    startDate.focus();
    return false;
  }

  var d1 = Date.parse(moment());
  var d2 = Date.parse(startDate.value);

  if (startDate.value && d2 < d1) {
    startDate.style.border = "1px solid red";
    document.getElementById('startDate_div').style.color = "red";
    startDate_err.textContent = "Please specify a possible Start date";
    startDate.focus();
    return false;
  }

  //validate endDate : Empty
  if (!endDate.value) {
    endDate.style.border = "1px solid red";
    document.getElementById('endDate_div').style.color = "red";
      endDate_err.textContent = "Please specify End date of Service";
    endDate.focus();
    return false;
  }

  //validate endDate : Time less than start date
  // var start = Date.parse(startDate.value);
  // var end   = Date.parse(endDate.value);
  // if (endDate.value && startDate.value && end < start) {
  //   endDate.style.border = "1px solid red";
  //   document.getElementById('endDate_div').style.color = "red";
  //   endDate_err.textContent = "End date cannot preceed Start date";
  //   endDate.focus();
  //   return false;
  // }
}

function titleVerify() {
  if (title.value != "") {
   title.style.border = "1px solid #5e6e66";
   document.getElementById('title_div').style.color = "#5e6e66";
   title_err.innerHTML = "";
   return true;
  }
}

function priceVerify() {
  if (price.value > 0) {
   price.style.border = "1px solid #5e6e66";
   document.getElementById('price_div').style.color = "#5e6e66";
   price_err.innerHTML = "";
   return true;
  }
}

function maxVerify() {
  if (max.value > 0) {
   max.style.border = "1px solid #5e6e66";
   document.getElementById('max_div').style.color = "#5e6e66";
   max_err.innerHTML = "";
   return true;
  }
}

function startDateVerify() {
  if (startDate.value) {
   startDate.style.border = "1px solid #5e6e66";
   document.getElementById('startDate_div').style.color = "#5e6e66";
   startDate_err.innerHTML = "";
   return true;
  }
}

function endDateVerify() {
  if (endDate.value) {
   endDate.style.border = "1px solid #5e6e66";
   document.getElementById('endDate_div').style.color = "#5e6e66";
   endDate_err.innerHTML = "";
   return true;
  }
}
</script>
