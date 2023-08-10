//googleMapsAPIを持ってくるときに,callback=initMapと記述しているため、initMap関数を作成
function initMap() {
    // welcome.blade.phpで描画領域を設定するときに、id=mapとしたため、その領域を取得し、mapに格納します。
    let map = document.getElementById("map");
    // 東京タワーの緯度は35.6585769,経度は139.7454506と事前に調べておいた
    let tokyoTower = {lat: 35.6585769, lng: 139.7454506};
    // オプションを設定
    let opt = {
        zoom: 13, //地図の縮尺を指定
        center: tokyoTower, //センターを東京タワーに指定
    };
    // 地図のインスタンスを作成します。第一引数にはマップを描画する領域、第二引数にはオプションを指定
    let mapObj = new google.maps.Map(map, opt);
}
// function initMap() {
//   var myLatLng = {
//     lat: 43.6222102,
//     lng: -79.6694881
//   };

//   var map = new google.maps.Map(document.getElementById('map'), {
//     zoom: 15,
//     center: myLatLng
//   });

//   var marker = new google.maps.Marker({
//     position: myLatLng,
//     map: map,
//   });
// }
// google.maps.event.addDomListener(window, 'load', initMap);