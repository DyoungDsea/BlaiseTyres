 <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Blaise &copy; <?php echo date("Y"); ?></span>
          </div>
        </div>
      </footer>
        <!-- Logout Modal--> 
   <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout">Logout</a>
        </div>
      </div>
    </div>
  </div>

   <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirm Delete?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Are you sure you want to delete?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary delzv" href="">Delete</a>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="archive" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Move To Archive?</h5>
          <button class="close" type="button" sdata-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Are you sure you want to move to archive?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary delzm" href="">Move</a>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="restore" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Restore?</h5>
          <button class="close" type="button" sdata-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Are you sure you want to restore?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary delzr" href="">Restore</a>
        </div>
      </div>
    </div>
  </div>





  
<div class="modal fade" id="pass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="phpfiles/change-password" method="post">
            <div class="form-group">
            <input type="hidden" name="hid" value="<?php echo $r['userid']; ?>">
            <label for="">Old Password</label>
                <input type="password" placeholder="Old password" required name="old"  id="" class="form-control">
            </div>
            <div class="form-group">
            <label for="">New Password</label>
                <input type="password" required placeholder="New password" name="new"  id="" class="form-control">
            </div>
            <div class="form-group">
            <label for="">Confirm New password</label>
                <input type="password" required placeholder="Confirm New password" name="cnew"  id="" class="form-control">
            </div>
        
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" name="passed" type="submit">Proceed</button>
          </form>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="edit-profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="phpfiles/edit-profile" method="POST">
                        <div class="form-group required-field">
                            <label for="contact-name">Name</label>
                            <input type="text" class="form-control" value="<?php echo $r['uname'];?>" id="contact-name" name="name" required>
                            <input type="hidden" value="<?php echo $r['userid'];?>" id="contact-name" name="id" required>
                        </div><!-- End .form-group -->

                        <div class="form-group required-field">
                            <label for="contact-email">Email</label>
                            <input type="email" value="<?php echo $r['email'];?>" class="form-control" id="contact-email" name="email" required>
                        </div><!-- End .form-group -->

                        <div class="form-group">
                            <label for="contact-phone">Phone Number</label>
                            <input type="tel" value="<?php echo $r['dphone'];?>" class="form-control" id="contact-phone" name="phone">
                        </div><!-- End .form-group -->

                       
                        
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" name="edited" type="submit">Proceed</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
