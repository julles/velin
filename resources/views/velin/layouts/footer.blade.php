
        <!--/.fluid-container-->
        <link href="{{ asset(null) }}/velin/vendors/datepicker.css" rel="stylesheet" media="screen">
        <link href="{{ asset(null) }}/velin/vendors/uniform.default.css" rel="stylesheet" media="screen">
        <link href="{{ asset(null) }}/velin/vendors/chosen.min.css" rel="stylesheet" media="screen">

        <link href="{{ asset(null) }}/velin/vendors/wysiwyg/bootstrap-wysihtml5.css" rel="stylesheet" media="screen">

        <script src="{{ asset(null) }}/velin/vendors/jquery-1.9.1.js"></script>
        <script src="{{ asset(null) }}/velin/bootstrap/js/bootstrap.min.js"></script>
        <script src="{{ asset(null) }}/velin/vendors/jquery.uniform.min.js"></script>
        <script src="{{ asset(null) }}/velin/vendors/chosen.jquery.min.js"></script>
        <script src="{{ asset(null) }}/velin/vendors/bootstrap-datepicker.js"></script>

        <script src="{{ asset(null) }}/velin/vendors/wysiwyg/wysihtml5-0.3.0.js"></script>
        <script src="{{ asset(null) }}/velin/vendors/wysiwyg/bootstrap-wysihtml5.js"></script>

        <script src="{{ asset(null) }}/velin/vendors/wizard/jquery.bootstrap.wizard.min.js"></script>

	<script type="text/javascript" src="{{ asset(null) }}/velin/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
	<script src="{{ asset(null) }}/velin/assets/form-validation.js"></script>
        
	<script src="{{ asset(null) }}/velin/assets/scripts.js"></script>
        <script>

	jQuery(document).ready(function() {   
	   FormValidation.init();
	});
	

        $(function() {
            $(".datepicker").datepicker();
            $(".uniform_on").uniform();
            $(".chzn-select").chosen();
            $('.textarea').wysihtml5();

            $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index+1;
                var $percent = ($current/$total) * 100;
                $('#rootwizard').find('.bar').css({width:$percent+'%'});
                // If it's the last tab then hide the last button and show the finish instead
                if($current >= $total) {
                    $('#rootwizard').find('.pager .next').hide();
                    $('#rootwizard').find('.pager .finish').show();
                    $('#rootwizard').find('.pager .finish').removeClass('disabled');
                } else {
                    $('#rootwizard').find('.pager .next').show();
                    $('#rootwizard').find('.pager .finish').hide();
                }
            }});
            $('#rootwizard .finish').click(function() {
                alert('Finished!, Starting over!');
                $('#rootwizard').find("a[href*='tab1']").trigger('click');
            });
        });
        </script>
    </body>

</html>