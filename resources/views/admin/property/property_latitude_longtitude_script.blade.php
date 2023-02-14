<script>
    $('#latitude').on('input', function() {
        this.value = this.value.replace(/[^0-9\.]/g,'');
        var latVal = $(this).val();
        latAndLongFormat(latVal, 'latitude', 2);
    });

    $('#longtitude').on('input', function() {
        this.value = this.value.replace(/[^0-9\.]/g,'');
        var longVal = $(this).val();
        latAndLongFormat(longVal, 'longtitude', 3);
    })

    function latAndLongFormat(latLongVal, id, digit){
        var input = document.getElementById(id);

        if(latLongVal.length == digit){
            input.value = latLongVal + '.';
        }
    }
</script>