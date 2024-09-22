<?php $this->load->view('templates/header'); ?>
    <div id="gantt" style="width:100%; height:500px;"></div>
<?php $this->load->view('templates/footer'); ?>
<script>
    const baseUrl = '<?= base_url() ?>';
    const url = `${baseUrl}chart/`;

    document.addEventListener('DOMContentLoaded', () => renderUtama());

    const renderUtama = () => {
        gantt.init('gantt');
        req({link: 'all'})
            .then(all => {
                console.log(all)
                gantt.parse(all)
            });
    }
</script>
<?php $this->load->view('templates/closure'); ?>