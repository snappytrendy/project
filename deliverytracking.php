<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Tracking</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Delivery Tracking</h1>
    <form id="tracking-form">
        <input type="text" id="tracking-code" placeholder="Enter tracking code">
        <button type="submit">Track Delivery</button>
    </form>
    <div id="map"></div>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=geometry"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('tracking-form');
    const mapElement = document.getElementById('map');
    let map;

    form.addEventListener('submit', async (event) => {
        event.preventDefault();
        const trackingCode = document.getElementById('tracking-code').value;
        const response = await fetch(`/track?code=${trackingCode}`);
        const data = await response.json();

        if (data.success && data.location) {
            const { lat, lng } = data.location;
            const center = new google.maps.LatLng(lat, lng);
            map = new google.maps.Map(mapElement, {
                center,
                zoom: 15
            });
            const marker = new google.maps.Marker({
                position: center,
                map
            });
        } else {
            alert('Invalid tracking code or no location found.');
        }
    });
});

    </script>
</body>
</html>
