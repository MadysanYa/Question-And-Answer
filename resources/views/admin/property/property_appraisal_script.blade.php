<script type="text/javascript">
    $( document ).ready(function() {
        $('#strength, #weakness, #opportunity, #threat, #comparable_cif_no, #geo_code, #distance, #size, #value_per_sqm, #total_value').closest('.form-group').css('display','none');
        
        // ALLOW NUMBER AND SMALLER, EQUAL 100
        $('#building_status, #no_of_floor').on('input', function() {
            this.value = this.value.replace(/\D/g,'');
            if (this.value > 100) {$(this).val(100);}
        });
        
        // ALL NUMBER AND DOT
        $('#land_size_by_measurement, #building_size_by_measurement, #land_size').on('input', function() {
            this.value = this.value.replace(/[^0-9\.]/g,'');
        });

        // MODAL COMPARABLE REFERENCE ALL NUMBER AND DOT
        $('#com_ref_size1, #com_ref_size2, #com_ref_distance1, #com_ref_distance2, #com_ref_total_value1, #com_ref_total_value2, #com_ref_value_per_sqm1, #com_ref_value_per_sqm2').on('input', function() {
            this.value = this.value.replace(/[^0-9\.]/g,'');
        });

        // ALLOW NUMBER
        $('#com_id1, #com_id2, #com_ref_cif_no_name1, #com_ref_cif_no_name2').on('input', function() {
            this.value = this.value.replace(/\D/g,'');
        })

        //ALLOW NUMBER, DOT, COMMA
        $('#com_ref_geo_code1, #com_ref_geo_code2').on('input', function() {
            this.value = this.value.replace(/[^0-9\.\,]/g,'');
        })
    });
</script>