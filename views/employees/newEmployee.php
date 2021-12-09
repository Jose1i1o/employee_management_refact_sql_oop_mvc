<?php
require_once VIEWS . '/header.php';
?>

<form class="newEmployee m-5" action="<?= BASE_URL ?>employees/insertEmployee" method="POST" class="container mt-4">
  <div class="row">
    <input type="hidden" name="employee" />
    <div class="col-sm-6 form-floating mt-3">
      <label for="floatingName">Name</label>
      <input name="name" type="text" class="form-control" id="floatingName" placeholder="John" data-bs-toggle="tooltip" data-bs-html="true" title="">
    </div>
    <div class="col-sm-6 form-floating mt-3">
      <label for="floatingLastName">Last name</label>
      <input name="lastName" type="text" class="form-control" id="floatingLastName" placeholder="Mace" title="">
    </div>
    <div class="col-sm-6 form-floating mt-3">
      <label for="floatingEmail">Email address</label>
      <input name="email" type="email" class="form-control" id="floatingEmail" placeholder="john.mace@example.com" data-bs-toggle="tooltip" data-bs-html="true" title="">
    </div>
    <div class="col-sm-6 form-floating mt-3">
      <label for="floatingGender">Gender</label>
      <input name="gender" class="form-control" id="floatingGender"  placeholder="E.g. Male" title="">
    </div>
    <div class="col-sm-6 form-floating mt-3">
      <label for="floatingCity">City</label>
      <input name="city" type="text" class="form-control" id="floatingCity" placeholder="Granada" title="">
    </div>
    <div class="col-sm-6 form-floating mt-3">
      <label for="floatingStreetAddress">Street address</label>
      <input name="streetAddress" type="text" class="form-control" id="floatingStreetAddress" placeholder="Machu Pichu" data-bs-toggle="tooltip" data-bs-html="true" title="">
    </div>
    <div class="col-sm-6 form-floating mt-3">
      <label for="floatingState">State</label>
      <input name="state" type="text" class="form-control" id="floatingState" placeholder="Andalusia" title="">
    </div>
    <div class="col-sm-6 form-floating mt-3">
      <label for="floatingAge">Age</label>
      <input name="age" type="number" class="form-control" id="floatingAge" placeholder="+18" data-bs-toggle="tooltip" data-bs-html="true" title="">
    </div>
    <div class="col-sm-6 form-floating mt-3">
      <label for="floatingPostalCode">Postal code</label>
      <input name="postalCode" type="number" class="form-control" id="floatingPostalCode" placeholder="18270" title="">
    </div>
    <div class="col-sm-6 form-floating mt-3">
      <label for="floatingPhoneNumber">Phone number</label>
      <input name="phoneNumber" type="number" class="form-control" id="floatingPhoneNumber" placeholder="XXX-XXX-XXX" data-bs-toggle="tooltip" data-bs-html="true" title="">
    </div>
    <div class="col-12 form-floating mt-3">
    <?php echo $this->message ?>
    </div>
    <div class="col-12 form-floating mt-3">
      <button class="btn btn-primary" id="submitBtn" type="submit">Submit</button>
      <button class="btn btn-secondary" onclick="goBack()">Return</button>
    </div>
  </div>
</form>

<?php
require_once VIEWS . '/footer.php';
?>

<script>
  function goBack() {
    window.history.back();
  }
</script>
<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/newEmployee.js"></script>



