<script type="text/javascript">
    $(document).ready(function(){
        $('h4').filter(function() {
            return $(this).text() === 'Create Answers';
        }).removeClass('pull-right');

        $("#has-many-answers").find(".col-sm-0").addClass("pull-right");
    });
</script>