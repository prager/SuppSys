<div id="heading-breadcrumbs" class="brder-top-0 border-bottom-0">
  <div class="container">
    <div class="row d-flex align-items-center flex-wrap">
      <div class="col-md-7">
        <h1 class="h2">Contact</h1>
      </div>
      <div class="col-md-5">
        <ul class="breadcrumb d-flex justify-content-end">
          <li class="breadcrumb-item"><?php echo anchor(base_url(), 'Home'); ?></li>
          <li class="breadcrumb-item active">Contact</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<section class="bar pt-0">
  <div class="row">&nbsp;</div>
  <div class="row">
    <div class="col-md-12">
      <div class="heading text-center">
        <h2>Contact form</h2>
      </div>
    </div>
    <div class="col-md-8 mx-auto">
      <form>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="firstname">First Name</label>
              <input id="firstname" type="text" class="form-control">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="lastname">Last Name</label>
              <input id="lastname" type="text" class="form-control">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="email">Email</label>
              <input id="email" type="text" class="form-control">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="subject">Subject</label>
              <input id="subject" type="text" class="form-control">
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <label for="message">Message</label>
              <textarea id="message" class="form-control"></textarea>
            </div>
          </div>
          <div class="col-sm-12 text-center">
            <button type="submit" class="btn btn-template-outlined"><i class="fa fa-envelope-o"></i> Send message</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>

<section>
<!--<div id="map" class="with-border">
	<div id="googleMap" style="height: 310px;">&nbsp;</div>
		<script>
		function myMap() {
		var myCenter = new google.maps.LatLng(37.8942182873016, -122.0753281957829);
		var mapProp = {center:myCenter, zoom:9, scrollwheel:true, draggable:true, mapTypeId:google.maps.MapTypeId.ROADMAP};
		var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
		var marker = new google.maps.Marker({position:myCenter});
		marker.setMap(map);
		}
		</script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBeOLEmQMnt6O2kEXJ7llYr1xw2y-BEm6M&callback=myMap"></script>
      </div>
</section>-->
