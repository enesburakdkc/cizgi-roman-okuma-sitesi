<div class='bolumler'>
    <a href="<?php echo $oncekiBolumSayfasi; ?>" class='btn' style='<?php if($oncekiBolumBilgisi == true){echo "visibility: visible; ";} else{echo "visibility: hidden; ";} ?>color: var(--second-color);'><i class='fa-solid fa-left-long' style='color: var(--second-color); padding-right: 0.5rem;'></i><j2> Önceki</j2><j1> Bölüm</j1></a>
    <div class="btn" style="display: flex; align-items: center; padding: 0 1rem;">
        <i class="fa-solid fa-list" style="color: var(--second-color); margin: 0 0.5rem; "></i>
        <select style="color: var(--second-color); background-color: var(--primary-color); padding: 1rem;" onchange="this.options[this.selectedIndex].value != '' ? location = this.options[this.selectedIndex].value : false">
            <option value="">Bölüm Seçiniz</option>
            <?php
                $sqlkomut4 = "SELECT bolumSayisi FROM bolum WHERE adi = \"$arananManganinAdi\" ORDER BY bolumSayisi DESC";
            
                $islem4 = $baglanti->query($sqlkomut4);
            
                if($islem4->num_rows > 0){
                    //$degerler4, $islem4 içindeki Bölüm 1, 2, 3 değerleri içinde tek tek dolaşır.
                    while($degerler4 = $islem4->fetch_assoc()){
                        $bolumlerinSayisi = $degerler4['bolumSayisi'];
                        echo "<option value=\"../$bolumlerinSayisi/$adiREPLACE"."-bolum-"."$bolumlerinSayisi.php\">Bölüm $bolumlerinSayisi</option>";
                    }
                }
            ?>
        </select>
    </div>
    <a href="<?php echo $sonrakiBolumSayfasi; ?>" class='btn' style='<?php if($sonrakiBolumBilgisi == true){echo "visibility: visible; ";} else{echo "visibility: hidden; ";} ?>color: var(--second-color);'><j2>Sonraki </j2><j1>Bölüm </j1><i class='fa-solid fa-right-long' style='color: var(--second-color); padding-left: 0.5rem;'></i></a>
</div>