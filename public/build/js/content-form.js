(function($){
    var editors = new tiny2();
    editors.section = '.editor';
    editors.height = '600';
    editors.medium();

    var gallery = uploadpl;
    gallery.btn_browse = 'btn-select';
    gallery.filelist = '.preview';
    gallery.container_id = 'gallery';
    gallery.limit = 32;
    gallery.multipart = true;
    gallery.redirect = 'back';
    gallery.return_id = $('input[name="id"]');
    gallery.image_type = 'picture';
    gallery.form_btn = '#btn-save';
    gallery.run($('#frm-content'));

    $('#gallery').on('click', '.preview', function (e) {
        $('#btn-select').trigger('click');
    });

    var pheight = parseInt($('.product-input').height()) - 450;
    $('.preview').css('height', pheight + 'px');

    $('#preview').sortable();

    $('.nav-tabs').on('click','a',function(e){
        if( $(this).attr('id') == 'tab-map' ){
            $('#gmap').css( { 'position' : 'relative', 'top' : '0' } );
        }else {
            $('#gmap').css( { 'position' : 'absolute', 'top' : '-9999px' } );
        }

    });
    $('#pac-input').on('keypress',function(e){
      if(e.which == 13) {
        //alert('You pressed enter!');
        e.preventDefault();
      }
    });
}(jQuery));

// :: GOOGLE MAP :://
//:: ======================================================================= :://
var markersArray = [];
function initAutocomplete() {
  var start = {
    lat : parseFloat( document.getElementById('start-lat').value ),
    lng : parseFloat( document.getElementById('start-lng').value )
  };
  var end = {
    lat : parseFloat( document.getElementById('end-lat').value ) ,
    lng : parseFloat( document.getElementById('end-lng').value )
  }
  var onZoom = parseInt( document.getElementById('map-zoom').value );
  var gLat =  start.lat  ? start.lat : 14.40062;
  var glng =  start.lng  ? start.lng : 100.72136;
  var gZoom = onZoom ? onZoom : 15;
  var startLatLng 	= { lat: gLat, lng: glng };
  var endLatLng 	= { lat: end.lat, lng: end.lng };

  console.log('start => ', start);
  var latlng 		= new google.maps.LatLng(gLat, glng);
  var myOptions 	= {
              zoom:   gZoom,
              center: startLatLng,
      };
      
  map = new google.maps.Map(document.getElementById("gmap"), myOptions);
  // add a click event handler to the map object
  google.maps.event.addListener(map, "click", function(event){
              placeMarker(event.latLng);
          });
    /*==========================================================================*/


    placeMarker(startLatLng);
    if( end.lat && end.lng ){
      console.log('end => ', end);
      placeMarker(endLatLng);
    }
    var input = document.getElementById('pac-input');
    var searchBox = new google.maps.places.SearchBox(input);
      map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
      map.addListener('bounds_changed', function() {
        searchBox.setBounds(map.getBounds());
      });
      
      searchBox.addListener('places_changed', function() {
        var places = searchBox.getPlaces();
        if (places.length == 0) {
          return;
        }
        
        // For each place, get the icon, name and location.
        var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
    
            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
            
          });
          map.fitBounds(bounds);
      });
}

function placeMarker(location) {
    deleteOverlays();
    var x = markersArray.length;
    var marker = new google.maps.Marker({
        position: location, 
        map: map,
        draggable : true,
        label:( x%2 ? 'E' : 'S' ),
        title: ( x%2 ? 'End' : 'start' )
    });
    console.log('marker => ', marker ,' title => ');

    google.maps.event.addListener( marker, 'dragend', function(a) {
      console.log('logs marker => ', marker.label ,' A => ', a );
      if( marker.label == 'S' ){
        document.getElementById('start-lat').value = a.latLng.lat().toFixed(4);
        document.getElementById('start-lng').value = a.latLng.lng().toFixed(4);
      }else{
        document.getElementById('end-lat').value = a.latLng.lat().toFixed(4);
        document.getElementById('end-lng').value = a.latLng.lng().toFixed(4);
      }
      document.getElementById('map-zoom').value = marker.map.zoom;
      //placeMarker(a.latLng);
    });
    var latlngs = marker.position;
    var lat =   latlngs.lat().toFixed(4);
    var lng =   latlngs.lng().toFixed(4);
    if( marker.label == 'S' ){
      document.getElementById('start-lat').value = lat;
      document.getElementById('start-lng').value = lng;
    }else{
      document.getElementById('end-lat').value = lat;
      document.getElementById('end-lng').value = lng;
    }
    document.getElementById('map-zoom').value = marker.map.zoom;
    markersArray.push(marker);
}

// Deletes all markers in the array by removing references to them
function deleteOverlays(){
    if (markersArray) {
        for (i in markersArray) {
            console.log('i => ', i);
            var latLngs = markersArray[i].internalPosition
            
            if( i > 0){
              markersArray[i-1].setMap(null);
            }
        }
       // markersArray.length = 1;
    }
    console.log( 'length => ' , markersArray.length );
}
