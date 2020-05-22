<div id="test" style="height:500px; width:500px"></div>

<script>
                function initMap() {
                    
                var map;
                var markersArray = [];
                var image = 'img/';
                var bounds = new google.maps.LatLngBounds();
                var loc;
                
                var mapOptions = { mapTypeId: google.maps.MapTypeId.ROADMAP };
                
                map =  new google.maps.Map(document.getElementById("test"), mapOptions);

                loc = new google.maps.LatLng("45.478294","9.123949");
                bounds.extend(loc);
                addMarker(loc, 'Event A', "active");

                loc = new google.maps.LatLng("50.83417876788752","4.298325777053833");
                bounds.extend(loc);
                addMarker(loc, 'Event B', "active");

                loc = new google.maps.LatLng("41.3887035","2.1807378");
                bounds.extend(loc);
                addMarker(loc, 'Event C', "active");

                map.fitBounds(bounds);
                map.panToBounds(bounds);    
                
                function addMarker(location, name, active) {          
                    var marker = new google.maps.Marker({
                        position: location,
                        map: map,
                        title: name,
                        status: active
                    });
                }
                    // var myLatLng = {lat:1,lng:1};
                    // var lat;
                    // var lng;
                    // var markers = [];
                    // var map = new google.maps.Map(document.getElementById('popoutmap_content'), {
                    //     zoom: 14,
                    //     center: myLatLng
                    // });
                    // // var marker = new google.maps.Marker({
                    // //     position: myLatLng,
                    // //     map: map
                    // // });
                    // addMarker(myLatLng);
                    // function setMapOnAll(map) {
                    //     for (var i = 0; i < markers.length; i++) {
                    //         markers[i].setMap(map);
                    //     }
                    // }
                    // function addMarker(location) {
                    //     var marker = new google.maps.Marker({
                    //     position: location,
                    //     map: map
                    //     });
                    //     markers.push(marker);
                    // }
                    // function clearMarkers() {
                    //     setMapOnAll(null);
                    // }
                    // function showMarkers() {
                    //     setMapOnAll(map);
                    // }
                    // function deleteMarkers() {
                    //     clearMarkers();
                    //     markers = [];
                    // }
                    $(".viewroute").click(function() {
                        // deleteMarkers();
                        // var bounds = new google.maps.LatLngBounds();
                        // if ($(this).closest("tr").prev().attr("lat") != null) {
                        //     lat = $(this).closest("tr").prev().attr("lat");
                        //     lng = $(this).closest("tr").prev().attr("lng");
                        //     addMarker({lat:parseFloat(lat),lng:parseFloat(lng)})
                        // }
                        // if ($(this).closest("tr").next().attr("lat") != null) {
                        //     lat = $(this).closest("tr").next().attr("lat");
                        //     lng = $(this).closest("tr").next().attr("lng");
                        //     addMarker({lat:parseFloat(lat),lng:parseFloat(lng)})
                        // }
                        // setMapOnAll(map);
                        // map.fitBounds(bounds);
                        // map.panToBounds(bounds);
                        $("#popoutmap").show();
                    })
                    // var marker = new google.maps.Marker({
                    //     position: myLatLng,
                    //     map: map
                    // });
                }
            </script>
            <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDog7hXlhQFMMuvI4PWVeMnhG_R_v8oFsk&libraries=geometry&callback=initMap">
            </script>