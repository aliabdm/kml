@extends('layouts.app')
@section('content')

<div class="section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div id="html-validations" class="card card-tabs">
                    <div class="card-content">
                        <div class="card-title">
                            <div class="row">
                                <div class="col-12 col-md-6 col-l-10">
                                    <h4 class="card-title">Map</h4>
                                </div>
                                <div class="col-12 col-md-6 col-l-2">
                                </div>
                            </div>
                        </div>
                        <div id="html-view-validations">

                                <div class="row">
                                    <div class="input-field col-sm-12">
                                        <div class="col-12 col-sm-12" style="height: 400px" id="map"></div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--/ Recent Transactions -->

<script>
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: {{ '31.963158' }},
                lng: {{ '35.930359' }}
            },
            zoom: 1
        });
        var path = <?php echo json_encode($path); ?>;
        // googl cant access local server that why kml wont show untill the code is online so I added a public url to be tested
        var tesingPath = "https://drive.google.com/uc?id=10OqdYkHVJXWEbkBPKOuUQczHxMwrKXzg&export=download"
        var kmlLayer = new google.maps.KmlLayer({
            url: tesingPath,
            map: map,
        });
        // window.initMap = initMap;
    }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&callback=initMap&libraries=places" async defer></script>
@endsection

