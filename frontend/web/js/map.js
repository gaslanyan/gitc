/**
 * Created by user on 3/28/2016.
 */
function initMap() {


var myLatLng = {lat:40.786390, lng: 43.838376};
    var map = new google.maps.Map(document.getElementById('map'), {
        center: myLatLng,
        zoom: 17,
        styles: [
            {elementType: 'geometry', stylers: [{color: '#fedfb4'}]},
            {elementType: 'labels.text.stroke', stylers: [{color: '#fedfb4'}]},
            {elementType: 'labels.text.fill', stylers: [{color: '#fee3be'}]},
            {
                featureType: 'administrative.locality',
                elementType: 'labels.text.fill',
                stylers: [{color: '#b76803'}]
            },
            {
                featureType: 'poi',
                elementType: 'labels.text.fill',
                stylers: [{color: '#b76803'}]
            },
            {
                featureType: 'poi.park',
                elementType: 'geometry',
                stylers: [{color: '#fdbd62'}]
            },
            {
                featureType: 'poi.park',
                elementType: 'labels.text.fill',
                stylers: [{color: '#a76204'}]
            },
            {
                featureType: 'road',
                elementType: 'geometry',
                stylers: [{color: '#fef7d5'}]
            },
            {
                featureType: 'road',
                elementType: 'geometry.stroke',
                stylers: [{color: '#fedfb4'}]
            },
            {
                featureType: 'road',
                elementType: 'labels.text.fill',
                stylers: [{color: '#a76204'}]
            },
            {
                featureType: 'road.highway',
                elementType: 'geometry',
                stylers: [{color: '#ffe3bc'}]
            },
            {
                featureType: 'road.highway',
                elementType: 'geometry.stroke',
                stylers: [{color: '#febf68'}]
            },
            {
                featureType: 'road.highway',
                elementType: 'labels.text.fill',
                stylers: [{color: '#f3d19c'}]
            },
            {
                featureType: 'transit',
                elementType: 'geometry',
                stylers: [{color: '#87c7ff'}]
            },
            {
                featureType: 'transit.station',
                elementType: 'labels.text.fill',
                stylers: [{color: '#d59563'}]
            },
            {
                featureType: 'water',
                elementType: 'geometry',
                stylers: [{color: '#fcbb61'}]
            },
            {
                featureType: 'water',
                elementType: 'labels.text.fill',
                stylers: [{color: '#515c6d'}]
            },
            {
                featureType: 'water',
                elementType: 'labels.text.stroke',
                stylers: [{color: '#17263c'}]
            }
        ]
    });
    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: 'GITC',
        icon:"http://demogitc.tk/frontend/web/image/map_icon.png"
    });
    var sunCircle = {
        strokeColor: "#eca94e",
        strokeOpacity: 0.3,
        strokeWeight: 1,
        fillColor: "#c98426",
        fillOpacity: 0.6,
        map: map,
        center: myLatLng,
        radius: 10 // in meters
    };
    cityCircle = new google.maps.Circle(sunCircle);
    cityCircle.bindTo('center', marker, 'position');
}
