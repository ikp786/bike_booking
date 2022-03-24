
<!-- Javascript -->
<script src="<?= base_url()?>assets/admin/default/bundles/libscripts.bundle.js"></script>    
<script src="<?= base_url()?>assets/admin/default/bundles/vendorscripts.bundle.js"></script>
<script src="<?= base_url()?>assets/admin/default/bundles/mainscripts.bundle.js"></script>

<script src="<?= base_url()?>assets/admin/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
<script src="<?= base_url()?>assets/admin/vendor/parsleyjs/js/parsley.min.js"></script>
    

<script>
    $(function() {
        // validation needs name of the element
        $('#food').multiselect();

        // initialize after multiselect
        $('#basic-form').parsley();
    });
</script>