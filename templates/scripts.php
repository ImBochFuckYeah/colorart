<script src="<?php $server?>/colorart/assets/js/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.6/b-2.4.2/cr-1.7.0/datatables.min.js"></script>
<script src="https://kit.fontawesome.com/11bd9b3a7a.js" crossorigin="anonymous"></script>
<script src="<?php $server?>/colorart/assets/js/global.js"></script>
<?php
function includeScript($filename) {
  /*echo '<script src="<?php $server?>/colorart/assets/js/' . $filename . '.js"></script>';*/
  echo '<script src="http://localhost/colorart/assets/js/' . $filename . '.js"></script>';
}
?>
</body>
</html>