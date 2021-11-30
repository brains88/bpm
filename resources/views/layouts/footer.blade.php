        {{-- Jquery JS --}}
        <script src="/jquery/jquery.min.js"></script>
        {{-- Pooper JS --}}
        <script src="/bootstrap/popper.min.js"></script>
        {{-- bootstrap JS --}}
        <script src="/bootstrap/bootstrap.min.js"></script>
        {{-- index JS --}}
        <script src="/js/index.js"></script>
        {{-- forms JS --}}
        <script src="/js/forms.js"></script>
        {{-- <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script> --}}
        {{-- <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=mapping" async></script>
        <script type="text/javascript">
            function mapping() {
                // The location of Geohomes Services Limited
                const location = { lat: -25.344, lng: 131.036 };
                // The map, centered at Geohomes Services Limited
                const contactmap = document.getElementById("contactmap");
                if (contactmap) {
                    const map = new google.maps.Map(contactmap, {
                        zoom: 4,
                        center: location,
                    });

                    // The marker, positioned at Geohomes Services Limited
                    const marker = new google.maps.Marker({
                        position: location,
                        map: map,
                    });
                } 
                    
            }
        </script> --}}
        {{-- Sagreit --}}
        <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=61a5e6cb1bd25500123c9634&product=inline-share-buttons" async="async"></script>
        <script>
          (function() { var qs,j,q,s,d=document, gi=d.getElementById,
          ce=d.createElement, gt=d.getElementsByTagName,
          id="calconic_", b="https://cdn.calconic.com/static/js/";
          if(!gi.call(d,id)) { j=ce.call(d,"script"); j.id=id; j.type="text/javascript"; j.async=true;
          j.dataset.calconic=true;
          j.src=b+"calconic.min.js"; q=gt.call(d,"script")[0]; q.parentNode.insertBefore(j,q) }
        })();
        </script>
    </body>
</html>