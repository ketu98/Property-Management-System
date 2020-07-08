var map;
var lati;
var lon;
var id=document.getElementById("id");
console.log(document.getElementById("id"));
function initMap(){
var mysql      = ('mysql');
var connection = mysql.createConnection({
  host     : 'localhost',
  user     : 'root',
  password : '',
  database : 'property'
});

connection.connect();

connection.query('SELECT * from pro where id = '), con.query(sql, [id], function(err, rows, fields) {
  if (!err){
    lati=rows['lat'];
    lon=rows['lon'];}
  else
    console.log('Error while performing Query.');
});
connection.end();
/*function initMap() {
  function con();*/
  var pos={ lat: 26.752357, lng: 88.3919015
  };
  map = new google.maps.Map(document.getElementById("map"), {
    center: pos,
    zoom: 10,
  });

  /*var marker = new google.maps.Marker({
    position: pos,
    map: map,
    optimized: false
  });*/
  var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: pos,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
}
