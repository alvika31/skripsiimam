<main class="main-content position-relative border-radius-lg ">
    <div class="container-fluid py-4" >
        <div class="row">
            <div class="col">
            <div class="card"  style="padding: 30px">
            
            <?php echo form_open('Jam/updateJam'); ?>
                    <div class="form-group">
                        <h3>Setting Jam <?=$jam['keterangan']?></h3>
                            <label for="start">Jam Mulai :</label>
                            <input type="hidden" name="id_jam" value="<?=$jam['id_jam']?>">
                            <input type="time"  value="<?=$jam['start']?>" name="start" class="form-control" placeholder="Jam Mulai" />
                    </div>

                        <div class="form-group">
                            <label for="finish">Jam Selesai :</label>
                            <input type="time" value="<?=$jam['finish']?>" name="finish" class="form-control" placeholder="Jam Selesai" />
                        </div>
                       
                    
                    <input type="submit" class="btn bg-gradient-secondary" value="Simpan">
                    <a href="<?=site_url('jam')?>" class="btn bg-gradient-danger">Back</a>
                    </form>
                   
  
                
                
            </div>
            </div>
        </div>
    </div>
</main>