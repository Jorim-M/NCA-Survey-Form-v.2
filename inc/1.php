<div class="form-group">
   <h1>1. Contact Info</h1>
   <hr>
</div>
<div class="form-group">
   <label>First Name:</label>
   <input type="text" name="firstname" placeholder="Enter First Name" class="form-control form-control-alternative form-control-alternative bg-secondary" required="required"/>
</div>
<div class="form-group">
   <label>Last Name:</label>
   <input type="text" name="lastname" placeholder="Enter Last Name" class="form-control form-control-alternative form-control-alternative bg-secondary" required="required"/>
</div>
<div class="form-group">
   <label for="id_no">ID No:</label>
   <input type="text" class="form-control form-control-alternative bg-secondary" name="id_no"  placeholder="Enter ID No." value="" required="required">
</div>
<div class="form-group">
   <label for="passport_no">Passport Number:</label>
   <input type="text" class="form-control form-control-alternative form-control-alternative bg-secondary" name="passport_no"  placeholder="(Type 'None' if not applicable)" value="" required="required">
</div>
<div class="form-group">
   <label for="email">E-Mail:</label>
   <input type="email" class="form-control form-control-alternative form-control-alternative bg-secondary" name="email" placeholder="Enter Email" value="" required="required">
</div>
<div class="form-group" onclick="process(event)">
   <label for="contact">Contact No:</label>
   <input class="form-control form-control-alternative form-control-alternative bg-secondary" id="phone" type="tel" name="contact" value="" required="required">
   <!-- <button type="click" value="Verify" class="btn btn-primary" >Verify</button><br><br> -->
   <!-- <div class="alert alert-info" style="display: none;"></div> -->
</div>