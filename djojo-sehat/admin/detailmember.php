<link rel="stylesheet" type="text/css" href="../template/css/bootstrap.min.css">
<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="login_modal" aria-hidden="true">
  <div class="modal-dialog" style="width: 900px;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="img-thumbnail">
          <img src="../images/produk/aa.png" class="img-thumbnail">
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function(){
      if ($('#form-login').size()) {
        $.getScript(
          'jquery.passroids.min.js',
      function() {
        $('form').passroids({
          main : "#pass"
        });
      });
      }
  });
</script>