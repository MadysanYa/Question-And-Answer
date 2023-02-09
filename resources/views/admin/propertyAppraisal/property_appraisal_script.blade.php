<script>
    $('#strength, #weakness, #opportunity, #threat, #comparable_cif_no, #geo_code, #distance, #size, #value_per_sqm, #total_value').closest('.form-group').css('display','none');
    $('#building_status, #no_of_floor').on('input', function() {
        this.value = this.value.replace(/\D/g,'');
        if (this.value > 100) {$(this).val(100);}
    })
</script>