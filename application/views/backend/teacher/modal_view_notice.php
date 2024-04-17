<?php
$edit_data = $this->db->get_where('noticeboard', array('notice_id' => $param2))->result_array();
foreach ($edit_data as $row):
?>

<center>
    <a onClick="PrintElem('#notice_print')" class="btn btn-default btn-icon icon-left hidden-print pull-right">
        Print Notice
        <i class="entypo-print"></i>
    </a>
    
   
</center>

    <br><br>

    <div class="row" id="notice_print">
    

    <center>
        <img src="<?php echo base_url(); ?>uploads/logo.PNG" style="max-height : 60px;"><br>
        <h3 style="font-weight: 100;"><?php echo $system_name;?></h3>
       
    </center>
            <div class="col-md-12">

                <div class="panel panel-primary" data-collapsed="0">
                        
                    <div class="panel-body">
                        <b>Title</b>
                        <p><?php echo $row['notice_title']; ?></p>
                        <b>Notice</b>
                        <p><?php echo $row['notice'] ?></p>
                        <b>Date</b>
                        <p><?php echo date('d M Y',$row['create_timestamp']) ?></p>
                    </div>
                </div>
            </div>
    </div>
<?php endforeach; ?>


<script type="text/javascript">

    // print invoice function
    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data)
    {
        var mywindow = window.open('', 'notice', 'height=400,width=600');
        mywindow.document.write('<html><head><title>Notice</title>');
        mywindow.document.write('<link rel="stylesheet" href="assets/css/neon-theme.css" type="text/css" />');
        mywindow.document.write('<link rel="stylesheet" href="assets/js/datatables/responsive/css/datatables.responsive.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        var is_chrome = Boolean(mywindow.chrome);
        if (is_chrome) {
            setTimeout(function() {
                mywindow.document.close(); // necessary for IE >= 10
                mywindow.focus(); // necessary for IE >= 10
                mywindow.print();
                mywindow.close();

                return true;
            }, 250);
        }
        else {
            mywindow.document.close(); // necessary for IE >= 10
                mywindow.focus(); // necessary for IE >= 10
            mywindow.print();
            mywindow.close();

            return true;
        }

        return true;
    }

</script>

