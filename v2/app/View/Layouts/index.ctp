<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php echo $this->Html->charset(); ?>
    <title><?php echo $title_for_layout; ?></title>
    <?php echo $this->Html->css(array('jquery-ui','wickedpicker.css','dataTable','jqModal','index')); ?>
    <?php echo $this->Html->script(array('jquery','jquery-ui','jqModal','dataTables','dataTables.dateFormat','dataTables.reloadAjax','dataTables.columnData', 'jquery.ui.datepicker-es','wickedpicker.js','dhtml/dhtmlxcommon','dhtml/dhtmlxcontainer','dhtml/dhtmlxwindows')); ?>
    <?php echo $this->fetch('extra_scripts'); ?>
    <?php echo $this->Js->writeBuffer(); ?>
    <script>
        var xpos, ypos, dhxWins, position, oTable;
        function createWindow(id,titulo,url,w,h) {
            xpos = xpos+20;
            ypos = ypos+20;

            if(ypos>200){ ypos = 5; }
            if(xpos>300){ xpos = 50; }

            w1 = dhxWins.createWindow(id, xpos, ypos, w, h);
            w1.setText(titulo);
            w1.attachURL(url);
        }
        function refreshOnClose(id){
            dhxWins.window(id).attachEvent("onClose", function(win){
                location.reload();
                return true;
            });
        }
    </script>
</head>
<body>
    <div class="ym-wrapper">
        <?php echo $this->fetch('content'); ?>
    </div>
</body>
</html>