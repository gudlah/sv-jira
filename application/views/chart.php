<?php $this->load->view('templates/header'); ?>

<?php $this->load->view('templates/footer'); ?>
<script>
    const baseUrl = '<?= base_url() ?>';
    const url = `${baseUrl}chart/`;
</script>
<?php $this->load->view('templates/closure'); ?>