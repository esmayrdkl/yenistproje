<?php include 'header.php'; ?>
 <?php

                    $query = "SELECT DISTINCT(urun_turu) FROM urunler ORDER BY urun_id DESC";
                    $statement = $db->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector brand" value="<?php echo $row['urun_turu']; ?>"  > <?php echo $row['urun_turu']; ?></label>
                    </div>
                    <?php
                    }

                    ?>