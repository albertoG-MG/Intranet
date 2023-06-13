<script>
    <?php  if($fetch_information->filename != null && $fetch_information->file != null){ ?>
        <?php if($fetch_information -> tipo == "ACTA ADMINISTRATIVA"){ ?>
            checkFile("../src/acta_administrativa/<?php echo $fetch_information->file; ?>", "<?php echo $fetch_information->filename; ?>", "<?php echo $fetch_information->file; ?>", "<?php echo $fetch_information->tipo; ?>");
        <?php }else{ ?>
            checkFile("../src/carta_compromiso/<?php echo $fetch_information->file; ?>", "<?php echo $fetch_information->filename; ?>", "<?php echo $fetch_information->file; ?>", "<?php echo $fetch_information->tipo; ?>");
        <?php } ?>
    <?php }else{ ?>
            <?php if($fetch_information -> tipo == "ACTA ADMINISTRATIVA"){ ?>
                $("#text-acta").html("<p style='word-break:break-word;' class='lowercase text-center text-sm text-gray-400 pt-1 tracking-wider'>Aún no se ha subido un acta administrativa</p>");
            <?php }else{ ?>
                $("#text-carta").html("<p style='word-break:break-word;' class='lowercase text-center text-sm text-gray-400 pt-1 tracking-wider'>Aún no se ha subido la carta compromiso</p>");
            <?php } ?>
    <?php } ?>

    <?php  if($fetch_information->filename != null && $fetch_information->file != null){ ?>
        function checkFile(url, filename, file, type) {
            $.ajax({
                url: url,
                type:'HEAD',
                error: function()
                {
                    if(type == "ACTA ADMINISTRATIVA"){
                        $("#text-acta").html("<p style='word-break:break-word;' class='lowercase text-center text-sm text-gray-400 pt-1 tracking-wider'>No se encontró el acta administrativa</p>");
                    }else if(type == "CARTA COMPROMISO"){
                        $("#text-carta").html("<p style='word-break:break-word;' class='lowercase text-center text-sm text-gray-400 pt-1 tracking-wider'>No se encontró la carta compromiso</p>");
                    }
                },
                success: function()
                {
                    if(type == "ACTA ADMINISTRATIVA"){
                        $("#text-acta").html("<a style='word-break:break-word;' class='lowercase text-center text-sm text-blue-600 hover:border-b-[1px] hover:border-blue-600 pt-1 tracking-wider' href='../src/acta_administrativa/<?php echo $fetch_information->file; ?>'><?php echo $fetch_information->filename; ?></a>");
                    }else if(type == "CARTA COMPROMISO"){
                        $("#text-carta").html("<a style='word-break:break-word;' class='lowercase text-center text-sm text-blue-600 hover:border-b-[1px] hover:border-blue-600 pt-1 tracking-wider' href='../src/carta_compromiso/<?php echo $fetch_information->file; ?>'><?php echo $fetch_information->filename; ?></a>");
                    }
                }
            });
        }
    <?php } ?>
</script>
