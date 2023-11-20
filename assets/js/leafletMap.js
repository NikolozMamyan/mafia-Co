let cciLat = 48.5550278925866;
let cciLon = 7.745056596296454;
let myLat = 48.43017778308778;
let myLon = 7.657688465425483;
let radius = 2; //en km
let radiusM = radius * 1000; // em metres

// initialize map
let map = L.map("map", { zoomControl: false }).setView([myLat, myLon], 13);
const layer = L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
  maxZoom: 19,
  attribution:
    '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
}).addTo(map);

// zoom controls on top-right
const control = L.control
  .zoom({
    position: "topright",
  })
  .addTo(map);

// waypoint on CCI
const marker = L.marker([myLat, myLon]).addTo(map);

//route
// const routing = L.Routing.control({
//   addWaypoints: false,
//   draggableWaypoints: false,
//   waypoints: [L.latLng(cciLat, cciLon), L.latLng(cciLat, cciLon + 1)], //L.latLng(cciLat, cciLon)
//   routeWhileDragging: true,
// }).addTo(map);

// //popup CCI
// const popup = L.popup()
//   .setLatLng([cciLat, cciLon])
//   .setContent("CCI Campus.")
//   .openOn(map);

// const circle = L.circle([myLat, myLon], {
//   color: "purple",
//   fillColor: "purple",
//   fillOpacity: 0.2,
//   radius: radiusM,
// }).addTo(map);

const routing = L.Routing.control({
  addWaypoints: false,
  draggableWaypoints: false,
  waypoints: [L.latLng(cciLat, cciLon), L.latLng(cciLat, cciLon + 1)],
  routeWhileDragging: true,
});

const circle = L.circle([myLat, myLon], {
  color: "purple",
  fillColor: "purple",
  fillOpacity: 0.2,
  radius: radiusM,
});

let addToMap = L.layerGroup();
function test(btn) {
  if (btn === 1) {
    addToMap = marker;
  } else if (btn === 2) {
    addToMap = routing;
  } else if (btn === 3) {
    addToMap = circle;
  }

  console.log(addToMap);
  return addToMap.addTo(map);
}

let myLayer = L.layerGroup([marker, routing]);

//let myLayer2 = L.layerGroup([routing]);

const setMapView = (view) => {
  delLayers();
  switch (view) {
    case "Location":
      locationLayer();
      break;
    case "Pinpoint":
      break;
    case "Place":
      break;
    default:
      break;
  }
};

const delLayers = () => {
  console.log(myLayer);
  map.removeLayer(myLayer);
};

const locationLayer = () => {};
const pinpointLayer = () => {};
const placeLayer = () => {};
