<script>
    $('input[name = strength], input[name = weakness], input[name = opportunity], input[name = threat]').closest('.form-group').css('display','none');
    $('input[name = building_status], input[name = no_of_floor]').on('input', function() {
        this.value = this.value.replace(/\D/g,'');
        if (this.value > 100) {$(this).val(100);}
    })
</script>