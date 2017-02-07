function map_initialize() {	
	
    if (jQuery('#map-event').length > 0){
    var map_div     = document.getElementById( 'map-event' );
	var map_markers = map_data.markers;
	var map_center  = new google.maps.LatLng( map_data.center[0], map_data.center[1] );
    var map_zoom    = Number( map_data.zoom );    
	var map         = new google.maps.Map( document.getElementById( 'map-event' ), {
            zoom      : map_zoom,
            center    : map_center,
			styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#424b5b"},{"weight":2},{"gamma":"1"}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry","stylers":[{"weight":0.6},{"color":"#545b6b"},{"gamma":"0"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#545b6b"},{"gamma":"1"},{"weight":"10"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#666c7b"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#545b6b"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#424a5b"},{"lightness":"0"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#666c7b"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#2e3546"}]}]
        } );

    if ( map_markers.length ) {
        var infowindow = new google.maps.InfoWindow(),
            marker, 
            i;
        for ( i = 0; i < map_markers.length; i++ ) {  
            marker = new google.maps.Marker( {
                position : new google.maps.LatLng(
                    map_markers[i]['latlang'][0], 
                    map_markers[i]['latlang'][1]
                ),
                title    : map_markers[i]['title'],
                map      : map
            } );
            google.maps.event.addListener( marker, 'click', ( function( marker, i ) {
                return function() {
                    infowindow.setContent( map_markers[i]['desc'] );
                    infowindow.open( map, marker );
                }
            } )( marker, i ) );
        }
    } 
	
	}
    
    //Widget Map
    if (jQuery('#widget-map').length > 0){

    var widget_map_div     = document.getElementById( 'widget-map' );	
	var widget_map_markers = map_data.markers;
	var widget_map_center  = new google.maps.LatLng( map_data.center[0], map_data.center[1] );
    var widget_map_zoom    = Number( map_data.zoom );    
	var widget_map         = new google.maps.Map( document.getElementById( 'widget-map' ), {
            zoom      : widget_map_zoom,
            center    : widget_map_center,
			styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]
            
        } );

    if ( widget_map_markers.length ) {
        var infowindow = new google.maps.InfoWindow(),
            marker, 
            i;
        for ( i = 0; i < widget_map_markers.length; i++ ) {  
            marker = new google.maps.Marker( {
                position : new google.maps.LatLng(
                    widget_map_markers[i]['latlang'][0], 
                    widget_map_markers[i]['latlang'][1]
                ),
                title    : widget_map_markers[i]['title'],
                map      : widget_map
            } );
            google.maps.event.addListener( marker, 'click', ( function( marker, i ) {
                return function() {
                    infowindow.setContent( widget_map_markers[i]['desc'] );
                    infowindow.open( widget_map, marker );
                }
            } )( marker, i ) );
        }
    } 
	
	}
};
google.maps.event.addDomListener( window, 'load', map_initialize );