<br>
<h4><i class="far fa-check-circle"></i> Edit basic information</h4>
<hr>
<p>Here, you will edit all your informations as you like. Be it your name, adresse, or all the other rests.
On SmeetUp, you are free to do whatever you will like to do as long as it concerns the educational domain.</p>
<hr>
<form action="" method="POST" class="basic_info_update">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="firstName">First name</label>
      <input class="form-control" id="inputFirstName" type="text" name="" value="" placeholder="First name">
    </div>
    <div class="form-group col-md-6">
      <label for="LastName">Last name</label>
      <input class="form-control" id="inputLastName" type="text" name="" value="" placeholder="Last name">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="email@domain.com">
    </div>
    <div class="form-group col-md-6">
      <label for="inputBirthDate">Date of Birth</label>
      <input type="date" class="form-control" id="inputBirthDate">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="form-group">
    <label for="inputGender">I am a : </label>
    <input type="radio" id="inputGender" name="gender" value="M"> M
    <input type="radio" id="inputGender" name="gender" value="F"> F
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">My City</label>
      <input type="text" class="form-control" id="inputCity" placeholder="City">
    </div>
    <div class="form-group col-md-6">
      <label for="inputState">My Country</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="inputInfo">About me </label>
    <textarea name="about" class="form-control col-md-12" rows="4" cols="80"></textarea>
  </div>
  <button type="submit" class="btn updbasic">Save Changes</button>
</form>
