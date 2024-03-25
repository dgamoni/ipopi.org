/**
 * Pid MAP Scripts 
**/ 

// the map
  var map;
  var infoWindow;
  var country;

     //text overlays
    function TxtOverlay(pos, txt, cls, map) {

      // Now initialize all properties.
      this.pos = pos;
      this.txt_ = txt;
      this.cls_ = cls;
      this.map_ = map;

      // We define a property to hold the image's
      // div. We'll actually create this div
      // upon receipt of the add() method so we'll
      // leave it null for now.
      this.div_ = null;

      // Explicitly call setMap() on this overlay
      this.setMap(map);
    }

    TxtOverlay.prototype = new google.maps.OverlayView();



    TxtOverlay.prototype.onAdd = function() {

      // Note: an overlay's receipt of onAdd() indicates that
      // the map's panes are now available for attaching
      // the overlay to the map via the DOM.

      // Create the DIV and set some basic attributes.
      var div = document.createElement('DIV');
      div.className = this.cls_;

      div.innerHTML = this.txt_;

      // Set the overlay's div_ property to this DIV
      this.div_ = div;
      var overlayProjection = this.getProjection();
      var position = overlayProjection.fromLatLngToDivPixel(this.pos);
      div.style.left = position.x + 'px';
      div.style.top = position.y + 'px';
      // We add an overlay to a map via one of the map's panes.

      var panes = this.getPanes();
      panes.floatPane.appendChild(div);
    }
    TxtOverlay.prototype.draw = function() {


        var overlayProjection = this.getProjection();

        // Retrieve the southwest and northeast coordinates of this overlay
        // in latlngs and convert them to pixels coordinates.
        // We'll use these coordinates to resize the DIV.
        var position = overlayProjection.fromLatLngToDivPixel(this.pos);


        var div = this.div_;
        div.style.left = position.x + 'px';
        div.style.top = position.y + 'px';



      }
      //Optional: helper methods for removing and toggling the text overlay.  
    TxtOverlay.prototype.onRemove = function() {
      this.div_.parentNode.removeChild(this.div_);
      this.div_ = null;
    }
    TxtOverlay.prototype.hide = function() {
      if (this.div_) {
        this.div_.style.visibility = "hidden";
      }
    }

    TxtOverlay.prototype.show = function() {
      if (this.div_) {
        this.div_.style.visibility = "visible";
      }
    }

    TxtOverlay.prototype.toggle = function() {
      if (this.div_) {
        if (this.div_.style.visibility == "hidden") {
          this.show();
        } else {
          this.hide();
        }
      }
    }

    TxtOverlay.prototype.toggleDOM = function() {
      if (this.getMap()) {
        this.setMap(null);
      } else {
        this.setMap(this.map_);
      }
    }


function initialize() {
    var myOptions = {
      zoom: 2,
      center: new google.maps.LatLng(10, 0),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    // initialize the map
    map = new google.maps.Map(document.getElementById('map-canvas'),
        myOptions);

    var center = map.getCenter();
    resizeMap();
    google.maps.event.trigger(map, "resize");
    map.setCenter(center);

    //init infowin
    infoWindow = new google.maps.InfoWindow({
        maxWidth: 420
    });
    // Add a Snazzy Info Window to the marker
    infoWindow_custom = new SnazzyInfoWindow({
    	map: map,
        wrapperClass: 'custom-window',
        panOnOpen: true,
        offset: {
		  top: '5px',
		}
    });

    // var boxlatlng = new google.maps.LatLng(55.17886766, -166.81640625);
    //   customTxt = "<div>Click on a country below to find out more information<br> about Primary Imunodeficiencies (PID) at national level.</div>"
    //   txt = new TxtOverlay(boxlatlng, customTxt, "customBox", map);

    // these are the map styles


var styles2 = [
    {
        "featureType": "administrative",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#444444"
            }
        ]
    },
    {
        "featureType": "administrative.province",
        "elementType": "all",
        "stylers": [
          { 
                "visibility": "off"
          }
        ]
    },
    {
        "featureType": "administrative.locality",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "hue": "#ff0000"
            },
            {
                "saturation": "31"
            },
            {
                "lightness": "45"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "all",
        "stylers": [
            {
                "color": "#f2f2f2"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#f0ede8"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "all",
        "stylers": [
            {
                "saturation": -100
            },
            {
                "lightness": 45
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "all",
        "stylers": [
            {
                "color": "#46bcec"
            },
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#9dc0dd"
            }
        ]
    }
];
    var styles = [
        // {
        //   stylers: [
        //     //{ hue: "#00ffe6" },
        //     //{ saturation: -20 }
        //   ]
        // },
        // {
        //   featureType: "landscape",
        //   stylers: [
        //     // { hue: "#F0EDE8" },
        //     // { saturation: 100 }
        //       { hue: '#F0EDE8' },
        //       // { saturation: -22 },
        //       // { lightness: 32 },
        //   ]
        // }
        {
            featureType: "landscape",
            elementType: "geometry",
            stylers: [
                {
                    color: "#f0ede8"
                }
            ]
        }
        ,{
          featureType: "road",
          stylers: [
            { visibility: "off" }
          ]
        },{
          featureType: "administrative.land_parcel",
          stylers: [
            { visibility: "off" }
          ]
        },{
          featureType: "administrative.locality",
          stylers: [
            { visibility: "off" }
          ]
        },{
          featureType: "administrative.neighborhood",
          stylers: [
            { visibility: "off" }
          ]
        },{
          featureType: "administrative.province",
          stylers: [
            { visibility: "off" }
          ]
        },{
          featureType: "landscape.man_made",
          stylers: [
            { visibility: "off" }
          ]
        },{
          featureType: "landscape.natural",
          stylers: [
            { visibility: "off" }
          ]
        },{
          featureType: "poi",
          stylers: [
            { visibility: "off" }
          ]
        },{
          featureType: "transit",
          stylers: [
            { visibility: "off" }
          ]
        }
        ,{
            featureType: "water",
            elementType: "geometry",
            stylers: [
                {
                    "color": "#9dc0dd"
                }
            ]
        }
        // ,{
        //   featureType: "administrative.country",
        //   elementType: "geometry.stroke",
        //   stylers: [
        //     {
        //       //color: "#989899"
        //       visibility: "off"
        //     }
        //   ]
        // }


      ];

    map.setOptions({styles: styles2, draggable: true, zoomControl: true, scrollwheel: false, disableDoubleClickZoom: true});

    // Initialize JSONP request
    var script = document.createElement('script');
    var url = ['https://www.googleapis.com/fusiontables/v1/query?'];
    url.push('sql=');
    // var query = 'SELECT name, kml_4326 FROM ' +
    //     '1foc3xO9DyfSIF6ofvN0kp2bxSfSeKog5FbdWdQ';
    var query = "SELECT Name, name FROM " +
        "1dEO9sU4Ting1Zu7UqTl8K-wR9LFSbEGkxtuKiqkJ " +
        //"1N2LBk4JHwWpOY4d9fobIn27lfnZ5MDy-NoqqRpk " +
        //"WHERE Name does not contain 'American Samoa'";
        "WHERE import_notes does not contain 'notvisible'"; 
    var encodedQuery = encodeURIComponent(query);
    url.push(encodedQuery);
    url.push("&callback=drawMap");
    url.push("&key=AIzaSyAm9yWCV7JPCTHCJut8whOjARd7pwROFDQ");
    script.src = url.join("");
    var body = document.getElementsByTagName('body')[0];
    body.appendChild(script);

	//Resize Function
	google.maps.event.addDomListener(window, "resize", function() {
		var center = map.getCenter();
		resizeMap();
		google.maps.event.trigger(map, "resize");
		map.setCenter(center);

	});

} // init

	function resizeMap(){

	  var h = window.innerHeight;
	  var w = window.innerWidth;
	  var gmap_w = $("#map-wrap").width();
	  var gmap_h = $("#map-wrap").height();
	  // console.log(gmap_w);
	  // console.log(w);
	  $("#map-canvas").width(gmap_w);

	}


  function drawMap(data) {

    var rows = data['rows'];
    for (var i in rows) {
      if (rows[i][0] != 'Antarctica') {
        var newCoordinates = [];
        var geometries = rows[i][1]['geometries'];
        if (geometries) {
          for (var j in geometries) {
            newCoordinates.push(constructNewCoordinates(geometries[j]));
          }
          
        } else {
          newCoordinates = constructNewCoordinates(rows[i][1]['geometry']);
        }
        country = new google.maps.Polygon({
          paths: newCoordinates,
          strokeColor: '#989899',
          strokeOpacity: 1,
          strokeWeight: 0.3,
          fillColor: '#ffff66',
          fillOpacity: 0,
          name: rows[i][0]
        });


        google.maps.event.addListener(country, 'mouseover', function() {
          this.setOptions({fillOpacity: 0.5,fillColor: "#f99a48",strokeColor: '#f99a48'});
        });
        google.maps.event.addListener(country, 'mouseout', function() {
          this.setOptions({fillOpacity: 0});
        });
        google.maps.event.addListener(country, 'click', function(evt,coord) {
          //alert(this.name);
	        var content = "<span class='infoname'>"+this.name+"</span>";
	        HandleInfoWindow(evt.latLng, content);
	        select_country_by_name(this.name);
        });


        country.setMap(map);

      }
    }
  }


  	function select_country_by_name(name){
  		//console.log( name );

        $('#country_detail').css({
            'opacity': 0.3
        });
        $('#firms_list').css({
            'opacity': 0.3
        });


        $.ajax({
            type    : "POST",
            url     : MyAjax.ajaxurl,
            dataType: "json",
            data    : "action=get_products_by_country_name&name=" + name,
            success : function (a) {
                //console.log(a);
                //if (a.content) {
                    $('#country_detail').html(a.profile+a.diagnostics+a.scid_newborn_screening+a.script).css({
                        'opacity': '1'
                    });
                    $('#firms_list').html(a.content).css({
                        'opacity': '1'
                    });
                    $("#country_select").val(a.termid);

                    var destination = $('#country_select').offset().top - 50;

                    $('body,html').animate({scrollTop: destination}, 400);

                //}
            }
        });//end ajax
  	}

	function HandleInfoWindow(latLng, content) {
	    infoWindow_custom.setContent(content);
	    infoWindow_custom.setPosition(latLng);
	    infoWindow_custom.open(map);
	}
	

  function constructNewCoordinates(polygon) {
    var newCoordinates = [];
    var coordinates = polygon['coordinates'][0];
    for (var i in coordinates) {
      newCoordinates.push(
          new google.maps.LatLng(coordinates[i][1], coordinates[i][0]));
    }
    return newCoordinates;
  }

  google.maps.event.addDomListener(window, 'load', initialize);